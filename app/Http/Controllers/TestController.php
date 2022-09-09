<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManagerStatic as ImageResizer;
use App\Models\TestCase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function createTinderTest(Request $request) {


            $userId = Auth::id();
            $testCaseId = $request->get('test_case_id');
            $mainTitle = $request->get('main_title');
            $images = $request->file('images');
            $titles = $request->get('titles');

            // todo check if testcase id is valid

            $testCase = new TestCase();
            $testCase->user_id = $userId;
            $testCase->type_test_id = $testCaseId;
            $testCase->title = $mainTitle;
            $testCase->thumbnail_count = count($images);

            $testCase->save();

            $path = str_replace('-', '/', Carbon::today()->toDateString());

            foreach ($images as $index => $image) {
                $this->makeDirectories();

                $newImage = new Image();
                $newImage->test_case_id = $testCase->id;
                $newImage->title = !empty($titles[$index]) ?: $mainTitle;

                if ($image) {

                    try {
                        $hash = bin2hex(random_bytes(6));
                    } catch (\Exception $e) {
                        Log::error('Could not create byte hash: TestController@createTinderTest: ' . $e->getLine());
                        $hash = rand(100000000000, 999999999999);
                    }

                    $extension = $image->getClientOriginalExtension();
                    $filename = 'BR-' . $hash . '.' . $extension;
                    $path = str_replace('-', '/', Carbon::today()->toDateString());

                    $image_resize = ImageResizer::make($image->getRealPath());
                    $image_resize->resize(1280, 720);

                    $image_resize->save(public_path("images/$path/" . $filename));
                }

                $newImage->image = $filename;
                $newImage->path = 'images/' . $path ;

                $newImage->save();
            }
            DB::commit();


        return redirect('/');

    }

    public function getTest($id) {
        $userId = Auth::id();

        $testCase = TestCase::where([
                ['type_test_id', $id],
                ['user_id', '!=', $userId]])
            ->with('images')
            ->first();

        return response()->json($testCase);
    }

    public function makeTest(Request $request) {
        $bestImageId = $request->get('image-id');
        $userId = Auth::id();
        $testCaseId = $request->get('test-case-id');

        $test = new Test();
        $test->test_case_id = $testCaseId;
        $test->user_id = $userId;
        $test->top_rated_image_id = $bestImageId;

        $test->save();

        return redirect('/');
    }

    private function makeDirectories() {
        [$year, $month, $day] = explode('-', Carbon::today()->toDateString());

        if(!is_dir(public_path('images/' . $year))) {
            mkdir(public_path('images/' . $year));
        }
        if(!is_dir(public_path('images/' . "$year/$month"))) {
            mkdir(public_path('images/' .  "$year/$month"));
        }
        if(!is_dir(public_path('images/' . "$year/$month/$day"))) {
            mkdir(public_path('images/' . "$year/$month/$day"));
        }
    }

}
