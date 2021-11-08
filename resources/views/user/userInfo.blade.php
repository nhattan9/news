@extends('master_layout')
@section('title')
    <title>Home</title>
@endsection

@section('content')

@if (Auth::guard('web')->check())
<section class="full-section">
    <div class="container">
        <div class="full-sec-inner">
            <div class="row">
                <div class="col-md-3 col-sm-12 mt-30 tab-row">
                    <div class="si-review-full tab-item">
                        <div class="review-full-box">
                            <div class="review-full-inner">
                                <figure>
                                    <img src="{{Auth::guard('web')->user()->avatar}}" alt="" style=" border-radius: 50%">
                                </figure>
                            </div>
                                    <div class="contact-sec-bar">
                                        <h3 class="text-center mt-10 ">{{Auth::guard('web')->user()->name}}</h3>
                                        <div class="item-list-header">
                                        </div>
                                        <ul class="text-center">
                                            {{-- <li><span><i class="fas fa-birthday-cake"></i></span> {{Auth::guard('web')->user()->created_at}}</li> --}}
                                            <li><a href="{{ route('user.myAccount') }}"><span><i class="fas fa-user"></i></span> Tài khoản của tôi </a></li>
                                        </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 mt-30">
                    <div class="contact-sec">
                        <div class="contact-sec-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-sec-bar">
                                        <div class="item-list-header">
                                            <div class="item-list-title">
                                                <h3>Hoạt động gần đây </h3>
                                            </div>
                                        </div>
                                        @if (Auth::guard('web')->user()->comments->count())
                                        <div class="footer-content footer-post">
                                             @foreach ( Auth::guard('web')->user()->comments as $comment)
                                                <p> <span style="font-weight:bold; color: #4db2ec"> {{$comment->created_at->diffForHumans()}} - </span>Bạn đã bình luận : <span style="font-weight:bold; color: #4db2ec" >"{{ $comment->content}}"</span> vào bài viết : </p>
                                                <div class="indi-review-thumb " style="margin-bottom: 20px; border-bottom:1px solid black; padding-bottom: 10px;">
                                                    <div class="figure">
                                                        <img src="{{$comment->article->feature_image_path}}" alt="">
                                                    </div>
                                                    <div class="indi-post-thumb-caption">
                                                        <h3 class="foo-h"><a href="{{route('detail.article', ['id'=>$comment->article->id,'slug'=>$comment->article->slug])}}" class="foo-h-a" style="color: black">{{$comment->article->title}}</a></h3>
                                                        <div class="item-schedule">
                                                            <ul>
                                                                <li>{{$comment->article->created_at}}</li>
                                                                <li>-</li>
                                                                <li><span><i class="fas fa-comment"></i></span>{{$comment->article->views}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        @else
                                         <h3 class="text-center" style="margin-top: 20px">Chưa có hoạt động nào </h3>
                                        @endif
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- extra -->
                </div>
                
            </div>
        </div>
    </div>
</section>

@else
    <h2 class="text-center" style="margin-top: 20px; font-weight:bold">Không có thông tin hiển thị</h2>
@endif

@endsection

@section('js')
@endsection