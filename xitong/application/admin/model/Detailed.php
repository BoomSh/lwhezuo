<?php
namespace app\admin\model;

use think\Model;
use think\DB;
class Detailed extends Common
{
    /*
    **客户管理展示页
     */
    public function detailed_list($where){
        $res['list'] = DB::name("customer")->where($where)->field("id,name,contact,sex,email,mobile,phone,number_type,id_number,address,remark,balance")->order("id desc")->select();
        foreach ($res['list'] as $k => $v) {
             $res['list'][$k]['k'] = $k;
             if($res['list'][$k]['sex'] == 0){
                $res['list'][$k]['sex'] = "保密";
             }else if($res['list'][$k]['sex'] == 2){
                   $res['list'][$k]['sex'] = "女";
             }else{
                   $res['list'][$k]['sex'] = "男";
             }
             $dis = DB::name("dictionary")->where("id",$res['list'][$k]['number_type'])->field("name")->find();
             if($dis){
                $res['list'][$k]['number_type'] = $dis['name'];
             }else{
                $res['list'][$k]['number_type'] = '未定义类型';
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
    **添加客户
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
                $where['type'] = 2;
                $find = DB::name("customer")->where("mobile",input("mobile"))->where($where)->field("COUNT(*)")->find();
                if($find['COUNT(*)'] != 0){
                    return "该手机号已被占有";
                }
                $add = DB::name("customer")->insert($data);
                if($add){
                    $this->lw_log("2","添加了业主名称为".input('name'),"Customer",'customer_add');
                    return "success";
                }else{
                    return "操作失败！请重新添加";
                }
        }else{
            /*查询字典的证件类型*/
            $res = DB::name("dictionary")->where("type",1)->where('status',1)->field("id,name")->select();
            return $res;
        }
    }
     /*
    **修改客户
     */
    public function detailed_edit(){
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
                $data['id'] = input("id");
                $where['mobile'] = input("mobile");
                $where['id'] = array("neq",input("id"));
                $where['type'] = 2;
                $find = DB::name("customer")->where($where)->field("COUNT(*)")->find();
                if($find['COUNT(*)'] != 0){
                    return "该手机号已被占有";
                }
                $edit = DB::name("customer")->update($data);
                if($edit){
                    $this->lw_log("4","修改了业主名称为".input('name'),"Customer",'customer_edit');
                    return "success";
                }else{
                    return "操作失败！请重新添加";
                }
        }else if(request()->isGet()){
            $res['list'] = DB::name("customer")->where("id",input('id'))->field('id,name,contact,alias1,alias2,alias3,sex,email,mobile,phone,number_type,id_number,address,remark')->find();
            $res['dic'] = DB::name("dictionary")->where("type",1)->where('status',1)->field("id,name")->select();
            return $res;
        }
    }
 /*
    **删除客户
     */
    public function detailed_del(){
        if(request()->isPost()){
            $whild['k.id'] = array("in",input('id'));
            $whild['c.status'] = 1;
            $find = DB::name("water")->alias("w")->join("water_contract c","c.water_id=w.id")->join("contract h","h.id=c.contract_id")->join("customer k","h.lease_id=k.id")->where($whild)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] !== 0 ){
                return "该业主存在有效的合同或者水表,无法删除";
            }
            $where['id'] = array("in",input('id'));
            $where['status'] = 2;
            $log = DB::name("customer")->where($where)->field('name')->select();
            foreach ($log as $k => $v) {
                $this->lw_log("3","删除了业主名称为".$log[$k]['name'],"Customer",'customer_del');
            }
            $res = DB::name("customer")->update($where);
            if($res){
                return "success";
            }else{
                return "操作失败!";
            }
        }else{
            return "请选择删除的信息";
        }
    }


}