@extends('admin.layouts.admin')

@section('title')
<title>Add - Article - Admin</title>
@endsection

@section('css')
<link href="{{asset('adminTemplate/demo/assets/vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins\article\add.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.min.css')}}">

@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Bài viết ', 'key' => 'Preview'])
<section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h1 class="title-detail">{{$article->title}}</h1>
                            <small class="text-muted ">{{$article->created_at->format('D ,d/m/Y, H:i')}}</small>
                            <p class="card-text">
                              {!! $article->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span> Tags: 
                            @foreach ($article->tags as $tag)
                                <a href=""><span class="badge bg-primary">{{$tag->name}}</span></a>
                            @endforeach  
                        </span>
                      
                       <span class="fw-bold"> Tác giả :  {{ $article->admin->name}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" id="preview_image" src="{{$article->feature_image_path}}" alt="Card image cap" style="height: 15rem">
                        <span class="badge  card_post-category"  id="preview_category" style="background-color:{{$article->category->color}}">{{$article->category->name}}</span>
                        <div class="card-body">
                            <h4 class="card-title" id="preview_title" >  {!! $article->title !!}</h4>
                            <p class="card-text" id="preview_summary">
                                {!! $article->summary !!}
                            </p>
                        </div>
                           
                        <div class="card-footer">
                           Tác giả : <span class="fw-bold">{{ $article->admin->name}}</span>
                        </div>

                    </div>
                </div>
                <h5>{{$article->comments->count()}}<span> comments</span></h5>
                <div class="card">
                   
                    @foreach ($article->comments as $comment)
                    <div class="card-header border-1">
                        <div class="media d-flex align-items-center">
                            <div class="avatar me-3">
                                <img src="{{$comment->user->avatar}}" alt="" srcset="">
                                <span class="avatar-status bg-success"></span>
                            </div>
                            <div class="name flex-grow-1">
                                <h6 class="mb-0">{{$comment->user->name}}</h6>
                                <span class="text-xs">{{$comment->content}}</span>
                            </div>
                           
                             <a data-url="{{ route('admin.comment.delete', ['id'=> $comment->id]) }}" class="btn btn-danger btn-sm action_delete"><i class="bi bi-trash"></i></a>

                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
</section>

@endsection
@section('js')
    <script src="{{ asset('adminTemplate/demo/assets/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('adminTemplate/demo/assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admins/article/preview.js')}}"></script>

@endsection

