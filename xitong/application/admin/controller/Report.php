<?php
namespace app\admin\controller;

class Report extends Common
{   
	/**
	 * 合同报表
	 * @return [type] [description]
	 */
    public function report_contract_list(){
        return $this->fetch();
    }
    /**
	 * 收支报表
	 * @return [type] [description]
	 */
    public function report_exprec_list(){
        $report = model('Report');
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
        /*获取 符合条件的 报表信息*/
        $res = $report->report_exprec_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /**
	 * 房源空置报表
	 * @return [type] [description]
	 */
    public function report_house_list(){
    	return $this->fetch();
    }
    /**
	 * 园区面积报表
	 * @return [type] [description]
	 */
    public function report_park_list(){
    	return $this->fetch();
    }
    /**
	 * 园区盈损报表
	 * @return [type] [description]
	 */
    public function report_park_profitloss_list(){
    	return $this->fetch();
    }
    /**
	 * 水电报表
	 * @return [type] [description]
	 */
    public function report_waterletric_list(){
    	return $this->fetch();
    }
}