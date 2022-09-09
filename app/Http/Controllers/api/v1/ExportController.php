<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportMenu() {

        return response()->json(['data' => config('menu')]);
    }

    public function exportImageUpload(Request $request)
    {
        $count = $request->get('count');

        return view('partials/image-uploads', ['count' => $count]);
    }
}
