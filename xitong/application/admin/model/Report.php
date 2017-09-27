<?php
namespace app\admin\model;

use think\Model;
use think\Db;
class Report extends Common
{   
	/**
	 * 合同报表
	 * @return [type] [description]
	 */
    public function report_contract_list(){
        
    }
    /**
	 * 收支报表
	 * @return [type] [description]
	 */
    public function report_exprec_list($where){
         $res['list'] = DB::name("incomeexpenditure")->where($where)->order("id desc")->field("id,pay_time,customer_type,park_id,payment_id,payee_id,dictionary_id,pay_type,price,remark")->order('park_id')->select();
        $res['num']  = count($res['list']);
        $res['park'] = DB::name("park")->field("id,name")->select();
        $res['dictionary'] = DB::name("dictionary")->where('type',3)->field("id,name")->select();
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num']  = $arr[$k];  
        }
        p_r($res);die();
        return $res;
    }
    /**
	 * 房源空置报表
	 * @return [type] [description]
	 */
    public function report_house_list(){
    	
    }
    /**
	 * 园区面积报表
	 * @return [type] [description]
	 */
    public function report_park_list(){
    	
    }
    /**
	 * 园区盈损报表
	 * @return [type] [description]
	 */
    public function report_park_profitloss_list(){
    	
    }
    /**
	 * 水电报表
	 * @return [type] [description]
	 */
    public function report_waterletric_list(){
    	
    }
}