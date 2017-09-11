<?php
namespace app\admin\controller;

class Enterprise extends Common
{
	/**
	 * 公司信息列表
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function company_list(){
    	$enterprise = model("Enterprise");
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['create_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['create_time'] = array("gt",strtotime(input('startime')));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['create_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['create_time'] = array("lt",strtotime(input('overtime')));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("name"))){
            $where['name'] = array("like","%".input("name")."%");
            $this->assign("name",input("name"));
        }
        if(empty($where)){
            $where = 1;
        }
        /*获取 符合条件的 管理员信息*/
        $res = $enterprise->company_list($where);
        $this->assign("res",$res);
        return $this->fetch();

    }
    /**
	 * 公司信息新增
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function company_add(){
    	$Enterprise = model("Enterprise");
        if(request()->isPost()){
            $row = $Enterprise->company_add();
            return $row;
        }else{
            /*获取银行信息*/
            $bank = $Enterprise->bank_info();
            $this->assign("bank",$bank);
            return $this->fetch();
        }

    }
    /**
	 * 公司信息修改
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function company_edit(){

    }
    /**
	 * 公司信息删除
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function company_del(){

    }
    /**
	 * 员工信息列表
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function staff_list(){

    }
    /**
	 * 员工信息新增
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function staff_add(){

    }
    /**
	 * 员工信息修改
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function staff_edit(){

    }
    /**
	 * 员工信息删除
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function staff_del(){

    }
    /**
	 * 园区信息列表
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function garden_list(){

    }
    /**
	 * 园区信息新增
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function garden_add(){

    }
    /**
	 * 园区信息修改
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function garden_edit(){

    }
    /**
	 * 园区信息删除
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function garden_del(){

    }
    /**
	 * 房源信息列表
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function house_list(){

    }
    /**
	 * 房源信息修改
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function house_edit(){

    }
    /**
	 * 房源信息删除
	 * @Author   wcl
	 * @DateTime 2017-09-10T20:53:24+0800
	 * @return   [type]                   [description]
	 */
    public function house_del(){

    }

}

