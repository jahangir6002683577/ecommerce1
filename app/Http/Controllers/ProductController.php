<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ProductPage()
    {
        return view('pages.dashboard.product-page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ProductCreate(Request $request)
    {
        $user_id = $request->header('id');

        $img = $request->file('img');

        $t = time();
        $file_name = $img->getClientOriginalName();
        $image_name = "{$user_id}-{$t}-{$file_name}";
        $image_url = "uploads/{$image_name}";
        $img->move(public_path('uploads'), $image_name);

        return Product::create([
            'name' => $request->input('name'),
            'unit' => $request->input('unit'),
            'price' => $request->input('price'),
            'img_url' => $image_url,
            'category_id' => $request->input('category_id'),
            'user_id' => $user_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ProductDelete(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');
        $file_path = $request->input('file_path');
        File::delete($file_path);
        return Product::where('id', $product_id)->where('user_id', $user_id)->delete();

    }

    /**
     * Display the specified resource.
     */
    public function ProductById(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');
        return Product::where('id', $product_id)->where('user_id', $user_id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function ProductList(Request $request)
    {
        $user_id = $request->header('id');
        return Product::where('user_id', $user_id)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    // public function ProductUpdate(Request $request, Product $product)
    // {
    //     $user_id = $request->header('id');
    //     $product_id = $request->input('product_id');

    //     if ($request->hasFile('img')) {
    //         $img = $request->file('img');
    //         $t = time();
    //         $file_name = $img->getClientOriginalName();
    //         $image_name = "{$user_id}-{$t}-{$file_name}";
    //         $img_url = "uploads/{$image_name}";

    //         $img->move(public_path('uploads'), $image_name);
    //         $file_path = $request->input('file_path');
    //         File::delete($file_path);
    //     } else {
    //         return Product::where(['id', $product_id])->where(['user_id', $user_id])
    //             ->update([
    //                 'name' => $request->input('name'),
    //                 'unit' => $request->input('unit'),
    //                 'price' => $request->input('price'),
    //                 'category_id' => $request->input('category_id'),
    //                 'user_id' => $user_id
    //             ]);
    //     }
    // }



    function ProductUpdate(Request $request)
    {
        $user_id = $request->header('id');
        $product_id = $request->input('id');

        if ($request->hasFile('img')) {

            // Delete Old File
            $filePath = $request->input('file_path');
            File::delete($filePath);
            // Upload New File
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";
            $img->move(public_path('uploads'), $img_name);



            // Update Product

            return Product::where('id', $product_id)->where('user_id', $user_id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'unit' => $request->input('unit'),
                'img_url' => $img_url,
                'category_id' => $request->input('category_id')
            ]);

        } else {
            return Product::where('id', $product_id)->where('user_id', $user_id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'unit' => $request->input('unit'),
                'category_id' => $request->input('category_id'),
            ]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
