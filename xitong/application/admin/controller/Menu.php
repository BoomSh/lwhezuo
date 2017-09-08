<?php
namespace app\admin\controller;

class Menu extends Common
{
    /*
    **字典设置
    */
   public function dictionary_list(){
        $Menu = model("Menu");
        if(!empty(input("name"))){
            $where['name'] = array("like","%".input("name")."%");
            $this->assign("name",input("name"));
        }
        if(empty($where)){
            $where = 1;
        }
        /*获取 符合条件的 字典信息*/
        $res = $Menu->dictionary_list($where);
        $this->assign("res",$res);
        return $this->fetch();
   }
   /*
   **添加字典
    */
   public function dictionary_add(){
        $Menu = model("Menu");
        if(request()->isPost()){
            $row = $Menu->dictionary_add();
            return $row;
        }else{
            return $this->fetch();
        }
   }
   /*
   **删除字典
    */
   public function dictionary_del(){
        $Menu = model("Menu");
        if(request()->isPost()){
            $row = $Menu->dictionary_del();
            return $row;
        }else{
            return "请选择删除的信息";
        }
   }
   /*
   **编辑 字典
    */
   public function dictionary_edit(){
        $Menu = model("Menu");
        if(request()->isGet()){
            /*获取字典信息*/
            $res = $Menu->dictionary_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else if(request()->isPost()){
            $row = $Menu->dictionary_edit();
            return $row;
        }else{
            return "请选择修改的信息";
        }
   }
   /*
    **系统设置
    */
   public function system_list(){
        $Menu = model("Menu");
        if(!empty(input("name"))){
            $where['field'] = array("like","%".input("name")."%");
            $this->assign("name",input("name"));
        }
        if(empty($where)){
            $where = 1;
        }
        /*获取 符合条件的 字典信息*/
        $res = $Menu->system_list($where);
        $this->assign("res",$res);
        return $this->fetch();
   }
   /*
   **添加字段
    */
   public function system_add(){
        $Menu = model("Menu");
        if(request()->isPost()){
            $row = $Menu->system_add();
            return $row;
        }else{
            return $this->fetch();
        }
   }
   /*
   **删除字段
    */
   public function system_del(){
        $Menu = model("Menu");
        if(request()->isPost()){
            $row = $Menu->system_del();
            return $row;
        }else{
            return "请选择删除的信息";
        }
   }
   /*
   **编辑 字段
    */
   public function system_edit(){
        $Menu = model("Menu");
        if(request()->isGet()){
            /*获取字典信息*/
            $res = $Menu->system_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else if(request()->isPost()){
            $row = $Menu->system_edit();
            return $row;
        }else{
            return "请选择修改的信息";
        }
   }
   /*
    **系统设置
    */
   public function systemlog_list(){
        $Menu = model("Menu");
        if(!empty(input("remarks"))){
            $where['remarks'] = array("like","%".input("remarks")."%");
            $this->assign("remarks",input("remarks"));
        }
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['create_time'] = array("between",array(input('startime'),input('overtime')));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['create_time'] = array("gt",input("startime"));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['create_time'] = array("between",array(input('startime'),input('overtime')));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['create_time'] = array("lt",input("overtime"));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(empty($where)){
            $where = 1;
        }
        /*获取 符合条件的 字典信息*/
        $res = $Menu->systemlog_list($where);
        $this->assign("res",$res);
        return $this->fetch();
   }

   /*
   **系统日志
    */
   public function systemlog_del(){
        $Menu = model("Menu");
        if(request()->isPost()){
            $row = $Menu->systemlog_del();
            return $row;
        }else{
            return "请选择删除的信息";
        }
   }
   /*导航*/
   public function lists(){
        $Menu = model("Menu");
        /*获取菜单导航信息*/
        if(!empty(input('auth_name'))){
            $where['auth_name'] = array("like","%".input("auth_name")."%");
            $this->assign("auth_name",input("auth_name"));
        }
        if(empty($where)){
            $where = 1;
        }
        $res = $Menu->lists($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /*添加菜单导航*/
    public function listsadd(){
        $Menu = model("Menu");
        if(request()->isPost()){
            $res = $Menu->listsadd();
            return $res;
        }else{
            /*获取一级菜单导航信息*/
            $res = $Menu->listsadd();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
    /*修改菜单导航*/
    public function listsedit(){
        $Menu = model("Menu");
        if(request()->isPost()){
            //var_dump(input());exit;
            $res = $Menu->listsedit();
            return $res;
        }else if(request()->isGet()){
            /*获取一级菜单导航信息*/
            $res = $Menu->listsedit();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
    /*删除菜单栏*/
    public function listsdel(){
        if(request()->isPost()){
            $Menu = model("Menu");
            $res = $Menu->listsdel();
            return $res;
        }else{
            return "操作失败";
        }
    }
}