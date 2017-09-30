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
    public function report_contract_list($time,$park){
        $where1 = "BETWEEN unix_timestamp(now())-3600*24*30*6 AND unix_timestamp(now()) ";
        if($time!=""){
            $where1 = $time;
        }
        if($park!=""){
            $where4 = "WHERE ".$park;
        }
        else{
             $where4 = "WHERE 1";
        }
        $res['list'] = DB::query('SELECT  a.name,a.address,b.count1,c.count2,d.count3 FROM dino_park a LEFT  JOIN ( SELECT `park_id`, count(*) AS count1 FROM dino_contract WHERE `create_time` '.$where1.'  GROUP BY park_id ) b ON b.park_id=a.id LEFT  JOIN ( SELECT `park_id`, count(*) AS count2 FROM dino_contract WHERE UNIX_TIMESTAMP(time_end)  '.$where1.' GROUP BY park_id) c ON c.park_id=a.id LEFT  JOIN ( SELECT `park_id`, count(*) AS count3 FROM dino_contract WHERE `status` = 2   GROUP BY park_id) d ON d.park_id=a.id '.$where4.'');
        $res['num']  = count($res['list']);
        foreach ($res['list'] as $key => $value) {
            $res['list'][$key]['count1']= isset($res['list'][$key]['count1'])?$res['list'][$key]['count1']:0;
            $res['list'][$key]['count2']= isset($res['list'][$key]['count2'])?$res['list'][$key]['count2']:0;
            $res['list'][$key]['count3']= isset($res['list'][$key]['count3'])?$res['list'][$key]['count3']:0;
            $count1[$key] = $res['list'][$key]['count1'];
            $count2[$key] = $res['list'][$key]['count2'];
        }
        $res['sum_count1'] = array_sum($count1);
        $res['sum_count2'] = array_sum($count2);
        $res['park'] = DB::name("park")->field("id,name")->select();
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $temp['num'] =  $arr[$k];
            array_unshift($res['list'][$k], $temp['num']);
        }
    //   p_r($res);die();
        return $res;     
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
        $res['list'] = DB::query('SELECT  a.name,c.expend,b.income FROM dino_park a LEFT  JOIN ( SELECT `park_id`,sum(price) income FROM `dino_incomeexpenditure` '.$where1.' GROUP BY park_id ) b ON b.park_id=a.id LEFT  JOIN ( SELECT `park_id`,sum(price) expend FROM `dino_incomeexpenditure` '.$where3.' GROUP BY park_id ) c ON c.park_id=a.id '.$where2.'');
        $res['num']  = count($res['list']);
        foreach ($res['list'] as $key => $value) {
            $income[$key] = $res['list'][$key]['income'];
            $expend[$key] = $res['list'][$key]['expend'];
            $res['list'][$key]['gain'] = $res['list'][$key]['income']-$res['list'][$key]['expend'];
            $res['list'][$key]['income']= isset($res['list'][$key]['income'])?$res['list'][$key]['income']:0;
            $res['list'][$key]['expend']= isset($res['list'][$key]['expend'])?$res['list'][$key]['expend']:0;
        }
        $res['sum_income'] = array_sum($income);
        $res['sum_expend'] = array_sum($expend);
        $res['park'] = DB::name("park")->field("id,name")->select();
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $temp['num'] =  $arr[$k];
            array_unshift($res['list'][$k], $temp['num']);
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