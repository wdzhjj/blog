<!-- 评论部分 Comment of the page -->
<section class="section comments wow fadeInUp" data-wow-delay="0.4s">
    <header class="header">
        <h2>talk about it</h2>
        <p> {{ $comment_num }} 条</p>
    </header>
    <!-- Comment list of the page -->
    <div class="commentlist">
        <!-- Comment list item of the page -->
        @foreach($comments as $comment)
            <div class="commentlist-item">
                <div class="comment even thread-even depth-1" id="comment-1">
                    <div class="avatar-holder">
                        <img alt="image description" src="@if($comment['head']) {{$comment['head'] }} @else /blog/images/footer0{{ rand(2,9) }}.jpg @endif" class="avatar avatar-48 photo avatar-default">
                    </div>
                    <div class="commentlist-holder">
                        <p class="meta">
                            <strong class="name"><a>
                                    @if($comment['nickname'])
                                        {{ $comment['nickname'] }}
                                    @else
                                        匿名
                                    @endif
                                </a></strong>
                            <a><time datetime="">{{ $comment['date'] }}</time></a>
                        </p>
                        <p> {{ $comment['comment'] }} </p>
                        <p><a class="comment-reply-link" href="#" onclick='alert("{{ $comment['user_id'] }}")'>REPLY</a></p>
                    </div>
                </div>
                @if($comment['id'] == '')
                    <div class="commentlist-item">
                        <div class="comment even thread-even depth-2" id="comment-3">
                            <div class="avatar-holder">
                                <img alt="image description" src="/blog/images/img58.jpg" class="avatar avatar-48 photo avatar-default">
                            </div>
                            <div class="commentlist-holder">
                                <p class="meta">
                                    <strong class="name"><a href="#">wdz</a></strong>
                                    <a href="#"><time datetime="2011-01-12">2018/1/16 19：52</time></a>
                                </p>
                                <p>这个不好说</p>
                            </div>
                        </div>
                    </div>
                    @endif
            </div>
        @endforeach
        <!-- Comment list item of the page end -->
    </div>
    <!--  Comment list of the page end -->
</section>
<!-- 评论部分结束 Comment of the page end -->
<!-- Comment Respond of the page -->
<section class="comment-respond wow fadeInUp" data-wow-delay="0.4s">
    <header class="header">
        <h3 id="reply-title" class="comment-reply-title">留下你的看法</h3>
        <p>show what you think</p>
        <p id="errors" style="color:red;font-weight: bold">@foreach($errors->all() as $error)
                {{ $error }}
            @endforeach	</p>
    </header>
    <form action="/comment" method="post" id="commentform" class="comment-form">
        {{ csrf_field() }}
        <div class="comment-form-url hidden"><label for="url">Website</label> <input type="text" id="url" name="url" size="30"></div>
        <div class="comment-form-comment">
            {{--<label for="comment">Comment <span class="required">*</span></label>--}}
            <textarea id="comment" name="comment" rows="3" cols="72" aria-required="true" placeholder="写在这里"></textarea>
        </div>
        {{--<p class="form-allowed-tags hidden">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:  <code>&lt;a--}}
                {{--href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt;--}}
                {{--&lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del--}}
                {{--datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt;--}}
                {{--&lt;strong&gt; </code></p>--}}
        <div class="form-submit">
            <input type="button" onclick="ajax_comment();" name="" id="" value="交给我"/>
            <input type="hidden" name="comment_post_ID" value="{{ $data['id'] }}" id="comment_post_ID"/>
            <input type="hidden" name="comment_parent" id="comment_parent" value="0"/>
            <input type="hidden" name="userid" id="userid" value=" {{ Session::get('userid') }} "/>
        </div>
    </form>
</section>
<!-- Comment Respond of the page end -->

<script>
    function ajax_comment(){
        var comment = $("#comment").val();
        var comment_post_ID = $("#comment_post_ID").val();
        // var comment_parent = $("#comment_parent").val();
        // var userid = $("#userid").val();
        // var token = $("input[name='_token']").val();
        if(comment=='' || comment_post_ID==''){
            $("#errors").html('评论内容不能为空');
            return false;
        }
        $.ajax({
            type : "POST",
            url : "/comment",
            data : $("#commentform").serializeArray(),
            success : function(data){
                var dataObj=eval("("+data+")");//转换为json对象
                if(dataObj.error == 1){
                    $("#errors").html(dataObj.msg);
                }
                if(dataObj.error == 0){
                    $("#errors").html('回复成功');
                    $("#comment").val('');
                }
            }
        });
    }
</script>

