<?php

namespace app\Http\Controllers\Admin;

use app\Image;
use app\ImageProduct;
use app\Product;
use app\Category;
use app\Article;
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

        if($request->main) {      
            $imgs = Image::whereIn('id', ImageProduct::where('product_id', $request->product_id)
                                                        ->pluck('image_id'))
                            ->where('main', 1)
                            ->get();
            foreach ($imgs as $img) {
                $img->main = 0;
                $img->save();
            }            
        }

        

        $image = Image::create([
            'file' => $filename, 
            'name' => $request->name,
            'alt' => $request->alt,
            'thumbnail' => $filename_thumbnail,
            'main' => $request->main
            ]);
        
        // $product = Product::find($request->product_id);
        // $product->thumbnail = $filename_thumbnail;        
        // $product->save();

        // Product::where('id', $request->product_id)
        //   ->update(['thumbnail' => $filename_thumbnail]);

        //ImageProduct

        
        
        $image->products()->attach($request->product_id);

        $imgs = Image::whereIn('id', ImageProduct::where('product_id', $request->product_id)
                                                        ->pluck('image_id'))
                            ->where('main', 1)
                            ->pluck('id');
        //dd($imgs);
        if (count($imgs) == 0) {
            $mainimg = Image::whereIn('id', ImageProduct::where('product_id', $request->product_id)
                                                        ->pluck('image_id'))
                            ->get();
            $mainimg[0]->main = 1;
            $mainimg[0]->save();
            // dd($mainimg[0]);
        }

        return redirect()->back()->with('success', 'Изображение загружено');
    }

    public function category(Request $request) {
        $path = public_path().'\imgs\categories\\';
        $file = $request->file('image');

        $base_name = str_random(20);

        $filename = $base_name .'.' . $file->getClientOriginalExtension() ?: 'png';
        $img = ImageManagerStatic::make($file);
        $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($path . $filename);

        $category = Category::where('id', $request->category_id)->get();
        $category[0]->img = $filename;

        //dd($category[0]);
        $category[0]->save();

        return redirect()->back()->with('success', 'Изображение загружено');
    }

    public function article(Request $request) {
        $path = public_path().'\imgs\articles\\';
        $file = $request->file('image');

        $base_name = str_random(20);

        $filename = $base_name .'.' . $file->getClientOriginalExtension() ?: 'png';
        $img = ImageManagerStatic::make($file);
        $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($path . $filename);

        $article = Article::where('id', $request->article_id)->get();
        $article[0]->img = $filename;

        //dd($category[0]);
        $article[0]->save();

        return redirect()->back()->with('success', 'Изображение загружено');
    }
}
