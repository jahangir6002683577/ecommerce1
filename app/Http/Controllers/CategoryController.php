<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**BackendCategoryController
     * Display a listing of the resource.
     */
    public function CategoryPage()
    {
        return view('pages.dashboard.category-page');
    }

    public function category_list()
    {
        return view('components.category.category-list');
    }

    public function CategoryList(Request $request)
    {
        $user_id = $request->header('id');
        return Category::where('user_id', '=', $user_id)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function CategoryCreate(Request $request)
    {
        $user_id = $request->header('id');

        Category::create([
            'name' => $request->input('name'),
            'user_id' => $user_id
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Category created successfully'
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function CategoryDelete(Request $request)
    {
        $category_id = $request->input('id');
        $user_id = $request->header('id');

        return Category::where('id', '=', $category_id)
            ->where('user_id', '=', $user_id)->delete();
    }

    /**
     * Display the specified resource.
     */
    public function CategoryUpdate(Request $request)
    {
        $category_id = $request->input('id');
        $user_id = $request->header('id');
        return Category::where('id', '=', $category_id)->where('user_id', '=', $user_id)->
            update(['name' => $request->input('name')]);
    }

    public function CategoryById(Request $request)
    {
        $id = $request->input('id');
        $user_id = $request->header('id');
        return Category::where('id', '=', $id)->
            where('user_id', '=', $user_id)->first();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
