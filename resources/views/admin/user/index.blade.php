@extends("admin.layout.main")

@section("content")
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-6">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">用户列表</h3>
                    </div>
                    <a type="button" class="btn " href="/admin/users/create" >增加用户</a>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="width: 10px">#</th>
                                <th>用户名称</th>
                                <th>操作</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->uid}}.</td>
                                    <td>{{$user->nickname}}</td>
                                    <td>
                                        <a type="button" class="btn" href="/admin/users/{{$user->id}}/role" ></a>
                                        @if($user['lock'] == 0)
                                            <button type="button" class="wdz_button" onclick='window.location.href="/admin/users/lock/id/{{ $user->uid }}"' post-action-status="1" >锁定</button>
                                        @else
                                            <button type="button" class="wdz_button" onclick='window.location.href="/admin/users/lock/id/{{ $user->uid }}"' post-action-status="1" >解锁</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody></table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection