
@extends('admin.layouts.admin')

@section('title')
 <title> User</title>
@endsection

@section('css')
 <link href="{{asset('admins\slider\index\index.css')}}" rel="stylesheet" />
 <link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
 <link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'User', 'key' => 'List'])
<div class="row">
    @can('user-add')
    <div class="col-md-12">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-end m-3  ">Thêm </a>
    </div>
    @endcan
</div>
<section class="section">
    <div class="card">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <x-table.data-table :headers="$headers">
                    @foreach ($admins as $admin)
                        <tr>
                            <x-table.td>{{ $index++}}</x-table.td>
                            <x-table.td fw="fw-bold">{{$admin->name}}</x-table.td>
                            <x-table.td>{{$admin->email}}</x-table.td>
                            <x-table.td>
                                @foreach ($admin->roles as $role)
                                <span class="badge rounded-pill bg-primary">{{$role->name}}</span>
                                @endforeach
                            </x-table.td>
                            <x-table.td>
                                @can('user-edit')
                                <a href="{{ route('admin.users.edit', ['id'=>$admin->id]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                @endcan
                                @can('user-delete')
                                    <a data-url = " {{ route('admin.users.delete', ['id'=>$admin->id]) }}"    class="btn btn-danger btn-sm action_delete"><i class="bi bi-trash"></i></a>
                                @endcan
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.data-table>
            <div class="dataTable-bottom">
            <ul class="pagination pagination-primary float-end dataTable-pagination pagination-sm mb-0">
                {{ $admins->links()}}
            </ul>
            </div>
    </div>
</section>

@endsection

@section('js')
    <script src="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admins/user/index.js')}}"></script>
@endsection
