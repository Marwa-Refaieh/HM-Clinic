<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = category::get();
        // return $category;
        // return view('demo.blog' , compact('category'));
        // return view('demo.blog' , compact('categorys'));
        // return redirect()->route('/')->withInput($category);
    }

    public function store(StorecategoryRequest $request)
    {
        //
    }
    public function show(category $category)
    {
        //
    }
    public function update(UpdatecategoryRequest $request, category $category)
    {
        //
    }
    public function destroy(category $category)
    {
        //
    }
}
