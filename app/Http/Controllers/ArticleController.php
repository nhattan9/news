<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id, $slug)
    {
        $categories = Category::where([['parent_id', 0], ['show_on_menu', 0]])
            ->orderBy('menu_order', 'asc')
            ->get();
        $breaking_news = Article::latest()->where('breaking_news', 0)
                                          ->take(5)->get();
        $article = Article::find($id);
        Article::find($id)->update(['views' => $article->views + 1]);

        return view('article.articleDetail', compact('categories', 'article', 'breaking_news'));
    }
}