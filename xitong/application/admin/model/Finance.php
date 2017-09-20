<?php
namespace app\admin\model;

use think\Model;
use think\DB;
class Finance extends Common
{
    /**
     * 收入列表
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_list($where){
        $res['list'] = DB::name("incomeexpenditure")->where($where)->order("id desc")->field("id,pay_time,customer_type,park_id,payment_id,payee_id,dictionary_id,pay_type,price,remark")->select();
        $res['num']  = count($res['list']);
        $res['park'] = DB::name("park")->field("id,name")->select();
        $res['dictionary'] = DB::name("dictionary")->where('type',3)->field("id,name")->select();
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num']  = $arr[$k];  
        }
        return $res;
    }
    /**
     * 新增收入
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_add(){
       if(request()->isPost()){
            /*必选*/
            $data['park_id']           = input('park_id');
            $data['payment_id']        = input('payment_id');
            $data['payee_id']          = input('payee_id');
            $data['customer_type']     = input('customer_type');
            $data['dictionary_id']     = input('dictionary_id');
            $data['pay_type']          = input('pay_type');
            $data['pay_time']          = strtotime(input('pay_time'));
            $data['price']             = input('price');
            /*非必选*/
            $data['remark']      = input('remark');
            /*自动*/
            $data['type']          = 1;
            $data['status']        = 1;
            $data['create_time']   = time();
            $data['create_id']     = $_SESSION['id'];
            if(empty(input('customer_type'))){
                return "请选择客户类型";     
            }
            if(empty(input('park_id'))){
                return "请选择园区";     
            }
            if(empty(input('payee_id'))){
                return "请选择付款人";     
            }
            if(empty(input('payment_id'))){
                if(3!=input('customer_type')){
                    return "请选择收款人";
                }
                else{
                    if(empty(input('payment_name'))){
                        return "请选择收款人";   
                    }
                }     
            }
            if(empty(input('dictionary_id'))){
                return "请选择费用科目";     
            }
            if(empty(input('pay_type'))){
                return "请选择支付类型";     
            }
            if(empty(input('pay_time'))){
                return "请填写支付时间";     
            }
            if(empty(input('price'))){
                return "请填写金额";     
            }
            if(3!=input('customer_type')){
                $compare = DB::name("customer")->where(array('type'=>input('customer_type'),'id'=>input('payment_id')))->field("COUNT(*)")->find();
                if($compare['COUNT(*)'] == 0){
                     return "客户类型和收款人不匹配";
                }
            }
            Db::startTrans();
            $resCustomer = true;
            if(3==input('customer_type')){
                $datas['type'] = 3;
                $datas['name'] = input('payment_name');
                $resCustomer = DB::name("customer")->insertGetId($datas);
                $data['payment_id']          = $resCustomer;
            }
            // /p_r($datas);die();
            $res = DB::name("incomeexpenditure")->insert($data);

