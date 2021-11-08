<footer>
    <div class="container">
        <div class="row">
            <div class="footer-box">
                <div class="col-md-3 col-sm-12">
                    <div class="footer-content footer-abt">
                        <h3>{{ getConfigValueFromSettingTable('title') }}</h3>
                        <p> 
                            {{ getConfigValueFromSettingTable('intro') }}
                         </p>
                        <br>
                        <p>
                            {{ getConfigValueFromSettingTable('info') }}

                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-content footer-post">
                        <h3>Popular post</h3>
                        {{-- <div class="indi-review-thumb">
                            <div class="figure">
                                <img src="assets/images/owl.jpg" alt="">
                            </div>
                            <div class="indi-post-thumb-caption">
                                <h3 class="foo-h"><a href="#" class="foo-h-a">Animal Protection Groups Urge Massachusetts Legislators To Ban The Use of Wild Animals In Traveling Exhibits and Shows</a></h3>
                                <div class="item-schedule">
                                    <ul>
                                        <li>Aug 18, 2019</li>
                                        <li>-</li>
                                        <li><span><i class="fas fa-heart"></i></span>40</li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-content footer-post">
                        <h3>Editor photos</h3>
                        {{-- <div class="indi-review-thumb">
                            <div class="figure">
                                <img src="assets/images/nurse-2141808_960_720.jpg" alt="">
                            </div>
                            <div class="indi-post-thumb-caption">
                                <h3 class="foo-h"><a href="#" class="foo-h-a">Animal Protection Groups Urge Massachusetts Legislators To Ban The Use of Wild Animals In Traveling Exhibits and Shows
                                </a></h3>
                                <div class="item-schedule">
                                    <ul>
                                        <li>Aug 18, 2019</li>
                                        <li>-</li>
                                        <li><span><i class="fas fa-heart"></i></span>40</li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                   
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="footer-content footer-cat">
                        <h3>Categories</h3>
                        <ul>
                            @foreach ($categories as $cate)
                            <li>
                                <a href="video.html">
                                    <span class="foo-cat-nam">{{$cate->name}}</span>
                                    <span class="foo-cat-num">{{$cate->article->count()}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-left">
                <p>{!! getConfigValueFromSettingTable('footer') !!}</p>
            </div>
            <div class="footer-bottom-right">
                {{-- <ul>
                    <li><a href="#">Disclaimer</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms & Condition</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul> --}}
            </div>
        </div>
    </div>
</footer>