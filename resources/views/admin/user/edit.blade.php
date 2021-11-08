
@extends('admin.layouts.admin')

@section('title')
 <title>Sửa User </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('adminTemplate\demo\assets\vendors\choices.js\choices.min.css')}}" />
@endsection
@section('content')
@include('admin.partials.breadcum',['name' => 'Sửa User', 'key' => 'Add'])
<br>


<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        
                        <form class="form" action="{{ route('admin.users.update',[ 'id' => $admin->id ]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">First Name</label>
                                            <div class="position-relative">
                                                <input type="text" 
                                                       name="name"
                                                       class="form-control @error('name') is-invalid @enderror" 
                                                       placeholder="Nhập tên "
                                                       value="{{ $admin->name }}" 
                                                       id="first-name-icon">

                                                @error('name')
                                               <div class="invalid-feedback">
                                                   <i class="bx bx-radio-circle"></i>
                                                   {{ $message }}
                                               </div>
                                               @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Email</label>
                                            <div class="position-relative">
                                                <input type="text"
                                                       name="email" 
                                                       class="form-control @error('email') is-invalid @enderror" 
                                                       placeholder="Nhập Email" 
                                                       value="{{ $admin->email }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                               @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Password</label>
                                            <div class="position-relative">
                                                <input type="password" 
                                                       name="password"
                                                       class="form-control @error('password') is-invalid @enderror" 
                                                       placeholder="Nhập Password" 
                                                       value="">
                                                @error('password')
                                               <div class="invalid-feedback">
                                                   <i class="bx bx-radio-circle"></i>
                                                   {{ $message }}
                                               </div>
                                               @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Chọn vai trò</label>
                                            <div class="form-group">
                                                <select name="role_id[]"  class=" @error('role_id') is-invalid @enderror  choices form-select multiple-remove "
                                                    multiple  >
                                                    @foreach ($roles as $role)
                                                        <option 

                                                        {{$roleOfAdmin->contains('id',$role->id) ? 'selected' : ""}}

                                                        value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role_id')
                                                <div class="">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                               
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{asset('adminTemplate\demo\assets\vendors\choices.js\choices.min.js')}}"></script>
@endsection