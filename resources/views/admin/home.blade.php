@extends('admin.layouts.admin')
@section('title')
     <title>Trang Chủ</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.min.css')}}">

@endsection
@section('content')
<div class="page-heading">

        <h3>Tổng quan </h3>
    {{-- <section class="section">
        <div class="card">
            <x-table.data-table :headers="['id','Name',['name'=>'email','align'=>'center','sort'=>'dataTable-sorter']]">
                <tr>

                   <x-table.td>aaaaa</x-table.td>
                   <x-table.td color="text-success">aaaaa</x-table.td>
                   <x-table.td align="center">aaaaa</x-table.td>
                </tr>

            </x-table.data-table>
        </div>
    </section> --}}
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Bình luận mới nhất</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Comment</th>
                                    <th>Bài viết </th>
                                    <th>Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cmts as $cmt)
                                <tr>
                                    <td class="col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{$cmt->user->avatar}}">
                                            </div>
                                            <p class="font-bold ms-3 mb-0">{{$cmt->user->name}}</p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">{{$cmt->content}}</p>
                                    </td>
                                    <td class="col-auto">
                                        <a href="{{ route('admin.articles.preview', ['id'=>$cmt->article->id]) }}" class=" mb-0">{{$cmt->article->title}}</a>
                                    </td>

                                    <td class="col-auto">
                                        <p class=" mb-0">{{$cmt->created_at->diffForHumans()}}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
