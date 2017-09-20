<?php
/**
 * @param $status 表单传递的status  为on  或者不存在  配合数据表  on为开启状态1  Null为关闭状态2
 * @return int
 */
function convertStatus($status)
{
    return isset($status)?1:2;
}


function changeName($path){

}