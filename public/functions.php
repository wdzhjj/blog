<?php

//递归获取main_type主类型表里的所有数据
function get_main_type($data,$pid=0){
    $tree = '';
    foreach ($data as $k=>$v) {
        if($v['parent_id'] == $pid) {
            $v['son'] = get_main_type($data,$v['mid']);
            $tree[] = $v;
        }
    }
    return $tree;
}

