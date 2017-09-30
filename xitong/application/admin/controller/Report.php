<?php
namespace app\admin\controller;

class Report extends Common
{   
	/**
	 * 合同报表
	 * @return [type] [description]
	 */
    public function report_contract_list(){
        $report = model('Report');
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $time= " between ".strtotime(input('startime'))." and ".strtotime(input('overtime'));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $time= " > ".strtotime(input('startime'));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $time= " between ".strtotime(input('startime'))." and ".strtotime(input('overtime'));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $time= " < ".strtotime(input('overtime'));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("park_id"))){
            $park = "a.id =".input("park_id");
            $this->assign("park_id",input("park_id"));
        }
        /*获取 符合条件的 报表信息*/
        $res = $report->report_contract_list($time,$park);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /**
     * 导出合同报表
     * @return [type] [description]
     */
    public function report_contract_excelout(){
        $report = model('Report');
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $time= " between ".strtotime(input('startime'))." and ".strtotime(input('overtime'));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $time= " > ".strtotime(input('startime'));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $time= " between ".strtotime(input('startime'))." and ".strtotime(input('overtime'));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $time= " < ".strtotime(input('overtime'));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("park_id"))){
            $park = "a.id =".input("park_id");
            $this->assign("park_id",input("park_id"));
        }
        /*获取 符合条件的 报表信息*/
        $res = $report->report_contract_list($time,$park);
        $filename = "合同报表";
        $title = array("序号","园区","地址","新签合同","到期合同","退组合同");
        $this->goodsExcelExport($res['list'],$title,$filename);
    }
    /**
	 * 收支报表
	 * @return [type] [description]
	 */
    public function report_exprec_list(){
        $report = model('Report');
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $time= "and `pay_time` between ".strtotime(input('startime'))." and ".strtotime(input('overtime'));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $time= "and `pay_time` > ".strtotime(input('startime'));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $time= "and `pay_time` between ".strtotime(input('startime'))." and ".strtotime(input('overtime'));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $time= "and `pay_time` < ".strtotime(input('overtime'));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("park_id"))){
            $park = "a.id =".input("park_id");
            $this->assign("park_id",input("park_id"));
        }
        /*获取 符合条件的 报表信息*/
        $res = $report->report_exprec_list($time,$park);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /**
     * 导出收支
     * @return [type] [description]
     */
    public function report_exprec_excelout(){
        $report = model('Report');
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $time= "and `pay_time` between ".strtotime(input('startime'))." and ".strtotime(input('overtime'));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $time= "and `pay_time` > ".strtotime(input('startime'));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $time= "and `pay_time` between ".strtotime(input('startime'))." and ".strtotime(input('overtime'));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $time= "and `pay_time` < ".strtotime(input('overtime'));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("park_id"))){
            $park = "a.id =".input("park_id");
            $this->assign("park_id",input("park_id"));
        }
        /*获取 符合条件的 报表信息*/
        $res = $report->report_exprec_list($time,$park);
        $filename = "收支报表";
        $title = array("序号","园区","支出","收入","盈利");
        $this->goodsExcelExport($res['list'],$title,$filename);

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