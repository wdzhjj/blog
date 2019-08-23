@include('common/header')
<!-- main container of all the page elements -->
<div id="wrapper">
    <!-- header of the page -->
    <header id="header" class="version-i">
        <div class="stick-holder">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3 col-sm-2">
                        <!-- logo of the page -->
                        <div class="logo"><a href="/"><img src="blog/images/wdz.jpg" alt="logo"></a></div>
                        <!-- logo of the page end -->
                    </div>
                    <div class="col-xs-9 col-sm-10 nav-holder">
                        <!-- Nav of the page -->
                        <nav id="nav" class="navbar navbar-default">
                            <!-- Navbar header of the page -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Navbar header of the page end -->
                            <!-- 导航栏 右 -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    @foreach($types as $val)
                                        <li><a href="{{ $val['url'] }}">{{ $val['type_name'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- 导航栏 右 end -->
                        </nav>
                        <!-- Nav of the page 导航栏 end -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header of the page end -->
    <!-- main of the page -->
    <main id="main" role="main">
        <!-- 滚动栏 -->
        <div class="home-box">
            <section class="slideshow">
                @foreach($top as $tops)
                    <div class="slide" style="background-image:
                    @if($tops->image)
                            url(/upload/{{ $tops->image }});
                    @else
                            url(/blog/images/ki.jpeg);
                    @endif
                            ">
                        <div class="align-holder">
                            <div class="align">
                                <div class="container">
                                    <div class="row">
                                        <header class="header col-xs-12 col-sm-8 col-sm-offset-2 text-center">
                                            <div class="title-box"><strong class="title">{{ $tops->type_name }}</strong></div>
                                            {{--<h1>Life is an adventure, <br>it’s not a package tour.</h1>--}}
                                            <h1>{{ $tops->title }}</h1>
                                            <a href="/detail/id/{{ $tops->id }}">阅读全文</a>
                                        </header>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- slide of the page end -->
            </section>
            <!-- switcher of the page -->
            <div class="switcher">
                <div class="center-block">
                    <!-- switcher mask of the page -->
                    <div class="switcher-mask">
                        @foreach($top as $tops)
                            <div class="slide">
                                <div class="switcher-slide">
                                    <div class="slide-holder">
                                        <div class="img-holder">
                                            <img src="@if($tops->image) /upload/{{ $tops->image }} @else /blog/images/ki.jpeg @endif">
                                        </div>
                                        <h2><a href="/detail/id/{{ $tops->id }}">{{ $tops->title }}</a></h2>
                                        <time datetime="{{ $tops->created_at }}"><a href="#">{{ $tops->created_at }}</a></time>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- switcher slide of the page end -->
                        <!-- switcher slide of the page end -->
                    </div>
                    <!-- switcher mask of the page end -->
                </div>
            </div>
            <!-- slide of the page end -->
        </div>
        <!-- 滚动栏结束 -->
        <!-- twocolumns of the page -->
        <div id="twocolumns">
            <div class="container">
                <div class="row">
                    <!-- 内容分页部分 Content of the page -->
                    <div id="content" class="col-xs-12 col-md-8">
                        <!-- 博客人物介绍窗口 widget of the page -->
                        <section class="widget profile-widget style1 hidden-md hidden-lg">
                            <div class="profile-pic">
                                <a href="#">
                                    <img src="blog/images/head.jpg" alt="卫道者">
                                </a>
                            </div>
                            <h3><a href="#">卫道者</a></h3>
                            <p>JOJO,我不做人了,我要成为秧歌star        --168's Kyrie Irving</p>
                            <!-- Social networks of the page -->
                            <ul class="social-networks justify">
                                <li><a href="#"><span class="icon ico-facebook"></span></a></li>
                                <li><a href="#"><span class="icon ico-twitter"></span></a></li>
                                <li><a href="#"><span class="icon ico-google-plus"></span></a></li>
                                <li><a href="#"><span class="icon ico-linkedin"></span></a></li>
                                <li><a href="#"><span class="icon ico-pinterest"></span></a></li>
                            </ul>
                            <!-- Social networks of the page end -->
                        </section>
                        <!-- widget of the page end -->
                        <!-- cols holder of the page -->
                        <section class="posts-blocks">

                            <!-- Post Block of the page -->
                            @foreach($lines as $val)
                                <article class="post-block wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="post-holder">
                                        <time datetime="{{ $val->created_at }}"><a>{{ $val->created_at }}</a></time>
                                        <div class="img-holder">
                                            <a href="/detail/{{ $val->id }}"><img src="/upload/{{ $val->image }}"></a>
                                        </div>
                                        <h2><a href="/detail/{{ $val->id }}">{{ $val->title }}</a></h2>
                                        <p>{{ $val->description }}</p>
                                        <a href="/detail/{{ $val->id }}" class="read-more">阅读全文</a>
                                        <footer>
                                            <strong class="text comment-count"><span class="icon ico-tag"></span><a href="#">{{ str_replace('*',' | ',$val->tag) }}</a></strong>
                                            <strong class="text share-count"><span class="icon ico-share"></span><a href="#">分享</a></strong>
                                        </footer>
                                    </div>
                                </article>
                        @endforeach
                        <!-- Post Block of the page end -->

                        </section>
                        <!-- cols holder of the page end -->
                        <!-- cols holder of the page -->
                        <div class="cols-holder">
                            <!-- 视频 blog of the page -->
                            {{--<article class="blog fluid text-center wow fadeInUp" data-wow-delay="0.6s">--}}
                                {{--<div class="video-holder">--}}
                                    {{--<a href="" class="ico-play lightbox fancybox.iframe"></a>--}}
                                    {{--<img src="blog/images/img72.jpg" alt="image description">--}}
                                {{--</div>--}}
                                {{--<div class="text-wrap text-center">--}}
                                    {{--<time datetime="2011-01-12">19th may - <a href="#">lifestyle</a></time>--}}
                                    {{--<h2><a href="single-blog.html">Exploring the unknown truth about myself</a></h2>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam nonummy nibh euismod tincidunt enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis...</p>--}}
                                    {{--<a href="single-blog.html" class="link-more">read more</a>--}}
                                {{--</div>--}}
                            {{--</article>--}}
                            <!-- 视频结束 blog of the page end -->
                        </div>
                        <!-- cols-holder of the page end -->
                        <div class="cols-holder">
                        </div>
                        <!-- cols holder of the page end -->
                        <!-- col holder of the page -->
                        <div class="cols-holder">
                            <!-- blog of the page -->
                            {{--<article class="blog fluid text-center wow fadeInUp" data-wow-delay="0.6s">--}}
                                {{--<ul class="list-unstyled carousel">--}}
                                    {{--<li>--}}
                                        {{--<div class="slide">--}}
                                            {{--<img src="blog/images/img10.jpg" alt="image description">--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="slide">--}}
                                            {{--<img src="blog/images/img72.jpg" alt="image description">--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                                {{--<div class="text-wrap text-center">--}}
                                    {{--<time datetime="2011-01-12">12th April - <a href="#">World</a></time>--}}
                                    {{--<h2><a href="single-blog.html">The unseen beauty of nature.</a></h2>--}}
                                    {{--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  elit, sed diam nonummy nibh euismod tincidunt enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis...</p>--}}
                                    {{--<a href="single-blog.html" class="link-more">read more</a>--}}
                                {{--</div>--}}
                            {{--</article>--}}
                            <!-- blog of the page end -->
                        </div>
                        <!-- cols holder of the page end -->
                        <!-- cols holder of the page -->

                        <!-- cols holder of the page end -->
                        <!-- Navigation of the page -->

                        <!-- Navigation of the page end -->
                    </div>
                    <!-- 内容分页部分结束 Content of the page end -->
                    <!-- 右侧的边栏 Sidebar of the page -->
                    <aside id="sidebar" class="col-xs-12 col-md-4">
                        <div class="widget widget_search hidden-sm hidden-xs wow fadeInUp" data-wow-delay="0.4s">
                            <form method="post" class="search-form" action="/search">
                                <fieldset>
                                    {{ csrf_field() }}
                                    <input type="search" name="key" placeholder="关键词搜索">
                                    <button onclick="this.form.submit()" type="button" class="ico-search"></button>
                                </fieldset>
                            </form>
                        </div>
                        <!-- Widget of the page -->
                        <section class="widget profile-widget style1 hidden-sm hidden-xs wow fadeInUp" data-wow-delay="0.6s">
                            <div class="profile-pic">
                                <a href="#">
                                    <img src="blog/images/head.jpg" alt="卫道者">
                                </a>
                            </div>
                            <h3><a href="#">卫道者</a></h3>
                            <p>phper | 165's Kyrie Irving | 孤独患者 | 秧歌star | peace protector</p>
                            <!-- Social network of the page -->
                            <ul class="social-networks justify">
                                {{--<li><a href="#"><span class="icon ico-facebook"></span></a></li>--}}
                                {{--<li><a href="#"><span class="icon ico-twitter"></span></a></li>--}}
                                {{--<li><a href="#"><span class="icon ico-google-plus"></span></a></li>--}}
                                {{--<li><a href="#"><span class="icon ico-linkedin"></span></a></li>--}}
                                {{--<li><a href="#"><span class="icon ico-pinterest"></span></a></li>--}}
                            </ul>
                            笑，人人陪笑；哭，独自垂泪
                            <!-- Social network of the page end -->
                        </section>
                        <!-- Widget of the page end -->
                        <!-- Widget of the page -->
                        <div class="widget widget_categories tabs wow fadeInUp" data-wow-delay="0.6s">
                            <header class="widget-head">
                                <h3>博客分类</h3>
                                <p>control my life</p>
                            </header>
                            <div class="lists-holder">
                                <ul>
                                    @foreach($types as $key=>$type)
                                        @if( ceil( count($types)/2 ) > $key)
                                            <li class="cat-item cat-item-1"><a href="{{ $type['url'] }}"> &nbsp&nbsp{{ $type['type_name'] }} </a> </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <ul>
                                    @foreach($types as $key=>$type)
                                        @if( ceil( count($types)/2 ) <= $key)
                                            <li class="cat-item cat-item-1"><a href="{{ $type['url'] }}"> {{ $type['type_name'] }} </a> </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Widget of the page end -->
                        <!-- Widget of the page -->
                        <section class="widget recent-posts-widget wow fadeInUp" data-wow-delay="0.6s">
                            <header class="widget-head">
                                <h3>Recent Posts</h3>
                                <p>最新的几条</p>
                            </header>
                            <ol>
                                @foreach($new as $val)
                                    <li>
                                        <h4><a href="/detail/id/{{$val->id}}">{{ $val->title }}</a></h4>
                                            <span class="post-tag">
                                                <time datetime="{{ $val->created_at }}"><a href="#">{{ $val->created_at }}</a></time>
                                                <strong class="tag hot">{{ $val->tag }}</strong>
                                            </span>
                                    </li>
                                @endforeach
                            </ol>
                        </section>
                        <!-- Widget of the page end -->


                        <!-- Widget of the page -->
                        {{--<div class="widget promo-widget wow fadeInUp" data-wow-delay="0.6s">--}}
                            {{--<a target="_blank" href="http://www.msgk.com"><img src="blog/images/ki.jpeg" alt="“网站浏览”"></a>--}}
                        {{--</div>--}}
                        <!-- Widget of the page end -->
                    </aside>
                    <!-- 右侧的边栏结束 Sidebar of the page end -->
                </div>
            </div>
        </div>
        <!-- twocolumns of the page end -->

<!-- include jQuery -->

@include('common/footer')