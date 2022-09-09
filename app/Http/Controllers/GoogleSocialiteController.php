<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;

class GoogleSocialiteController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleCallback()
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

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
