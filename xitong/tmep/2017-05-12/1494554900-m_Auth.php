<?php
/**
 * @Author: anchen
 * @Date:   2017-05-04 10:08:50
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-05-09 09:36:47
 */
namespace app\admin\model;
use \think\Db;
class Auth extends Common{
    /**
    管理员管理页面
    **/
    public function index(){
        $res['row'] = db('admin')->field("id,username,addtime,loginsum,role_id,name")->select();
        foreach ($res['row'] as $k => $v) {
            $res['row'][$k]['time'] = date("Y-m-d H:i:s",$res['row'][$k]['addtime']);
            if($res['row'][$k]['role_id'] != 0){
                $role = db('role')->where("id",$res['row'][$k]['role_id'])->field("role_name")->find();
                $res['row'][$k]['role_name'] = $role['role_name'];
            }else{
                $res['row'][$k]['role_name'] = "超级管理员";
            }
        }
        $res['num'] = count($res['row']);
        return $res;
    }
    /**
    修改管理员信息 
    **/
    public function index_edit(){
        if(isset($_GET['uid'])){
            /*获取该管理员的信息*/
        $res['admin'] = db("admin")->where("id",$_GET['uid'])->field("id,username,y_pwd,role_id,name")->find();
        $role = db("role")->where("id",$res['admin']['role_id'])->field("role_name")->find();
        $res['admin']['role_name'] = $role['role_name'];
        $res['role'] = db("role")->field("id,role_name")->select();
        return $res;
        }
        if(isset($_POST)){
            $data['id'] = $_POST['id'];
            $data['username'] = $_POST['username'];
            $where['id'] = array("neq", $_POST['id']);
            $where['username'] = $_POST['username'];
            $row = db("admin")->where($where)->field("COUNT(*)")->find();
            if($row['COUNT(*)'] > 0){
             /*无登录 直接拒绝*/
                return "no";
            }
            $data['name'] = $_POST['name'];
            $while['id'] = array("neq", $_POST['id']);
            $while['name'] = $_POST['name'];
            $rows = db("admin")->where($while)->field("COUNT(*)")->find();
            if($rows['COUNT(*)'] > 0){
            /*无权限 直接拒绝*/
                return "nos";
            }
            $data['role_id'] = $_POST['role_id'];
            $data['y_pwd'] = $_POST['y_pwd'];
            $data['password'] = md5(md5($_POST['y_pwd'])."weizone");
            $res = db("admin")->update($data);
            if($res){
            return "success";
            }else{
              return "error";
            }
        }
    }

    public function index_add(){
        if(!empty($_POST)){
             $data['username'] = $_POST['username'];
             $where['username'] = $_POST['username'];
             $row = db("admin")->where($where)->field("COUNT(*)")->find();
             if($row['COUNT(*)'] > 0){
                return "no";
             }
             $while['name'] = $_POST['name'];
             $rows = db("admin")->where($while)->field("COUNT(*)")->find();
             if($rows['COUNT(*)'] > 0){
                return "nos";
             }
             $data['name'] = $_POST['name'];
             $data['role_id'] = $_POST['role_id'];
             $data['y_pwd'] = $_POST['y_pwd'];
             $data['addtime'] = time();
             $data['password'] = md5(md5($_POST['y_pwd'])."weizone");
             $res = db("admin")->insert($data);
             if($res){
                return "success";
            }else{
                  return "error";
            }
        }else{
            $res = db("role")->field("id,role_name")->select();
            return $res;
        }
    }

    /**
    修改模块信息 
    **/
    public function auth_edit(){
        if(isset($_GET['uid'])){
            /*获取该模块的信息*/
        $res['auth'] = db("auth")->where("id",$_GET['uid'])->field("id,auth_name,auth_c,auth_a,is_show,auth_pid")->find();
        $res['auth_list'] = db("auth")->field("id,auth_name")->where("auth_pid",0)->select();
        if($res['auth']['auth_pid'] == 0){
            $res['pare'] = $res['auth']['auth_name'];
            $res['pare_id']= $res['auth']['id'];
        }else{
            $row = db("auth")->where("id",$res['auth']['auth_pid'])->field("id,auth_name")->find();
            $res['pare'] = $row['auth_name'];
            $res['pare_id']= $row['id'];
        }
        return $res;
        }
        if(isset($_POST)){
            $data['id'] = $_POST['id'];
            $data['auth_pid'] = $_POST['auth_pid'];
            $res =  db("auth")->where("id",$data['id'])->field("auth_pid")->find();
            /*位置没改*/
            if($data['id'] == $data['auth_pid']){
                $data['auth_name'] = $_POST['auth_name'];
                $data['is_show'] = $_POST['is_show'];
                $data['auth_pid'] = 0;
            }else{
                /*位置改了  判断是否是父级*/
                if($res['auth_pid'] == 0){
                    $row = db("auth")->where("auth_pid",$data['id'])->field("COUNT(*)")->find();
                    if($row['COUNT(*)'] > 0){
                        /*拥有子集的不给更改*/
                        return "no";
                    }else{
                        $data['auth_name'] = $_POST['auth_name'];
                        $data['auth_pid'] = $_POST['auth_pid'];
                        $data['is_show'] = $_POST['is_show'];
                        $data['auth_level'] = 1;
                        $data['auth_path'] = $_POST['auth_pid']."-".$data['id'];
                    }
                }else{
                     $data['auth_name'] = $_POST['auth_name'];
                     $data['auth_pid'] = $_POST['auth_pid'];
                     $data['is_show'] = $_POST['is_show'];
                     $data['auth_path'] = $_POST['auth_pid']."-".$data['id'];
                }
            }
            $res = db("auth")->update($data);
            if($res){
            return "success";
            }else{
              return "error";
            }
        }
    }

