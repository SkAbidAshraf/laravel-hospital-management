<?php

namespace App\Http\Controllers\Admin\LetestNews;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\LetestNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LetestNewsController extends Controller
{
    public function index()
    {
        $allNews = LetestNews::all();
        return view('admin.news.manage_news', compact('allNews'));
    }

    public function add()
    {
        return view('admin.news.add_news');
    }

    public function add_submit(Request $request)
    {
        $arrayRequest = [
            'title' => $request->title,
            'date' => $request->date,
            'image' => $request->image,
            'details' => $request->details,
        ];

        $arrayValidate  = [
            'title' => 'required',
            'date' => 'required',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'details' => ['required', 'max:200'],
        ];

        $response = Validator::make($arrayRequest, $arrayValidate);

        if ($response->fails()) {
            $msg = '';
            foreach ($response->getMessageBag()->toArray() as $item) {
                $msg = $item;
            };

            return response()->json([
                'status' => 400,
                'msg' => $msg
            ], 200);
        } else {
            DB::beginTransaction();

            try {

                // single thumbnil image upload
                $slug = Str::slug($request->title, '-');

                if ($request->image) {
                    $file = $request->file('image');
                    $filename = $slug . '-' . hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

                    $img = Image::make($file);
                    $img->resize(500, 500)->save(public_path('uploads/' . $filename));

                    $host = $_SERVER['HTTP_HOST'];
                    $image = "http://" . $host . "/uploads/" . $filename;
                }

                $news = LetestNews::create([
                    'title' => $request->title,
                    'date' => $request->date,
                    'image' => $image,
                    'details' => $request->details,

                ]);

                DB::commit();
            } catch (\Exception $err) {
                $news = null;
            }

            if ($news != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'News Submited Successfylly'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'msg' => 'Internal Server Error',
                    'err_msg' => $err->getMessage()
                ]);
            }
        }
    }

    public function update_doctor(Request $request)
    {
        $letestNews = LetestNews::find($request->id);
        return view('admin.news.update_news', compact('letestNews'));
    }
    public function news_update_submit(Request $request)
    {
        $letestNews = LetestNews::find($request->id);

        if (is_null($letestNews)) {
            return response()->json([
                'msg' => "Letest News dosen't exists",
                'status' => 404
            ], 404);
        } else {
            if ($request->image) {
                $arrayRequest = [
                    'title' => $request->title,
                    'date' => $request->date,
                    'image' => $request->image,
                    'details' => $request->details,
                ];

                $arrayValidate  = [
                    'title' => 'required',
                    'date' => 'required',
                    'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                    'details' => ['required', 'string', 'max:500'],
                ];
            } else {
                $arrayRequest = [
                    'title' => $request->title,
                    'date' => $request->date,
                    'details' => $request->details,
                ];

                $arrayValidate  = [
                    'title' => 'required',
                    'date' => 'required',
                    'details' => ['required', 'string', 'max:500'],
                ];
            }


            $response = Validator::make($arrayRequest, $arrayValidate);

            if ($response->fails()) {
                $msg = '';
                foreach ($response->getMessageBag()->toArray() as $item) {
                    $msg = $item;
                };

                return response()->json([
                    'status' => 400,
                    'msg' => $msg
                ], 200);
            } else {
                DB::beginTransaction();

                try {

                 // single thumbnil image upload
                 $slug = Str::slug($request->title, '-');

                 if ($request->image) {

                     $pathinfo = pathinfo($letestNews->image);
                     $filename = $pathinfo['basename'];
                     $image_path = public_path("/uploads/") . $filename;

                     if (File::exists($image_path)) {
                         File::delete($image_path);
                     }


                     $file = $request->file('image');
                     $filename = $slug . '-' . hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

                     $img = Image::make($file);
                     $img->resize(500, 300)->save(public_path('uploads/' . $filename));

                     $host = $_SERVER['HTTP_HOST'];
                     $image = "http://" . $host . "/uploads/" . $filename;

                 } else {
                     $image = $request->old_image;
                 }


                    $letestNews->title = $request->title;
                    $letestNews->date = $request->date;
                    $letestNews->image = $image;
                    $letestNews->details = $request->details;
                    $letestNews->save();
                    DB::commit();
                } catch (\Exception $err) {
                    DB::rollBack();
                    $letestNews = null;
                }

                if (is_null($letestNews)) {
                    return response()->json([
                        'status' => 500,
                        'msg' => 'Internal Server Error',
                        'err_msg' => $err->getMessage()
                    ]);
                } else {
                    return response()->json([
                        'status' => 200,
                        'msg' => 'letestNews Information Update Successfylly'
                    ]);
                }
            }
        }
    }

    public function delete_news(Request $request)
    {
        $letestNews = LetestNews::find($request->id);

        if (is_null($letestNews)) {

            return response()->json([
                'msg' => "Do not Find any News",
                'status' => 404
            ], 404);
        } else {

            DB::beginTransaction();

            try {

                $pathinfo = pathinfo($letestNews->image);
                $filename = $pathinfo['basename'];
                $image_path = public_path("/uploads/") . $filename;

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $letestNews->delete();
                DB::commit();

                return response()->json([
                    'status' => 200,
                    'msg' => 'Delete this News',
                ], 200);
            } catch (\Exception $err) {

                DB::rollBack();

                return response()->json([
                    'msg' => "Internal Server Error",
                    'status' => 500,
                    'err_msg' => $err->getMessage()
                ], 500);
            }
        }
    }
}
