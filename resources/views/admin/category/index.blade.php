@extends('admin.layouts.admin')

@section('title')
<title>Category - Admin</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.min.css')}}">

@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Category', 'key' => 'List'])
<div class="row">
    @can('category-add')
    <div class="col-md-12">
            <a href="{{ route('admin.categories.create')}}" class="btn btn-primary float-end mb-2  ">Thêm </a>
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
                    <div class=" text-center ">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns ">
                            <div class="dataTable-top">
                            <div class="dataTable-dropdown">
                        </div>
                        <div class="dataTable-search">
                        <form method="get" action="">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tìm kiếm" name="search" value="{{request()->search}}" >
                                <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                           </div>
                        </form>

                        </div>
                    </div>
                    <x-table.data-table :headers="$headers">
                        @foreach ($categories as $cate)
                            <tr>
                                <x-table.td>{{$cate->id}}</x-table.td>
                                <x-table.td fw="fw-bold">{{$cate->name}}</x-table.td>
                                <x-table.td >
                                    <span class="badge bg-primary">{{$cate->menu_order}}</span>
                                </x-table.td>
                                <x-table.td >
                                    @if ($cate->parent_id == 0 )

                                    @else
                                        <span class="badge" style="background-color: {{$cate->categoryChild->color}}">{{$cate->categoryChild->name}}</span>
                                    @endif
                                </x-table.td>
                                <x-table.td >
                                    <i class="bi bi-circle-fill" style="font-size:20px; color:{{$cate->color}};"></i>
                                </x-table.td>
                                <x-table.td>
                                    @if ($cate->show_on_menu == 0)
                                        <span class="badge bg-success">Active</span>
                                        @elseif($cate->show_on_menu == 1)
                                        <span class="badge bg-danger">inactive</span>
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    @if ($cate->show_on_homepage == 0)
                                        <span class="badge bg-success">Active</span>
                                        @elseif($cate->show_on_homepage == 1)
                                        <span class="badge bg-danger">inactive</span>
                                    @endif
                                </x-table.td>
                                <x-table.td>
                                    {{$cate->created_at->diffForHumans()}}
                                </x-table.td>
                                <x-table.td>
                                    @can('category-edit')
                                    <a href="{{ route('admin.categories.edit', ['id'=> $cate->id]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endcan
                                    @can('category-delete')
                                    <a data-url="{{ route('admin.categories.delete', ['id'=> $cate->id]) }}" class="btn btn-danger btn-sm action_delete"><i class="bi bi-trash"></i></a>
                                    @endcan
                                </x-table.td>
                            </tr>
                        @endforeach
                    </x-table.data-table>
                    <div class="dataTable-bottom">
                        <ul class="pagination pagination-primary float-end dataTable-pagination pagination-sm mb-0">
                            {{ $categories->links() }}
                        </ul>
                    </div>
                </div>
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

