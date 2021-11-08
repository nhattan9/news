        <nav class="nav-full">
            <div class="container">
                <div class="nav-full-inner">
                    <div class="nav-list">
                        <ul>
                            @foreach ($categories as $cate)
                            <li class="click">
                                <a href="{{ route('category.article', ['slug'=>$cate->slug,'id'=>$cate->id]) }}">{{ $cate->name }}</a>
                                @if ($cate->categoryChildrent->count())
                                 <ul class="show_up">
                                    @foreach ($cate->categoryChildrent as $cateItem)
                                       <a class="show_up_child" href="{{ route('category.article', ['slug'=>$cateItem->slug,'id'=>$cateItem->id]) }}"> {{$cateItem->name}}</a>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach

{{--                             
                            
                            <li><a href="business.html">Business</a></li>
                            <li><a href="fasion.html">Fashion</a></li>
                            <li><a href="sports.html">Sports</a></li>
                            <li><a href="video.html">Video</a></li>
                            <li><a href="travel.html">Travel</a></li> --}}
                          
                         
                        </ul>
                    </div>
                    {{-- <div class="nav-more-btn">
                        <ul>
                            <li class="more-act"><a href="#" class="more-act-link">More <span><i class="fas fa-caret-down"></i></span></a>
                                <ul class="more-list"></ul>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="nav-search">
                        <form action="#">
                            <div class="nav-search-inner">
                                <input type="text" placeholder="Search">
                                <span><i class="fas fa-search" ></i></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>