<?php
namespace app\admin\controller;

class Finance extends Common
{
    /**
     * 收入列表
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_list(){
        $Finance = model("Finance");
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['pay_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['pay_time'] = array("gt",strtotime(input('startime')));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['pay_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['pay_time'] = array("lt",strtotime(input('overtime')));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("customer_type"))){
            $where['customer_type'] = input("customer_type");
            $this->assign("customer_type",input("customer_type"));
        }
        if(!empty(input("park_id"))){
            $where['park_id'] = input("park_id");
            $this->assign("park_id",input("park_id"));
        }
        if(!empty(input("pay_type"))){
            $where['pay_type'] = input("pay_type");
            $this->assign("pay_type",input("pay_type"));
        }

        $where['type'] = 1;
        /*获取 符合条件的 管理员信息*/
        $res = $Finance->income_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /**
     * 新增收入
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_add(){
        $Finance = model("Finance");
        if(request()->isPost()){
            $row = $Finance->income_add();
            return $row;
        }else{
             /*获取下拉信息*/
            $res = $Finance->income_add();
            $this->assign('res',$res);
            return $this->fetch();
        }
    }
    /**
     * 修改收入
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_edit(){
       $Finance = model("Finance");
        if(request()->isGet()){
            /*获取支出信息*/
            $res = $Finance->income_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else if(request()->isPost()){
            $row = $Finance->income_edit();
            return $row;
        }else{
            return "请选择修改的信息";
        }
    }
    /**
     * 支出列表
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_list(){
        $Finance = model("Finance");
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['pay_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['pay_time'] = array("gt",strtotime(input('startime')));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['pay_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['pay_time'] = array("lt",strtotime(input('overtime')));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("customer_type"))){
            $where['customer_type'] = input("customer_type");
            $this->assign("customer_type",input("customer_type"));
        }
        if(!empty(input("park_id"))){
            $where['park_id'] = input("park_id");
            $this->assign("park_id",input("park_id"));
        }
        if(!empty(input("pay_type"))){
            $where['pay_type'] = input("pay_type");
            $this->assign("pay_type",input("pay_type"));
        }

        $where['type'] = 2;
        /*获取 符合条件的 管理员信息*/
        $res = $Finance->expenditure_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /**
     * 新增支出
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_add(){
        $Finance = model("Finance");
        if(request()->isPost()){
            $row = $Finance->expenditure_add();
            return $row;
        }else{
             /*获取下拉信息*/
            $res = $Finance->expenditure_add();
            $this->assign('res',$res);
            return $this->fetch();
        }
    }
    /**
     * 修改支出
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_edit(){
        $Finance = model("Finance");
        if(request()->isGet()){
            /*获取支出信息*/
            $res = $Finance->expenditure_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else if(request()->isPost()){
            $row = $Finance->expenditure_edit();
            return $row;
        }else{
            return "请选择修改的信息";
        }
    }
    /**
     * 模糊搜索
     * @return [type] [description]
     */
    public function expenditure_selectinfo(){
        $Finance = model("Finance");
        if(request()->isAjax()){
            $res = $Finance-> expenditure_selectinfo();
            return $res;   
        }
    }
}  
