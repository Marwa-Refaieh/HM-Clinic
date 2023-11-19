<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Http\Requests\StorearticleRequest;
use App\Http\Requests\UpdatearticleRequest;
use App\Models\category;

class ArticleController extends Controller
{
    //all article in dashboard
    public function index_all(category $category)
    {
        $articles = article::where('category_id', $category->id)
        ->select('id' ,'category_id', 'title' ,'author_name','author_photo' ,'definition','image' , 'created_at')
        ->get();

        $cardiologys = article::where('category_id', 1)->get();
        $neurologists = article::where('category_id', 2)->get();
        $psychologys = article::where('category_id', 3)->get();
        $endocinologys = article::where('category_id', 4)->get();
        return view('dashboard.Artical-Management' , compact('articles','cardiologys','endocinologys','psychologys','neurologists'));
    }

    //all article in demo
    public function index(category $category)
    {
        $articles = article::where('category_id', $category->id)
        ->select('id' ,'category_id', 'title' ,'author_name','author_photo' ,'definition','image' , 'created_at')
        ->get();
        // return $articles;
        return view('demo.blog' , compact('articles'));
    }

    public function store(StorearticleRequest $request)
    {
        if($request->has('symptoms'))
            $symptoms = $request->symptoms;
        else
            $symptoms = null;
        if($request->has('risk_factor'))
            $risk_factor = $request->risk_factor;
        else
            $risk_factor = null;
        if($request->has('treatment'))
            $treatment = $request->treatment;
        else
            $treatment = null;
        if($request->has('when'))
            $when = $request->when;
        else
            $when = null;
        if($request->has('misconceptions'))
            $misconceptions = $request->misconceptions;
        else
            $misconceptions = null;

        $author_photo_path = uploadImage('authors' , $request->author_photo);
        $image_path = uploadImage('articles' , $request->image);

        $article = article::create([
            'title' => $request->title,
            'author_name' => $request->author_name,
            'author_photo' => $author_photo_path,
            'definition' => $request->definition,
            'symptoms' => $symptoms,
            'risk_factor' => $risk_factor,
            'treatment' => $treatment,
            'when' => $when,
            'misconceptions' => $misconceptions,
            'image' => $image_path,
            'category_id' => $request->category_id,
        ]);

        if($article){
            return response()->json([
                'status' => 'success',
                'msg' => 'Add secretary'
            ]);
        }else {
            return response()->json([
                'status' => 'error',
                'msg' => 'not Add secretary'
            ]);
        }
        // return redirect()->route('/')->with(['success' => "success"]);
    }
    public function show(article $article)
    {
        return $article;
    }

    public function update(UpdatearticleRequest $request, article $article)
    {
        if($request->has('title'))
            $article->update(["title" => $request->title]);

        if($request->has('author_name'))
            $article->update(["author_name" => $request->author_name]);

        if($request->has('author_photo')){
            $author_photo_path = uploadImage('authors' , $request->author_photo);
            $article->update(["author_photo" => $author_photo_path]);
        }

        if($request->has('definition'))
            $article->update(["definition" => $request->definition]);

        if($request->has('symptoms'))
            $article->update(["symptoms" => $request->symptoms]);

        if($request->has('risk_factor'))
            $article->update(["risk_factor" => $request->risk_factor]);

        if($request->has('treatment'))
            $article->update(["treatment" => $request->treatment]);

        if($request->has('when'))
            $article->update(["when" => $request->when]);

        if($request->has('misconceptions'))
            $article->update(["misconceptions" => $request->misconceptions]);

        if($request->has('image')){
            $image_path = uploadImage('articles' , $request->image);
            $article->update(["image" => $image_path]);
        }

        if($request->has('category_id'))
            $article->update(["category_id" => $request->category_id]);

        return $article;
        // return redirect()->route('/')->with(['success' => "success"]);
    }

    public function destroy(article $article)
    {
        $article->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Add secretary'
        ]);
        // return redirect()->route('/')->with(['data' => 'success']);
    }
}
