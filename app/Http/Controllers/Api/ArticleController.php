<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $article = Article::create([ 'title' => $request->title,'content' => $request->content]);
        if ($images = $request->images) {
            foreach ($images as $image) {
                $article->addMedia($image)->toMediaCollection('images');
            }
        }
        return ['message' => 'Article created successfully','data' => new ArticleResource($article)
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $article = Article::findOrFail($id);
        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'images' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        if ($images = $request->images) {
            $article->clearMediaCollection('images');
            foreach ($images as $image) {
                $article->addMedia($image)->toMediaCollection('images');
            }
        }
        return [
            'message' => 'Article updated successfully ',
            'data' => new ArticleResource($article)
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $article = Article::find($id);
        $article->delete();
        return response(null, 204);
    }
}
