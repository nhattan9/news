@extends('admin.layouts.admin')

@section('title')
<title>Edit-Category </title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('adminTemplate/demo/assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Category', 'key' => 'Edit'])

<section id="basic-vertical-layouts">
  

    <div class="row match-height">
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form  action="{{ route('admin.categories.update',['id'=>$category->id]) }}"  class="form form-vertical" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical"> Name</label>
                                            <input type="text" 
                                                   id="first-name-vertical" 
                                                   class="form-control @error('name') is-invalid @enderror" 
                                                   name="name" 
                                                   value="{{ $category->name }}"
                                                   placeholder="Tên danh mục">
                                            
                                            @error('name')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Slug <small> ( If you leave it blank, it will be generated automatically. )</small></label>
                                            <input type="text" 
                                                   id="email-id-vertical" 
                                                   class="form-control" 
                                                   name="slug" 
                                                   value="{{ $category->slug }}"
                                                   placeholder="Nhập đường dẫn">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Description (Meta Tag)</label>
                                            <input type="text" 
                                                   id="contact-info-vertical" 
                                                   class="form-control" 
                                                   name="description" 
                                                   value="{{ $category->descriptions }}"
                                                   placeholder="Mô tả">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-vertical">Keywords (Meta Tag)</label>
                                            <input type="text" 
                                                   id="password-vertical" 
                                                   class="form-control" 
                                                   name="keywords" 
                                                   value="{{ $category->keywords }}"
                                                   placeholder="Từ khóa SEO">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="parent_id-vertical">Danh mục cha</label>
                                            <select class="form-select" id="parent_id-vertical" name="parent_id">
                                                <option value="0">Không</option>
                                                {!! $htmlOption !!}
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="color-vertical">Color</label>
                                            <input type="color" 
                                                    id="color-vertical" 
                                                    class="form-control"  
                                                    name="color" 
                                                    value="{{  $category->color }}"
                                                    placeholder="Color">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="Menu-vertical">Menu order </label>
                                            <input type="number" 
                                                   id="Menu-vertical" 
                                                   class="form-control" 
                                                   name="menu_order" 
                                                   value="{{  $category->menu_order }}"
                                                   min="1" value="1">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <label for="checkbox3">Show on Menu</label>
                                                <input type="checkbox" 
                                                       id="checkbox3" 
                                                       class="form-check-input" 
                                                       {{ ($category->show_on_menu == 0 ) ? 'checked' : '' }} 
                                                       name="show_on_menu">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 mb-2">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <label for="checkbox4">Show on Hompage</label>
                                                <input type="checkbox" 
                                                       id="checkbox4" 
                                                       class="form-check-input" 
                                                       {{ ($category->show_on_homepage == 0 ) ? 'checked' : '' }} 
                                                       name="show_on_homepage">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
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

