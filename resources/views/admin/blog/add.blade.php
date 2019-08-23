@extends("admin.layout.main")
@section("content")
    <section class="content">
        <h4 style="text-align: center">编辑文章</h4>
        <p style="color:red;"></p>
        <form action="/admin/blog/add" id="form" method="post" enctype="multipart/form-data"/>
            标题：<input type="text" name="title" size="35" value="@if($edit){{ $edit['title'] }}@endif" placeholder="输入文章名" /><br/>
            描述：<input type="text" name="description" size="35" value="@if($edit){{ $edit['description'] }}@endif" placeholder="输入文章描述"/><br/>
            权重：<input type="text" name="quanzhong" value="@if($edit){{ $edit['quanzhong'] }}@endif" placeholder="文章权重"/><br/>
            标签：<input type="text" name="tag" value="@if($edit){{ $edit['tag'] }}@endif" placeholder="文章标签"/><br/>
            类别：<select name="typeid">
                @if($edit)
                    <option value="{{ $edit['tid'] }}">当前类别</option>
                    @endif
                <option value="13">电影</option>
                @foreach($parent_type as $val)
                    <option value="{{ $val['mid'] }}">{{ $val['type_name'] }}</option>
                @endforeach
            </select>
            <br/>
            置顶：<input type="checkbox" name="top" value="1" checked="@if($edit) checked @endif"/><br/>
            上传图片：<input type="file" name="img" id="img"/><br/>

            <div id="editor"><p>@if($edit) {!!  $edit['content'] !!} @endif</p></div>
            <input id="button" type="button" value="提交文章"/>
            {{ csrf_field() }}
            <input type="hidden" name="power" value="@if($edit) edit @else add @endif"/>
            <input type="hidden" name="userid" value="{{ session('admin_user') }}"/>
            <input type="hidden" name="blogid" value="@if($edit) {{ $edit['id'] }} @endif"/>
             <textarea name="content" id="text1" style="width:100%; height:200px;"></textarea>
        </form>
    </section>

    <script>
        var token =  "<?php echo csrf_token();?>";          //获得token值
        var E = window.wangEditor;
        var editor = new E('#editor');

        //图片保存方式 | 接口路径
        editor.customConfig.uploadImgShowBase64 = true
        //editor.customConfig.uploadImgServer = '/WangUploadImg';
        //debug
        editor.customConfig.debug = true;


        // 限制一次最多上传 5 张图片
        editor.customConfig.uploadImgMaxLength = 5;
        // 自定义参数
        editor.customConfig.uploadImgParams = {
            //     // 如果版本 <=v3.1.0 ，属性值会自动进行 encode ，此处无需 encode
            //     // 如果版本 >=v3.1.1 ，属性值不会自动 encode ，如有需要自己手动 encode
            token: token
        }

        //自定义 fileName
        // editor.customConfig.uploadFileName = 'yourFileName'

        editor.create();

        document.getElementById('button').addEventListener('click',function(){
            var html = editor.txt.html();
            var $text1 = $('#text1');
            $text1.val(html);
            $("#form").submit();
        },true);
    </script>
@endsection