@extends('master_layout')
@section('title')
    <title>{{$category->name}}</title>
@endsection

@section('css')
@endsection

@section('content')
{{-- BreadCUM --}}
<div class="link-page-pagination">
    <div class="container">
        <ul>
            <li><span><i class="fas fa-home"></i></span><a href="{{ route('index') }}">Home</a></li>
            <li><span><i class="fas fa-chevron-right"></i></span></li>
            <li class="active" style="color: {{$category->color}};">{{$category->name}}</li>
        </ul>
    </div>
</div>
{{-- MAIN_CONTENT --}}
<section class="full-section">
    <div class="container">
        <div class="full-sec-inner">
            <div class="row">
                <div class="col-md-8 col-sm-12 mt-30">
                    <div class="link-page-title">
                        <h2 style="color: {{$category->color}};font-size:30px;">{{$category->name}}</h2>
                    </div>

                @foreach ($articles as $article)
                @if ($loop->first)
                <div class="header-news-left header-news-effect mt-20">
                    <figure>
                        <a href="{{ route('detail.article', ['id'=>$article->id,'slug'=>$article->slug]) }}">
                        <img src="{{$article->feature_image_path}}" alt="grid">
                        </a>
                    </figure>
                    <div class="header-left-news-caption">
                        <p class="news-cat" style="background-color: {{$article->category->color}}">{{$article->category->name}}</p>
                        <div class="vertical-text">
                            <h3 class="vertical-text-inner"><a href="{{ route('detail.article', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{$article->title}}</a></h3>
                        </div>
                        <p class="news-name"><span>{{$article->admin->name}}</span> - {{$article->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <div class="item-blog-full full-row">
                @else
                <div class="item-blog-thumb item-new-blg">
                    <figure>
                        <a href="{{ route('detail.article', ['id'=>$article->id,'slug'=>$article->slug]) }}">
                        <img src="{{$article->feature_image_path}}" alt="">
                        <figcaption>
                            <p class="news-cat" style="background-color: {{$article->category->color}}">{{$article->category->name}}</p>
                        </figcaption>
                        </a>
                    </figure>
                    <div class="blog-thumb-caption">
                         <h3 class="blog-h"><a href="{{ route('detail.article', ['id'=>$article->id,'slug'=>$article->slug]) }}" class="blog-h-a">{{$article->title}}</a></h3>
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
                @endif
                @endforeach
               </div>


                    <div class="new-pagination-full">
                        <div class="pagination-page">
                            <p>Page<span class="page-cur-num">1</span>of<span class="page-all-num">10</span>pages</p>
                        </div>
                        <div class="item-latest-news-pagination">
                            <ul>
                                <li class="active disable"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">Next <span><i class="fas fa-chevron-right"></i></span></a></li>
                            </ul>
                        </div>
                    </div>



                    <!-- extra -->
                </div>
              <div class="col-md-4 col-sm-12 mt-30 tab-row">
                    <div class="si-holiday-box tab-item no-bg">
                        <div class="item-list-header">
                            <div class="item-list-title">
                                <h3>Tin hot trong ngày</h3>
                            </div>
                        </div>
                        @foreach ($breaking_news as $breaking_new)
                            @if ($loop->first)
                            <div class="individual-item-main">
                                <figure>
                                    <a href="{{ route('detail.article', ['id'=>$breaking_new->id,'slug'=>$breaking_new->slug]) }}" class="item-h-a">
                                    <img src="{{$breaking_new->feature_image_path}}" alt="">
                                    </a>
                                </figure>
                                <div class="item-inner-individual">
                                    <h3 class="item-inner-indi-h"><a href="{{ route('detail.article', ['id'=>$breaking_new->id,'slug'=>$breaking_new->slug]) }}" class="item-h-a">{{$breaking_new->title}}</a></h3>
                                    <ul>
                                        <li><a href="author.html">{{$breaking_new->admin->name}}</a></li>
                                        <li>-</li>
                                        <li>{{$breaking_new->created_at->diffForHumans()}}</li>
                                    </ul>
                                    <div class="item-inner-individual-para">
                                        <p>{{$breaking_new->summary}}</p>
                                    </div>
                                </div>
                            </div>
                         <div class="individual-item-small si-flex-row si-flex-small trend-full-box">
                            @else
                            <div class="indi-trend-thumb si-flex-trend">
                                <div class="indi-trend-thumb-fu">
                                    <div class="figure">
                                        <a href="{{ route('detail.article', ['id'=>$breaking_new->id,'slug'=>$breaking_new->slug]) }}" class="item-h-a">
                                        <img src="{{$breaking_new->feature_image_path}}" alt="">
                                        </a>
                                    </div>
                                    <div class="indi-video-thumb-caption">
                                        <h3 class="new-h"><a href="{{ route('detail.article', ['id'=>$breaking_new->id,'slug'=>$breaking_new->slug]) }}" class="new-h-a">{{$breaking_new->title}}</a></h3>
                                        <p>{{$breaking_new->created_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                            {{-- <div class="individual-btn">
                                <button>Load more <span><i class="fas fa-redo"></i></span></button>
                            </div>  --}}
                        </div>
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
@endsection
