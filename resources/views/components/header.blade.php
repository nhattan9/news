<header>
    <div class="container">
        <div class="header-brand">
            <div class="header-search">
                <!-- for mobile -->
            </div>
            <div class="brand-img">
                <a href="{{ route('index') }}"><img src={{asset('newsTemplate/assets/images/appifylab_logo.png')}} alt="brand_logo"></a>
            </div>
            <div class="news-adver">
                <figure>
                    <a href="#"><img src={{asset('newsTemplate/assets/images/quangcao2.jpg')}} alt="advertise"></a>
                </figure>
            </div>
            <div class="paper-advetise">
                <div class="subscribe-btn">
                    <a href="{{getConfigValueFromSettingTable('youtube')}}">Subscribe now</a>
                    <p><span>$3.33</span>per monthly</p>
                </div>
            </div>
            <div class="nav-collapse-btn">
                <span><i class="fas fa-bars"></i></span>
            </div>
        </div>
    </div>
</header>

<!-- for mobile device -->

<div class="mobile-screen">
    <div class="screen-close">
        <span><i class="fas fa-times"></i></span>
    </div>
    <div class="mobile-sub">

    </div>

    <div class="mobile-nav">
        <ul></ul>
    </div>
</div>