




<form method="post" action="/SingleDog/login">

    <input type="text" name="uname" placeholder="输入用户名">

    <input type="password" name="pwd" placeholder="请输入密码"/>

    <input type="hidden" name="type" value="bbs"/>
    {{ csrf_field()  }}

    <BUTTON>登录</BUTTON>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:darkred">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
