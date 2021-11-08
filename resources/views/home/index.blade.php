@extends('master_layout')
@section('title')
    <title>Home</title>
@endsection

@section('content')
<section class="newsticker-full">
    <div class="container">
        <div class="newsticker-inner">
            <div class="newsticker-title">
                <h4>Headline</h4>
            </div>
            <div class="newsticker-slider">
                <ul class="newstickerSlide">
                    @foreach ($breaking_news as $breaking)
                         <li class="newsticker-slider-text {{ $loop->first ? 'text-active' : "" }} "><a href="{{ route('detail.article', ['id'=>$breaking->id,'slug'=>$breaking->slug]) }}">{{$breaking->title}}</a></li>
                    @endforeach
                </ul>
                <div class="newsticker-dot">
                    <ul>
                        <li class="newsticker-left"><span><i class="fas fa-chevron-left"></i></span></li>
                        <li class="newsticker-right"><span><i class="fas fa-chevron-right"></i></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="header-section ptb-15">
    <div class="container">
        <div class="row">
            @foreach ($feature_news as $feature_new)
            @if ($loop->first)
            <div class="col-md-6 col-sm-6 ">
                <div class="header-news"> 
                    <div class="header-news-left header-news-effect ">
                        <a href="{{ route('detail.article', ['id'=>$feature_new->id,'slug'=>$feature_new->slug]) }}">
                            <figure>
                                <img src={{$feature_new->feature_image_path}} alt="grid" >
                            </figure>
                        </a>
                            <div class="header-left-news-caption " style="border-radius:12px;">
                                <p class="news-cat" style="background-color: {{ $feature_new->category->color}} ">{{ $feature_new->category->name}}</p>
                                <div class="vertical-text">
                                    <h3 class="vertical-text-inner"><a href="{{ route('detail.article', ['id'=>$feature_new->id,'slug'=>$feature_new->slug]) }}">{{ $feature_new->title}}</a></h3>
                                </div>
                                <p class="news-name"><span>{{ $feature_new->admin->name}}</span> - {{ $feature_new->created_at->diffForHumans()}}</p>
                            </div>
                        
                    </div>
                </div>
            </div>
            @endif    

            @if ($loop->even)
            <div class="col-md-6 col-sm-6">
            <div class="header-news">
                <div class="header-new-right">
                    <div class="header-new-rt header-news-effect">
                        <a href="{{route('detail.article', ['id'=>$feature_new->id,'slug'=>$feature_new->slug])}}">
                            <figure>
                                <img src="{{$feature_new->feature_image_path}}" alt="grid" >
                            </figure>
                        </a>
                        <div class="header-left-news-caption" style="border-radius:12px;">
                            <p class="news-cat" style="background-color: {{ $feature_new->category->color}} ">{{ $feature_new->category->name}}</p>
                            <div class="vertical-text">
                                <h3 class="vertical-text-inner"><a href="{{route('detail.article', ['id'=>$feature_new->id,'slug'=>$feature_new->slug])}}">{{ $feature_new->title}}</a></h3>
                            </div>
                            <p class="news-name"><span>{{ $feature_new->admin->name}}</span> - {{ $feature_new->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
            @endif
            
            @if ($loop->last)
                        <div class="header-new-rt header-news-effect">
                            <a href="{{route('detail.article', ['id'=>$feature_new->id,'slug'=>$feature_new->slug])}}">
                            <figure>
                                <img src="{{$feature_new->feature_image_path}}" alt="grid" >
                            </figure>
                            </a>
                            <div class="header-left-news-caption" style="border-radius:12px;">
                                <p class="news-cat" style="background-color: {{ $feature_new->category->color}} ">{{ $feature_new->category->name}}</p>
                                <div class="vertical-text">
                                    <h3 class="vertical-text-inner"><a href="{{route('detail.article', ['id'=>$feature_new->id,'slug'=>$feature_new->slug])}}">{{ $feature_new->title}}</a></h3>
                                </div>
                                <p class="news-name"><span>{{ $feature_new->admin->name}}</span> - {{ $feature_new->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif  
                       
            @endforeach
            
        </div>
    </div>
</section>

<section class="full-section">
    <div class="container">
        <div class="full-sec-inner">
            <div class="row">
                <div class="col-md-8 col-sm-12 mt-30">
{{-- Danh mục  ************************************************************** --}}

                    <div class="item-list-det">
                        <div class="item-list-header">
                            <div class="item-list-link">
                                <ul class="item-main-list">
                                    <li class="not active"><a href="#">All</a></li>
                                    @foreach ($categories as $cate)
                                         <li class="not"><a href="{{ route('category.article', ['slug'=>$cate->slug,'id'=>$cate->id]) }}">{{ $cate->name}}</a></li>
                                    @endforeach
                                </ul>
                                <!-- <ul>
                                    
                                </ul> -->
                            </div>
                        </div>
                        <div class="item-list-inner">
                            @foreach ($latestArticles as $latestArticle)
                                @if ($loop->first)
                                <div class="item-list-indi-det">
                                    <div class="item-list-indi-img">
                                    <a href="{{route('detail.article', ['id'=>$latestArticle->id,'slug'=>$latestArticle->slug])}}">
                                        <figure>
                                            <img src="{{ $latestArticle->feature_image_path }}" alt="">
                                        </figure>
                                    </a>
                                        <p class="news-cat" style="background-color: {{ $latestArticle->category->color }}">{{ $latestArticle->category->name }}</p>
                                    </div>
                                    <div class="inner-caption">
                                        <div class="inner-caption-title">
                                            <h3><a href="{{route('detail.article', ['id'=>$latestArticle->id,'slug'=>$latestArticle->slug])}}">{{ $latestArticle->title}}</a></h3>
                                        </div>
                                        <div class="inner-caption-head">
                                            <h4>{{ $latestArticle->admin->name}}</h4>
                                            <ul class="caption-head-list">
                                                <li><span><i class="fas fa-comment"></i></span>{{ $latestArticle->views}}</li>
                                            </ul>
                                        </div>
                                        <div class="inner-caption-para">
                                            <p>{{ $latestArticle->summary}} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-list-select-box">
                                    <div class="item-list-box-inner owl-carousel owl-theme">

                                @else
                                <div class="item">
                                    <a href="{{route('detail.article', ['id'=>$latestArticle->id,'slug'=>$latestArticle->slug])}}">
                                    <figure>
                                        <img src="{{ $latestArticle->feature_image_path }}" alt="">
                                    </figure>
                                   </a>
                                    <div class="item-title title-ellipsis-2">
                                        <h3><a href="{{route('detail.article', ['id'=>$latestArticle->id,'slug'=>$latestArticle->slug])}}">{{ $latestArticle->title}}</a></h3>
                                    </div>
                                    <div class="item-schedule">
                                        <ul>
                                            <li>{{ $latestArticle->created_at->diffForHumans()}}</li>
                                            <li>-</li>
                                            <li><span><i class="fas fa-comment"></i></span>{{ $latestArticle->views}}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            @endforeach

                                </div>
                                <div class="item-selection">
                                    <div class="item-select-nav item-select-nav-left">
                                        <button><i class="fas fa-chevron-left"></i></button>
                                    </div>
                                    <div class="item-select-nav item-select-nav-right">
                                        <button><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

{{-- CateHompage  ************************************************************** --}}
                    <div class="individual-item-sec">
                        <div class="row">
                            @foreach ($getCateHomePage as $cate)
                            <div class="col-md-6 col-sm-6">
                                <div class="individual-item-inner">
                                    <div class="item-list-header">
                                        <div class="item-list-title">
                                            <h3>{{ $cate->name  }}</h3>
                                        </div>
                                    </div>
                                    @php
                                    $cateChild= \App\Category::latest()->where('parent_id',$cate->id)->take(3)->get();
                                    @endphp
                                    @foreach ($cateChild as $cateItem)
                                    @if ($loop->first)
                                    @foreach ($cateItem->article as $article)
                                    <div class="individual-item-main">
                                    <a href="{{route('detail.article', ['id'=>$article->id,'slug'=>$article->slug])}}">
                                        <figure>
                                            <img src="{{$article->feature_image_path}}" alt="">
                                        </figure>
                                    </a>
                                        <div class="item-inner-individual">
                                            <h3 class="item-inner-indi-h"><a href="{{route('detail.article', ['id'=>$article->id,'slug'=>$article->slug])}}" class="item-h-a">{{$article->title}}</a></h3>
                                            <ul>
                                                <li><a href="author.html">{{$article->admin->name}}</a></li>
                                                <li>-</li>
                                                <li>{{$article->created_at->diffForHumans()}}</li>
                                            </ul>
                                            <div class="item-inner-individual-para">
                                                <p>{{$article->summary}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                @else
                                    <div class="individual-item-small">
                                      @foreach ($cateItem->article as $article)
                                        <div class="individual-item-small-thumb">
                                            <a href="{{route('detail.article', ['id'=>$article->id,'slug'=>$article->slug])}}" class="item-h-a">
                                            <figure>
                                                <img src="{{$article->feature_image_path}}" alt="">
                                            </figure>
                                            </a>
                                            <div class="small-thumb-cap">
                                                <h3 class="small-thumb-h"><a href="{{route('detail.article', ['id'=>$article->id,'slug'=>$article->slug])}}" class="small-h-a">{{$article->title}}</a></h3>
                                                <p>{{$article->created_at}}</p>
                                            </div>
                                        </div>
                                      @endforeach
                                     
                                        <!-- <div class="individual-btn">
                                            <button>Load more <span><i class="fas fa-redo"></i></span></button>
                                        </div> -->
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
{{-- Video  ************************************************************** --}}

                        {{-- <div class="indi-video-sec">
                            <div class="item-list-header">
                                <div class="item-list-title">
                                    <h3>Video</h3>
                                </div>
                                <div class="video-list-link">
                                    <ul class="video-main-list">
                                        <li class="not active"><a href="#">All</a></li>
                                        <li class="not"><a href="#">Business</a></li>
                                        <li class="not"><a href="#">Opinion</a></li>
                                        <li class="not"><a href="#">Sports</a></li>
                                        <li><a href="#">Video</a></li>
                                        <li class="not"><a href="#">Travel</a></li>
                                        <li class="not"><a href="#">Lifestyle</a></li>
                                        <li><a href="#">Music</a></li>
                                        <li><a href="#">Wheather</a></li>
                                        <li><a href="#">A & E</a></li>
                                        <li><a href="#">Bytes</a></li>
                                        <li><a href="#">Showbiz</a></li>
                                        <li><a href="#">Reel</a></li>
                                        <li><a href="#">Culture</a></li>
                                        <li><a href="#">TV</a></li>
                                        <li class="more-vid-li not"><a href="#" class="more-vid-link">More <span><i class="fas fa-caret-down"></i></span></a>
                                            <ul class="vid-more"></ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="indi-video-full">
                                <div class="indi-video-bg">
                                    <figure>
                                        <img src="assets/images/parrot.jpg" alt="">
                                    </figure>
                                    
                                    <div class="header-left-news-caption new-video-overlay">
                                        <p class="news-cat">Nature</p>
                                        <div class="vertical-text">
                                            <h3 class="vertical-text-inner"><a href="#">Birds are the most-studied group of animals on Earth, in part because of the ease of finding them and the proliferation of citizen scientists-bird enthusiasts. But even expert ornithologists who have studied them were surprised by a study recently published in the journal Science, which found that bird populations have declined 29% in the U.S. and Canada since 1970 – a much faster rate than previously realized.</a></h3>
                                        </div>
                                        <p class="news-name"><span>John Linkon</span> - August 10, 2019</p>
                                        <div class="play-btn">
                                            <span><i class="far fa-play-circle"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="indi-video-iframe">
                                    <iframe id="ifr" src="https://www.youtube.com/embed/KYv5RW5nXY4"></iframe>
                                </div>
                            </div>  
                            <div class="indi-video-thumb-full full-row">
                                <div class="indi-video-thumb">
                                    <div class="full-row-item">
                                        <figure>
                                            <img src="assets/images/nurse-2141808_960_720.jpg" alt="">
                                            <figcaption><span><i class="far fa-play-circle"></i></span></figcaption>
                                        </figure>
                                        <div class="indi-video-thumb-caption">
                                            <h3 class="new-h"><a href="#" class="new-h-a">Drinking Tea Improves Brain Health, Study Suggests drinking Tea Improves Brain Health, Study Suggests drinking Tea Improves Brain Health, Study Suggests drinking Tea Improves Brain Health, Study Suggests</a></h3>
                                            <p>Sep 20, 2019</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="indi-video-thumb">
                                    <div class="full-row-item">
                                        <figure>
                                            <img src="assets/images/fitness-332278_960_720.jpg" alt="">
                                            <figcaption><span><i class="far fa-play-circle"></i></span></figcaption>
                                        </figure>
                                        <div class="indi-video-thumb-caption">
                                            <h3 class="new-h"><a href="#" class="new-h-a">Limiting Mealtimes May Increase Your Motivation for Exercise</a></h3>
                                            <p>Aug 22, 2019</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="indi-video-thumb">
                                    <div class="full-row-item">
                                        <figure>
                                            <img src="assets/images/statue-of-liberty.jpg" alt="">
                                            <figcaption><span><i class="far fa-play-circle"></i></span></figcaption>
                                        </figure>
                                        <div class="indi-video-thumb-caption">
                                            <h3 class="new-h"><a href="#" class="new-h-a">Expanding the 'Squad:' U.S. liberals challenge moderate Democrats to move party left</a></h3>
                                            <p>June 20, 2019</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="indi-video-thumb">
                                    <div class="full-row-item">
                                        <figure>
                                            <img src="assets/images/trump.jpg" alt="">
                                            <figcaption><span><i class="far fa-play-circle"></i></span></figcaption>
                                        </figure>
                                        <div class="indi-video-thumb-caption">
                                            <h3 class="new-h"><a href="#" class="new-h-a">Reduced Carbohydrate Intake Improves Type 2 Diabetics' Ability to Regulate Blood Sugar</a></h3>
                                            <p>Aug 15, 2019</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="individual-btn">
                                <button>Load more <span><i class="fas fa-redo"></i></span></button>
                            </div>
                        </div> --}}

{{-- Tin moi nhat ************************************************************** --}}
                        <div class="indi-latest-news-sec">
                            <div class="item-list-header">
                                <div class="item-list-title">
                                    <h3>Tin mới nhất </h3>
                                </div>
                                <div class="item-list-navi">
                                    <div class="item-list-navi-data">
                                        <ul>
                                            <li><span><i class="fas fa-chevron-left"></i></span></li>
                                            <li><span><i class="fas fa-chevron-right"></i></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="item-latest-news-inner">
                                @foreach ($latestArticles as $latestArticle)
                                <div class="item-latest-news-thumb">
                                    <figure>
                                    <a href="{{route('detail.article', ['id'=>$latestArticle->id,'slug'=>$latestArticle->slug])}}" class="latest-h-a">

                                        <img src="{{$latestArticle->feature_image_path}}" alt="">
                                    </a>

                                    </figure>
                                    <div class="latest-news-caption">
                                        <h3 class="latest-h"><a href="{{route('detail.article', ['id'=>$latestArticle->id,'slug'=>$latestArticle->slug])}}" class="latest-h-a">{{$latestArticle->title}}</a></h3>
                                        <div class="item-schedule">
                                            <ul>
                                                <li>{{$latestArticle->created_at->diffForHumans()}}</li>
                                                <li>-</li>
                                                <li><span><i class="fas fa-comment"></i></span>{{$latestArticle->views}}</li>
                                            </ul>
                                        </div>
                                        <div class="inner-caption-para-big">
                                            <p>{{$latestArticle->summary}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                

                            </div>
                            <div class="item-latest-news-pagi">
                                <div class="item-latest-news-pagination">
                                    <ul>
                                        <li class="active disable"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next <span><i class="fas fa-chevron-right"></i></span></a></li>
                                    </ul>
                                </div>
                                <div class="item-latest-page-num">
                                    <p>Page 1 of 10 results</p>
                                </div>
                            </div>
                        </div>


{{-- quangCao  ************************************************************** --}}
                        <div class="indi-advertise">
                            <figure>
                                <img src="{{asset('newsTemplate/assets/images/add.png')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 mt-30 tab-row">
            
                    
{{-- Stay Connect  ************************************************************** --}}
                    <div class="si-social-full tab-item">
                        <div class="item-list-header">
                            <div class="item-list-title">
                                <h3>Stay connected</h3>
                            </div>
                        </div>
                        <div class="social-box">
                            <div class="social-box-row">
                                <div class="social-indi-item">
                                    <a href="{{getConfigValueFromSettingTable('facebook')}}">
                                        <div class="social-thumb social-thumb-fb">
                                            <div class="social-icon">
                                                <span><i class="fab fa-facebook-f"></i></span>
                                            </div>
                                            <div class="social-text">
                                                <h3>12400</h3>
                                                <p>Fans</p>
                                            </div>
                                        </div>
                                    </a>
                                   
                                </div>
                                <div class="social-indi-item">
                                    <a href="{{getConfigValueFromSettingTable('twitter')}}">
                                    <div class="social-thumb social-thumb-tw">
                                        <div class="social-icon">
                                            <span><i class="fab fa-twitter"></i></span>
                                        </div>
                                        <div class="social-text">
                                            <h3>3200</h3>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="social-indi-item">
                                    <a href="{{getConfigValueFromSettingTable('google')}}">
                                    <div class="social-thumb social-thumb-gm">
                                        <div class="social-icon">
                                            <span><i class="fab fa-google-plus-g"></i></span>
                                        </div>
                                        <div class="social-text">
                                            <h3>400</h3>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="social-indi-item">
                                    <a href="{{getConfigValueFromSettingTable('instagram')}}">
                                    <div class="social-thumb social-thumb-in">
                                        <div class="social-icon">
                                            <span><i class="fab fa-instagram"></i></span>
                                        </div>
                                        <div class="social-text">
                                            <h3>5200</h3>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="social-indi-item">
                                    <a href="{{getConfigValueFromSettingTable('youtube')}}">
                                    <div class="social-thumb social-thumb-yo">
                                        <div class="social-icon">
                                            <span><i class="fab fa-youtube"></i></span>
                                        </div>
                                        <div class="social-text">
                                            <h3>4500</h3>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="social-indi-item">
                                    <a href="{{getConfigValueFromSettingTable('pinterest')}}">
                                    <div class="social-thumb social-thumb-pi">
                                        <div class="social-icon">
                                            <span><i class="fab fa-pinterest-p"></i></span>
                                        </div>
                                        <div class="social-text">
                                            <h3>2200</h3>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
{{-- Subcrible  ************************************************************** --}}
                    <div class="si-subs-full tab-item">
                        <div class="item-list-header">
                            <div class="item-list-title">
                                <h3>Subscribe</h3>
                            </div>
                        </div>
                        <div class="subs-full-box">
                            <h3>Get the best viral stories straight into your inbox!</h3>
                            <form action="#">
                                <input type="email" placeholder="Type your email here">
                                <button>Sign up</button>
                            </form>
                        </div>
                    </div>
{{-- Adtivise  ************************************************************** --}}
                    <div class="si-ad tab-item">
                        <figure>
                            <img src="{{asset('newsTemplate/assets/images/interaction-1233873_960_720.jpg')}}" alt="">
                        </figure>
                    </div>
{{-- Tinhot  ************************************************************** --}}

                    <div class="si-trend-full tab-item">
                        <div class="item-list-header">
                            <div class="item-list-title">
                                <h3>Tin hot  </h3>
                            </div>
                        </div>
                        <div class="trend-full-box si-flex-row si-flex-small">
                            <div id="result">
                            @foreach ($breaking_news as $breaking_new)
                                <div class="indi-trend-thumb  si-flex-trend">
                                    <div class="indi-trend-thumb-fu">
                                        <div class="figure">
                                        <a href="{{route('detail.article', ['id'=>$breaking_new->id,'slug'=>$breaking_new->slug])}}" class="new-h-a">
                                            <img src="{{$breaking_new->feature_image_path}}" alt="">
                                            {{-- <p class="figcaption"><span><i class="far fa-play-circle"></i></span></p> --}}
                                            <p class="news-cat">Travel</p>
                                        </a>
                                    </div>
                                        <div class="indi-video-thumb-caption">
                                            <h3 class="new-h"><a href="{{route('detail.article', ['id'=>$breaking_new->id,'slug'=>$breaking_new->slug])}}" class="new-h-a">{{ $breaking_new->title}}</a></h3>
                                            <div class="item-schedule">
                                                <ul>
                                                    <li>{{ $breaking_new->created_at->diffForHumans()}}</li>
                                                    <li>-</li>
                                                    <li><span><i class="fas fa-comment"></i></span>{{ $breaking_new->views}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                            <div class="individual-btn">
                                <button data-url="{{ route('loadMore') }}" class="loadMore" >Load more <span><i class="fas fa-redo"></i></span></button>
                            </div>
                        </div>
                    </div>
{{-- Recommend  ************************************************************** --}}

                    <div class="si-trend-full tab-item">
                        <div class="item-list-header">
                            <div class="item-list-title">
                                <h3>Reccomended</h3>
                            </div>
                            <div class="item-list-navi">
                                <div class="item-list-navi-data">
                                    <ul>
                                        <li><span><i class="fas fa-chevron-left"></i></span></li>
                                        <li><span><i class="fas fa-chevron-right"></i></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="trend-full-box si-flex-row">
                            @foreach ($recommend_news as $recommend_new)
                            <div class="indi-trend-thumb si-flex-trend">
                                    <div class="indi-trend-thumb-fu">
                                        <div class="figure">
                                        <a href="{{route('detail.article', ['id'=>$recommend_new->id,'slug'=>$recommend_new->slug])}}">
                                            <img src="{{ $recommend_new->feature_image_path }}" alt="">
                                            <p class="figcaption"><span><i class="far fa-play-circle"></i></span></p>
                                        </a>
                                    </div>
                                    <div class="indi-video-thumb-caption">
                                        <h3 class="new-h"><a href="{{route('detail.article', ['id'=>$recommend_new->id,'slug'=>$recommend_new->slug])}}" class="new-h-a">{{ $recommend_new->title }}</a></h3>
                                        <p>{{ $feature_new->created_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                     
                        </div>
                    </div>
                    <div class="si-ad tab-item">
                        <figure>
                            <img src="{{asset('newsTemplate/assets/images/photo-1452933006409-19b87dc327b7.jpg')}}" alt="advertise">
                        </figure>
                    </div>
                    
                    <div class="si-ad tab-item">
                        <figure>
                            <img src="{{asset('newsTemplate/assets/images/seagramsgtbumain.jpg')}}" alt="advertise">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('news/index.js')}}"></script>
@endsection