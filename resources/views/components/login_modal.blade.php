
        <div class="autorized-container">
            <div class="authorized-full">
                <div class="authorization-box">
                    <div class="authorized-close">
                        <span><i class="fas fa-times"></i></span>
                    </div>
                    <div class="authorized-login autho-1">
                        <div class="authorized-title">
                            <h2>Đăng nhập </h2>
                            <p id="msg" style="color: red"> </p>
                        </div>
                        <form action=" {{ route('user.check') }}" method="POST" id="main_form">
                            @csrf
                            <div class="authorized-input">
                                <label>Email</label>
                                <input type="text" placeholder="username" name="email" value="{{ old('email')}}">
                                <div class="text-danger error-text email_error"></div>
                            </div>
                            <div class="authorized-input">
                                <label>Mật khẩu </label>
                                <input type="password" placeholder="*****" name="password">
                                <span class="show-pass">Hiện</span>
                                <span class="hide-pass">Ẩn</span>
                                <div class="text-danger error-text password_error"></div>
                            </div>
                            <div class="authorized-btn">
                                <button type="submit">Đăng nhập  <span><i class="fas fa-long-arrow-alt-right"></i></span></button>
                            </div>
                        </form>
                        <div class="authorized-para autho-para-1">
                            <p><a href="#">Bạn quên mật khẩu ? Get help</a></p>
                        </div>
                        <div class="authorized-social">
                            <p>Đăng nhập với tài khoản khác </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="authorized-login autho-2">
                        <div class="authorized-title">
                            <h2>Password recovery</h2>
                            <p>Recover your password</p>
                        </div>
                        <form action="#">
                            <div class="authorized-input">
                                <label>Your email</label>
                                <input type="text" placeholder="email">
                            </div>
                            <div class="authorized-btn">
                                <button type="submit">Send my password <span><i class="fas fa-long-arrow-alt-right"></i></span></button>
                                <p>A password will be emailed to you.</p>
                            </div>
                        </form>
                        <div class="authorized-para autho-para-2">
                            <p><a href="#">Back to login</a></p>
                        </div>
                    </div>
                    <div class="authorized-login autho-3">

                        <div class="authorized-title">
                            <h2>Tạo tài khoản</h2>
                            <p id="msg_register" style="color: red"> </p>
                        </div>
                        <form action="{{ route('user.create') }}" method="POST" id="form_register">
                            @csrf

                            <div class="authorized-input">
                                <label>Họ tên </label>
                                <input type="text" name="fname" placeholder="full name">
                                <div class="text-danger error-register-text fname_error"></div>

                            </div>
                            <div class="authorized-input">
                                <label>Email </label>
                                <input type="text" name="email" placeholder="email">
                                <div class="text-danger error-register-text email_error"></div>

                            </div>
                            <div class="authorized-input reg-show">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" placeholder="*****">
                                <span class="show-pass">Hiện</span>
                                <span class="hide-pass">Ẩn</span>
                                {{-- <p>* Use minimum six characters and use atleast any of these ! @ # $ % & * special char, one Capital and one number</p> --}}
                                <div class="text-danger error-register-text password_error"></div>
                          
                            </div>
                            <div class="authorized-input reg-con">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" name="cpassword" placeholder="*****">
                                <p>Password not matched</p>
                                <span class="show-pass">Hiện </span>
                                <span class="hide-pass">Ẩn</span>
                                <div class="text-danger error-register-text cpassword_error"></div>

                            </div>
                            <div class="authorized-btn">
                                <button type="submit">Tạo tài khoản <span><i class="fas fa-long-arrow-alt-right"></i></span></button>
                                <!-- <p>A password will be emailed to you.</p> -->
                            </div>
                        </form>
                        <div class="authorized-para autho-para-3">
                            <p>Bạn đã có tài khoản ? <a href="">Đăng nhập  </a>tại đây</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
