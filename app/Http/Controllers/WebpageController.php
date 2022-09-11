<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestCase;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class WebpageController extends Controller
{
    public function index()
    {
        $doneTests = Test::where('user_id', Auth::id())
            ->pluck('test_case_id')
            ->all();

        $test = TestCase::where('type_test_id', 1)
            ->where('user_id', '!=', Auth::id())
            ->whereNotIn('id', $doneTests)
            ->with('images')
            ->get();

        if (count($test)) {
            $test->random()->get();
        } else {
            // todo normal response
            return response('visi testi done <a href="/create-test">uztaisi testu </a>');
        }

        return view('welcome', ['test' => $test[0]]);


    }

    public function login(): View|Factory|Redirector|RedirectResponse|Application
    {
        if (Auth::check()) {
            return redirect('/home');
        }

        return view('auth.login');
    }

    public function register(): Factory|View|Application
    {
        return view('auth.register');
    }

    public function test(): Factory|View|Application
    {
        return view('test');
    }

    public function setupTest(): Factory|View|Application
    {
        return view('createTest');
    }


}
