@extends('master_layout')
@section('title')
    <title>{{$article->title}}</title>
@endsection

@section('css')
    
@endsection

@section('content')
<div class="link-page-pagination">
    <div class="container">
        <ul>
            <li><span><i class="fas fa-home"></i></span><a href="{{ route('index') }}">Home</a></li>
            <li><span><i class="fas fa-chevron-right"></i></span></li>
            <li><a href="{{ route('category.article', ['slug'=>$article->category->slug,'id'=>$article->category->id]) }}">{{$article->category->name}}</a></li>
            <li><span><i class="fas fa-chevron-right"></i></span></li>
            <li class="active">{{$article->title}}</li>
        </ul>
    </div>
</div>

<section class="full-section">
    <div class="container">
        <div class="full-sec-inner">
            <div class="row">
                <div class="col-md-8 col-sm-12 mt-30">
                    <div class="link-page-inner">
                        <div class="link-page-heading">
                            <h1>{{$article->title}}</h1>
                            <div class="inner-caption-head">
                                <h4><a href="#">{{$article->admin->name}}</a></h4>
                                <div class="hifen">-</div>
                                <div class="min-ag">
                                    <p>{{$article->created_at->diffForHumans()}}</p>
                                </div>
                                <div class="hifen">-</div>
                                <ul class="caption-head-list">
                                    <li><span><i class="fas fa-comment"></i></span>{{$article->comments->count()}}</li>
                                    <li>{{$article->views}}<span> views</span></li>
                                    <li><span><i class="fab fa-pinterest-p"></i></span>50</li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="link-page-share">
                            <ul>
                                <li class="fb"><a href="#"><span><i class="fab fa-facebook-f"></i></span></a></li>
                                <li class="tw"><a href="#"><span><i class="fab fa-twitter"></i></span></a></li>
                                <li class="in"><a href="#"><span><i class="fab fa-instagram"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="link-page-para">
                            {!!  $article->content  !!}
                        </div>

                        <div class="link-page-tag">
                            <ul>
                                <li><span><i class="fas fa-tags"></i></span></li>
                                @foreach ($article->tags as $tag)
                                      <a href=""><li class="link-tag-btn">{{ $tag->name}}</li></a>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
{{-- Comments ******************************************************************************************--}}
                    <div class="comment-box">
                        <div class="comment-title">
                            <h3><span>{{$article->comments->count()}}</span>Comment</h3>
                        </div>
                        <div class="comment-inner-box">
                            <div class="comment-fig-box" id="commnent_result">
                                @foreach ($article->comments as $comment)
                                <div class="comment-fig-main" style="margin-top: 10px;">
                                    <figure>
                                        <img src="{{$comment->user->avatar}}" alt="">
                                    </figure>
                                    <div class="comment-fig-info">
                                        <h3 style="display: inline-block">{{$comment->user->name}}</h3>
                                        <span>{{$comment->content}}</span>
                                        <div class="comment-info-icon">
                                            <ul>
                                                <li><a href="#"><span><i class="fas fa-thumbs-up"></i></span>Like <span>(5)</span></a></li>
                                                <li class="reply-action"><a href="#"><span><i class="fas fa-comment-alt"></i></span>Reply</a></li>
                                                <li>  <span>{{$comment->created_at->diffForHumans()}}</span></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
{{-- Login to commnents ********************************************************************** --}}
                    @if (Auth::guard('web')->check())
                        <div class="leave-comment-box">
                            <div class="leave-comment-title">
                                <h3>Ý kiến của bạn </h3>
                            </div>
                            <div class="leave-comment-form">
                                <form action="{{ route('user.comment') }}" method="POST" id="form_comment">
                                    @csrf
                                    <div class="comment-fig-main">
                                        <figure>
                                            <img src="{{Auth::guard('web')->user()->avatar}}" alt="">
                                        </figure>
                                        <div class="comment-fig-info">
                                            <h3 class="info_name" style="margin-top: 20px;">{{Auth::guard('web')->user()->name}}</h3>
                                        </div>
                                    </div>
                                    <input type="text" name="article_id" id="" value="{{$article->id}}" style="display:none;">
                                    <div class="leave-comment-input " style="margin-top: 10px;">
                                        <label>Message</label>
                                        <textarea rows="5" name="message"></textarea>
                                    </div>
                                    <div class="leave-comment-button">
                                        <button type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                        <h4 style="color: red; margin-top:10px;">Đăng nhâp để bình luận </h4>
                        @endif
                  
                </div>
                <div class="col-md-4 col-sm-12 mt-30 tab-row">
                    <div class="si-ad tab-item">
                        <figure>
                            <img src="{{asset('newsTemplate/assets/images/ad.png')}}" alt="advertise">
                        </figure>
                    </div>
                    <div class="si-holiday-box tab-item no-bg">
                        <div class="item-list-header">
                            <div class="item-list-title">
                                <h3>Xem nhiều</h3>
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
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('js')
<script src="{{asset('news/comment.js')}}"></script>
@endsection
