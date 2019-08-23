@include('common/header')
        <!-- main container of all the page elements -->
@include('common/banner')
        <!-- Main of the page -->
<main id="main" role="main">
    <!-- Page head of the page -->
    <header class="page-head wow fadeInUp" data-wow-delay="0.6s" style="background-image: url(/blog/images/banner0{{ rand(1,2) }}.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>{{ $msg }}</h1>
                    <ol class="breadcrumb">
                        <li><a href="/">博客</a></li>
                        <li class="active">{{ $type }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <!-- Page head of the page end -->
    <div id="twocolumns" class="container">
        {{--<div class="row">--}}
            {{--<div class="col-xs-12">--}}
                {{--<div class="main-header">--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <!-- Content of the page -->
            <div id="content" class="col-xs-12 col-md-8">
                <!-- Widget of the page -->
                <div class="widget widget_search hidden-md hidden-lg">
                    <form method="get" class="search-form" action="#">
                        <fieldset>
                            <input type="search" name="s" placeholder="Type to search here">
                            <button type="button" class="ico-search"></button>
                        </fieldset>
                    </form>
                </div>
                <!-- Widget of the page end -->
                <!-- Widget of the page -->
                <section class="widget profile-widget version-ii hidden-lg hidden-md">
                    <div class="profile-pic">
                        <a href="#">
                            <img src="/blog/images/img11.jpg" alt="John Aston">
                        </a>
                    </div>
                    <h3><a href="#"><img src="/blog/images/text-jhon-aston.png" alt="jhon aston"></a></h3>
                    <p>Hi, I am John Aston. Duis autem vel eum dolor in hendrerit in vulputate velit esse mole consequat, vel illum dolore eu feugiat nulla lisis at vero eros et accumsan et iusto.</p>
                    <!-- Social Network of the page -->
                    <ul class="social-networks">
                        <li><a href="#"><span class="icon ico-facebook"></span></a></li>
                        <li><a href="#"><span class="icon ico-twitter"></span></a></li>
                        <li><a href="#"><span class="icon ico-google-plus"></span></a></li>
                        <li><a href="#"><span class="icon ico-linkedin"></span></a></li>
                        <li><a href="#"><span class="icon ico-pinterest"></span></a></li>
                    </ul>
                    <!-- SOcial Network of the page end -->
                </section>
                <!-- Widget of the page end -->
                <!-- Posts Blocks of the page -->
                <section class="posts-blocks">

                    <!-- Post Block of the page -->
                    @foreach($data as $val)
                        <article class="post-block wow fadeInUp" data-wow-delay="0.6s">
                            <div class="post-holder">
                                <time datetime="{{ $val->created_at }}"><a href="#">{{ $val->created_at }}"</a></time>
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
                <!-- Posts Blocks of the page end -->
                <!-- Navigation of the page -->
                <nav role="navigation" class="navigation pagination">
                    <div class="nav-links">
                        {{--{{ $data->links() }}--}}
                        {{--<a href="#" class="prev page-numbers">Prev blog.</a>--}}
                        {{--<a href="#" class="page-numbers">1</a>--}}
                        {{--<span class="page-numbers current">2</span>--}}
                        {{--<span class="page-numbers dots hidden">…</span>--}}
                        {{--<a href="#" class="page-numbers">3</a>--}}
                        {{--<a href="#" class="next page-numbers">NEXT blog.</a>--}}
                    </div>
                </nav>
                <!-- Navigation of the page end -->
            </div>
@include('common/sidebar')
@include('common/footer')