@include('common/header')
        <!-- main container of all the page elements -->
@include('common/banner')
        <!-- Main of the page -->
<main id="main" role="main">
    <!-- 标题 Page Head of the page -->
    <header class="page-head wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(/blog/images/img52.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>{{ $data['title'] }}</h1>
                    <ol class="breadcrumb">
                        <li><a href="/">首页</a></li>
                        <li class="/message">留言</li>
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
                <!-- 评论部分 Comment of the page -->
                <section class="section comments wow fadeInUp" data-wow-delay="0.4s">
                    <header class="header">
                        <h2>讨论&评论</h2>
                        <p> {{ count($res) }} 条</p>
                    </header>
                    <!-- Comment list of the page -->
                        <div class="commentlist">
                            @foreach($res as $mes)
                            <!-- Comment list item of the page -->
                            <div class="commentlist-item">
                                <div class="comment even thread-even depth-1" id="comment-1">
                                    <div class="avatar-holder">
                                        <img alt="image description" src="/blog/images/img56.jpg" class="avatar avatar-48 photo avatar-default">
                                    </div>
                                    <div class="commentlist-holder">
                                        <p class="meta">
                                            <strong class="name"><a href="#">
                                                    @if($mes->user_id)
                                                        {{ $mes->nick }}
                                                        @else
                                                        匿名
                                                        @endif
                                                </a></strong>
                                            <a href="#"><time datetime="{{ $mes->created_at }}"></time></a>
                                        </p>
                                        <p> {{ $mes->message }} </p>
                                        <p><a class="comment-reply-link" href="#" onclick="return addComment.moveForm(&quot;comment-1&quot;, &quot;1&quot;, &quot;respond&quot;, &quot;1&quot;)">REPLY</a></p>
                                    </div>
                                </div>
                                @foreach($reply as $replys)
                                    @if($mes->uid == $replys->message_id)
                                    <div class="commentlist-item">
                                        <div class="comment even thread-even depth-1" id="comment-3">
                                            <div class="avatar-holder">
                                                <img alt="image description" src="/blog/images/img58.jpg" class="avatar avatar-48 photo avatar-default">
                                            </div>
                                            <div class="commentlist-holder">
                                                <p class="meta">
                                                    <strong class="name"><a href="#">
                                                            @if($replys->user_id)
                                                                {{ $replys->nick }}
                                                            @else
                                                                匿名
                                                            @endif
                                                        </a></strong>
                                                    <a href="#"><time datetime="{{ $mes->created_at }}"></time></a>
                                                </p>
                                                <p style="font-size:20px;color:black">{{ $replys->reply }}</p>
                                                <p><a class="comment-reply-link" href="#" onclick="return addComment.moveForm(&quot;comment-3&quot;, &quot;1&quot;, &quot;respond&quot;, &quot;1&quot;)">REPLY</a></p>
                                            </div>
                                        </div>
                                    </div>
                                     @endif
                                             <!--            <form action="/reply" method="blog" id="commentform" class="comment-form">
                <div class="comment-form-url hidden"><label for="url">Website</label> <input type="text" id="url" name="url" size="30"></div>
                <div class="comment-form-comment">
                    <textarea id="reply" name="reply" rows="3" cols="72" aria-required="true" placeholder="写在这里"></textarea>
                </div>
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" value="提交回复">
                    <input type="hidden" name="message_id" id="message_id" value="">
                    <input type="hidden" name="user_id" value="<?php echo session('login_userid');?>">
                    {{ csrf_field() }}
                                             </div>
                                         </form>

                                        -->
                                @endforeach
                            </div>
                             @endforeach
                        <!-- Comment list item of the page end -->
                    </div>
                    <!--  Comment list of the page end -->
                </section>
                {{ $res->links() }}
                <style>
                    li{display:inline;margin:20px}
                </style>
                <!-- 评论部分结束 Comment of the page end -->
                <!-- Comment Respond of the page -->
                <section class="comment-respond wow fadeInUp" data-wow-delay="0.4s">
                    <header class="header">
                        <h3 id="reply-title" class="comment-reply-title">留下你的看法</h3>
                        <p>想来就来，想走就走？</p>
                    </header>
                    <form action="/message" method="post" id="commentform" class="comment-form">
                        <div class="comment-form-url hidden"><label for="url">Website</label> <input type="text" id="url" name="url" size="30"></div>
                        <div class="comment-form-comment">
                            {{--<label for="comment">Comment <span class="required">*</span></label>--}}
                            <textarea id="comment" name="comment" rows="3" cols="72" aria-required="true" placeholder="写在这里"></textarea>
                        </div>
                        <p class="form-allowed-tags hidden">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a
                                href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt;
                                &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del
                                datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt;
                                &lt;strong&gt; </code></p>
                        <div class="form-submit">
                            <input type="submit" name="submit" id="submit" value="交给我">
                            <input type="hidden" name="comment_post_id" value="" id="comment_post_ID">
                            <input type="text" name="reply" id="reply" value="">
                            <input type="hidden" name="comment_from" value="<?php echo session('login_userid');?>">
                            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                            {{ csrf_field() }}
                        </div>
                    </form>
                </section>
                <!-- Comment Respond of the page end -->
            </article>
            <!-- 文章内容评论结束 Content of the page end -->
@include('common/sidebar')
@include('common/footer')
