<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Product;

class CategoryController extends Controller
{
    public function getChildCategories($parent_id)
    {
        $categories = Category::select("id", "name_en", "name_vi", "parent", "order")->whereNull("deleted_at")->where("parent", $parent_id)->orderBy("order", "ASC")->get();
        foreach ($categories as $category) {
            $category->slug_en = self::slugify($category->name_en);
            $category->slug_vi = self::slugify($category->name_vi);
            $category->items = self::getChildCategories($category->id);
        }
        return $categories;
    }
    public function slidebar()
    {
        $categories = self::getChildCategories(0);
        return response()->json($categories);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::whereNull("deleted_at")->orderBy("created_at", "DESC")->paginate(12);
        foreach ($products as $product) {
            $product -> images = json_decode($product -> images);
            $product -> recommended = json_decode($product -> recommended);
        }
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::whereNull("deleted_at")->where("category_id", $id)->orderBy("created_at", "DESC")->paginate(12);
        foreach ($products as $product) {
            $product -> images = json_decode($product -> images);
            $product -> recommended = json_decode($product -> recommended);
        }
        return response()->json($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
