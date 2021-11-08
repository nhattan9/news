<div class="top-nav-full">
    <div class="container">
        <div class="top-nav">
            <div class="top-nav-left top-nav-mt">
                {{-- <ul>
                    <li>
                        <span><i class="fas fa-moon"></i></span>22.8<sup>c</sup>
                    </li>
                    <li>Sylhet</li>
                    <li>Wednesday, August 7</li>
                </ul>
            </div>
            <div class="top-nav-middle top-nav-mt">
                <ul>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="forum.html">Forums</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul> --}}
            </div>
            <div class="top-nav-right top-nav-mt">
                <ul>
                    <li><a href="{{getConfigValueFromSettingTable('facebook')}}" title="facebook" target="_blank"><span><i class="fab fa-facebook-f"></i></span></a></li>
                    <li><a href="{{getConfigValueFromSettingTable('twitter')}}" title="twitter"><span><i class="fab fa-twitter"></i></span></a></li>
                    <li><a href="{{getConfigValueFromSettingTable('vimeo')}}" title="vimeo"><span><i class="fab fa-vimeo-v"></i></span></a></li>
                    <li><a href="{{getConfigValueFromSettingTable('youtube')}}" title="youtube"><span><i class="fab fa-youtube"></i></span></a></li>
                </ul>
            </div>
            <div class="top-nav-top-right top-nav-mt">
                <ul>
                    @if (Auth::guard('web')->check())
                    <li><a href="{{ route('user.info') }}">{{Auth::guard('web')->user()->name}}</a></li>
                    
                    <li>
                        <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()"> Đăng xuất </a>
                        <form action="{{route('user.logout')}}" method="post" id="logout-form">@csrf</form>
                    </li>
                    
                    @else
                    <li class="logautho"><a href="">Đăng Nhập </a></li>
                    <li class="regautho"><a href="">Đăng kí </a></li>

                    @endif
                    
                </ul>
            </div>
        </div>
    </div>
</div>