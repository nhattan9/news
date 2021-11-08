@extends('admin.layouts.admin')

@section('title')
<title>Permission - Admin</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Phân quyền ', 'key' => 'Danh sách '])
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#inlineForm">
            Thêm
        </button>
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white" id="myModalLabel33"> Thêm quyền </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{route('admin.permissions.store')}}" method="POST" id="form_addPermission">
                        @csrf
                        <div class="modal-body">
                            <label>Modul: </label>
                            <div class="form-group">
                                <input type="text"
                                       placeholder="Tên modul"
                                       name="display_name"
                                       class="form-control">
                                <div class="text-danger error-text display_name_error"></div>
                            </div>
                            <label>Key_code: </label>
                            <div class="form-group">
                                <input type="text"
                                        placeholder="Key_code"
                                        name="key_code"
                                        class="form-control">
                                <div class="text-danger error-text key_code_error"></div>
                            </div>
                            <label>Danh mục cha : </label>
                            <div class="form-group">
                                <select class="form-select" name="parent_id">
                                    <option value="0">Danh mục cha</option>
                                    {!!$htmlOption !!}
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary " id="addper">Thêm</button>
                            {{-- <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Thêm</span>
                            </button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                    <x-table.data-table :headers="$headers" >
                        @php
                        $index=1;
                        @endphp
                        @foreach ($pers as $per)
                            <tr>
                                <x-table.td>{{ $index++}}</x-table.td>
                                <x-table.td fw="fw-bold" align="left" >{{$per->name}}</x-table.td>
                                <x-table.td align="left">{{$per->key_code}}</x-table.td>
                                <x-table.td align="left">
                                    @if ($per->perChild != Null)
                                         <span class="badge bg-info">{{$per->perChild->name}}</span>
                                     @endif
                                </x-table.td>
                                <x-table.td>
                                    @can('per-delete')
                                    <a data-url="{{ route('admin.permissions.delete', ['id'=> $per->id]) }}" class="btn btn-danger btn-sm action_delete"><i class="bi bi-trash"></i></a>
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
    <script src="{{asset('admins/permission/index.js')}}"></script>
@endsection

