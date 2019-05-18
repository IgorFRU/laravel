<?php

namespace app\Http\Controllers\Admin;

use app\Image;
use app\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;
use app\Http\Controllers\Controller;

class UploadImagesController extends Controller
{
    public function product(Request $request)
    {
        // $file_tmp[] = $_FILES['image']['tmp_name'];
        $path = public_path().'\imgs\products\\';
        $path_thumbnail = public_path().'\imgs\products\thumbnail\\';
        $file = $request->file('image');

        $base_name = str_random(20);

        $filename = $base_name .'.' . $file->getClientOriginalExtension() ?: 'png';
        $filename_thumbnail = $base_name .'_thumbnail.' . $file->getClientOriginalExtension() ?: 'png';
        $img = ImageManagerStatic::make($file);
        $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($path . $filename);
        $thumbnail = $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($path_thumbnail . $filename_thumbnail);

        Image::create([
            'product_id' => $request->product_id,
            'file' => $filename, 
            'name' => $request->name,
            'alt' => $request->alt,
            'thumbnail' => $filename_thumbnail
            ]);
        
        // $product = Product::find($request->product_id);
        // $product->thumbnail = $filename_thumbnail;        
        // $product->save();

        Product::where('id', $request->product_id)
          ->update(['thumbnail' => $filename_thumbnail]);
        
        return redirect()->back()->with('success', 'Изображение загружено');
    }
}
