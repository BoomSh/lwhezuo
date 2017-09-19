<?php
function p_r($arr){
    return dump($arr,1,"<pre>",0);
}
/*格式化日期*/
function dateFormat($time){
    return date("Y-m-d h:i:s",$time);
}
/*客户类型*/
function customerType($type){
    switch ($type) {
    	case 1:
    		$customer_type = "客户";
    		break;
    	case 2:
    		$customer_type = "业主";
    		break;
    	default:
    		$customer_type = "外联";
    		break;
    }
    return $customer_type;
}
/*园区*/
function parkId($park_id){
    $res =  db('park')->where('id',$park_id)->select();
    if($res){
    	return $res[0]['name'];
    }
}
/*客户名字*/
function customerName($customer_id){
	$res =  db('customer')->where('id',$customer_id)->select();
	 if($res){
    	return $res[0]['name'];
    }
}
/*员工名字*/
function staffName($staff_id){
	$res =  db('staff')->where('id',$staff_id)->select();
	 if($res){
    	return $res[0]['name'];
    }
}
/*字典值*/
function dictionaryName($dictionary_id){
    $res =  db('dictionary')->where('id',$dictionary_id)->select();
	 if($res){
    	return $res[0]['name'];
    }
}

