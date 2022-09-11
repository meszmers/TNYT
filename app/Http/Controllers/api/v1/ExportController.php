<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportMenu(): JsonResponse
    {
        return response()->json(['data' => config('menu')]);
    }

    public function exportImageUpload(Request $request): Factory|View|Application
    {
        $count = $request->get('count');

        return view('partials/image-uploads', ['count' => $count]);
    }
}
