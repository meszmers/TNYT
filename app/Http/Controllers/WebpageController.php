<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestCase;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class WebpageController extends Controller
{
    public function index()
    {
        $doneTests = Test::where('user_id', Auth::id())
            ->pluck('test_case_id')
            ->all();

        $test = TestCase::where('type_test_id', 1)
            ->whereNotIn('id', $doneTests)
            ->with('images')
            ->get();

        if (count($test)) {
            $test->random()->get();
        } else {
            return response('visi testi done <a href="/create-test">uztaisi testu </a>');
        }

        return view('welcome', ['test' => $test[0]]);


    }

    public function login(): Factory|View|Application
    {
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
