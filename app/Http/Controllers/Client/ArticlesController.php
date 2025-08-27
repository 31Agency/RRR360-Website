<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(9);

        return view('client.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $related_articles = Article::whereNot('id', $article->id)->inRandomOrder()->get();

        return view('client.articles.show', compact('article', 'related_articles'));
    }
}
