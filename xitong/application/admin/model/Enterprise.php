<?php
namespace app\admin\model;

use think\Model;
use think\Db;
class Enterprise extends Common
{   
    /**
     * 获取公司信息
     * @return [type] [description]
     */
    public function company_list($where){
        $res['list'] = DB::name("company")->where($where)->order("id desc")->field("id,name,license_number,legal,legal_mobile,contact,contact_mobile,contact_phone,address")->select();
        $res['num']  = count($res['list']);
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num']  = $arr[$k]; 
            $res['list'][$k]['bank'] =  DB::name("bank")->where(array('company_id'=>$res['list'][$k]['id']))->order("id asc")->find(); 
        }
        return $res;
    }
    /**
     * 获取银行信息
     * @return [type] [description]
     */
    public function bank_info(){
        $where = array('type'=>2,"status"=>1);
        $res = DB::name("dictionary")->where($where)->order("id desc")->field("id,type,name,status")->select();
        return $res;
    }
    /**
     * 新增公司信息
     * @return [type] [description]
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
                return "该登录名已被占用";
            }
            foreach (input('bank_number/a') as $key => $value) {
                if(empty(input('bank_number/a')[$key])) {
                    return "请填写银行账号";
                }
                $datas[$key]['bank_number'] = input('bank_number/a')[$key];
            }  
            foreach (input('bank_name/a') as $key => $value) {
                if(empty(input('bank_name/a')[$key])) {
                    return "请填写银行账户";
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
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }

    }

}