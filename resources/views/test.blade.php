<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/images/favicon.ico" type="images/x-ico" />
    <script src="//unpkg.com/wangeditor/release/wangEditor.min.js" ></script>
    <title>卫道者的博客</title>
</head>
<body>
<div id="editor"></div>
<button id="btn1">提交内容</button>
<form action="/WangUploadImg" method="post" enctype="multipart/form-data">
<input type="file" name="img" id="img"/>
    {{ csrf_field() }}
    <input type="submit" value="上传"/>
</form>
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

    document.getElementById('btn1').addEventListener('click',function(){
        var html = editor.txt.html();
        alert(html)
    },false);
</script>

</body>
</html>