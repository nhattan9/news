@extends('admin.layouts.admin')

@section('title')
<title>Roles - Admin</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Vai trò ', 'key' => 'Danh sách '])
<div class="row">
    @can('role-add')

    <div class="col-md-12">
        <a href="{{ route('admin.roles.create')}}" class="btn btn-primary float-end mb-2  ">Thêm </a>
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
    <section class="section">
        <div class="row" id="table-inverse">
            <div class="col-12">
                <div class="card">
                    <x-table.data-table :headers="$headers">
                        @php
                        $index=1;
                        @endphp
                        @foreach ($roles as $role)
                            <tr>
                                <x-table.td>{{ $index++}}</x-table.td>
                                <x-table.td fw="fw-bold">{{$role->name}}</x-table.td>
                                <x-table.td>{{$role->display_name}}</x-table.td>
                                <x-table.td>Vai trò</x-table.td>
                                <x-table.td>
                                    @can('role-edit')

                                    <a href="{{ route('admin.roles.edit', ['id'=> $role->id]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    @endcan
                                    @can('role-delete')
                                    <a data-url="{{ route('admin.roles.delete', ['id'=> $role->id]) }}" class="btn btn-danger btn-sm action_delete"><i class="bi bi-trash"></i></a>
                                    @endcan
                                </x-table.td>
                            </tr>
                        @endforeach
                    </x-table.data-table>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
@section('js')
    <script src="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admins/role/index.js')}}"></script>



@endsection

