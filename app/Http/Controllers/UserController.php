<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{
    //
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }

    public function signUp(Request $request): RedirectResponse|View
    {
        $email = $request->get('email');

        $user = User::where('email', $email)
            ->where('social_type', 'local')
            ->first();

        if (!$user) {
            return view('auth.login', [
                'email' => $email,
                'error' => "Account doesn't exist"
            ]);
        }

        if (password_verify($request->get('password'), $user->password)) {
            Auth::login($user);
        } else {
            return view('auth.login', [
                'error' => "Account doesn't exist"
            ]);
        }

        return redirect('/');

    }

    public function registerUser(Request $request): RedirectResponse
    {
        $email = $request->get('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect('/register');
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            return redirect('/register');
        }

        $password = $request->get('password');
        $passwordRepeat = $request->get('repeatPassword');

        if ($password !== $passwordRepeat) {
            return redirect('/register');
        }

        $name = $request->get('name');

        if (!$name) {
            return redirect('/register');
        }

        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = password_hash($password, PASSWORD_DEFAULT);
        $newUser->social_type = 'local';

        $newUser->save();

        $userProfile = new UserProfile();
        $userProfile->user_id = $newUser->id;

        $userProfile->save();

        Auth::login($newUser);

        return redirect('/');

    }

    public function updateUserProfile(Request $request) {

        $userProfile = UserProfile::where('user_id', Auth::id())->first();

        if (empty($userProfile)) {
            $userProfile = new UserProfile();
        }

        $country = $request->get('country') ?: Location::get($request->ip());
        $DOB = $request->get('dob');
        $gender = $request->get('gender');

        $userProfile->user_id = Auth::id();
        $userProfile->contry = $country;
        $userProfile->dob = $DOB;
        $userProfile->gender = $gender;
        $userProfile->ip = $request->ip();

        $userProfile->save();

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $findUser = User::where('social_id', $user->id)->first();

            if($findUser){

                Auth::login($findUser);

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                    'password' => encrypt('my-google')
                ]);

                Auth::login($newUser);

            }
            return redirect('/');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
