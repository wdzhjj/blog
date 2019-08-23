@include('common/header')
<!-- main container of all the page elements -->
@include('common/banner')
        <!-- Main of the page -->
        <main id="main" role="main">
            <!-- 标题 Page Head of the page -->
            <header class="page-head wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(/blog/images/banner0{{ rand(1,2) }}.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1>{{ $data['title'] }}</h1>
                            <ol class="breadcrumb">
                                <li><a href="/">主页</a></li>
                                <li class=""/><a href="{{ $type['url'] }}">{{ $type['type_name'] }}</a></li>
                                <li class=""><a>{{ $data['title'] }}</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header>
            <!-- 标题结束 Page Head of the page end -->
            <!-- Container of the page -->
            <div class="container">
                <div class="row">
                    <!-- 文章内容评论 Content of the page -->
                    <article id="content" class="col-xs-12 col-md-8">
                        <!-- Post Block of the page -->
                        <div class="post-block single-post wow fadeInUp" data-wow-delay="0.4s">
                            <div class="post-holder">
                                <time datetime="2011-01-12"><a href="#">{{ $data['created_at'] }} {{ $type->type_name }}</a></time>
                                <h2 style="text-align:center">{{ $data['title'] }}</h2>
                                <p style="">{!!  $data['content'] !!} </p>
                                <div class="img-holder">
                                    <img src="@if($data['image'])/upload/{{ $data['image'] }}@else/blog/images/ki.jpeg @endif" alt="">
                                </div>
                                <footer>
                                    <strong class="text"><span class="icon ico-user"></span><a>{{ $author }}</a></strong>
                                    <strong class="text comment-count"><span class="icon ico-comment"></span><a href="#reply-title"> 评论</a></strong>
                                    <strong class="text"><span class="icon ico-tag"></span> <a>{{ str_replace('*','    ',$data->tag) }}</a></strong>
                                    {{--<strong class="text share-count"><span class="icon ico-share"></span><a href="#">138 shares</a></strong>--}}
                                    <strong class="text share-count"></strong>
                                </footer>
                            </div>
                        </div>
                        <!-- Post Block of the page end -->
                        <!--  人物推荐 Widget of the page -->
                        {{--<div class="widget widget-block wow fadeInUp" data-wow-delay="0.4s">--}}
                            {{--<div class="alignleft">--}}
                                {{--<a href="#"><img src="/blog/images/img54.jpg" alt="David Ramon"></a>--}}
                            {{--</div>--}}
                            {{--<div class="text-holder">--}}
                                {{--<header>--}}
                                    {{--<h2><a href="#">David Ramon</a></h2>--}}
                                    {{--<span class="subtitle"><a href="#">www.davidramon.com</a></span>--}}
                                {{--</header>--}}
                                {{--<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.</p>--}}
                                {{--<!-- Social Network of the page -->--}}
                                {{--<ul class="social-networks">--}}
                                    {{--<li><a href="#"><span class="ico-facebook"></span></a></li>--}}
                                    {{--<li><a href="#"><span class="ico-twitter"></span></a></li>--}}
                                    {{--<li><a href="#"><span class="ico-google-plus"></span></a></li>--}}
                                    {{--<li><a href="#"><span class="ico-linkedin"></span></a></li>--}}
                                    {{--<li><a href="#"><span class="ico-pinterest"></span></a></li>--}}
                                {{--</ul>--}}
                                {{--<!-- Social Network of the page end -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <!-- Widget of the page end -->
                        <!-- Post Block of the page -->
                        @include('common/comment')
                        <section class="posts-blocks extra wow fadeInUp" data-wow-delay="0.4s">
                            <header class="header">
                                <h2>你可能喜欢</h2>
                                <p></p>
                            </header>
                            @foreach($top as $tops)
                                <div class="post-block single-post-block">
                                    <div class="post-holder">
                                        <div class="img-holder">
                                            <a href="/detail/{{ $tops->id }}"><img alt="" src="@if($tops->image)/upload/{{ $tops->image }}@else /blog/images/ki.jpeg @endif"></a>
                                        </div>
                                        <time datetime="{{ $tops->created_at }}"><a href="#">{{ $tops->created_at }}</a></time>
                                        <h2><a href="#">{{ $tops->title }}</a></h2>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                        <!-- Post Block of the page end -->
                    </article>

@include('common/sidebar')
@include('common/footer')