            if($resCustomer && $res){
                Db::commit();
                $this->lw_log("2","添加了收入为".input('price'),"Finance",'expenditure_list');
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }else if(request()->isGet()){
            $res['dictionary_id'] = DB::name('dictionary')->where("type",5)->where('status',1)->field("id,name")->select();
            $res['pay_type'] = DB::name('dictionary')->where("type",3)->where('status',1)->field("id,name")->select();
            return $res;
        }
    }
    /**
     * 修改收入
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_edit(){
        if(request()->isGet()){
            $res = DB::name("incomeexpenditure")->where("id",input('id'))->field("id,pay_time,customer_type,park_id,payment_id,payee_id,dictionary_id,pay_type,price,remark")->find();
            $res['dictionarysele'] = DB::name('dictionary')->where("type",5)->where('status',1)->field("id,name")->select();
            $res['paysele'] = DB::name('dictionary')->where("type",3)->where('status',1)->field("id,name")->select();
            return $res;
        }else if(request()->isPost()){
            $data['id'] = input('id');
           /*必选*/
            $data['park_id']           = input('park_id');
            $data['payment_id']        = input('payment_id');
            $data['payee_id']          = input('payee_id');
            $data['customer_type']     = input('customer_type');
            $data['dictionary_id']     = input('dictionary_id');
            $data['pay_type']          = input('pay_type');
            $data['pay_time']          = strtotime(input('pay_time'));
            $data['price']             = input('price');
            /*非必选*/
            $data['remark']      = input('remark');
            /*自动*/
            $data['type']          = 1;
            $data['status']        = 1;
            $data['update_time']   = time();
            $data['update_id']     = $_SESSION['id'];
            if(empty(input('customer_type'))){
                return "请选择客户类型";     
            }
            if(empty(input('park_id'))){
                return "请选择园区";     
            }
            if(empty(input('payee_id'))){
                return "请选择付款人";     
            }
            if(empty(input('payment_id'))){
                if(3!=input('customer_type')){
                    return "请选择收款人";
                }
                else{
                    if(empty(input('payment_name'))){
                        return "请选择收款人";   
                    }
                }     
            }
            if(empty(input('dictionary_id'))){
                return "请选择费用科目";     
            }
            if(empty(input('pay_type'))){
                return "请选择支付类型";     
            }
            if(empty(input('pay_time'))){
                return "请填写支付时间";     
            }
            if(empty(input('price'))){
                return "请填写金额";     
            }
            if(3!=input('customer_type')){
                $compare = DB::name("customer")->where(array('type'=>input('customer_type'),'id'=>input('payment_id')))->field("COUNT(*)")->find();
                if($compare['COUNT(*)'] == 0){
                     return "客户类型和付款人不匹配";
                }
            }
            $info = DB::name("incomeexpenditure")->where("id",input('id'))->field("id,pay_time,customer_type,park_id,payment_id,payee_id,dictionary_id,pay_type,price,remark")->find();
            Db::startTrans();
            $resCustomer = true;
            if( 3==input('customer_type')&&$info['customer_type']!=3 ){//原来不是外联现在改成外链
                $datas['type'] = 3;
                $datas['name'] = input('payment_name');
                $resCustomer = DB::name("customer")->insertGetId($datas);
                $data['payment_id']          = $resCustomer;
            }else if(3!=input('customer_type')&&$info['customer_type']==3){//原来是外联现在改成不是外链
               $resCustomer = DB::name("customer")->where('id',$info['payment_id'])->delete();
            }else if(3==input('customer_type')&&$info['customer_type']==3){
                $datas['name'] = input('payment_name');
                $datas['id'] = $info['payment_id'];
                $resCustomer = DB::name("customer")->update($datas);
                $data['payment_id']          = $info['payment_id']; 
            }
            $resIncom = DB::name("incomeexpenditure")->update($data);
            if($resCustomer!==false&&$resIncom!==false){
                $this->lw_log("4","修改了收入为".input('price'),"Finance",'expenditure_list');
                Db::commit();
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }
    }
    /**
     * 支出列表
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_list($where){
        $res['list'] = DB::name("incomeexpenditure")->where($where)->order("id desc")->field("id,pay_time,customer_type,park_id,payment_id,payee_id,dictionary_id,pay_type,price,remark")->select();
        $res['num']  = count($res['list']);
        $res['park'] = DB::name("park")->field("id,name")->select();
        $res['dictionary'] = DB::name("dictionary")->where('type',3)->field("id,name")->select();
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num']  = $arr[$k];  
        }
        return $res;
    }
    /**
     * 新增支出
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_add(){
        if(request()->isPost()){
            /*必选*/
            $data['park_id']           = input('park_id');
            $data['payment_id']        = input('payment_id');
            $data['payee_id']          = input('payee_id');
            $data['customer_type']     = input('customer_type');
            $data['dictionary_id']     = input('dictionary_id');
            $data['pay_type']          = input('pay_type');
            $data['pay_time']          = strtotime(input('pay_time'));
            $data['price']             = input('price');
            /*非必选*/
            $data['remark']      = input('remark');
            /*自动*/
            $data['type']          = 2;
            $data['status']        = 1;
            $data['create_time']   = time();
            $data['create_id']     = $_SESSION['id'];
            if(empty(input('customer_type'))){
                return "请选择客户类型";     
            }
            if(empty(input('park_id'))){
                return "请选择园区";     
            }
            if(empty(input('payment_id'))){
                return "请选择付款人";     
            }
            if(empty(input('payee_id'))){
                if(3!=input('customer_type')){
                    return "请选择收款人";
                }
                else{
                    if(empty(input('payee_name'))){
                        return "请选择收款人";   
                    }
                }     
            }
            if(empty(input('dictionary_id'))){
                return "请选择费用科目";     
            }
            if(empty(input('pay_type'))){
                return "请选择支付类型";     
            }
            if(empty(input('pay_time'))){
                return "请填写支付时间";     
            }
            if(empty(input('price'))){
                return "请填写金额";     
            }
            if(3!=input('customer_type')){
                $compare = DB::name("customer")->where(array('type'=>input('customer_type'),'id'=>input('payee_id')))->field("COUNT(*)")->find();
                if($compare['COUNT(*)'] == 0){
                     return "客户类型和收款人不匹配";
                }
            }
            Db::startTrans();
            $resCustomer = true;
            if(3==input('customer_type')){
                $datas['type'] = 3;
                $datas['name'] = input('payee_name');
                $resCustomer = DB::name("customer")->insertGetId($datas);
                $data['payee_id']          = $resCustomer;
            }
            // /p_r($datas);die();
            $res = DB::name("incomeexpenditure")->insert($data);

            if($resCustomer && $res){
                Db::commit();
                $this->lw_log("2","添加了支出为".input('price'),"Finance",'expenditure_list');
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }else if(request()->isGet()){
            $res['dictionary_id'] = DB::name('dictionary')->where("type",5)->where('status',1)->field("id,name")->select();
            $res['pay_type'] = DB::name('dictionary')->where("type",3)->where('status',1)->field("id,name")->select();
            return $res;
        }
    }
    /**
     * 修改支出
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_edit(){
        if(request()->isGet()){
            $res = DB::name("incomeexpenditure")->where("id",input('id'))->field("id,pay_time,customer_type,park_id,payment_id,payee_id,dictionary_id,pay_type,price,remark")->find();
            $res['dictionarysele'] = DB::name('dictionary')->where("type",5)->where('status',1)->field("id,name")->select();
            $res['paysele'] = DB::name('dictionary')->where("type",3)->where('status',1)->field("id,name")->select();
            return $res;
        }else if(request()->isPost()){
            $data['id'] = input('id');
           /*必选*/
            $data['park_id']           = input('park_id');
            $data['payment_id']        = input('payment_id');
            $data['payee_id']          = input('payee_id');
            $data['customer_type']     = input('customer_type');
            $data['dictionary_id']     = input('dictionary_id');
            $data['pay_type']          = input('pay_type');
            $data['pay_time']          = strtotime(input('pay_time'));
            $data['price']             = input('price');
            /*非必选*/
            $data['remark']      = input('remark');
            /*自动*/
            $data['type']          = 2;
            $data['status']        = 1;
            $data['update_time']   = time();
            $data['update_id']     = $_SESSION['id'];
            if(empty(input('customer_type'))){
                return "请选择客户类型";     
            }
            if(empty(input('park_id'))){
                return "请选择园区";     
            }
            if(empty(input('payment_id'))){
                return "请选择付款人";     
            }
            if(empty(input('payee_id'))){
                if(3!=input('customer_type')){
                    return "请选择收款人";
                }
                else{
                    if(empty(input('payee_name'))){
                        return "请选择收款人";   
                    }
                }     
            }
            if(empty(input('dictionary_id'))){
                return "请选择费用科目";     
            }
            if(empty(input('pay_type'))){
                return "请选择支付类型";     
            }
            if(empty(input('pay_time'))){
                return "请填写支付时间";     
            }
            if(empty(input('price'))){
                return "请填写金额";     
            }
            if(3!=input('customer_type')){
                $compare = DB::name("customer")->where(array('type'=>input('customer_type'),'id'=>input('payee_id')))->field("COUNT(*)")->find();
                if($compare['COUNT(*)'] == 0){
                     return "客户类型和收款人不匹配";
                }
            }
            $info = DB::name("incomeexpenditure")->where("id",input('id'))->field("id,pay_time,customer_type,park_id,payment_id,payee_id,dictionary_id,pay_type,price,remark")->find();
            Db::startTrans();
            $resCustomer = true;
            if( 3==input('customer_type')&&$info['customer_type']!=3 ){//原来不是外联现在改成外链
                $datas['type'] = 3;
                $datas['name'] = input('payee_name');
                $resCustomer = DB::name("customer")->insertGetId($datas);
                $data['payee_id']          = $resCustomer;
            }else if(3!=input('customer_type')&&$info['customer_type']==3){//原来是外联现在改成不是外链
               $resCustomer = DB::name("customer")->where('id',$info['payee_id'])->delete();
            }else if(3==input('customer_type')&&$info['customer_type']==3){
                $datas['name'] = input('payee_name');
                $datas['id'] = $info['payee_id'];
                $resCustomer = DB::name("customer")->update($datas);
                $data['payee_id']          = $info['payee_id']; 
            }
            $resIncom = DB::name("incomeexpenditure")->update($data);
            if($resCustomer!==false&&$resIncom!==false){
                $this->lw_log("4","修改了支出为".input('price'),"Finance",'expenditure_list');
                Db::commit();
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }
    }
     /**
     * 支出异步获取下拉选项数据
     * @return [type] [description]
     */
    public function expenditure_selectinfo(){
        $type = input('type');//字段类型
        $name = input('name');//字段名字
        $customer_type = input('customer_type');//客户类型
        switch ($type) {
            case 1:
                $where['name'] = array("like","%".$name."%");
                $res           = DB::name('park')->where($where)->field('id,name')->select();
                break;

            case 2:
                $where['name'] = array("like","%".$name."%");
                $res = DB::name('staff')->where($where)->field('id,name,mobile')->select();
                foreach ($res as $key => $value) {
                    $res[$key]['name'] = $res[$key]['name']." (".array_shift(explode(',',$res[$key]['mobile'])).")";
                }
                break;

            default:
                if(1==$customer_type){
                    $where['name'] = array("like","%".$name."%");
                    $where['type'] = 1;
                    $where['status'] = 1;
                    $res = DB::name('customer')->where($where)->field('id,name,mobile')->select();
                    foreach ($res as $key => $value) {
                        $res[$key]['name'] = $res[$key]['name']." (".array_shift(explode(',',$res[$key]['mobile'])).")";
                    }
                }else if(2==$customer_type){
                    $where['name'] = array("like","%".$name."%");
                    $where['type'] = 2;
                    $where['status'] = 1;
                    $res = DB::name('customer')->where($where)->field('id,name,mobile')->select();
                    foreach ($res as $key => $value) {
                        $res[$key]['name'] = $res[$key]['name']." (".array_shift(explode(',',$res[$key]['mobile'])).")";
                    }
                }
                
                break;
        }
        return $res;
    }
}