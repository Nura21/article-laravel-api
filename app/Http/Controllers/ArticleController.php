<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function store(ArticleRequest $request)
    {
        return new ArticleResource(Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'author' => $request->author,
        ]));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        return new ArticleResource($article->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'author' => $request->author,
        ]));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response(null, 204);
    }
}
