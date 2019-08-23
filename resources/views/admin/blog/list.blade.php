@extends("admin.layout.main")

@section("content")
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">文章列表</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="width:5%">#</th>
                                <th style="width:30%">文章标题</th>
                                <th style="width:20%">作者|类别</th>
                                <th style="width:45%">操作</th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}.</td>
                                <td>{{$post->title}}</td>
                                <td>{{ $post->user_id }} | {{ $post->tag }}</td>
                                <td>
                                    <button type="button" class="wdz_button" onclick='window.location.href="/admin/blog/add/id/{{ $post->id }}"'>编辑</button>
                                    @if($post['private'] == 0)
                                    <button type="button" class="wdz_button" onclick='window.location.href="/admin/blog/lock/id/{{ $post->id }}"' post-action-status="1" >锁定</button>
                                    @else
                                    <button type="button" class="wdz_button" onclick='window.location.href="/admin/blog/lock/id/{{ $post->id }}"' post-action-status="1" >解锁</button>
                                    @endif
                                    <button type="button" class="wdz_button" onclick='window.open("/detail/{{ $post->id }}")' >预览</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody></table>
                    </div>
                   {!! $posts->links() !!}
                </div>
            </div>
        </div>
        <style>
            .wdz_button{
                border-width: 0px; /* 边框宽度 */
                border-radius: 3px; /* 边框半径 */
                background: #1E90FF; /* 背景颜色 */
                cursor: pointer; /* 鼠标移入按钮范围时出现手势 */
                outline: none; /* 不显示轮廓线 */
                font-family: Microsoft YaHei; /* 设置字体 */
                color: white; /* 字体颜色 */
                font-size: 17px; /* 字体大小 */
            }
        </style>
    </section>
@endsection