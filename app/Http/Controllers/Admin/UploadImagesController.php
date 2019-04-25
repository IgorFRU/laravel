<?php

namespace app\Http\Controllers\Admin;

use app\Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use app\Http\Controllers\Controller;

class UploadImagesController extends Controller
{
    public function upload(Request $request)
    {
        //dd($request->all());

        return redirect()->back()->with('success', 'Изображение загружено');
    }
}
