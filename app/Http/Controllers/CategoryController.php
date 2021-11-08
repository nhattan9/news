<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug,$id,Request $request)
    {
        $categories = Category::where([['parent_id', 0], ['show_on_menu', 0]])
                              ->orderBy('menu_order', 'asc')
                              ->get();
        $category = Category::find($id);

        $articles = [];
        if($category->parent_id == 0 ){
            $cateChilds = Category::latest()->where('parent_id',$id)->take(5)->get();
            foreach($cateChilds as $cateChild){
                foreach($cateChild->articles as $article){
                  $articles[] = $article;
                }
            }
        }else{
            $articles = Article::latest()->where('category_id',$id)->get();
        }
        $breaking_news = Article::latest()->where('breaking_news',0)->take(5)->get();
       return view('article.category.list',compact('categories','category','articles','breaking_news'));
    }
}