
@extends('admin.layouts.admin')


@section('title')
 <title>Setting</title>
@endsection

@section('css')
 <link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Setting', 'key' => 'List'])
<div class="row">
    @can('setting-add')

    <div class="col-md-12">
        <div class="btn-group mb-3 float-end">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin: 0px;">
                    <a class="dropdown-item" href="{{ route('admin.settings.create') . '?type=Text' }}"> Text </a>
                    <a class="dropdown-item" href="{{ route('admin.settings.create') . '?type=Textarea' }}"> Textarea </a>
                </div>
            </div>
        </div>
    </div>
    @endcan
</div>

<section class="section">
    <div class="card">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                @php
                $index = 1;
                @endphp
                <x-table.data-table :headers="$headers">
                    @foreach ($settings as $set)
                        <tr>
                            <x-table.td>{{ $index++}}</x-table.td>
                            <x-table.td fw="fw-bold">{{ $set->config_key}}</x-table.td>
                            <x-table.td>{{ $set->config_value}}</x-table.td>
                            <x-table.td>
                                @can('setting-edit')
                                <a href="{{ route('admin.settings.edit', ['id'=>$set->id]) . '?type=' . $set->type }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                @endcan
                                @can('setting-delete')
                                    <a data-url = " {{ route('admin.settings.delete', ['id'=> $set->id ]) }}" class="btn btn-danger btn-sm action_delete"><i class="bi bi-trash"></i></a>
                                @endcan
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.data-table>
            </div>
    </div>

</section>
@endsection
@section('js')
   <script src="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
   <script src="{{ asset('admins\setting\index.js')}}"></script>
@endsection
