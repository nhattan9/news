<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $category;
    private $article;

    public function __construct()
    {
        $this->category = new Category();
        $this->article = new Article();
    }
    public function index()
    {
        $categories = $this->category->where([['parent_id', 0], ['show_on_menu', 0]])
            ->orderBy('menu_order', 'asc')
            ->get();

        $breaking_news = $this->article->latest()->where('breaking_news', 0)->take(5)->get();
        $feature_news  =  $this->article->latest()->where('feature_news', 0)->take(3)->get();
        $recommend_news =  $this->article->latest()->where('recommended_news', 0)->get();
        $latestArticles = $this->article->latest()->take(10)->get();
        $getCateHomePage = $this->category->latest()->where([['parent_id', 0], ['show_on_homepage', 0]])
            ->take(4)->get();

        return view('home.index', compact('categories', 'breaking_news', 'feature_news', 'latestArticles', 'getCateHomePage', 'recommend_news'));
    }
    public function loadMore(Request $request)
    {
        $page = $request->page;
        $numpage = 5;
        $limit = ($page - 1) * $numpage;
        $breaking_news = $this->article->latest()->where('breaking_news', 0)->offset($limit)->take(5)->get();
        foreach ($breaking_news as $breaking_new) {
            echo '
            <div class="indi-trend-thumb  si-flex-trend">
            <div class="indi-trend-thumb-fu">
                <div class="figure">
                    <img src="' . $breaking_new->feature_image_path . '" alt="">
                    <p class="news-cat">Travel</p>
                </div>
                <div class="indi-video-thumb-caption">
                    <h3 class="new-h"><a href="#" class="new-h-a">' . $breaking_new->title . '</a></h3>
                    <div class="item-schedule">
                        <ul>
                            <li>' . $breaking_new->created_at->diffForHumans() . '</li>
                            <li>-</li>
                            <li><span><i class="fas fa-comment"></i></span>' . $breaking_new->views . '</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            ';
        }
    }
    // public function loginUser(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
            
    //         return redirect()->route('home');
    //     }else{
    //         dd('fails');
    //     }
    // }
}