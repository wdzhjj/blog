<div id="wrapper">
    <!-- w1 of the page -->
    <div class="w1">
        <!-- 头部 header of the page -->
        <header id="header" class="version-ii">
            <div class="container">
                <div class="row top-bar">
                    <!-- Top Nav of the page -->
                    <nav class="col-xs-12 col-sm-6 policy-nav">
                        <ul>
                            <li><a target="_blank" href="https://github.com/wdzhjj">github</a></li>
                            <li><a target="_blank" href="https://weibo.com/u/5817237502">微博</a></li>
                            {{--<li><a href="#">支持</a></li>--}}
                        </ul>
                    </nav>
                    <!-- Top Nav of the page end -->
                    <div class="col-xs-12 col-sm-6 pull-right hidden-xs">
                        <!-- Social Network of the page -->
                        <ul class="social-networks">
                            {{--<li><a href="#"><span class="ico-facebook"></span></a></li>--}}
                            {{--<li><a href="#"><span class="ico-twitter"></span></a></li>--}}
                            {{--<li><a href="#"><span class="ico-google-plus"></span></a></li>--}}
                            {{--<li><a href="#"><span class="ico-linkedin"></span></a></li>--}}
                            {{--<li><a href="#"><span class="ico-pinterest"></span></a></li>--}}
                        </ul>
                        <!-- Social Network of the page end -->
                    </div>
                </div>
            </div>
            <div class="stick-holder">
                <div class="container">
                    <div class="row holder">
                        <div class="col-xs-3 col-sm-2">
                            <!-- Logo of the page -->
                            <div class="logo"><a href="/"><img src="/blog/images/wdz.jpg" alt="dot"></a></div>
                            <!-- Logo of the page end -->
                        </div>
                        <div class="col-xs-9 col-sm-10 nav-holder">
                            <!-- Nav of the page -->
                            <nav id="nav" class="navbar navbar-default">
                                <!-- Navbar Header of the page -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation123</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- Navbar Header of the page end -->
                                <a href="#" class="pull-right icon-menu"><span class="ico-menu"></span></a>
                                <!-- Collapse of the page -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        @foreach($types as $val)
                                            <li><a href="{{ $val['url'] }}">{{ $val['type_name'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Collapse of the page end -->
                            </nav>
                            <!-- Nav of the page -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- 点击弹出的右边栏  Side Nav of the page -->
            <nav class="side-nav">
                <a href="#" class="close"><i class="fa fa-times"></i></a>
                <!-- 右边栏人物介绍 Widget of the page -->
                <h2>打赏我吧</h2>
                <section class="widget profile-widget">
                    <div class="profile-pic">
                        <a href="#">
                            <img src="/blog/images/dashang.jpg" alt="WDZ">
                        </a>
                    </div>
                    <h3><a href="#">卫道者</a></h3>
                    <p>笑,人人陪笑;哭,独自垂泪。</p>
                    <!-- Social Network of the page -->
                    <ul class="social-networks">
                        {{--<li><a href="#"><span class="icon ico-facebook"></span></a></li>--}}
                        {{--<li><a href="#"><span class="icon ico-twitter"></span></a></li>--}}
                        {{--<li><a href="#"><span class="icon ico-google-plus"></span></a></li>--}}
                        {{--<li><a href="#"><span class="icon ico-linkedin"></span></a></li>--}}
                        {{--<li><a href="#"><span class="icon ico-pinterest"></span></a></li>--}}
                    </ul>
                    <!-- Social Network of the page end -->
                </section>
                <!-- Widget of the page end -->
            </nav>
            <!-- 弹出的右边栏 介绍 Side Nav of the page end -->
        </header>
        <!-- 头部结束 Header of the page end -->