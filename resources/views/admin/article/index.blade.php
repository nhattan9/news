@extends('admin.layouts.admin')

@section('title')
<title>Article - Admin</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('admins\article\index.css')}}">

@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Bài viết ', 'key' => 'Danh sách '])
<div class="row">

    @can('article-add')

    <div class="col-md-12">
            <a href="{{ route('admin.articles.create')}}" class="btn btn-primary float-end mb-2  ">Thêm </a>
    </div>
    @endcan
</div>

<section id="basic-vertical-layouts">
    <div class="col-md-7">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible show fade">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif
    </div>
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <section class="section">
                <div class="card ">

                    <div class="card-body">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns ">
                            <div class="dataTable-top">
                            <div class="dataTable-dropdown">
                                <label>Show : </label>
                                <select class="dataTable-selector form-select">
                                    <option value="5">5</option>
                                    <option value="10" selected="">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                        </div>
                        <div class="dataTable-search">
                        <form method="get" action="">
                             <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tìm kiếm" name="search" value="{{request()->search}}" >
                                <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                           </div>
                        </form>

                        </div></div>
                    <x-table.data-table :headers="$headers">
                        @foreach ($articles  as $article )
                            <tr>
                                <x-table.td>
                                    <div class="row">
                                        <div class="col-md-4"><img src="{{ $article->feature_image_path}}" title="aaaa" alt="" style="width:100%;height:80px; object-fit:cover;"></div>
                                        <div class="col-md-8">
                                            <div class="mb-1 fw-bold text-center"> {{ $article->title}}</div>
                                            @if ($article->breaking_news == 0)
                                               <span class="badge bg-danger text-center article_badge">Breaking</span>
                                            @endif

                                            @if ($article->feature_news == 0)
                                               <span class="badge bg-warning text-center article_badge">Feature</span>
                                            @endif

                                            @if ($article->recommended_news == 0)
                                            <span class="badge bg-info text-center article_badge">Recommended</span>
                                           @endif
                                       </div>
                                    </div>
                                </x-table.td>
                                <x-table.td>Article</x-table.td>
                                <x-table.td>
                                    <span class="badge" style=" background-color :{{$article->category->color}}">{{$article->category->name}}</span>
                                </x-table.td>
                                <x-table.td>{{ $article->views}}</x-table.td>
                                <x-table.td fw='fw-bold'>{{ $article->admin->name}}</x-table.td>
                                <x-table.td>{{ $article->review_person_id}}</x-table.td>
                                <x-table.td>{{ $article->review_time}}</x-table.td>
                                <x-table.td>{{ $article->editor_id}}</x-table.td>
                                <x-table.td>{{ $article->published_time}}</x-table.td>
                                <x-table.td>{{ $article->updated_at->diffForHumans()}}</x-table.td>
                                <x-table.td>{{ $article->created_at}}</x-table.td>
                                <x-table.td>
                                @can('article-preview')
                                    <a href="{{ route('admin.articles.preview', ['id'=>$article->id]) }}" class="btn btn-info btn-sm mb-1"><i class="bi bi-list-ul"></i></a>
                                @endcan
                                {{-- @can('article-edit') --}}
                                <a href="{{ route('admin.articles.edit', ['id'=>$article->id]) }}" class="btn btn-warning btn-sm mb-1"><i class="bi bi-pencil-square"></i></a>
                                {{-- @endcan --}}
                                @can('article-delete')
                                    <a data-url="{{ route('admin.articles.delete', ['id'=> $article->id]) }}" class="btn btn-danger btn-sm action_delete"><i class="bi bi-trash"></i></a>
                                 @endcan


                                </x-table.td>
                            </tr>
                        @endforeach
                    </x-table.data-table>
                    <div class="dataTable-bottom">
                        <ul class="pagination pagination-primary float-end dataTable-pagination pagination-sm mb-0">
                            {{ $articles->links() }}
                        </ul></div></div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admins/category/index.js')}}"></script>
@endsection

