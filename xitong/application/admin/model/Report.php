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
    public function report_exprec_list($time,$park){
        $where1 = "WHERE `type` = 1 ";
        $where3 = "WHERE `type` = 2 ";
        if($time!=""){
            $where1 = $where1.$time;
            $where3 = $where3.$time;
        }
        if($park!=""){
            $where2 = "WHERE ".$park;
        }
        else{
             $where2 = "WHERE 1";
        }
        $res['list'] = DB::query('SELECT a.id, a.name,b.income,c.expend FROM dino_park a LEFT  JOIN ( SELECT `park_id`,sum(price) income FROM `dino_incomeexpenditure` '.$where1.' GROUP BY park_id ) b ON b.park_id=a.id LEFT  JOIN ( SELECT `park_id`,sum(price) expend FROM `dino_incomeexpenditure` '.$where3.' GROUP BY park_id ) c ON c.park_id=a.id '.$where2.'');
        $res['num']  = count($res['list']);
        foreach ($res['list'] as $key => $value) {
            $income[$key] = $res['list'][$key]['income'];
            $expend[$key] = $res['list'][$key]['expend'];
        }
        $res['sum_income'] = array_sum($income);
        $res['sum_expend'] = array_sum($expend);
        $res['park'] = DB::name("park")->field("id,name")->select();
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num']  = $arr[$k];  
        }
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