<?php
namespace app\admin\model;

use think\Model;
use think\DB;
class Index extends Common
{
    /*获取该管理员所有版块*/
    public function ban(){
        $role_id = $_SESSION['role_id'];  /*获取管理员所在的角色*/
        if($role_id == 0){
            /*超级管理员  展示所有显示的版块*/
            $where['auth_pid'] = 0;
            $where['is_show'] = 1;
            $ban = db("auth")->where($where)->field("id,auth_name,auth_c,auth_a")->select();
            foreach ($ban as $k => $v) {
                $while['auth_pid'] = $ban[$k]['id'];
                $while['is_show'] = 1;
                $son = db("auth")->where($while)->field("id,auth_name,auth_c,auth_a")->select();
                $ban[$k]['son'] = $son;
            }
            return $ban;
        }else{
            $where['role_id'] = $role_id;
            $role = db("role_value")->where($where)->field("auth_a,auth_c")->select();
            $len = count($role);
            //var_dump($role);
            $row = $role;
            /*循环  何必相同父级的数组*/
            for($i=0;$i<$len;$i++){
                $h = $i+1;
                for($j=$h;$j<$len;$j++){
                    if($role[$i]['auth_a']==$role[$j]['auth_a'] && $role[$i]['auth_c']==$role[$j]['auth_c']){
                        unset($row[$j]);
                    }
                }
            }
            $row_len = count($row);
            foreach ($row as $k => $v) {
                $while['auth_a'] = $row[$k]['auth_a'];
                $while['auth_c'] = $row[$k]['auth_c'];
                $res  = db("auth")->where($while)->field("id,auth_name,auth_pid")->find();
                $res['auth_a'] = $row[$k]['auth_a'];
                $res['auth_c'] = $row[$k]['auth_c'];
                $arr[]=$res;
            }
            foreach ($arr as $k => $v) {
                $ban_while['id'] = $arr[$k]['auth_pid'];
                $res  = db("auth")->where($ban_while)->field("auth_name")->find();
                $ban[$k]['auth_name'] =  $res['auth_name'];
                $ban[$k]['son'][] =  $arr[$k];
            }
            $len = count($ban);
                $ssa =$ban;
                for($i=0;$i<$len;$i++){
                    $h=$i+1;
                    for($j=$h;$j<$len;$j++){
                        if($ban[$i]['auth_name'] == $ban[$j]['auth_name']){
                            $ssa[$i]['son'] = array_merge($ssa[$i]['son'],$ban[$j]['son']);
                        }
                    }
                }
                $len = count($ssa);
                $aa = $ssa;
                for($i=0;$i<$len;$i++){
                    $h = $i+1;
                    for($j=$h;$j<$len;$j++){
                        if($ssa[$i]['auth_name'] == $ssa[$j]['auth_name']){
                            if(!empty($aa[$j])){
                                unset($aa[$j]);
                            }
                        }
                    }
                }
                $len = count($aa);
                foreach ($aa as $k => $v) {
                   $lis[] = $aa[$k];
                }
                for($i=0;$i<$len;$i++){
                    $auth_s = $lis[$i]['son'];
                    foreach ($auth_s as $k => $v) {
                        $apd = db("auth")->where("id",$auth_s[$k]['id'])->field("is_show")->find();
                        if($apd['is_show'] == 0){
                        unset($lis[$i]['son'][$k]);
                    }
                    }
                }
            return $lis;
        }
    }
    /*获取管理员信息*/
    public function admin(){
        $res = DB::name("admin")->where("id",$_SESSION['id'])->field("username,role_id")->find();
        if($res['role_id'] == 0){
            $res['role_name'] = "超级管理员";
        }else{
            $role = DB::name("role")->where("id",$res['role_id'])->field("role_name")->find();
            $res['role_name'] = $role['role_name'];
        }
        return  $res;
    }
}