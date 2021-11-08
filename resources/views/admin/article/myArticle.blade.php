@extends('admin.layouts.admin')

@section('title')
 <title>My Articles </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('admins\article\index.css')}}">

@endsection
@section('content')
@include('admin.partials.breadcum',['name' => ' article', 'key' => 'My article'])
<br>

<section class="section">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link  active" id="article-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Bài viết</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="drawf-tab" data-bs-toggle="tab" href="#drawf" role="tab" aria-controls="drawf" aria-selected="true">Nháp</a>
                </li>
                
            </ul>
            <div class="tab-content " id="myTabContent">
                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="article-tab">
                    @include('admin.article.components.dataArticle',['articles' => $articles])
                </div>
                <div class="tab-pane fade " id="drawf" role="tabpanel" aria-labelledby="drawf-tab">
                    @include('admin.article.components.dataArticle',['articles' => $draffs])

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
    <script src="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admins/category/index.js')}}"></script>
@endsection