     public function auth_add(){
        if(!empty($_POST)){
             $data['username'] = $_POST['username'];
             $data['name'] = $_POST['name'];
             $data['role_id'] = $_POST['role_id'];
             $data['y_pwd'] = $_POST['y_pwd'];
             $data['addtime'] = time();
             $data['password'] = md5(md5($_POST['y_pwd'])."weizone");
             $res = db("admin")->insert($data);
             if($res){
                return "success";
            }else{
                  return "error";
            }
        }else{
            $res = db("auth")->field("id,auth_name")->where("auth_pid",0)->select();
            return $res;
        }
    }
    /**
     获取所有父级板块
    **/
    public function auth(){
        $res = db("auth")->field("id,auth_name")->where("auth_pid",0)->select();
        return $res;
    }
    /**
     展示所有表
     **/
     public function tables(){
        $sql = "SHOW TABLES";
        $id = Db::query($sql);
        return $id;
     }
     /**
      获取所以字段
      **/
      public function commont($commont){
        if(!$commont){
            return;
        }else{
            $sql = "show full columns from ".$commont;
            $columns = Db::query($sql);
            foreach ($columns as $k => $v) {
                if($columns[$k]['Field'] == 'id'){
                    unset($columns[$k]);
                }
            }
            foreach ($columns as $k => $v) {
                $name = $columns[$k]['Comment'];
                $len = stripos($name,"|");
                $columns[$k]['name'] = $columns[$k]['Field']."--".substr($name,0,6);
            }
            $res = $columns;
            return $res;
        }
      }
    /**
    角色管理页面
    **/
    public function admin(){
        $res['row'] = db('role')->field("id,role_name,role_descript,addtime")->select();
        foreach ($res['row'] as $k => $v) {
            $res['row'][$k]['time'] = date("Y-m-d H:i:s",$res['row'][$k]['addtime']);
        }
        $res['num'] = count($res['row']);
        return $res;
    }

