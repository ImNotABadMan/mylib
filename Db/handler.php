<?php
/**
 * @Author: anchen
 * @Date:   2018-04-13 14:09:51
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-04-13 18:12:25
 */

require '../Conf/config.php';
require '../Db/DB.class.php';

if( IS_AJAX ){
    $db = new DB();

    if( isset($_POST['search']) ){
        $search = $_POST['search'] ?: 0;

        $condition = [
            'tel' => ['like', "{$search}%"],
        ];

        $res = $db->table('gfz_user')->select($condition);

        if( !$res ){
            $data = ['code' => 1, 'msg' =>'没有数据'];
        }else{
            $data = ['code' => 0, 'msg' => $res];
        }

        echo json_encode($data);
    }

    if( isset($_POST['tel']) ){
        $tel = $_POST['tel'] ?: 0;
        $condition = [
            'tel' => $tel
        ];
        $data = ['status' => 1];
        $res = $db->table('gfz_user')->update($data, $condition);

        if( !$res ){
            $data = ['code' => 1, 'msg' =>'签到失败'];
        }else{
            $data = ['code' => 0, 'msg' => '签到成功'];
        }
        echo json_encode($data);

    }
}
