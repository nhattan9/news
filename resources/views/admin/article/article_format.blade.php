@extends('admin.layouts.admin')

@section('title')
<title>Format - Article - Admin</title>
@endsection

@section('css')
<link href="{{asset('admins\article\format.css')}}" rel="stylesheet" />
@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Bài viết ', 'key' => 'Format '])
<section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-4 col-12">
                            <div class="card article_hover ">
                                <div class="card-content">
                                    <a href="{{ route('admin.articles.create') . '?type=article' }}">
                                    <div class="card-body text-center article_icon">
                                           <i class="bi bi-newspaper" style="font-size:50px"></i>
                                           <h4 class="card-title"> Ariticle</h4>
                                           <p class="card-text">Bài viết thường có thể thêm ảnh và video </p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4 col-12">
                            <div class="card article_hover ">
                                <div class="card-content">
                                    <a href="{{ route('admin.articles.create') . '?type=gallery' }}">
                                    <div class="card-body text-center article_icon">
                                           <i class="bi bi-images " style="font-size:50px"></i>
                                           <h4 class="card-title"> Gallery</h4>
                                           <p class="card-text">Bài viết thường có thể thêm ảnh và video </p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4 col-12">
                            <div class="card article_hover ">
                                <div class="card-content">
                                    <a href="{{ route('admin.articles.create') . '?type=video' }}">
                                    <div class="card-body text-center article_icon">
                                           <i class=" bi-play-circle" style="font-size:50px"></i>
                                           <h4 class="card-title"> Videos</h4>
                                           <p class="card-text">Bài viết thường có thể thêm ảnh và video </p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </section>



@endsection

@section('js')
   

@endsection

