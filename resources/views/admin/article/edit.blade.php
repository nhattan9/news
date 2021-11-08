@extends('admin.layouts.admin')

@section('title')
<title>Edit - Article - Admin</title>
@endsection

@section('css')
<link href="{{asset('adminTemplate/demo/assets/vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins\article\add.css')}}" rel="stylesheet" />
@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Bài viết ', 'key' => 'Edit '])
<section id="basic-vertical-layouts">
    <form class="form form-vertical" method="post" action="{{ route('admin.articles.update',['id' => $article->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="row match-height">
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title"> Tên bài viết </label>
                                                <input type="text" 
                                                    id="title" 
                                                    class="form-control @error('title') is-invalid @enderror" 
                                                    name="title" 
                                                    value="{{$article->title}}">
                                                
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-slug-vertical"> Tên đường dẫn  </label>
                                                <input type="text" 
                                                    id="first-slug-vertical" 
                                                    class="form-control @error('slug') is-invalid @enderror" 
                                                    name="slug" 
                                                    value="{{ $article->slug }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="summary"> Tóm tắt bài viết  </label>
                                                <textarea type="text" 
                                                    id="summary" 
                                                    class="form-control @error('summary') is-invalid @enderror" 
                                                    name="summary" 
                                                    >{{ $article->summary }}"</textarea>
                                                
                                                @error('summary')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>
                                        </div>
                                    
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="image"> Ảnh đại diện </label>
                                                <input type="file" 
                                                    id="image" 
                                                    class="form-control @error('feature_image_path') is-invalid @enderror" 
                                                    name="feature_image_path" 
                                                    value="{{ $article->feature_image_name }}">
                                                
                                                @error('feature_image_path')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="category"> Danh mục </label>
                                                <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                                                    <option value="">Danh Mục bài viết </option>
                                                        {!! $htmlOptions  !!}
                                                        
                                                </select>
                                                @error('category_id')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                 @enderror
                                                
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-content-vertical"> Nội dung  </label>
                                                <textarea 
                                                         id="first-content-vertical"
                                                         name="content" 
                                                         style="margin-top: 10px; margin-bottom: 0px; height: 1000px;"
                                                         class="form-control my-editor @error('content') is-invalid @enderror">{!!$article->content !!}</textarea>

                                                         @error('content')
                                                         <div class="invalid-feedback">
                                                             <i class="bx bx-radio-circle"></i>
                                                             {{ $message }}
                                                         </div>
                                                         @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-tag-vertical">Tags </label>
                                                <select 
                                                    id="first-tag-vertical" 
                                                        class="form-select tags_select_choose @error('tag') is-invalid @enderror" 
                                                        multiple="multiple" 
                                                        name="tags[]">
                                                        @foreach ($tags as $tag)
                                                            <option value="{{$tag->name}}"
                                                                    {{$tagSelected->contains('id',$tag->id) ? 'selected' : "" }}>{{$tag->name}}</option>
                                                        @endforeach
                                                        
                                                        
                                                        </select>
                                                
                                                
                                                @error('tag')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>
                                        </div>

                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-keywords-vertical"> Keywords </label>
                                                <input type="text" 
                                                    id="first-keywords-vertical" 
                                                    class="form-control @error('keywords') is-invalid @enderror" 
                                                    name="keywords" 
                                                    value="{{ $article->keywords }}">
                                                
                                                @error('keywords')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" id="preview_image" src="{{$article->feature_image_path}}" alt="Card image cap" style="height: 15rem">
                        <span class="badge card_post-category"  id="preview_category" style="background-color:{{$article->category->color}}">{{$article->category->name}}</span>
                        <div class="card-body">
                            <h4 class="card-title" id="preview_title" >{{$article->title}}</h4>
                            <p class="card-text" id="preview_summary">
                               {{$article->summary}}
                            </p>
                        </div>
                           
                        <div class="card-footer">
                           Tác giả : <span class="fw-bold">{{auth()->user()->name}}</span>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="checkbox" 
                                                id="checkbox1" 
                                                name="active"
                                                {{($article->active == 0) ? 'checked' : ""}}
                                                class="form-check-input" >
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <label for="checkbox1">Active</label>
                                        </div>

                                        <div class="col-md-2">
                                            <input type="checkbox" 
                                                id="checkbox2" 
                                                name="feature"
                                                {{($article->feature_news == 0) ? 'checked' : ""}}
                                                class="form-check-input" >
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <label for="checkbox2">Feature</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="checkbox" 
                                                id="checkbox3" 
                                                name="breaking"
                                                {{($article->breaking_news == 0) ? 'checked' : ""}}
                                                class="form-check-input" >
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <label for="checkbox3">Breaking</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="checkbox" 
                                                id="checkbox4" 
                                                name="recommended"
                                                {{($article->recommended_news == 0) ? 'checked' : ""}}
                                                class="form-check-input" >
                                        </div>
                                        <div class="col-md-10 form-group">
                                            <label for="checkbox4">Remember Me</label>
                                        </div>
                                    
                                    
                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="submit" name="draft" class="btn btn-warning me-1 mb-1">Save as Draft</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
</section>

@endsection
@section('js')
    <script src="{{ asset('adminTemplate/demo/assets/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('adminTemplate/demo/assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/article/add.js')}}"></script>

@endsection

