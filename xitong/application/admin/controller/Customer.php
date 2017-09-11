<?php
namespace app\admin\controller;

class Customer extends Common
{
    /*
    **客户管理
     */
    public function customer_list(){
        $cus = model("Customer");
        if(!empty(input('name'))){
            $where['name'] = array("like","%".input('name')."%");
            $this->assign("name",input('name'));
        }
        if(!empty(input('status'))){
            $where['status'] = input('status');
            $this->assign("status",input('status'));
        }
        $where['type'] = 1;
        $res = $cus->customer_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /*
    **添加客户
     */
    public function customer_add(){
        $cus = model("Customer");
        if(request()->isPost()){
            $res = $cus->customer_add();
            return $res;
        }else{
            $res = $cus->customer_add();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
      /*
    **修改客户
     */
    public function customer_edit(){
        $cus = model("Customer");
        if(request()->isPost()){
            $res = $cus->customer_edit();
            return $res;
        }else if(request()->isGet()){
            $res = $cus->customer_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请选择修改的客户信息";
        }
    }
    /*
    **删除客户
     */
    public function customer_del(){
        $cus = model("Customer");
        if(request()->isPost()){
            $res = $cus->customer_del();
            return $res;
        }else{
             return "请选择删除的客户信息";
        }
    }

}