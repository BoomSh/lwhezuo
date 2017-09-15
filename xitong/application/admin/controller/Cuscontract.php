<?php
namespace app\admin\controller;

class Cuscontract extends Common
{
    /*
    **业主合同
     */
    public function cuscontract_list(){
        $Cus = model('Cuscontract');
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['c.time_effect'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['c.time_effect'] = array("gt",strtotime(input('startime')));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['c.time_effect'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['c.time_effect'] = array("lt",strtotime(input('overtime')));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("contract_num"))){
            $where['c.contract_num'] = array("like","%".input("contract_num")."%");
            $this->assign("contract_num",input("contract_num"));
        }
        $where['c.type'] = 2;
        $res = $Cus->cuscontract_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
     /**
     * 园区信息新增
     * @Author   wcl
     * @DateTime 2017-09-10T20:53:24+0800
     * @return   [type]                   [description]
     */
    public function garden_add(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            $row = $Cuscontract->garden_add();
            return $row;
        }else{
            return $this->fetch();
        }
    }
    /*
    ** 业主添加合同
     */
    public function cuscontract_add(){
        $cus = model("Cuscontract");
        if(request()->isPost()){
            $res = $cus->cuscontract_add();
            return $res;
        }else{
            $res = $cus->cuscontract_add();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
    /*
    **添加出租方/业主
     */
    public function detailed_add(){
        $cus = model("Cuscontract");
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
    **合同退组
    */
    public function cuscontract_status(){
        $cus = model("Cuscontract");
        if(request()->isPost()){
            $res = $cus->cuscontract_status();
            return $res;
        }else{
            return "请选择退租的合同";
        }
    }
    /*
    **修改合同
     */
    public function Cuscontract_edit(){
       $cus = model("Cuscontract");
        if(request()->isPost()){
            $res = $cus->Cuscontract_edit();
            return $res;
        }else if(request()->isGet()){
            $res = $cus->Cuscontract_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请选择修改的合同";
        }
    }

    /*
    **异步查询相关的内容
    **val 输入的值   type 类型 1为业主  2公司  3为 园区
    ** 返回 html
     */
    public function cuscontract_find(){
        $cus = model("Cuscontract");
        if(request()->isPost()){
                $res = $cus->cuscontract_find();
                return $res;
        }else{
            return "";
        }
    }


    /*
    **房源添加
     */
    public function house_add(){
        return 1;
    }
    /*
    **添加公司
     */
        public function company_add(){
            $Enterprise = model("Cuscontract");
            if(request()->isPost()){
                $row = $Enterprise->company_add();
                return $row;
            }else{
                /*获取银行信息*/
                $bank = $Enterprise->company_add();
                $this->assign("bank",$bank);
                return $this->fetch();
            }
        }
    /*
    **删除合同
     */
    public function cuscontract_del(){
        $Cuscontract = model("Cuscontract");
            if(request()->isPost()){
                $row = $Cuscontract->cuscontract_del();
                return $row;
            }else{
                return "请选择删除的合同";
            }
    }
    /*
    **水表管理
     */
        public function water_list(){
            $Cuscontract = model("Cuscontract");
            $where = 1;
            $res = $Cuscontract->water_list($where);
            $this->assign("res",$res);
            return $this->fetch();
        }

}