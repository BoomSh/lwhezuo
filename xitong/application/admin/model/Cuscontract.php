<?php
namespace app\admin\model;

use think\Model;
use think\DB;
class Cuscontract extends Common
{
    /*
    **业主合同
     */
    public function cuscontract_list($where){
        $res['list'] = DB::name("contract")->where($where)->field("id,contract_num,lease_id,tenantry_id,park_id,house_id,business_scope,lease_area,client_source,time_effect,time_end,time_begin,first_rent,basic_rent,remark")->order("id desc")->select();
        foreach ($res['list'] as $k => $v) {
            $dis = DB::name("dictionary")->where("id",$res['list'][$k]['client_source'])->field("name")->find();
             if($dis){
                $res['list'][$k]['client_source'] = $dis['name'];
             }else{
                $res['list'][$k]['client_source'] = '未定义类型';
             }
        }
        /*获取信息的数量*/
        $res['num'] = count($res['list']);
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num'] = $arr[$k];
        }
        return $res;
    }
    /*
    **添加业主
     */
    public function detailed_add(){
        if(request()->isPost()){
                $data['name'] = input("name");
                $data['contact'] = input("contact");
                $data['alias1'] = input("alias1");
                $data['alias2'] = input("alias2");
                $data['alias3'] = input("alias3");
                $data['sex'] = input("sex");
                $data['email'] = input("email");
                $data['mobile'] = input("mobile");
                $data['phone'] = input("phone");
                $data['number_type'] = input("number_type");
                $data['id_number'] = input("id_number");
                $data['address'] = input("address");
                $data['remark'] = input("remark");
                $data['balance'] = 0;
                $data['type'] = 2;
                if(empty($data['name'])){
                    return "用户名不能为空";
                }
                if(empty($data['contact'])){
                    return "联系人不能为空";
                }
                if(empty($data['mobile'])){
                    return "手机号不能为空";
                }
                if(empty($data['email'])){
                    return "email不能为空";
                }
                if(empty($data['mobile'])){
                    return "手机号码不能为空";
                }
                $add = DB::name("customer")->insert($data);
                if($add){
                    $this->lw_log("2","添加了业主名称为".input('name'),"Customer",'customer_add');
                    return json(['type'=>1,'message'=>$data['name']]);
                }else{
                    return json(['type'=>2,'message'=>"操作失败！请重新添加"]);
                }
        }else{
            /*查询字典的证件类型*/
            $res = DB::name("dictionary")->where("type",1)->where('status',1)->field("id,name")->select();
            return $res;
        }
    }

     /*
    **异步查询相关的内容
    **val 输入的值   type 类型 1为业主  2公司  3为 园区
    ** 返回 html
     */
    public function cuscontract_find(){
        if(request()->isPost()){
            $html = '';
                if(input('type') == 1){
                    //返回类似的业主信息
                    $where['name'] = array("like","%".input("val")."%");
                    $where['type'] = 2;
                    //$where['status'] = 1;
                    $res = DB::name("customer")->where($where)->field("name")->limit(0,7)->select();
                    foreach($res as $k => $v){
                        $html .= "<li>".$res[$k]['name']."</li>";
                    }
                }else if(input('type') == 2){
                    //返回类似公司信息
                    $where['name'] = array("like","%".input("val")."%");
                     $res = DB::name("company")->where($where)->field("name")->limit(0,7)->select();
                     foreach($res as $k => $v){
                        $html .= "<li>".$res[$k]['name']."</li>";
                    }
                }else{
                     //返回类似的园区信息
                     $where['name'] = array("like","%".input("val")."%");
                     $res = DB::name("park")->where($where)->field("name")->limit(0,7)->select();
                     foreach($res as $k => $v){
                        $html .= "<li>".$res[$k]['name']."</li>";
                    }
                }
                return $html;
        }
    }
 /*
    **添加公司
     */
        public function company_add(){
            if(request()->isPost()){
               $data['name']           = input('name');
            $data['license_number'] = input('license_number');
            $data['address']        = input('address');
            $data['legal']          = input('legal');
            $data['legal_mobile']   = input('legal_mobile');

            $data['contact']          = input('contact');
            $data['contact_mobile']   = input('contact_mobile');
            $data['contact_phone']    = input('contact_phone');
            $data['remark']           = input('remark');
            $data['create_time']      = time();
            $data['create_id']        = $_SESSION['id'];
            if(empty(input('name'))){
                return "请填写公司名";     
            }
            if(empty(input('license_number'))){
                return "统一社会信用代码";     
            }
            if(empty(input('address'))){
                return "请填写地址";     
            }
            if(empty(input('legal'))){
                return "请填写法人代表";     
            }
            if(empty(input('legal_mobile'))){
                return "请填写联系电话";     
            }
             /*判断公司名是否被占用*/
            $find = DB::name("company")->where("name",$data['name'])->field("COUNT(*)")->find();
            if($find['COUNT(*)'] != 0){
                return json(['type'=>2,'message'=>"该登录名已被占用"]);
            }
            foreach (input('bank_number/a') as $key => $value) {
                if(empty(input('bank_number/a')[$key])) {
                    return json(['type'=>2,'message'=>"请填写银行账号"]);
                }
                $datas[$key]['bank_number'] = input('bank_number/a')[$key];
            }  
            foreach (input('bank_name/a') as $key => $value) {
                if(empty(input('bank_name/a')[$key])) {
                    return json(['type'=>2,'message'=>"请填写银行账户"]);
                }
                $datas[$key]['bank_name'] = input('bank_name/a')[$key];
            }
            foreach (input('bankname/a') as $key => $value) {
                $datas[$key]['name'] = input('bankname/a')[$key];
            }
            Db::startTrans();
            $resCompaty = DB::name("company")->insertGetId($data);
            foreach ($datas as $key => $value) {
                $datas[$key]['company_id'] = $resCompaty;
            }
            // /p_r($datas);die();
            $resBank = DB::name("bank")->insertAll($datas);

            if($resCompaty && $resBank){
                Db::commit();
                $this->lw_log("2","添加了公司为".input('name'),"Enterprise",'company_list');
                return json(['type'=>1,'message'=>input('name')]);
            }else{
                Db::rollback();
               return json(['type'=>2,'message'=>$data['name']]);
            }
        }else{
                $where = array('type'=>2,"status"=>1);
                $res = DB::name("dictionary")->where($where)->order("id desc")->field("id,type,name,status")->select();
                return $res;
            }
        }
        /*
    ** 业主添加合同
     */
    public function cuscontract_add(){
        if(request()->isPost()){
            return 1;
        }else{
             $res = DB::name("dictionary")->where("type",4)->where('status',1)->field("id,name")->select();
            return $res;
        }

    }

}