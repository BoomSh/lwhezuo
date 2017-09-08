<?php
namespace app\admin\controller;

class Admin extends Common
{
    /*
     *管理员列表
     */
    public function admin_list(){
        $admin = model("Admin");
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['addtime'] = array("between",array(input('startime'),input('overtime')));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['addtime'] = array("gt",input("startime"));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['addtime'] = array("between",array(input('startime'),input('overtime')));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['addtime'] = array("lt",input("overtime"));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("username"))){
            $where['username'] = array("like","%".input("username")."%");
            $this->assign("username",input("username"));
        }
        if(empty($where)){
            $where = 1;
        }
        /*获取 符合条件的 管理员信息*/
        $res = $admin->admin_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /*管理员编辑*/
    public function admin_edit(){
        $admin = model("Admin");
        if(request()->isGet()){
            /*获取管理员信息*/
            $res = $admin->admin_edit();
            /*获取角色信息*/
            $role = $admin->admin_role();
            $this->assign('role',$role);
            $this->assign("res",$res);
            return $this->fetch();
        }else if(request()->isPost()){
            $row = $admin->admin_edit();
            return $row;
        }else{
            return "请选择修改的信息";
        }
    }
    /*管理员删除*/
    public function admin_del(){
        $admin = model("Admin");
        if(request()->isPost()){
            $row = $admin->admin_del();
            return $row;
        }else{
            return "请选择删除的信息";
        }
    }
    /*管理员添加*/
    public function admin_add(){
        $admin = model("Admin");
        if(request()->isPost()){
            $row = $admin->admin_add();
            return $row;
        }else{
            $res = $admin->admin_role();
            $this->assign('res',$res);
            return $this->fetch();
        }
    }
    /*开启 或 关闭 管理员*/
    public function admin_state(){
        $admin = model("Admin");
        if(request()->isPost()){
            $row = $admin->admin_state();
            return $row;
        }else{
            return "操作失败";
        }
    }
    /*
    *角色管理
    **/
    public function admin_role(){
        $admin = model("Admin");
        /*获取 符合条件的 管理员信息*/
        $res = $admin->admin_role();
        $this->assign("res",$res);
        return $this->fetch();
    }
    /*
     *角色编辑
    **/
    public function admin_role_edit(){
        $admin = model("Admin");
        if(request()->isGet()){
            /*获取角色信息  和 角色权限信息*/
            $res = $admin->admin_role_edit();
            $this->assign("res",$res);
            //var_dump($res);exit;
            return $this->fetch();
        }else if(request()->isPost()){
            $row = $admin->admin_role_edit();
            return $row;
        }else{
            return "请选择修改的信息";
        }
    }
    /*
    *角色添加
    */
    public function admin_role_add(){
        $admin = model("Admin");
        if(request()->isPost()){
            $res = $admin->admin_role_add();
            return $res;
        }else{
            /*获取菜单栏信息*/
            $res = $admin->admin_role_add();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
    /*
    *角色删除
    */
    public function admin_role_del(){
        $admin = model("Admin");
        if(request()->isPost()){
            $row = $admin->admin_role_del();
            return $row;
        }else{
            return "请选择删除的信息";
        }
    }
}