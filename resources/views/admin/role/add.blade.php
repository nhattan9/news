
@extends('admin.layouts.admin')

@section('title')
 <title>Thêm Roles </title>
@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Roles', 'key' => 'Add'])
<br>


<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card bg-primary ">
                <div class="card-content">
                    <div class="card-body">
                        
                        <form class="form" action=" {{ route('admin.roles.store') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-7 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column" class="text-white">Tên vai trò :</label>
                                        <input type="text" 
                                               id="first-name-column" 
                                               class="form-control mt-2 @error('name') is-invalid @enderror" 
                                               name="name" 
                                               value="{{ old('name') }}"
                                               placeholder="Tên Vai Trò">

                                        @error('name')
                                               <div class="invalid-feedback">
                                                   <i class="bx bx-radio-circle"></i>
                                                   {{ $message }}
                                               </div>
                                         @enderror
                                       
                                    </div>
                                </div>

                                <div class="col-md-7 col-12">
                                    <div class="form-group">
                                        <label for="display-name-column" class="text-white">Mô tả vai trò :</label>
                                        <textarea  name="display_name" 
                                                   id="display-name-column" 
                                                   class="form-control   mt-2  @error('display_name') is-invalid @enderror"  
                                                   >{{ old('name')}}</textarea>
                                        @error('display_name')
                                               <div class="invalid-feedback">
                                                   <i class="bx bx-radio-circle"></i>
                                                   {{ $message }}
                                               </div>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkall" class="form-check-input form-check-warning checkall"  >
                                            <label for="checkall" class="text-white">Check ALL </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           

                            @foreach ($permissionParent as $permissionParentItem)

                            <div class="card border border-light">
                                <div class="card-header bg-primary ">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox1.{{$permissionParentItem->id}}" class="form-check-input form-check-warning checkbox_wrapper" value="{{$permissionParentItem->name}}">
                                            <label for="checkbox1.{{$permissionParentItem->id}}" class="text-white "> Modul {{$permissionParentItem->name}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    @foreach ($permissionParentItem->permissionChildren as  $permissionChildsItem)
                                    <div class="col-md-3 mt-3">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <input type="checkbox" 
                                                       class="form-check-input checkbox_children" 
                                                       name="permission_id[]"
                                                       value="{{$permissionChildsItem->id}}"
                                                       id="checkbox2.{{ $permissionChildsItem->name }}">
                                                <label for="checkbox2.{{ $permissionChildsItem->name}}">{{$permissionChildsItem->name}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                  </div>
                                </div>
                            </div>

                            @endforeach

                           

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-light-primary me-1 mb-1">Add</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
<script src="{{asset('admins/role/add.js')}}"></script>

@endsection