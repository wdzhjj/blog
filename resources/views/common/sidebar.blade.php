<!-- 右侧栏 Sidebar of the page -->
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
    <!-- Widget of the page end -->
    <!--最近 最热最近 最热最近 最热最近 最热最近 最热最近 最热最近 最热最近 最热最近 最热最近 最热最近 最热
     Widget of the page -->
    <div class="widget widget_categories version-ii wow fadeInUp" data-wow-delay="0.4s">
        <header class="widget-head">
            <h3>类别 Category</h3>
        </header>
        <ul>
            <li class="cat-item cat-item-1"><span><a href="/movie">- 电影</a></span><span><a href="/php">- php</a></span></li>
            <li class="cat-item cat-item-1"><span><a href="/music">- 音乐</a></span><span><a href="/linux">- linux</a></span></li>
            <li class="cat-item cat-item-1"><span><a href="/think">- 感悟</a></span><span><a href="/database">- 数据库</a></span></li>
            <li class="cat-item cat-item-1"><span><a href="/images"> </a></span><span><a href="/video"></a></span></li>
        </ul>
    </div>
    <!-- Widget of the page -->
    <section class="widget profile-widget version-ii hidden-sm hidden-xs wow fadeInUp" data-wow-delay="0.4s">
        <div class="profile-pic">
            <a href="#">
                <img src="/blog/images/head.jpg" alt="卫道者">
            </a>
        </div>
        <h3><a href="#"><img src="/blog/images/wdz.jpg" alt="卫道者"></a></h3>
        <p style="font-weight: bold">phper | 168's Kyrie Irving | gamer | peace protector</p>
        <ul class="social-networks">
            {{--<li><a href="#"><span class="icon ico-facebook"></span></a></li>--}}
            {{--<li><a href="#"><span class="icon ico-twitter"></span></a></li>--}}
            {{--<li><a href="#"><span class="icon ico-google-plus"></span></a></li>--}}
            {{--<li><a href="#"><span class="icon ico-linkedin"></span></a></li>--}}
            {{--<li><a href="#"><span class="icon ico-pinterest"></span></a></li>--}}
        </ul>
        <h5>笑，人人陪笑；哭，独自垂泪</h5>
    </section>
    <!-- Widget of the page end -->
    <!-- Widget of the page -->
    {{--<div class="widget widget_search hidden-sm hidden-xs wow fadeInUp" data-wow-delay="0.4s">--}}
        {{--<form method="get" class="search-form" action="#">--}}
            {{--<fieldset>--}}
                {{--<input type="search" name="key" placeholder="Type to search here">--}}
                {{--<button type="button" class="ico-search"></button>--}}
            {{--</fieldset>--}}
        {{--</form>--}}
    {{--</div>--}}
    {{--<section class="widget recent-posts-widget version-ii wow fadeInUp" data-wow-delay="0.4s">--}}
        {{--<header class="tab-head">--}}
            {{--<h3><a class="active" href="#tab1">最新 Recent Posts</a></h3>--}}
            {{--<h3><a href="#tab2">最热 Popular Posts</a></h3>--}}
        {{--</header>--}}
        {{--<div class="tab-content">--}}
            {{--<div id="tab1">--}}
                {{--<ul>--}}
                    {{--@foreach($top as $tops)--}}
                        {{--<li>--}}
                            {{--<div class="alignleft">--}}
                                {{--<img src="{{ $tops->img }}" alt="">--}}
                            {{--</div>--}}
                            {{--<div class="descr">--}}
                                {{--<h4><a href="/article/id/{{ $tops->id }}">{{ $tops->title }}</a></h4>--}}
                                                        {{--<span class="blog-tag">--}}
                                                            {{--<time datetime="{{ $tops->created_at }}"><a>{{ $tops->created_at }}</a></time>--}}
                                                        {{--</span>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div id="tab2">--}}
                {{--<ul>--}}
                    {{--@foreach($top as $tops)--}}
                        {{--<li>--}}
                            {{--<div class="alignleft">--}}
                                {{--<img src="{{ $tops->img }}" alt="">--}}
                            {{--</div>--}}
                            {{--<div class="descr">--}}
                                {{--<h4><a href="/article/id/{{ $tops->id }}">{{ $tops->title }}</a></h4>--}}
                                                        {{--<span class="blog-tag">--}}
                                                            {{--<time datetime="{{ $tops->created_at }}"><a>{{ $tops->created_at }}</a></time>--}}
                                                        {{--</span>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- Widget of the page end -->
    <!-- Widget of the page -->
    {{-- 广告广告广告广告广告广告广告广告广告广告广告广告广告广告广告广告
    <div class="widget promo-widget wow fadeInUp" data-wow-delay="0.4s">--}}
    {{--<a href="#"><img src="/blog/images/ad-placeholder.jpg" alt="“Place your Advertisement here”"></a>--}}
    {{--</div>--}}
            <!-- Widget of the page end -->
    <!-- Widget of the page -->

    <!-- Widget of the page end -->
</aside>
<!-- 右侧栏结束 Sidebar of the page end -->
</div>
</div>