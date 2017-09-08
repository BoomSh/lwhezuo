<?php
namespace app\admin\model;

use think\Model;
use think\DB;
class Admin extends Common
{
    public function admin_list($where){
        /*获取管理员信息*/
        $res['list'] = DB::name("admin")->field("id,username,mobile,email,state,role_id,addtime")->where($where)->select();
        foreach ($res['list'] as $k => $v) {
            if($res['list'][$k]['role_id'] == 0){
                $res['list'][$k]['role'] = "超级管理员";
            }else{
                /*获取管理员的角色*/
                $role = DB::name("role")->where("id",$res['list'][$k]['role_id'])->field("role_name")->find();
                if($role){
                    $res['list'][$k]['role'] = $role['role_name'];
                }else{
                    $res['list'][$k]['role'] = "未分类角色";
                }
            }
        }
        /*获取信息的数量*/
        $res['num'] = count($res['list']);
        return $res;
    }
    /*添加管理员  判断*/
    public function admin_add(){
        $data['username'] = input('adminName');
        $data['password'] = md5(md5(input('password'))."weizone");
        $data['mobile'] = input('phone');
        $data['email'] = input('email');
        $data['role_id'] = input('adminRole')?input('adminRole'):0;
        $data['remark'] = input('remark');
        $data['addtime'] = date("Y-m-d H:i:s",time());
        $data['y_pwd'] = input('password');//保存不加密的密码
        if(empty($data['username'])){
            return "用户名不能为空";
        }
        if(empty($data['password'])){
            return "密码不能为空";
        }
        if(empty($data['mobile'])){
            return "手机号不能为空";
        }
        if(empty($data['email'])){
            return "email不能为空";
        }
        /*判断登录名是否被占用*/
        $find = DB::name("admin")->where("username",$data['username'])->field("COUNT(*)")->find();
        if($find['COUNT(*)'] != 0){
            return "该登录名已被占用";
        }
        $add = DB::name("admin")->insertGetId($data);
        $this->lw_log("2","增加了管理员id为".$add,"Admin",'adminlist');
        if($add){
            return "success";
        }else{
            return "操作失败!请联系技术人员";
        }
    }
    /*
    开启 关闭 管理员
    id 
    type  2为 关闭   1为开启   
     */
    public function admin_state(){
        $type = input("type");
        $id = input("id");
        if($type == 1){
            $data['state'] = 1;
            $res = DB::name("admin")->where('id',$id)->update($data);
            if($res){
                return "success";
            }else{
                return "操作失败!";
            }
        }else{
            $data['state'] = 2;
            $res = DB::name("admin")->where('id',$id)->update($data);
            $this->lw_log("4","修改了管理员id为".input('id'),"Admin",'adminlist');
            if($res){
                return "success";
            }else{
                return "操作失败!";
            }
        }
    }
    /*
     *管理员删除
     **/
    public function admin_del(){
        if(request()->isPost()){
            $where['id'] = array("in",input('id'));
            $res = DB::name("admin")->where($where)->delete();
            $this->lw_log("3","删除了管理员id为".input('id'),"Admin",'adminlist');
            if($res){
                return "success";
            }else{
                return "操作失败!";
            }
        }else{
            return "请选择删除的信息";
        }
    }
    /*
     *管理员编辑
     **/
    public function admin_edit(){
        if(request()->isGet()){
            $res = DB::name("admin")->where("id",input("id"))->field("id,username,y_pwd,remark,role_id,mobile,email")->find();
            if($res['role_id'] == 0){
                $res['role_name'] = "超级管理员";
            }else{
                $role = DB::name("role")->where("id",$res['role_id'])->field("role_name")->find();
                    $res['role_name'] = $role['role_name'];
            }
            return $res;
        }else if(request()->isPost()){
            $data['id'] = input("id");
            $data['username'] = input("adminName");
            $data['password'] = md5(md5(input('password'))."weizone");
            $data['mobile'] = input('phone');
            $data['email'] = input('email');
            $data['role_id'] = input('adminRole')?input('adminRole'):0;
            $data['remark'] = input('remark');
            $data['addtime'] = date("Y-m-d H:i:s",time());
            $data['y_pwd'] = input('password');//保存不加密的密码
            if(empty($data['username'])){
                return "用户名不能为空";
            }
            if(empty($data['password'])){
                return "密码不能为空";
            }
            if(empty($data['mobile'])){
                return "手机号不能为空";
            }
            if(empty($data['email'])){
                return "email不能为空";
            }
            /*判断登录名是否被占用*/
            $where['id'] = array("neq",$data['id']);
            $where['username'] = $data['username'];
            $find = DB::name("admin")->where($where)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] != 0){
                return "该登录名已被占用";
            }
            $upd = DB::name("admin")->update($data);
            $this->lw_log("4","修改了管理员id为".input('id'),"Admin",'adminlist');
            if($upd){
                return "success";
            }else{
                return "操作失败!请联系技术人员";
            }
        }
    }
    /*
     *角色管理
     **/
    public function admin_role($where){
        $res['list'] = DB::name("role")->field("id,role_name,role_descript")->where($where)->select();
        /*获取信息的数量*/
        $res['num'] = count($res['list']);
        return $res;
    }
    /*
     *存在 post 参数时 为添加 角色
     *不存在 post 获取菜单栏信息 返回上下级菜单（三维数组）
     **/
    public function admin_role_add(){
        if(request()->isPost()){
            $auth = input('auth/a');
            $where['role_name'] = input('roleName');
                        /*判断该名称是否存在*/
            $row = DB::name("role")->where($where)->field("COUNT(*)")->find();
            if($row['COUNT(*)'] > 0){
                return "该角色已存在";
            }
            /*开启事物*/
            Db::startTrans();
            $data['role_name'] = input('roleName');
            $data['role_descript'] = input('role_descript');
            $data['addtime'] = date('Y-m-d H:i:s',time());
            $ids = Db::name("role")->insertGetId($data);
            $len = count($auth);
            if($len == 0){
                /*当数组数量为0 时 表示没有选择任何权限 直接跳过*/
                $add = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    $value = $auth[$i];
                    $id = substr($value,0,-2);//菜单的id
                    $auths = Db::name("auth")->where("id",$id)->field("auth_c,auth_a")->find();
                    $role['role_id'] = $ids;
                    $role['auth_c'] = $auths['auth_c'];
                    $role['auth_a'] = $auths['auth_a'];
                    $role['action_type'] = substr($value,-1);//菜单权限的参数
                    $add = Db::name("role_value")->insert($role);
                    //return Db::name("role_value")->getlastsql();
                }
            }
            if($ids && $add){
                Db::commit();
                $this->lw_log("2","增加了角色id为".$ids,"Admin",'adminlist');
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }else{
            /*获取一级菜单*/
            $res = DB::name("auth")->where("auth_pid",0)->field("id,auth_name,auth_a,auth_c")->select();
            foreach ($res as $k => $v) {
                /*获取对应的二级菜单*/
                $son = DB::name("auth")->where("auth_pid",$res[$k]['id'])->field("id,auth_name,auth_a,auth_c")->select();
                $res[$k]['son'] = $son;
            }
            return $res;
        }
    }
    /*
     *角色删除
     **/
    public function admin_role_del(){
        if(request()->isPost()){
            /*开启事物*/
            Db::startTrans();
            $where['role_id'] = array("in",input('id'));
            $find = DB::name("role_value")->where($where)->field("id")->select();
            $len = count($find);
            if($len == 0){
                /*无权限 则直接跳过*/
                $del2 = 1;
            }else{
                /*删除相对应的 权限信息*/
                $del2 = DB::name("role_value")->where($where)->delete();
            }
            $role['id'] = array("in",input('id'));
            $del1 = DB::name("role")->where($role)->delete();
            if($del1 && $del2){
                Db::commit();
                $this->lw_log("3","删除了角色id为".input('id'),"Admin",'admin_role');
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }else{
            return "请选择删除的信息";
        }
    }
    /*
    *编辑角色信息和权限信息
     **/
    public function admin_role_edit(){
        if(request()->isGet()){
            $res['role'] = DB::name("role")->where("id",input('id'))->field("id,role_name,role_descript")->find();
            /*获取一级菜单*/
            $res['list'] = DB::name("auth")->where("auth_pid",0)->field("id,auth_name,auth_a,auth_c")->select();
            foreach ($res['list'] as $k => $v) {
                    /*获取对应的二级菜单*/
                    $role = DB::name("auth")->where("auth_pid",$res['list'][$k]['id'])->field("id,auth_name,auth_a,auth_c")->select();
                    /*组装后 与前端匹配*/
                    foreach ($role as $key => $value) {
                        $where['auth_c'] = $role[$key]['auth_c'];
                        $where['auth_a'] = $role[$key]['auth_a'];
                        $where['role_id'] = input('id');
                        $auth = DB::name("role_value")->where($where)->field("action_type")->select();
                        //return  DB::name("role_value")->getlastsql();
                        foreach ($auth as $ka => $va) {
                            $role[$key]['role_'.$auth[$ka]['action_type']] = $auth[$ka]['action_type'];
                        }
                    }
                    $res['list'][$k]['son'] = $role;
            }
            return $res;
        }else if(request()->isPost()){
            $data['id'] = input("id");
            $data['role_name'] = input("roleName");
            $data['role_descript'] = input("role_descript");
            $where['role_name'] = input("id");
            $where['id'] = array("neq",input("id"));
                        /*判断该名称是否存在*/
            $row = DB::name("role")->where($where)->field("COUNT(*)")->find();
            if($row['COUNT(*)'] > 0){
                return "该角色已存在";
            }
            /*开启事物*/
            Db::startTrans();
            $wh_auth['id'] = input("id");
            $role_xg = DB::name("role")->where($wh_auth)->field("role_name,role_descript")->find();
            /*判断 role 表是否有改动*/
            if($role_xg['role_name'] == input("roleName") && $role_xg['role_descript'] == input("role_descript") ){
                $res = 1;
            }else{
                $res = Db::name("role")->update($data);
            }
            /*删除原先的权限*/
            $role_pd = Db::name("role_value")->where("role_id",input("id"))->field("COUNT(*)")->find();
            if($role_pd['COUNT(*)'] > 0){
                $while['role_id'] = input("id");
                $role = Db::name("role_value")->where($while)->delete();
            }else{
                $role = 1;
            }
            $auth = input('auth/a');
            $len = count($auth);
            if($len == 0){
                /*当数组数量为0 时 表示没有选择任何权限 直接跳过*/
                $add = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    $value = $auth[$i];
                    $id = substr($value,0,-2);//菜单的id
                    $auths = Db::name("auth")->where("id",$id)->field("auth_c,auth_a")->find();
                    $roles['role_id'] = input("id");
                    $roles['auth_c'] = $auths['auth_c'];
                    $roles['auth_a'] = $auths['auth_a'];
                    $roles['action_type'] = substr($value,-1);//菜单权限的参数
                    $add = Db::name("role_value")->insert($roles);
                    //return Db::name("role_value")->getlastsql();
                }
            }
            if($res && $role && $add){
            Db::commit();
            $this->lw_log("4","修改了角色id为".input('id'),"Admin",'admin_role');
            return "success";
            }else{
              Db::rollback();
              return "操作失败";
            }
        }
    }
}