    public function admin_edit(){
        if(isset($_GET['uid'])){
            /*获取该管理员的信息*/
        $res['role'] = db("role")->where("id",$_GET['uid'])->field("id,role_name,role_descript")->find();
        
        $res['auth'] = db("auth")->field("id,auth_name,auth_c,auth_a,auth_pid,auth_level")->order("auth_path")->select();
        foreach ($res['auth'] as $k => $v) {
            $where['auth_c'] = $res['auth'][$k]['auth_c'];
            $where['auth_a'] = $res['auth'][$k]['auth_a'];
            $where['role_id'] = $_GET['uid'];
            $role = db("role_value")->where($where)->field("action_type")->select();
            if($role){
                foreach ($role as $key => $value) {
                    $res['auth'][$k]['role_'.$role[$key]['action_type']] = $role[$key]['action_type'];
                }
                if(empty($res['auth'][$k]['role_1'])){
                    $res['auth'][$k]['role_1'] = 0;
                }
                if(empty($res['auth'][$k]['role_2'])){
                    $res['auth'][$k]['role_2'] = 0;
                }
                if(empty($res['auth'][$k]['role_3'])){
                    $res['auth'][$k]['role_3'] = 0;
                }
                if(empty($res['auth'][$k]['role_4'])){
                    $res['auth'][$k]['role_4'] = 0;
                }
            }else{
                $res['auth'][$k]['role_1'] = 0;
                $res['auth'][$k]['role_2'] = 0;
                $res['auth'][$k]['role_3'] = 0;
                $res['auth'][$k]['role_4'] = 0;
            }
            if($res['auth'][$k]['auth_level'] == 1){
                $res['auth'][$k]['auth_name'] = "----　".$res['auth'][$k]['auth_name'];
            }
        }
        return $res;
        }
        if(isset($_POST)){
            $data['id'] = $_POST['id'];
            $data['role_name'] = $_POST['role_name'];
            $data['role_descript'] = $_POST['role_descript'];
            $where['role_name'] = $_POST['role_name'];
            $where['id'] = array("neq",$_POST['id']);
                        /*判断该名称是否存在*/
            $row = db("role")->where($where)->field("COUNT(*)")->find();
            if($row['COUNT(*)'] > 0){
                return "no";
            }
            /*开启事物*/
            Db::startTrans();
            $wh_auth['id'] = $_POST['id'];
            $role_xg = db("role")->where($wh_auth)->field("role_name,role_descript")->find();
            /*判断 role 表是否有改动*/
            if($role_xg['role_name'] == $_POST['role_name'] && $role_xg['role_descript'] == $_POST['role_descript'] ){
                $res = 1;
            }else{
                $res = Db::name("role")->update($data);
            }
            /*删除原先的权限*/
            $role_pd = db("role_value")->where("role_id",$_POST['id'])->field("COUNT(*)")->find();
            if($role_pd['COUNT(*)'] > 0){
                $while['role_id'] = $_POST['id'];
                $role = Db::name("role_value")->where($while)->delete();
            }else{
                $role = 1;
            }
            if(!empty($_POST['auth'])){
            $auth_len = count($_POST['auth']);
            if($auth_len > 0){
                for($i=0;$i<$auth_len;$i++){
                    $value=$_POST['auth'][$i];
                    $b="_";
                    $len = stripos($value,$b);
                    $last = strrpos($value,$b);
                    $jl = $last - $len -1;
                    $all_len = strlen($value);
                    $shouci = substr($value,$len+1,$jl);
                    $role_value['action_type'] = substr($value,$last+1,1);
                    $auth = db("auth")->where("id",$shouci)->field("auth_c,auth_a")->find();
                    $role_value['role_id'] = $_POST['id'];
                    $role_value['auth_c'] = $auth['auth_c'];
                    $role_value['auth_a'] = $auth['auth_a'];
                    $roles = Db::name("role_value")->insert($role_value);
                }
            }else{
               $roles = 1; 
            }
        }else{
            $roles = 1; 
        }
            if($res && $role && $roles){
            Db::commit();
            return "success";
            }else{
              Db::rollback();
              return "error";
            }
        }
    }

    public function admin_add(){
        if(!empty($_POST)){
            $where['role_name'] = $_POST['role_name'];
                        /*判断该名称是否存在*/
            $row = db("role")->where($where)->field("COUNT(*)")->find();
            if($row['COUNT(*)'] > 0){
                return "no";
            }
            /*开启事物*/
            Db::startTrans();
            $data['role_name'] = $_POST['role_name'];
            if(!empty($_POST['role_descript'])){
                $data['role_descript'] = $_POST['role_descript'];
            }
            $res = Db::name("role")->insert($data);
            $id = Db::name("role")->field("id")->order("id desc")->find();
            if(!empty($_POST['auth'])){
            $auth_len = count($_POST['auth']);
            if($auth_len > 0){
                for($i=0;$i<$auth_len;$i++){
                    $value=$_POST['auth'][$i];
                    $b="_";
                    $len = stripos($value,$b);
                    $last = strrpos($value,$b);
                    $jl = $last - $len -1;
                    $all_len = strlen($value);
                    $shouci = substr($value,$len+1,$jl);
                    $role_value['action_type'] = substr($value,$last+1,1);
                    $auth = db("auth")->where("id",$shouci)->field("auth_c,auth_a")->find();
                    $role_value['role_id'] = $id['id'];
                    $role_value['auth_c'] = $auth['auth_c'];
                    $role_value['auth_a'] = $auth['auth_a'];
                    $roles = Db::name("role_value")->insert($role_value);
                }
                }else{
               $roles = 1; 
                }
            }else{
                $roles = 1; 
            }
            if($res && $roles){
            Db::commit();
            return "success";
            }else{
              Db::rollback();
              return "error";
            }
        }else{
            $res['auth'] = db("auth")->field("id,auth_name,auth_c,auth_a,auth_pid,auth_level")->order("auth_path")->select();
            foreach ($res['auth'] as $k => $v) {
                if($res['auth'][$k]['auth_level'] == 1){
                    $res['auth'][$k]['auth_name'] = "----　".$res['auth'][$k]['auth_name'];
                }
            }
            return $res;
        }
    }
}