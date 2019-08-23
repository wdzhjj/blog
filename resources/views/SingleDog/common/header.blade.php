



<div>
    @if( Session::get('bbs_uid') )
        已经登录 uid为： {{ Session::get('bbs_uid') }}
    @else
        尚未登录
    @endif
</div>