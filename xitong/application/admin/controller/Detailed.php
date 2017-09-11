<?php
namespace app\admin\controller;

class Detailed extends Common
{
    /*
    **客户管理
     */
    public function detailed_list(){
        $cus = model("Detailed");
        if(!empty(input('name'))){
            $where['name'] = array("like","%".input('name')."%");
            $this->assign("name",input('name'));
        }
        $where['type'] = 2;
        $res = $cus->detailed_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /*
    **添加客户
     */
    public function detailed_add(){
        $cus = model("Detailed");
        if(request()->isPost()){
            $res = $cus->detailed_add();
            return $res;
        }else{
            $res = $cus->detailed_add();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
      /*
    **修改客户
     */
    public function detailed_edit(){
        $cus = model("Detailed");
        if(request()->isPost()){
            $res = $cus->detailed_edit();
            return $res;
        }else if(request()->isGet()){
            $res = $cus->detailed_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请选择修改的客户信息";
        }
    }
    /*
    **删除客户
     */
    public function detailed_del(){
        $cus = model("Detailed");
        if(request()->isPost()){
            $res = $cus->detailed_del();
            return $res;
        }else{
             return "请选择删除的客户信息";
        }
    }

}