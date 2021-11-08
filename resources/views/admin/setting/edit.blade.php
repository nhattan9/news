
@extends('admin.layouts.admin')

@section('title')
 <title>Sửa Setting </title>
@endsection

@section('content')
@include('admin.partials.breadcum',['name' => 'Sửa Setting', 'key' => 'Edit'])
<br>


<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-6">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        
                        <form class="form" action=" {{ route('admin.settings.update', ['id'=>$setting->id]) }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Tên Slider :</label>
                                        <input type="text" 
                                               id="first-name-column" 
                                               class="form-control mt-2 @error('config_key') is-invalid @enderror" 
                                               name="config_key" 
                                               value="{{ $setting->config_key }}"
                                               placeholder="Nhập config_key">
                                         @error('config_key')
                                               <div class="invalid-feedback">
                                                   <i class="bx bx-radio-circle"></i>
                                                   {{ $message }}
                                               </div>
                                         @enderror
                                    </div>
                                </div>
                                @if ( request()->type == 'Text')
                                
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Mô tả slider :</label>
                                        <input  name="config_value" 
                                                class="form-control mt-2 @error('config_value') is-invalid @enderror" 
                                                value="{{ $setting->config_value }}"
                                                placeholder="Nhập cofig value"
                                        >
                                        @error('config_value')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                       
                                    </div>
                                </div>

                                @elseif(request()->type == 'Textarea')
                                
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Mô tả slider :</label>
                                        <textarea  name="config_value" 
                                                   rows="4"
                                                   class="form-control mt-2 @error('config_value') is-invalid @enderror"
                                                   >{{ $setting->config_value }}</textarea>
                                        @error('config_value')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                       @enderror
                                       
                                    </div>
                                </div>

                                @endif
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
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