@extends('master_layout')
@section('title')
    <title>Home</title>
@endsection

@section('content')

@if (Auth::guard('web')->check())
<section class="full-section">
    <div class="container">
        <div class="full-sec-inner">
            <div class="row">
                <div class="col-md-3 col-sm-12 mt-30 tab-row">
                    <div class="si-review-full tab-item">
                        <div class="review-full-box">
                            <div class="review-full-inner">
                                <figure>
                                    <img src="{{Auth::guard('web')->user()->avatar}}" alt="" style=" border-radius: 50%">
                                </figure> 
                            </div>
                            <div class="contact-sec-bar">
                                <h3 class="text-center mt-10 ">{{Auth::guard('web')->user()->name}}</h3>
                                <div class="item-list-header">
                                </div>
                                <ul class="text-center"> 
                                    {{-- <li><span><i class="fas fa-birthday-cake"></i></span> {{Auth::guard('web')->user()->created_at}}</li> --}}
                                    <li><a href="{{ route('user.myAccount') }}"><span><i class="fas fa-user"></i></span> Tài khoản của tôi </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 mt-30">
                    <div class="contact-sec">
                        <div class="contact-sec-box">
                            <div class="leave-comment-box" id="leave-mes">
                                <div class="leave-comment-title">
                                    <h3>Thông tin cá nhân</h3>
                                </div>
                                <div class="leave-comment-form">
                                    <form action="{{ route('user.updateAccount') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="leave-comment-input">
                                            <label>Avatar </label>
                                            <input type="file" value="" name="avatar">
                                        </div>
                                        <div class="leave-comment-input">
                                            <label>Tên </label>
                                            <input type="text"  value="{{Auth::guard('web')->user()->name}}" name="username">
                                        </div>
                                        <div class="leave-comment-input">
                                            <label>Email</label>
                                            <input type="text"   value="{{Auth::guard('web')->user()->email}}" name="email">
                                        </div>

                                        <div class="leave-comment-button">
                                            <button type="submit">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="leave-comment-box" id="leave-mes">
                                <div class="leave-comment-title">
                                    <h3>Đổi mật khẩu</h3>
                                </div>
                                <div class="leave-comment-form">
                                    <form action="{{ route('user.changePassword') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="text-danger text-center">Đổi mật khẩu</h4>
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        <div class="leave-comment-input">
                                            <label>Mật khẩu hiện tại </label>
                                            <input type="password" placeholder="Nhập mật khẩu cũ" name="current_password">
                                            @error('current_password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @if (session('fail'))
                                                <div class="alert alert-danger">
                                                    {{ session('fail') }}
                                                </div>
                                           @endif
                                        </div>
                                        <div class="leave-comment-input">
                                            <label>Mật khẩu mới</label>
                                            <input type="password" placeholder="Nhập mật khẩu mới " name="new_password">
                                            @error('new_password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="leave-comment-input">
                                            <label>Xác nhận mật khẩu</label>
                                            <input type="password" placeholder="Nhập mật khẩu mới " name="cpassword">
                                            @error('cpassword')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="leave-comment-button">
                                            <button type="submit">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- extra -->
                </div>
                
            </div>
        </div>
    </div>
</section>

@else
    <h2 class="text-center" style="margin-top: 20px; font-weight:bold">Không có thông tin hiển thị</h2>
@endif

@endsection

@section('js')
@endsection