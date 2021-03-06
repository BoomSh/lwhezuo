<?php
namespace app\admin\model;

use think\Model;
use think\DB;
use \think\Exception;
class Cuscontract extends Common
{
    /*
    **业主合同
     */
    public function cuscontract_list($where){
        $res['list'] = DB::name("contract")
                        ->alias("c")
                        ->join("customer t","t.id=c.lease_id")
                        ->join('company p',"p.id=c.tenantry_id")
                        ->join('park k',"k.id=c.park_id")
                        ->where($where)
                        ->field("c.*,t.name as tname,p.name as pname,k.name as kname")
                        ->order("c.id desc")
                        ->select();
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
    **删除合同
     */
    public function cuscontract_del(){
            if(request()->isPost()){
                $data['id'] = array("in",input('id'));
                $data['status'] = 1;
                $find = DB::name('contract')->where($data)->field("COUNT(*)")->find();
                if($find['COUNT(*)'] == 0){
                    //开启事物
                    Db::startTrans();
                    //合同到期或者退租直接删除
                    $wlog['id'] = array("in",input('id'));
                    $log = DB::name("contract")->where($wlog)->field('id,contract_num')->select();
                    foreach ($log as $k => $v) {
                        //删除对应的电表信息
                        $d_find = DB::name("electric_contract")->where("contract_id",$log[$k]['id'])->field("electric_id")->select();
                        foreach($d_find as $dk => $dv){
                            $d_del1 = DB::name("electric")->where("id",$d_find[$k]['electric_id'])->delete();
                            $d_del2 = DB::name("electric_price")->where("electric_id",$d_find[$k]['electric_id'])->delete();
                        }
                        $d_del3 = DB::name("electric_contract")->where("contract_id",$log[$k]['id'])->delete();
                        //删除对应的水表信息
                        $s_find = DB::name("water_contract")->where("contract_id",$log[$k]['id'])->field("water_id")->select();
                        foreach($s_find as $dk => $dv){
                            $s_del1 = DB::name("water")->where("id",$s_find[$k]['water_id'])->delete();
                            $s_del2 = DB::name("water_price")->where("water_id",$s_find[$k]['water_id'])->delete();
                        }
                        $s_del3 = DB::name("water_contract")->where("contract_id",$log[$k]['id'])->delete();
                        //删除对应的租金信息
                        $r_del = DB::name("rent")->where("contract_id",$log[$k]['id'])->delete();
                        $this->lw_log("3","删除了字段为".$log[$k]['contract_num'],"Cuscontract",'cuscontract_list');
                    }
                    $c_del = DB::name("contract")->where($wlog)->delete();
                    if($d_del1 && $d_del2 && $s_del1 && $s_del2 && $c_del && $s_del3 && $d_del3){
                        Db::commit();
                        return "success";
                    }else{
                        Db::rollback();
                        return "操作失败";
                    }
                }else{
                    return "合同未到期或者还没退租,无法直接删除";
                }
            }
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
                $add = DB::name("customer")->insertGetId($data);
                if($add){
                    $this->lw_log("2","添加了业主名称为".input('name'),"Cuscontract",'customer_add');
                    return json(['type'=>1,'message'=>$data['name'],'id'=>$add]);
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
                    $res = DB::name("customer")->where($where)->field("id,name")->limit(0,7)->select();
                    foreach($res as $k => $v){
                        $html .= "<li li_id='".$res[$k]['id']."'>".$res[$k]['name']."</li>";
                    }
                }else if(input('type') == 2){
                    //返回类似公司信息
                    $where['name'] = array("like","%".input("val")."%");
                     $res = DB::name("company")->where($where)->field("id,name")->limit(0,7)->select();
                     foreach($res as $k => $v){
                        $html .= "<li li_id='".$res[$k]['id']."'>".$res[$k]['name']."</li>";
                    }
                }else if(input('type') == 3){
                     //返回类似的园区信息
                     $where['name'] = array("like","%".input("val")."%");
                     $res = DB::name("park")->where($where)->field("id,name")->limit(0,7)->select();
                     foreach($res as $k => $v){
                        $html .= "<li li_id='".$res[$k]['id']."'>".$res[$k]['name']."</li>";
                    }
                }else if(input('type') == 4){
                    $where['type'] = 6;
                    $where['name'] = array("like","%".input("val")."%");
                    $res = DB::name("dictionary")->where($where)->field("id,name")->limit(0,7)->select();
                     foreach($res as $k => $v){
                        $html .= "<li li_id='".$res[$k]['id']."'>".$res[$k]['name']."</li>";
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
                return json(['type'=>2,'message'=>"该公司名已被占用"]);
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
                $this->lw_log("2","添加了公司为".input('name'),"Cuscontract",'company_list');
                return json(['type'=>1,'message'=>input('name'),'id'=>$resCompaty]);
            }else{
                Db::rollback();
               return json(['type'=>2,'message'=>"操作失败！请重新添加"]);
            }
        }else{
                $where = array('type'=>2,"status"=>1);
                $res = DB::name("dictionary")->where($where)->order("id desc")->field("id,type,name,status")->select();
                return $res;
            }
        }
     /**
     *新增园区
     * @return [type] [description]
     */
    public function garden_add(){
        $data['name']            = input('name');
        $data['address']         = input('address');
        $data['company_id']      = input('company_id');
        $data['bank_id']         = input('bank_id');
        $data['finance_id']      = input('finance_id');
        $data['managers_id']     = input('managers_id');
        $data['create_time']     = time();
        $data['create_id']       = $_SESSION['id']; 
        if(empty(input('name'))){
            return json(['type'=>2,'message'=>"请填园区名"]);
        }
        if(empty(input('address'))){
            return json(['type'=>2,'message'=>"请填写地址"]);
        }
        if(empty(input('company_id'))){
            return json(['type'=>2,'message'=>"请选择正确的公司名"]);
        }
        if(empty(input('bank_id'))){
            return json(['type'=>2,'message'=>"请选择正确的账户名"]);
        }
        if(empty(input('finance_id'))){
            return json(['type'=>2,'message'=>"请选择正确财务人"]); 
        }
        if(empty(input('managers_id'))){
            return json(['type'=>2,'message'=>"请选择正确管理人"]);
        }
        $where['name'] = input('name');
        $find = DB::name("park")->where($where)->field("COUNT(*)")->find();
        if($find['COUNT(*)'] != 0){
             return json(['type'=>2,'message'=>"该园区名已经被占用"]);
        }
        $compare = DB::name("bank")->where(array('company_id'=>input('company_id'),'id'=>input('bank_id')))->field("COUNT(*)")->find();
        if($compare['COUNT(*)'] == 0){
             return json(['type'=>2,'message'=>"公司和账户不匹配"]);
        }
        $res = DB::name("park")->insertGetId($data);
        if($res){
            $this->lw_log("2","添加了园区为".input('name'),"Cuscontract",'garden_list');
            return json(['type'=>1,'message'=>input('name'),'id'=>$res]);
        }else{
            return json(['type'=>2,'message'=>"操作失败！请重新添加"]);
        }

    }
        /*
    ** 业主添加合同
     */
    public function cuscontract_add(){
        if(request()->isPost()){
            if(empty(input('lease_id'))){
                return "请选择一个出租方";
            }
            if(empty(input('ctenantry_id'))){
                return "请选择一个承租方";
            }
            if(empty(input('park_id'))){
                return "请选择一个园区";
            }
            if(empty(input('lessee_area'))){
                return "请填写承租面积";
            }
            if(empty(input('lease_area'))){
                return "请填写出租面积";
            }
            if(empty(input('business_scope'))){
                return "请填写经营范围";
            }
            if(empty(input('client_source'))){
                return "请填写客户来源";
            }
            if(empty(input('ztime_begin'))){
                return "请填写租期起始时间";
            }
            if(empty(input('ztime_end'))){
                return "请填写租期结束时间";
            }
            if(empty(input('time_effect'))){
                return "请填写起租日期";
            }
            if(empty(input('contract_num'))){
                return "请填写合同号";
            }
            //开启事物
            Db::startTrans();
            $con['park_id'] = input('park_id');
            //判断园区id是否被占有
            $yqpd['id'] = input('park_id');
            $yqfind = DB::name('park')->where($yqpd)->field("contract_id")->find();
            if(!empty($yqfind['contract_id'])){
                return "该园区已被占用";
            }
            if(!empty(input('maintain_type'))){
                $con['maintain_type'] = input('maintain_type');
                if(input('maintain_type') == 4){
                    //固定费用 没有最高 最低
                    if(empty(input('maintain_value'))){
                        return "请输入维修基金的费用值";
                    }
                    $con['maintain_value'] = input('maintain_value');
                    $con['maintain_min'] = '';
                    $con['maintain_max'] = '';
                }else{
                    if(empty(input('maintain_min'))){
                        return "请输入最低费用";
                    }
                    if(empty(input('maintain_max'))){
                        return "请输入最高费用";
                    }
                    $con['maintain_value'] = input('maintain_value');
                    $con['maintain_min'] = input('maintain_min');
                    $con['maintain_max'] = input('maintain_max');
                }
            }
            if(!empty(input('tax_rate'))){
                $con['tax_rate'] = input('tax_rate');
                    if(empty(input('tax_value'))){
                        return "请输入税率值";
                    }
                    $con['tax_value'] = input('tax_value');
            }
            $con['lease_id'] = input('lease_id');
            $con['tenantry_id'] = input('ctenantry_id');
            $con['contract_num'] = input('contract_num');
            $con['business_scope'] = input('business_scope');
            $con['client_source'] = input('client_source');
            $con['time_begin'] = input('ztime_begin');
            $con['time_end'] = input('ztime_end');
            $con['time_effect'] = input('time_effect');
            $con['lessee_area'] = input('lessee_area');
            $con['lease_area'] = input('lease_area');
            $con['deposit'] = input('deposit');
            $con['basic_rent'] = input('basic_rent');
            $con['first_rent'] = input('first_rent');
            $con['first_time_begin'] = input('first_time_begin');
            $con['first_time_end'] = input('first_time_end');
            $con['ele_deposit'] = input('ele_deposit');
            $con['water_deposit'] = input('water_deposit');
            $y_monthly_value = input('y_monthly_value/a');
            $len = count($y_monthly_value);
            $con['others_deposit'] = 0;
            for($i=0;$i<$len;$i++){
                $con['others_deposit'] += $y_monthly_value[$i];
            }
            $con['remark'] = input('remark');
            $con['status'] = 1;
            $con['type'] = 2;
            $con['create_time'] = time();
            $con['create_id'] = $_SESSION['id'];
            //添加合同  获取合同id
            $c_where['time_end'] = array("gt",date("Y-m-d",time()));
            $c_where['contract_num'] = input('contract_num');
            $find = DB::name("contract")->where($c_where)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] !== 0){
                return "该合同号已经存在占用";
            }
            $contract = DB::name("contract")->insertGetId($con);
            $yqwhere['id'] = input('park_id');
            $yqwhere['contract_id'] = $contract;
            $parup = DB::name("park")->update($yqwhere);
            $monthly_type = input('monthly_type/a');
            $monthly_value = input('monthly_value/a');
            $time_begin = input('time_begin/a');
            $time_end = input('time_end/a');
            $rent = input('rent/a');
            $ren['contract_id'] = $contract;
            $len = count($monthly_type);
            if($len == 0){
                //即没有添加月租类型
                $zhujin = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if($i == 0){
                        if($time_begin[$i] < input('first_time_end')){
                            return "租金设置里，第1条月租类型开始时间不能小于首次租金的结束时间";
                        }
                    }else{
                        if($time_begin[$i] < $time_end[$i-1]){
                            return "租金设置里，第".($i+1)."条月租类型开始时间不能小于前面月租租金的结束时间";
                        }
                    }
                    if(empty($monthly_type[$i])){
                        return "租金设置里，第".($i+1)."条请选择月租类型";
                    }
                    if($monthly_value[$i] == ''){
                        return "租金设置里，第".($i+1)."条请选择月租值";
                    }
                    if(empty($time_begin[$i])){
                        return "租金设置里，第".($i+1)."条请选择月租初始时间";
                    }
                    if(empty($time_end[$i])){
                        return "租金设置里，第".($i+1)."条请选择月租结束时间";
                    }
                    if($rent[$i] == ''){
                        return "租金设置里，第".($i+1)."条请选择月租租金";
                    }

                    $ren['exacct'] = 0;
                    $ren['monthly_type'] = $monthly_type[$i];
                    $ren['monthly_value'] = $monthly_value[$i];
                    $ren['time_begin'] = $time_begin[$i];
                    $ren['time_end'] = $time_end[$i];
                    $ren['rent'] = $rent[$i];
                    $zhujin = DB::name("rent")->insert($ren);
                }
            }
            $number = input('number/a');
            $details = input('details/a');
            $transf['contract_id'] = $contract;
            $len = count($number);
            if($len == 0){
                //即没有添加变压器
                $bianyq = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if(!empty($number[$i])){
                            $transf['number'] = $number[$i];
                            $transf['details'] = $details[$i];
                            $bianyq = DB::name("transformer")->insert($transf);
                    }else{
                        $bianyq = 1;
                    }
                }
            }
            $dtenantry_zid = input('dtenantry_zid/a');
            $d_name = input('d_name/a');
            $d_init_record = input('d_init_record/a');
            $d_rate = input('d_rate/a');
            $d_init_record = input('d_init_record/a');
            $d_rate = input('d_rate/a');
            $d_loss = input('d_loss/a');
            $len = count($dtenantry_zid);
            if($len == 0){
                //0既没有电表 直接跳过
                $dianb = 1;
                $dianp = 1;
                $elecon = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if(!empty($dtenantry_zid[$i])){
                        $h = $i+1;
                        for($j=$h;$j<$len;$j++){
                            if($dtenantry_zid[$i] == $dtenantry_zid[$j] && $d_name[$i] == $d_name[$j]){
                                return "合同里不能存在相同的园区同名的电表";
                            }
                        }
                        if(empty($d_name[$i])){
                            return "电费设置,第".($i+1)."条请输入电表名";
                        }
                        if($d_init_record[$i] == ''){
                            return "电费设置,第".($i+1)."条请输电表初始度数";
                        }
                        if($d_rate[$i] == ''){
                            return "电费设置,第".($i+1)."条请输入电表倍率";
                        }
                        if($d_loss[$i] == ''){
                            return "电费设置,第".($i+1)."条请输入损耗";
                        }
                        $elec['park_id'] = $dtenantry_zid[$i];
                        $elec['name'] = $d_name[$i];
                        $elec['init_record'] = $d_init_record[$i];
                        $elec['rate'] = $d_rate[$i];
                        $elec['loss'] = $d_loss[$i];
                        $elec['create_time'] = time();
                        $elec['status'] = 1;
                        $elec['create_id'] = $_SESSION['id'];
                        $e_where['park_id'] = $dtenantry_zid[$i];
                        $e_where['name'] = $d_name[$i];
                        $e_where['status'] = 1;
                        $e_where['type'] = 1;
                        $e_find = DB::name("electric")->where($e_where)->field("COUNT(*)")->find();
                        if($e_find['COUNT(*)'] != 0){
                            return "该园区已经存在该".$d_name[$i];
                        }
                        $dianb = DB::name("electric")->insertGetId($elec);
                        $dbht['contract_id'] = $contract;
                        $dbht['electric_id'] = $dianb;
                        $elecon = DB::name("electric_contract")->insert($dbht);
                        $d_readings_begin = input("d_readings_begin_".$i."/a");
                        $d_readings_end = input("d_readings_end_".$i."/a");
                        $d_price = input("d_price_".$i."/a");
                        $d_len = count($d_readings_begin);
                        if($d_len == 0){
                            $dianp = 1;
                        }else{
                            for($j=0;$j<$d_len;$j++){
                                if($d_readings_begin[$j]!== '' && $d_readings_end[$j]!== '' && $d_price[$j]!== ''){
                                    $ds_price['electric_id'] = $dianb;
                                    $ds_price['readings_begin'] = $d_readings_begin[$j];
                                    $ds_price['readings_end'] = $d_readings_end[$j];
                                    $ds_price['price'] = $d_price[$j];
                                    $dianp = DB::name("electric_price")->insert($ds_price);
                                }else{
                                    $dianp = 1;
                                }
                            }
                        }
                    }else{
                        $elecon = 1;
                        $dianb = 1;
                        $dianp = 1;
                    }
                }
            }

            $stenantry_zid = input("stenantry_zid/a");
            $park_name = input("park_name/a");
            $s_init_record = input("s_init_record/a");
            $s_rate = input("s_rate/a");
            $s_loss = input("s_loss/a");
            $s_share = input("s_share/a");
            $len = count($stenantry_zid);
            if($len == 0){
                //没有水表 直接跳过
                $w_id = 1;
                $shuib = 1;
                $watercon = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if(!empty($stenantry_zid[$i])){
                        $h = $i+1;
                        for($j=$h;$j<$len;$j++){
                            if($park_name[$i] == $park_name[$j] && $stenantry_zid[$i] == $stenantry_zid[$j]){
                                return "合同里不能存在相同的园区同名的水表";
                            }
                        }
                        if(empty($park_name[$i])){
                            return "水费设置,第".($i+1)."条请输入水表名";
                        }
                        $water['name'] = $park_name[$i];
                        $water['park_id'] = $stenantry_zid[$i];
                        if(empty($s_init_record[$i])){
                            $water['init_record'] = 0;
                        }else{
                            $water['init_record'] = $s_init_record[$i];
                        }
                        if(empty($s_rate[$i])){
                            $water['rate'] = 0;
                        }else{
                            $water['rate'] = $s_rate[$i];
                        }
                        if(empty($s_loss[$i])){
                            $water['loss'] = 0;
                        }else{
                            $water['loss'] = $s_loss[$i];
                        }
                        $water['status'] = 1;
                        $water['create_time'] = time();
                        $water['create_id'] = $_SESSION['id'];
                        $w_where['name'] = $park_name[$i];
                        $w_where['park_id'] = $stenantry_zid[$i];
                        $w_where['type'] = 1;
                        $w_where['status'] = 1;
                        $w_find = DB::name("water")->where($w_where)->field("COUNT(*),id")->find();
                        if($w_find['COUNT(*)'] != 0){
                            $w_id = $w_find['id'];
                        }else{
                            $w_id = DB::name("water")->insertGetId($water);
                        }
                        if(empty($s_share[$i])){
                            $wcon['share'] = 0;
                        }else{
                            $wcon['share'] = $s_share[$i];
                        }
                        $wcon['water_id'] = $w_id;
                        $wcon['contract_id'] = $contract;
                        $wcon['status'] = 1;
                        $watercon = DB::name("water_contract")->insert($wcon);
                        $s_readings_begin = input("s_readings_begin_".$i."/a");
                        $s_readings_end = input("s_readings_end_".$i."/a");
                        $s_price = input("s_price_".$i."/a");
                        $s_len = count($s_readings_begin);
                        if($s_len == 0){
                            $shuib = 1;
                        }else{
                            for($j=0;$j<$s_len;$j++){
                                $wprice['water_id'] = $w_id;
                                $wprice['contract_id'] = $contract;
                                if($s_readings_begin[$j] !=='' && $s_readings_end[$j]!=='' && 
                                    $s_price[$j] !== ''){
                                    $wprice['readings_begin'] = $s_readings_begin[$j];
                                    $wprice['readings_end'] = $s_readings_end[$j];
                                    $wprice['price'] = $s_price[$j];
                                    $shuib = DB::name("water_price")->insert($wprice);
                                }else{
                                    $shuib = 1;
                                }
                            }
                            }
                    }else{
                        $shuib = 1;
                        $w_id = 1;
                        $watercon = 1;
                    }
                }

            }

            $exacct = input('exacct/a');
            $y_monthly_type = input('y_monthly_type/a');
            $y_monthly_value = input('y_monthly_value/a');
            $y_time_begin = input('y_time_begin/a');
            $y_time_end = input('y_time_end/a');
            $y_rent = input('y_rent/a');
            $feiy['contract_id'] = $contract;
            $len = count($y_monthly_type);
            if($len == 0){
                //即没有添加费用类型
                $feiyong = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if(empty($exacct[$i])){
                        return "其他费用设置里，第".($i+1)."条请选择费用科目";
                    }
                    if(empty($y_monthly_type[$i])){
                        return "其他费用设置里，第".($i+1)."条请选择月租类型";
                    }
                    if($y_monthly_value[$i] == ''){
                        return "其他费用设置里，第".($i+1)."条请选择月租值";
                    }
                    if($y_time_begin[$i] == ''){
                        return "其他费用设置里，第".($i+1)."条请选择月租初始时间";
                    }
                    if($y_time_end[$i] == ''){
                        return "其他费用设置里，第".($i+1)."条请选择月租结束时间";
                    }
                    /*if($y_rent[$i] == ''){
                        return "其他费用设置里，第".($i+1)."条请选择月租租金";
                    }*/
                    $j = $i + 1;
                    for($h=$j;$h<$len;$h++){
                        if($exacct[$i] == $exacct[$h]){
                            //判断时间是否起冲突
                            if($y_time_end[$i] > $y_time_begin[$h]){
                                return "其他费用设置里，第".($i+1)."与第".($h+1)."条时间起冲突";
                            }
                        }
                    }
                    if($y_time_begin[$i]>$y_time_end[$i]){
                        return "其他费用设置里，第".($i+1)."条起始时间不能小于结束时间";
                    }
                    $feiy['exacct'] = $exacct[$i];
                    $feiy['monthly_type'] = $y_monthly_type[$i];
                    $feiy['monthly_value'] = $y_monthly_value[$i];
                    $feiy['time_begin'] = $y_time_begin[$i];
                    $feiy['time_end'] = $y_time_end[$i];
                    $feiy['rent'] = $y_monthly_value[$i];
                    $feiyong = DB::name("rent")->insert($feiy);
                }
            }
            if($contract && $zhujin && $bianyq && $elecon && $dianb && $dianp && $w_id && $shuib && $watercon && $feiyong && $parup){
                Db::commit();
                $this->lw_log("2","增加了了合同号为".input('contract_num'),"Cuscontract",'cuscontract_list');
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }else{
             $res['cus'] = DB::name("dictionary")->where("type",4)->where('status',1)->field("id,name")->select();
             $res['fy'] = DB::name("dictionary")->where("type",5)->where('status',1)->field("id,name")->select();
            return $res;
        }

    }
    /*
    **合同退组
    */
    public function cuscontract_status(){
        if(request()->isPost()){
            //开启事物
            Db::startTrans();
            $datas['id'] =array("in",input('id'));
            $find = DB::name('contract')->where($datas)->field("id,contract_num,park_id")->select();
            foreach ($find as $k => $v) {
                $park['id'] = $find[$k]['park_id'];
                $park['contract_id'] = 0;
                $pagg = DB::name("park")->update($park);//开发园区
                $data['id'] = $find[$k]['id'];
                $data['status'] = 2;
                $data['update_time'] = time();
                $data['update_id'] = $_SESSION['id'];
                $res = DB::name("contract")->update($data);//更改合同
                $where['contract_id'] = $find[$k]['id'];
                $water['status'] = 2;
                $w_up = DB::name('water_contract')->where($where)->update($water);//水表失效
                $e_find = DB::name("electric_contract")->where($where)->field('electric_id')->select();
                $e_up = 1;
                foreach ($e_find as $ke => $ve) {
                        $elect['type'] = 2;
                         $e_up = DB::name('electric')->where("id",$e_find[$ke]['electric_id'])->update($elect);//电表假删
                         //return DB::name('electric')->getlastsql();
                }
            }
            //return DB::name("contract")->getlastsql();
            if($res!==false && $pagg!==false && $w_up !== false && $e_up !== false){
                Db::commit();
                $this->lw_log("4","退租了合同为".$find['contract_num'],"Cuscontract",'cuscontract_list');
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }
    }
     /*
    **修改合同
     */
    public function Cuscontract_edit(){
       $cus = model("Cuscontract");
        if(request()->isPost()){
            if(empty(input('lease_id'))){
                return "请选择一个出租方";
            }
            if(empty(input('ctenantry_id'))){
                return "请选择一个承租方";
            }
            if(empty(input('park_id'))){
                return "请选择一个园区";
            }
            if(empty(input('lessee_area'))){
                return "请填写承租面积";
            }
            if(empty(input('lease_area'))){
                return "请填写出租面积";
            }
            if(empty(input('business_scope'))){
                return "请填写经营范围";
            }
            if(empty(input('client_source'))){
                return "请填写客户来源";
            }
            if(empty(input('ztime_begin'))){
                return "请填写租期起始时间";
            }
            if(empty(input('ztime_end'))){
                return "请填写租期结束时间";
            }
            if(empty(input('time_effect'))){
                return "请填写起租日期";
            }
            if(empty(input('contract_num'))){
                return "请填写合同号";
            }
            //开启事物
            Db::startTrans();
            $find = DB::name("contract")->where("id",input("id"))->field("status")->find();
            if($find['status'] == 2){
                return "该合同已退租,无法修改信息";
            }
            $con['park_id'] = input('park_id');
            //判断园区id是否被占有
            $yqpd['contract_id'] = array("neq",input('id'));
            $yqpd['id'] = input('park_id');
            $yqfind = DB::name('park')->where($yqpd)->field("contract_id")->find();
            if(!empty($yqfind['contract_id'])){
                return "该园区已被占用";
            }
            if(!empty(input('maintain_type'))){
                $con['maintain_type'] = input('maintain_type');
                if(input('maintain_type') == 4){
                    //固定费用 没有最高 最低
                    if(empty(input('maintain_value'))){
                        return "请输入维修基金的费用值";
                    }
                    $con['maintain_value'] = input('maintain_value');
                    $con['maintain_min'] = '';
                    $con['maintain_max'] = '';
                }else{
                    if(empty(input('maintain_min'))){
                        return "请输入最低费用";
                    }
                    if(empty(input('maintain_max'))){
                        return "请输入最高费用";
                    }
                    $con['maintain_value'] = input('maintain_value');
                    $con['maintain_min'] = input('maintain_min');
                    $con['maintain_max'] = input('maintain_max');
                }
            }else{
                $con['maintain_min'] = '';
                $con['maintain_max'] = '';
                $con['maintain_value'] = '';
                $con['maintain_type'] = '';
            }
            if(!empty(input('tax_rate'))){
                $con['tax_rate'] = input('tax_rate');
                    if(empty(input('tax_value'))){
                        return "请输入税率值";
                    }
                    $con['tax_value'] = input('tax_value');
            }else{
                $con['tax_value'] = '';
                $con['tax_rate'] = '';
            }
            $con['id'] = input('id');
            $con['lease_id'] = input('lease_id');
            $con['tenantry_id'] = input('ctenantry_id');
            $con['contract_num'] = input('contract_num');
            $con['business_scope'] = input('business_scope');
            $con['client_source'] = input('client_source');
            $con['time_begin'] = input('ztime_begin');
            $con['time_end'] = input('ztime_end');
            $con['time_effect'] = input('time_effect');
            $con['lessee_area'] = input('lessee_area');
            $con['lease_area'] = input('lease_area');
            $con['deposit'] = input('deposit');
            $con['basic_rent'] = input('basic_rent');
            $con['first_rent'] = input('first_rent');
            $con['first_time_begin'] = input('first_time_begin');
            $con['first_time_end'] = input('first_time_end');
            $con['ele_deposit'] = input('ele_deposit');
            $con['water_deposit'] = input('water_deposit');
            $y_monthly_value = input('y_monthly_value/a');
            $len = count($y_monthly_value);
            $con['others_deposit'] = 0;
            for($i=0;$i<$len;$i++){
                $con['others_deposit'] += $y_monthly_value[$i];
            }
            $con['remark'] = input('remark');
            $con['status'] = 1;
            $con['type'] = 2;
            $con['create_time'] = time();
            $con['create_id'] = $_SESSION['id'];
            //添加合同  获取合同id
            $c_where['id'] = array("neq",input('id'));
            $c_where['time_end'] = array("gt",date("Y-m-d",time()));
            $c_where['contract_num'] = input('contract_num');
            $find = DB::name("contract")->where($c_where)->field("COUNT(*),park_id")->find();
            if($find['COUNT(*)'] !== 0){
                return "该合同号已经存在占用";
            }
            $find = DB::name("contract")->where("id",input("id"))->field("park_id")->find();
            if($find['park_id'] == input('park_id')){
                $pagg = 1;
                $parup = 1;
            }else{
                $yqgg['id'] = $find['park_id'];
                $yqgg['contract_id'] = 0;
                $pagg = DB::name("park")->update($yqgg);
                $yqwhere['id'] = input('park_id');
                $yqwhere['contract_id'] = input('id');
                $parup = DB::name("park")->update($yqwhere);
            }
            $find = DB::name("rent")->where("contract_id",input('id'))->field("COUNT(*)")->find();
            if($find['COUNT(*)'] !== 0){
                $del2 = DB::name("rent")->where("contract_id",input('id'))->delete();
            }else{
                $del2 = 1;
            }
            $contract = DB::name("contract")->update($con);
            $monthly_type = input('monthly_type/a');
            $monthly_value = input('monthly_value/a');
            $time_begin = input('time_begin/a');
            $time_end = input('time_end/a');
            $rent = input('rent/a');
            $ren['contract_id'] = input("id");
            $len = count($monthly_type);
            if($len == 0){
                //即没有添加月租类型
                $zhujin = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if($i == 0){
                        if($time_begin[$i] < input('first_time_end')){
                            return "租金设置里，第1条月租类型开始时间不能小于首次租金的结束时间";
                        }
                    }else{
                        if($time_begin[$i] < $time_end[$i-1]){
                            return "租金设置里，第".($i+1)."条月租类型开始时间不能小于前面月租租金的结束时间";
                        }
                    }
                    if(empty($monthly_type[$i])){
                        return "租金设置里，第".($i+1)."条请选择月租类型";
                    }
                    if($monthly_value[$i] == ''){
                        return "租金设置里，第".($i+1)."条请选择月租值";
                    }
                    if(empty($time_begin[$i])){
                        return "租金设置里，第".($i+1)."条请选择月租初始时间";
                    }
                    if(empty($time_end[$i])){
                        return "租金设置里，第".($i+1)."条请选择月租结束时间";
                    }
                    if($rent[$i] == ''){
                        return "租金设置里，第".($i+1)."条请选择月租租金";
                    }

                    $ren['exacct'] = 0;
                    $ren['monthly_type'] = $monthly_type[$i];
                    $ren['monthly_value'] = $monthly_value[$i];
                    $ren['time_begin'] = $time_begin[$i];
                    $ren['time_end'] = $time_end[$i];
                    $ren['rent'] = $rent[$i];
                    $zhujin = DB::name("rent")->insert($ren);
                }
            }
            $find = DB::name("transformer")->where("contract_id",input('id'))->field("COUNT(*)")->find();
            if($find['COUNT(*)'] !== 0){
                $del3 = DB::name("transformer")->where("contract_id",input('id'))->delete();
            }else{
                $del3 = 1;
            }
            $number = input('number/a');
            $details = input('details/a');
            $transf['contract_id'] = input("id");
            $len = count($number);
            if($len == 0){
                //即没有添加变压器
                $bianyq = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if(!empty($number[$i])){
                            $transf['number'] = $number[$i];
                            $transf['details'] = $details[$i];
                            $bianyq = DB::name("transformer")->insert($transf);
                    }else{
                        $bianyq = 1;
                    }
                }
            }
            $dtenantry_zid = input('dtenantry_zid/a');
            $d_name = input('d_name/a');
            $d_init_record = input('d_init_record/a');
            $d_rate = input('d_rate/a');
            $d_init_record = input('d_init_record/a');
            $d_rate = input('d_rate/a');
            $d_loss = input('d_loss/a');
            $len = count($dtenantry_zid);
            $del4 = 1;$del5 = 1;$del6 = 1;
            $find = DB::name("electric_contract")->where("contract_id",input('id'))->field("id,electric_id")->select();
            foreach ($find as $k => $v) {
                //return DB::name("electric_contract")->getlastsql();
                $del4 = DB::name("electric_contract")->where("id",$find[$k]['id'])->delete();
                $del5 = DB::name("electric")->where("id",$find[$k]['electric_id'])->delete();
                $del6 = DB::name("electric_price")->where("electric_id",$find[$k]['electric_id'])->delete();
            }
            if($len == 0){
                //0既没有电表 直接跳过
                $dianb = 1;
                $dianp = 1;
                $elecon = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if(!empty($dtenantry_zid[$i])){
                        $h = $i+1;
                        for($j=$h;$j<$len;$j++){
                            if($dtenantry_zid[$i] == $dtenantry_zid[$j] && $d_name[$i] == $d_name[$j]){
                                return "合同里不能存在相同的园区同名的电表";
                            }
                        }
                        if(empty($d_name[$i])){
                            return "电费设置,第".($i+1)."条请输入电表名";
                        }
                        if($d_init_record[$i] == ''){
                            return "电费设置,第".($i+1)."条请输电表初始度数";
                        }
                        if($d_rate[$i] == ''){
                            return "电费设置,第".($i+1)."条请输入电表倍率";
                        }
                        if($d_loss[$i] == ''){
                            return "电费设置,第".($i+1)."条请输入损耗";
                        }
                        $elec['park_id'] = $dtenantry_zid[$i];
                        $elec['name'] = $d_name[$i];
                        $elec['init_record'] = $d_init_record[$i];
                        $elec['rate'] = $d_rate[$i];
                        $elec['loss'] = $d_loss[$i];
                        $elec['create_time'] = time();
                        $elec['status'] = 1;
                        $elec['create_id'] = $_SESSION['id'];
                        $dianb = DB::name("electric")->insertGetId($elec);
                        $dbht['contract_id'] = input("id");
                        $dbht['electric_id'] = $dianb;
                        $elecon = DB::name("electric_contract")->insert($dbht);
                        $d_readings_begin = input("d_readings_begin_".$i."/a");
                        $d_readings_end = input("d_readings_end_".$i."/a");
                        $d_price = input("d_price_".$i."/a");
                        $d_len = count($d_readings_begin);
                        if($d_len == 0){
                            $dianp = 1;
                        }else{
                            for($j=0;$j<$d_len;$j++){
                                if($d_readings_begin[$j]!== '' && $d_readings_end[$j]!== '' && $d_price[$j]!== ''){
                                    $ds_price['electric_id'] = $dianb;
                                    $ds_price['readings_begin'] = $d_readings_begin[$j];
                                    $ds_price['readings_end'] = $d_readings_end[$j];
                                    $ds_price['price'] = $d_price[$j];
                                    $dianp = DB::name("electric_price")->insert($ds_price);
                                }else{
                                    $dianp = 1;
                                }
                            }
                        }
                    }else{
                        $elecon = 1;
                        $dianb = 1;
                        $dianp = 1;
                    }
                }
            }
            $stenantry_zid = input("stenantry_zid/a");
            $park_name = input("park_name/a");
            $s_init_record = input("s_init_record/a");
            $s_rate = input("s_rate/a");
            $s_loss = input("s_loss/a");
            $s_share = input("s_share/a");
            $len = count($stenantry_zid);
            $del7 = 1;$del8 = 1;$del9 = 1;
            $find = DB::name("water_contract")->where("contract_id",input('id'))->field("id,water_id")->select();
            foreach ($find as $k => $v) {
                $del7 = DB::name("water_contract")->where("id",$find[$k]['id'])->delete();
                $del8 = DB::name("water")->where("id",$find[$k]['water_id'])->delete();
                $del9 = DB::name("water_price")->where("water_id",$find[$k]['water_id'])->delete();
            }
            if($len == 0){
                //没有水表 直接跳过
                $w_id = 1;
                $shuib = 1;
                $watercon = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if(!empty($stenantry_zid[$i])){
                        $h = $i+1;
                        for($j=$h;$j<$len;$j++){
                            if($park_name[$i] == $park_name[$j] && $stenantry_zid[$i] == $stenantry_zid[$j]){
                                return "合同里不能存在相同的园区同名的水表";
                            }
                        }
                        if(empty($park_name[$i])){
                            return "水费设置,第".($i+1)."条请输入水表名";
                        }
                        $water['name'] = $park_name[$i];
                        $water['park_id'] = $stenantry_zid[$i];
                        if(empty($s_init_record[$i])){
                            $water['init_record'] = 0;
                        }else{
                            $water['init_record'] = $s_init_record[$i];
                        }
                        if(empty($s_rate[$i])){
                            $water['rate'] = 0;
                        }else{
                            $water['rate'] = $s_rate[$i];
                        }
                        if(empty($s_loss[$i])){
                            $water['loss'] = 0;
                        }else{
                            $water['loss'] = $s_loss[$i];
                        }
                        $water['status'] = 1;
                        $water['create_time'] = time();
                        $water['create_id'] = $_SESSION['id'];
                        $w_id = DB::name("water")->insertGetId($water);
                        if(empty($s_share[$i])){
                            $wcon['share'] = 0;
                        }else{
                            $wcon['share'] = $s_share[$i];
                        }
                        $wcon['water_id'] = $w_id;
                        $wcon['contract_id'] = input("id");
                        $wcon['status'] = 1;
                        $watercon = DB::name("water_contract")->insert($wcon);
                        $s_readings_begin = input("s_readings_begin_".$i."/a");
                        $s_readings_end = input("s_readings_end_".$i."/a");
                        $s_price = input("s_price_".$i."/a");
                        $s_len = count($s_readings_begin);
                        if($s_len == 0){
                            $shuib = 1;
                        }else{
                            for($j=0;$j<$s_len;$j++){
                                $wprice['water_id'] = $w_id;
                                $wprice['contract_id'] = $contract;
                                if($s_readings_begin[$j]!== '' && $s_readings_end[$j]!== '' && $s_price[$j]!== ''){
                                    $wprice['readings_begin'] = $s_readings_begin[$j];
                                    $wprice['readings_end'] = $s_readings_end[$j];
                                    $wprice['price'] = $s_price[$j];
                                    $shuib = DB::name("water_price")->insert($wprice);
                                }else{
                                    $shuib = 1;
                                }
                            }
                            }
                    }else{
                        $shuib = 1;
                        $w_id = 1;
                        $watercon = 1;
                    }
                }

            }
            $exacct = input('exacct/a');
            $y_monthly_type = input('y_monthly_type/a');
            $y_monthly_value = input('y_monthly_value/a');
            $y_time_begin = input('y_time_begin/a');
            $y_time_end = input('y_time_end/a');
            $y_rent = input('y_rent/a');
            $feiy['contract_id'] = input("id");
            $len = count($y_monthly_type);
            if($len == 0){
                //即没有添加费用类型
                $feiyong = 1;
            }else{
                for($i=0;$i<$len;$i++){
                    if(empty($exacct[$i])){
                        return "其他费用设置里，第".($i+1)."条请选择费用科目";
                    }
                    if(empty($y_monthly_type[$i])){
                        return "其他费用设置里，第".($i+1)."条请选择月租类型";
                    }
                    if($y_monthly_value[$i] == ''){
                        return "其他费用设置里，第".($i+1)."条请选择月租值";
                    }
                    if($y_time_begin[$i] == ''){
                        return "其他费用设置里，第".($i+1)."条请选择月租初始时间";
                    }
                    if($y_time_end[$i] == ''){
                        return "其他费用设置里，第".($i+1)."条请选择月租结束时间";
                    }
                    /*if($y_rent[$i] == ''){
                        return "其他费用设置里，第".($i+1)."条请选择月租租金";
                    }*/
                    $j = $i + 1;
                    for($h=$j;$h<$len;$h++){
                        if($exacct[$i] == $exacct[$h]){
                            //判断时间是否起冲突
                            if($y_time_end[$i] > $y_time_begin[$h]){
                                return "其他费用设置里，第".($i+1)."与第".($h+1)."条时间起冲突";
                            }
                        }
                    }
                    if($y_time_begin[$i]>$y_time_end[$i]){
                        return "其他费用设置里，第".($i+1)."条起始时间不能小于结束时间";
                    }
                    $feiy['exacct'] = $exacct[$i];
                    $feiy['monthly_type'] = $y_monthly_type[$i];
                    $feiy['monthly_value'] = $y_monthly_value[$i];
                    $feiy['time_begin'] = $y_time_begin[$i];
                    $feiy['time_end'] = $y_time_end[$i];
                    $feiy['rent'] = $y_monthly_value[$i];
                    $feiyong = DB::name("rent")->insert($feiy);
                }
            }
            if($contract !== false && $zhujin !== false && $bianyq !== false && $elecon !== false && $dianb!== false && $dianp!== false && $w_id!== false && $shuib!== false && $watercon!== false && $feiyong!== false && $del2!== false && $del3!== false && $del4!== false && $del5!== false && $del6!== false && $del7!== false && $del8!== false && $del9!== false&& $pagg!== false && $parup!== false){
                Db::commit();
                $this->lw_log("4","修改了了合同号为".input('contract_num'),"Cuscontract",'cuscontract_list');
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }else if(request()->isGet()){
            //合同主信息
            $res['cus'] = DB::name("contract")->where("id",input("id"))->find();
            $find = DB::name("customer")->where("id",$res['cus']['lease_id'])->field("name")->find();
            $res['cus']['lease_name'] = $find['name'];
            $find = DB::name("company")->where("id",$res['cus']['tenantry_id'])->field('name')->find();
            $res['cus']['tenantry_name'] = $find['name'];
            $find = DB::name("park")->where("id",$res['cus']['park_id'])->field('name')->find();
            $res['cus']['park_name'] = $find['name'];
            //客户来源
            $res['khly'] = DB::name("dictionary")->where("type",4)->where('status',1)->field("id,name")->select();
            //租金类型
            $res['rent'] = DB::name("rent")->where("contract_id",$res['cus']['id'])->where('exacct',0)->select();
            //变压器
            $res['transf'] = DB::name("transformer")->where("contract_id",$res['cus']['id'])->select();
            //电表
            $res['ele'] = DB::name("electric")->alias('e')->join('electric_contract l',"l.electric_id = e.id")->where("l.contract_id",$res['cus']['id'])->field('e.*')->select();
            foreach($res['ele'] as $k => $v){
                $res['ele'][$k]['num'] = $k;
                $res['ele'][$k]['ks'] = $k-1;
                $find = DB::name("park")->where("id",$res['ele'][$k]['park_id'])->field('name')->find();
                $res['ele'][$k]['park_name'] = $find['name'];
                $res['ele'][$k]['son'] = DB::name("electric_price")->where("electric_id",$res['ele'][$k]['id'])->select();
            }
            //水表
            $res['water'] = DB::name("water")->alias('e')->join('water_contract l',"l.water_id = e.id")->where("l.contract_id",$res['cus']['id'])->field('e.*,l.share,l.water_id')->select();
             foreach($res['water'] as $k => $v){
                $res['water'][$k]['num'] = $k;
                $res['water'][$k]['ks'] = $k-1;
                $find = DB::name("park")->where("id",$res['water'][$k]['park_id'])->field('name')->find();
                $res['water'][$k]['park_name'] = $find['name'];
                $res['water'][$k]['son'] = DB::name("water_price")->where("water_id",$res['water'][$k]['water_id'])->select();
            }
            $where['exacct'] = array("neq",'');
            $where['contract_id'] = $res['cus']['id'];
            $res['fyong'] = DB::name("rent")->where($where)->select();
            $res['fy'] = DB::name("dictionary")->where("type",5)->where('status',1)->field("id,name")->select();
            return $res;
        }
    }

    /*
    **水表管理
     */
        public function water_list($where){
             $res['list']  = DB::name("water")
                                    ->alias("w")
                                    ->join("water_contract z","z.water_id=w.id")
                                    ->join("contract c","c.id=z.contract_id")
                                    ->join("park p","p.id=w.park_id")
                                    ->where($where)
                                    ->field("w.id,w.init_record,p.name,w.name as wname,w.park_id")
                                    ->group("w.park_id,w.name")
                                    ->order("w.id desc")
                                    ->select();
            foreach ($res['list'] as $k => $v) {
                $dis = DB::name("water_record")->where("water_id",$res['list'][$k]['id'])->field("up_record,current_record")->order("time desc")->find();
                 if($dis){
                    $res['list'][$k]['up_record'] = $dis['up_record'];
                    $res['list'][$k]['current_record'] = $dis['current_record'];
                 }else{
                    $res['list'][$k]['up_record'] = 0;
                    $res['list'][$k]['current_record'] = 0;
                 }
                 $arr[] = $res['list'][$k]['park_id'];
            }
            $while['id'] = array("in",implode(",",$arr));
            $res['park'] = DB::name("park")->where($while)->field("id,name")->select();
            /*获取信息的数量*/
            $res['num'] = count($res['list']);
            $arr = $this->lw_number($res['num']);
            foreach($res['list'] as $k => $v) {
                $res['list'][$k]['num'] = $arr[$k];
            }
        return $res;
        }

        /*水表编辑*/
    public function water_edit(){
        if(request()->isPost()){
            if(empty(input('ctenantry_id'))){
                return "请选择园区";
            }
            $id = input("ids/a");
            $status = input("status/a");
            $share = input("share/a");
            $len = count($id);
            Db::startTrans();
            $wheres['park_id'] = input('ctenantry_id');
            $wheres['name'] = input('name');
            $wheres['id'] = array("neq",implode(",",$id));
            $find = DB::name("water")->where($wheres)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] !== 0){
                return "该园区下已存在该水表名";
            }
            for ($i=0; $i < $len; $i++) { 
                $data['park_id'] = input('ctenantry_id');
                $data['name'] = input('name');
                $data['id'] = $id[$i];
                $data['update_time'] = time();
                $data['update_id'] = $_SESSION['id'];
                $add = DB::name("water")->update($data);
                $where['water_id'] = $id[$i];
                if(!empty($status)){
                    if(in_array($id[$i],$status)){
                        $con['status'] = 2;
                    }else{
                        $con['status'] = 1;
                    }
                }else{
                    $con['status'] = 1;
                }
                if(empty($share[$i])){
                    $con['share'] = 0;
                }else{
                    $con['share'] = $share[$i];
                }
                $while['water_id'] = $id[$i];
                $while['status'] = $con['status'];
                $while['share'] = $con['share'];
                $find = DB::name("water_contract")->where($while)->field("COUNT(*)")->find();
                if($find['COUNT(*)'] !== 0){
                    $wc = 1;
                }else{
                    $wc = DB::name("water_contract")->where($where)->update($con);
                }
                //return DB::name("water_contract")->getlastsql();
            }
            if($add && $wc){
                Db::commit();
                $this->lw_log("4","修改了了水表名为".input('name'),"Cuscontract",'water_list');
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }

        }else if(request()->isGet()){
            $where['w.id'] = input("id");
            $res = DB::name("water")->alias("w")->join("park p","p.id=w.park_id")->where($where)->field("w.id,w.name,w.park_id,p.name as pname,w.init_record")->find();
            //$res['sql'] = DB::name("water")->getlastsql();
            $whild['w.park_id'] = $res['park_id'];
            $whild['w.name'] = $res['name'];
            $res['son'] = DB::name("water")->alias("w")->join("water_contract c","c.water_id=w.id")->join("contract h","h.id=c.contract_id")->join("customer k","h.lease_id=k.id")->where($whild)->field("k.name,c.share,c.status,w.id")->select();
            //$res['sql1'] = DB::name("water")->getlastsql();
            return $res;
        }
    }
    /*删除水表*/
    public function water_del(){
        if(request()->isPost()){
            $w_id['id'] = array("in",input("id"));
            $finds = DB::name("water")->where($w_id)->field("park_id,name")->select();
            foreach ($finds as $k => $v) {
                $where['w.park_id'] = $finds[$k]['park_id'];
                $where['w.name'] = $finds[$k]['name'];
                $where['c.house_id'] = 0;
                $find = DB::name("water")
                        ->alias("w")
                        ->join("water_contract z","z.water_id=w.id")
                        ->join("contract c","c.id=z.contract_id")
                        ->join("park p","p.id=w.park_id")
                        ->where($where)
                        ->field("w.id,w.name")
                        ->select();
                        foreach ($find as $key => $value) {
                            $arr[] = $find[$key]['id'];
                        }
            }
            $id = implode(",", $arr);
            $whe['w.water_id'] = array("in",$id);
            $whe['c.status'] = 1;
            $find = DB::name("water_contract")->alias("w")->join("contract c","c.id=w.contract_id")->where($whe)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] !== 0){
                return "该水表有存在有效的合同里，无法直接删除";
            }
            Db::startTrans();
            $where1['id'] = array("in",$id);
            $where1['type'] = 2;
            $del1 = DB::name("water")->update($where1);
            /*$where2['water_id'] = array("in",$id);
            $del2 = DB::name("water_contract")->where($where2)->delete();
            $where2['water_id'] = array("in",$id);
            $rec = DB::name("water_record")->where($where2)->field("COUNT(*)")->find();
            if($rec['COUNT(*)'] != 0){
                $del3 = DB::name("water_record")->where($where2)->delete();
            }else{
                $del3 = 1;
            }
            $del4 = DB::name("water_price")->where($where2)->delete();*/
            if($del1){
                foreach($finds as $k => $v){
                    $this->lw_log("3","删除了了水表名为".$finds[$k]['name'],"Cuscontract",'water_list');
                }
                Db::commit();
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }
    }
    /*抄表*/
    public function water_add(){
        if(request()->isPost()){
            $data['water_id'] = input("id");
            $data['time'] = strtotime(input('ztime_begin'));
            $data['up_record'] = input("up_record");
            $data['current_record'] = input("current_record");
            $data['create_id'] = $_SESSION['id'];
            $data['create_time'] = time();
            $where['water_id'] = input("id");
            $where['time'] = strtotime(input('ztime_begin'));
            $find = DB::name("water_record")->where($where)->field("COUNT(*)")->field("COUNT(*)")->find();
            if($find['COUNT(*)']!=0){
                return "该日已抄表";
            }
            $add = DB::name("water_record")->insert($data);
            if($add){
                $this->lw_log("2","水表 抄表".input('sbm'),"Cuscontract",'water_list');
                return "success";
            }else{
                return "操作失败";
            }
        }else if(request()->isGet()){
            $where['w.id'] = input("id");
            $res = DB::name("water")->alias("w")->join("park p","p.id=w.park_id")->where($where)->field("w.id,w.name")->find();
            return $res;
        }
    }
    /*抄表记录*/
    public function waterhistory_list($where){
        if(request()->isGet()){
             $res['list'] = DB::name("water_record")
                            ->alias("c")
                            ->join("water w","w.id=c.water_id")
                            ->join("park p","p.id=w.park_id")
                            ->where($where)
                            ->field("c.id,c.time,c.up_record,c.current_record,w.name,p.name as pname")
                            ->order("c.time desc")
                            ->select();    
            $res['num'] = count($res['list']);
            $arr = $this->lw_number($res['num']);
            foreach($res['list'] as $k => $v) {
                $res['list'][$k]['time'] = date("Y-m",$res['list'][$k]['time']);
                $res['list'][$k]['num'] = $arr[$k];
            }
            return $res;
        }
    }
    /*抄表修改*/
    public function waterhistory_edit(){
        if(request()->isPost()){
            $data['id'] = input("id");
            $data['time'] = strtotime(input('ztime_begin'));
            $data['up_record'] = input("up_record");
            $data['current_record'] = input("current_record");
            $data['update_id'] = $_SESSION['id'];
            $data['update_time'] = time();
            $where['id'] = array("neq",input("id"));
            $where['time'] = strtotime(input('ztime_begin'));
            $where['water_id'] = input("water_id");
            $find = DB::name("water_record")->where($where)->field("COUNT(*)")->field("COUNT(*)")->find();
            //return DB::name("water_record")->getlastsql();
            if($find['COUNT(*)']!=0){
                return "该日已抄表";
            }
            $add = DB::name("water_record")->update($data);
            if($add){
                $this->lw_log("4","水表修改抄表".input('sbm'),"Cuscontract",'water_list');
                return "success";
            }else{
                return "操作失败";
            }
        }else if(request()->isGet()){
            $where['c.id'] = input("id");
            $res = DB::name("water")->alias("w")->join("park p","p.id=w.park_id")->join("water_record c","c.water_id=w.id")->where($where)->field("w.name,c.id,c.up_record,c.current_record,c.time,c.water_id")->find();
            $res['time'] = date("Y-m",$res['time']);
            return $res;
        }
    }
    /*导出相对应的水表模板*/
    public function water_excelout(){
        if(request()->isGet()){
            $res['list']  = DB::name("water")
                            ->alias("w")
                            ->join("water_contract z","z.water_id=w.id")
                            ->join("contract c","c.id=z.contract_id")
                            ->join("park p","p.id=w.park_id")
                            ->where($where)
                            ->field("w.init_record,p.name,w.name as wname")
                            ->group("w.park_id,w.name")
                            ->order("w.id asc")
                            ->select();
                            //return  DB::name("water")->getlastsql();
            foreach ($res['list'] as $k => $v) {
                $dis = DB::name("water_record")->where("water_id",$res['list'][$k]['id'])->field("up_record,current_record")->order("time desc")->find();
                 if($dis){
                    $res['list'][$k]['up_record'] = $dis['up_record'];
                    $res['list'][$k]['current_record'] = $dis['current_record'];
                 }else{
                    $res['list'][$k]['up_record'] = 0;
                    $res['list'][$k]['current_record'] = 0;
                 }
                 $data[$k]['A'] = $k;
                 $data[$k]['B'] = $res['list'][$k]['name'];
                 $data[$k]['C'] = $res['list'][$k]['wname'];
                 $data[$k]['D'] = $res['list'][$k]['up_record'];
                 $data[$k]['E'] = $res['list'][$k]['current_record'];
            }
            return $data;
        }
    }
    /*水表导出*/
    public function waterhistory_add(){
        $where['c.house_id'] = 0;
        $res['list']  = DB::name("water")
                        ->alias("w")
                        ->join("water_contract z","z.water_id=w.id")
                        ->join("contract c","c.id=z.contract_id")
                        ->join("park p","p.id=w.park_id")
                        ->field("w.park_id")
                        ->where($where)
                        ->group("w.park_id,w.name")
                        ->order("w.id asc")
                        ->select();
            foreach ($res['list'] as $k => $v) {
                 $arr[] = $res['list'][$k]['park_id'];
            }
            $while['id'] = array("in",implode(",",$arr));
            $res['park'] = DB::name("park")->where($while)->field("id,name")->select();
        return $res;
    }
    /*导入*/
    public function water_excelin($arr){
        if(empty($arr)){
            return "没有可导入的信息";
        }else{
             Db::startTrans();
            foreach($arr as $k => $v){
                //园区的名字
                $where['name'] = $arr[$k][1];
                $find = DB::name("park")->where($where)->field("id")->find();
                if(!$find){
                    $jg = 1;
                    $arr[$k][6] = "没有找到相对应的园区";
                }else{
                     $while['park_id'] = $find['id'];
                    $while['name'] = $arr[$k][2];
                    $find2 = DB::name("water")->where($while)->field("id,name")->find();
                    if(!$find2){
                        $jg = 1;
                        $arr[$k][6] = "该园区下没有找到对应的水表";
                    }else{
                        if(empty($arr[$k][5])){
                            $jg = 1;
                            $arr[$k][6] = "没有抄表的时间点";
                        }else{
                            $whl['time'] = strtotime(date("Y-m",strtotime($arr[$k][5])));
                            $whl['water_id'] = $find2['id'];
                            $find3 = DB::name('water_record')->where($whl)->field("COUNT(*)")->find();
                            if($find3['COUNT(*)'] != 0){
                                $arr[$k][6] = "已经存在该时间点的抄表";
                                $jg = 1;
                            }else{
                                $data['water_id'] = $find2['id'];
                                $data['time'] = strtotime(date("Y-m",strtotime($arr[$k][5])));
                                $data['up_record'] = $arr[$k][3];
                                $data['current_record'] = $arr[$k][4];
                                $data['create_id'] = $_SESSION['id'];
                                $data['create_time'] = time();
                                $add = DB::name("water_record")->insert($data);
                                $this->lw_log("2","水表 抄表".$find2['name'],"Cuscontract",'water_list');
                            }
                        }
                    }
                }
            }
            if($add && !$jg){
                Db::commit();
                return "success";
            }else{
                Db::rollback();
                return $arr;
            }
        }
    }
    /*
    **电表管理
     */
        public function electric_list($where){
            $where['c.house_id'] = 0;
             $res['list']  = DB::name("electric")
                            ->alias("w")
                            ->join("electric_contract z","z.electric_id=w.id")
                            ->join("contract c","c.id=z.contract_id")
                            ->join("park p","p.id=w.park_id")
                            ->where($where)
                            ->field("w.id,w.init_record,p.name,w.name as wname,w.id,w.park_id")
                            ->group("w.park_id,w.name")
                            ->order("w.id asc")
                            ->select();
            foreach ($res['list'] as $k => $v) {
                $dis = DB::name("electric_record")->where("electric_id",$res['list'][$k]['id'])->field("up_record,current_record")->order("time desc")->find();
                 if($dis){
                    $res['list'][$k]['up_record'] = $dis['up_record'];
                    $res['list'][$k]['current_record'] = $dis['current_record'];
                 }else{
                    $res['list'][$k]['up_record'] = 0;
                    $res['list'][$k]['current_record'] = 0;
                 }
                 $arr[] = $res['list'][$k]['park_id'];
            }
            $while['id'] = array("in",implode(",",$arr));
            $res['park'] = DB::name("park")->where($while)->field("id,name")->select();
            /*获取信息的数量*/
            $res['num'] = count($res['list']);
            $arr = $this->lw_number($res['num']);
            foreach($res['list'] as $k => $v) {
                $res['list'][$k]['num'] = $arr[$k];
            }
        return $res;
        }
        /*电表表编辑*/
    public function electric_edit(){
        if(request()->isPost()){
            if(empty(input('ctenantry_id'))){
                return "请选择园区";
            }
            $ids = input("ids/a");
            $len = count($ids);
            Db::startTrans();
            $wheres['park_id'] = input('ctenantry_id');
            $wheres['name'] = input('name');
            $wheres['id'] = array("neq",implode(",",$ids));
            $find = DB::name("electric")->where($wheres)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] !== 0){
                return "该园区下已存在该电表名";
            }
            for ($i=0; $i < $len; $i++) { 
                $data['park_id'] = input('ctenantry_id');
                $data['name'] = input('name');
                $data['id'] = $ids[$i];
                $data['update_time'] = time();
                $data['update_id'] = $_SESSION['id'];
                $add = DB::name("electric")->update($data);
                //return DB::name("water_contract")->getlastsql();
            }
            if($add !== false){
                Db::commit();
                $this->lw_log("4","修改了电表名为".input('name'),"Cuscontract",'electric_list');
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }

        }else if(request()->isGet()){
            $where['w.id'] = input("id");
            $res = DB::name("electric")->alias("w")->join("park p","p.id=w.park_id")->where($where)->field("w.id,w.name,w.park_id,p.name as pname,w.init_record")->find();
            //$res['sql'] = DB::name("electric")->getlastsql();
            $whild['w.park_id'] = $res['park_id'];
            $whild['w.name'] = $res['name'];
            $res['son'] = DB::name("electric")->alias("w")->join("electric_contract c","c.electric_id=w.id")->join("contract h","h.id=c.contract_id")->join("customer k","h.lease_id=k.id")->where($whild)->field("k.name,w.id")->select();
            //$res['sql1'] = DB::name("electric")->getlastsql();
            return $res;
        }
    }
        /*抄表*/
    public function electric_add(){
        if(request()->isPost()){
            $data['electric_id'] = input("id");
            $data['time'] = strtotime(input('ztime_begin'));
            $data['up_record'] = input("up_record");
            $data['current_record'] = input("current_record");
            $data['create_id'] = $_SESSION['id'];
            $data['create_time'] = time();
            $where['electric_id'] = input("id");
            $where['time'] = strtotime(input('ztime_begin'));
            $find = DB::name("electric_record")->where($where)->field("COUNT(*)")->field("COUNT(*)")->find();
            if($find['COUNT(*)']!=0){
                return "该日已抄表";
            }
            $add = DB::name("electric_record")->insert($data);
            if($add){
                $this->lw_log("2","水表 抄表".input('sbm'),"Cuscontract",'electric_list');
                return "success";
            }else{
                return "操作失败";
            }
        }else if(request()->isGet()){
            $where['w.id'] = input("id");
            $res = DB::name("electric")->alias("w")->join("park p","p.id=w.park_id")->where($where)->field("w.id,w.name")->find();
            return $res;
        }
    }
    /*抄表记录*/
    public function electrichistory_list($where){
        if(request()->isGet()){
             $res['list'] = DB::name("electric_record")
                            ->alias("c")
                            ->join("electric w","w.id=c.electric_id")
                            ->join("park p","p.id=w.park_id")
                            ->where($where)
                            ->field("c.id,c.time,c.up_record,c.current_record,w.name,p.name as pname")
                            ->order("c.time desc")
                            ->select();    
            $res['num'] = count($res['list']);
            $arr = $this->lw_number($res['num']);
            foreach($res['list'] as $k => $v) {
                $res['list'][$k]['time'] = date("Y-m",$res['list'][$k]['time']);
                $res['list'][$k]['num'] = $arr[$k];
            }
            return $res;
        }
    }
    /*抄表修改*/
    public function electrichistory_edit(){
        if(request()->isPost()){
            $data['id'] = input("id");
            $data['time'] = strtotime(input('ztime_begin'));
            $data['up_record'] = input("up_record");
            $data['current_record'] = input("current_record");
            $data['update_id'] = $_SESSION['id'];
            $data['update_time'] = time();
            $where['id'] = array("neq",input("id"));
            $where['time'] = strtotime(input('ztime_begin'));
            $where['electric_id'] = input("electric_id");
            $find = DB::name("electric_record")->where($where)->field("COUNT(*)")->field("COUNT(*)")->find();
            //return DB::name("electric_record")->getlastsql();
            if($find['COUNT(*)']!=0){
                return "该日已抄表";
            }
            $add = DB::name("electric_record")->update($data);
            if($add){
                $this->lw_log("4","水表修改抄表".input('sbm'),"Cuscontract",'electric_list');
                return "success";
            }else{
                return "操作失败";
            }
        }else if(request()->isGet()){
            $where['c.id'] = input("id");
            $res = DB::name("electric")->alias("w")->join("park p","p.id=w.park_id")->join("electric_record c","c.electric_id=w.id")->where($where)->field("w.name,c.id,c.up_record,c.current_record,c.time,c.electric_id")->find();
            $res['time'] = date("Y-m",$res['time']);
            return $res;
        }
    }
    /*删除水表*/
    public function electric_del(){
        if(request()->isPost()){
            $w_id['id'] = array("in",input("id"));
            $finds = DB::name("electric")->where($w_id)->field("park_id,name")->select();
            foreach ($finds as $k => $v) {
                $where['w.park_id'] = $finds[$k]['park_id'];
                $where['w.name'] = $finds[$k]['name'];
                $where['c.house_id'] = 0;
                $find = DB::name("electric")
                        ->alias("w")
                        ->join("electric_contract z","z.electric_id=w.id")
                        ->join("contract c","c.id=z.contract_id")
                        ->join("park p","p.id=w.park_id")
                        ->where($where)
                        ->field("w.id,w.name")
                        ->select();
                        foreach ($find as $key => $value) {
                            $arr[] = $find[$key]['id'];
                        }
            }
            $id = implode(",", $arr);
            $whe['w.electric_id'] = array("in",$id);
            $whe['c.status'] = 1;
            $find = DB::name("electric_contract")->alias("w")->join("contract c","c.id=w.contract_id")->where($whe)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] !== 0){
                return "该电表有存在有效的合同里，无法直接删除";
            }
            Db::startTrans();
            $where1['id'] = array("in",$id);
            $where1['type'] = 2;
            $del1 = DB::name("electric")->update($where1);
            /*$where2['electric_id'] = array("in",$id);
            $del2 = DB::name("electric_contract")->where($where2)->delete();
            $where2['electric_id'] = array("in",$id);
            $rec = DB::name("electric_record")->where($where2)->field("COUNT(*)")->find();
            if($rec['COUNT(*)'] != 0){
                $del3 = DB::name("electric_record")->where($where2)->delete();
            }else{
                $del3 = 1;
            }
            $del4 = DB::name("electric_price")->where($where2)->delete();*/
            if($del1){
                foreach($finds as $k => $v){
                    $this->lw_log("3","删除了了水表名为".$finds[$k]['name'],"Cuscontract",'electric_list');
                }
                Db::commit();
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }
    }
    /*电表导出*/
    public function electrichistory_add(){
        $where['c.house_id'] = 0;
        $where['w.type'] = 1;
        $res['list']  = DB::name("electric")
                        ->alias("w")
                        ->join("electric_contract z","z.electric_id=w.id")
                        ->join("contract c","c.id=z.contract_id")
                        ->join("park p","p.id=w.park_id")
                        ->field("w.park_id")
                        ->where($where)
                        ->group("w.park_id,w.name")
                        ->order("w.id asc")
                        ->select();
            foreach ($res['list'] as $k => $v) {
                 $arr[] = $res['list'][$k]['park_id'];
            }
            $while['id'] = array("in",implode(",",$arr));
            $res['park'] = DB::name("park")->where($while)->field("id,name")->select();
        return $res;
    }
    /*导出相对应的水表模板*/
    public function electric_excelout(){
        if(request()->isGet()){
            $where['c.house_id'] = 0;
            $res['list']  = DB::name("electric")
                            ->alias("w")
                            ->join("electric_contract z","z.electric_id=w.id")
                            ->join("contract c","c.id=z.contract_id")
                            ->join("park p","p.id=w.park_id")
                            ->where($where)
                            ->field("w.init_record,p.name,w.name as wname,w.id")
                            ->group("w.park_id,w.name")
                            ->order("w.id asc")
                            ->select();
                            //return  DB::name("electric")->getlastsql();
            foreach ($res['list'] as $k => $v) {
                $dis = DB::name("electric_record")->where("electric_id",$res['list'][$k]['id'])->field("up_record,current_record")->order("time desc")->find();
                 if($dis){
                    $res['list'][$k]['up_record'] = $dis['up_record'];
                    $res['list'][$k]['current_record'] = $dis['current_record'];
                 }else{
                    $res['list'][$k]['up_record'] = 0;
                    $res['list'][$k]['current_record'] = 0;
                 }
                 $data[$k]['A'] = $k;
                 $data[$k]['B'] = $res['list'][$k]['name'];
                 $data[$k]['C'] = $res['list'][$k]['wname'];
                 $data[$k]['D'] = $res['list'][$k]['up_record'];
                 $data[$k]['E'] = $res['list'][$k]['current_record'];
            }
            return $data;
        }
    }
    /*导入*/
    public function electric_excelin($arr){
        if(empty($arr)){
            return "没有可导入的信息";
        }else{
             Db::startTrans();
            foreach($arr as $k => $v){
                //园区的名字
                $where['name'] = $arr[$k][1];
                $find = DB::name("park")->where($where)->field("id")->find();
                if(!$find){
                    $jg = 1;
                    $arr[$k][6] = "没有找到相对应的园区";
                }else{
                     $while['park_id'] = $find['id'];
                    $while['name'] = $arr[$k][2];
                    $find2 = DB::name("electric")->where($while)->field("id,name")->find();
                    if(!$find2){
                        $jg = 1;
                        $arr[$k][6] = "该园区下没有找到对应的电表";
                    }else{
                        if(empty($arr[$k][5])){
                            $jg = 1;
                            $arr[$k][6] = "没有抄表的时间点";
                        }else{
                            $whl['time'] = strtotime(date("Y-m",strtotime($arr[$k][5])));
                            $whl['electric_id'] = $find2['id'];
                            $find3 = DB::name('electric_record')->where($whl)->field("COUNT(*)")->find();
                            if($find3['COUNT(*)'] != 0){
                                $arr[$k][6] = "已经存在该时间点的抄表";
                                $jg = 1;
                            }else{
                                $data['electric_id'] = $find2['id'];
                                $data['time'] = strtotime(date("Y-m",strtotime($arr[$k][5])));
                                $data['up_record'] = $arr[$k][3];
                                $data['current_record'] = $arr[$k][4];
                                $data['create_id'] = $_SESSION['id'];
                                $data['create_time'] = time();
                                $add = DB::name("electric_record")->insert($data);
                                $this->lw_log("2","电表 抄表".$find2['name'],"Cuscontract",'electric_list');
                            }
                        }
                    }
                }
            }
            if($add && !$jg){
                Db::commit();
                return "success";
            }else{
                Db::rollback();
                return $arr;
            }
        }
    }
    /*业主费用*/
    public function cost_list($where){
         $res['list'] = DB::name("customer_fees")
                        ->alias("f")
                        ->join("customer c","c.id=f.customer_id")
                        ->join("park p","p.id=f.park_id")
                        ->where($where)
                        ->field("f.*,c.name,p.name as pname,c.balance as yer")
                        ->order("id desc")
                        ->select();    
            $p_where['c.type'] = 2;
            $p_where['c.status'] = 1;
            $res['park'] = DB::name("contract")
                           ->alias("c")
                           ->join("park p","p.id=c.park_id")
                           ->where($p_where)
                           ->field("p.name,p.id")
                           ->group("c.park_id")
                           ->select();
            $res['num'] = count($res['list']);
            $arr = $this->lw_number($res['num']);
            foreach($res['list'] as $k => $v) {
                $res['list'][$k]['time'] = date("Y-m",$res['list'][$k]['time']);
                $res['list'][$k]['num'] = $arr[$k];
            }
            return $res;
    }
    /*
    **费用添加
     */
    public function cost_add(){
        if(request()->isPost()){
            $data['dictionary_id'] = input('dictionary_id');
            $data['price'] = input('price');
            $data['remark'] = input('beizhu');
            $where['id'] = input("id");
            $find = DB::name("customer_fees")->where($where)->field("time")->find();
            $data['time'] = $find['time'];
            $add = DB::name("contract_month")->insert($data);
            if($add){
                return "success";
            }else{
                return "操作失败";
            }
        }
    }
    /*详情*/
    public function costfees_list(){
        $data['f.id'] = input("id");
        $data['f.status'] = array("neq",0);
        $list = DB::name("customer_fees")
                ->alias("f")
                ->join("customer c","c.id=f.customer_id")
                ->join("park p","p.id=f.park_id")
                ->where($where)
                ->field("c.name,p.name as pname,c.balance as yer,f.balance,f.price,f.time,f.collect_fees,f.contract_id")
                ->find();
        $res['zfy'] = $list;
    }
}


/*                  合同信息
               ["contract_num"]=> string(0) ""  //合同号
                ["lease_name"]=> string(0) ""  //出租方
                ["lease_id"]=> string(0) ""   //出租房id
                ["ctenantry_name"]=> string(0) ""  //承租方
                ["ctenantry_id"]=> string(0) ""     //承租方id
                ["park_n"]=> string(0) ""  //园区
                ["park_id"]=> string(0) ""  //园区id
                ["lessee_area"]=> string(0) ""  //承租面积
                ["lease_area"]=> string(0) ""  //出租面积
                ["business_scope"]=> string(0) "" //经营范围
                ["client_source"]=> string(0) "" //客户来源
                ["ztime_begin"]=> string(0) ""  //租期
                ["ztime_end"]=> string(0) ""  //租期
                ["time_effect"]=> string(0) "" //起租日期
                ["remark"]=> string(0) "" //备注
                ["deposit"]=> string(0) "" //押金
                ["basic_rent"]=> string(0) "" //基本租金
                ["first_rent"]=> string(0) ""  //首次租金
                ["first_time_begin"]=> string(0) "" //首次租金时间
                ["first_time_end"]=> string(0) "" //首次租金时间
                ["monthly_type"]=> array(1) { [0]=> string(0) "" }  //月租类型
                ["monthly_value"]=> array(1) { [0]=> string(0) "" } //月租类型值
                ["time_begin"]=> array(1) { [0]=> string(0) "" }  //月租类型时间
                ["time_end"]=> array(1) { [0]=> string(0) "" }  //月租类型时间
                ["rent"]=> array(1) { [0]=> string(0) "" }   //月租租金
                ["number"]=> array(1) { [0]=> string(0) "" }  //变压器
                ["details"]=> array(1) { [0]=> string(0) "" } //变压器详情
                ["ele_deposit"]=> string(0) ""  //电费押金
                ["dtenantry_id"]=> array(1) { [0]=> string(0) "" }  //电表所在园区
                ["dtenantry_zid"]=> array(1) { [0]=> string(0) "" } //电表所在园区id
                ["d_name"]=> array(1) { [0]=> string(0) "" }  //电表名
                ["d_init_record"]=> array(1) { [0]=> string(0) "" } //电表初始度数
                ["d_rate"]=> array(1) { [0]=> string(0) "" } //电表倍率
                ["d_loss"]=> array(1) { [0]=> string(0) "" }  //损耗
                ["d_readings_begin_0"]=> array(1) { [0]=> string(0) "" }  //开始读数
                ["d_readings_end_0"]=> array(1) { [0]=> string(0) "" } //结束读数
                ["d_price_0"]=> array(1) { [0]=> string(0) "" }  //单价
                ["water_deposit"]=> string(0) "" //水费押金
                ["stenantry_id"]=> array(1) { [0]=> string(0) "" } //水表所在园区
                ["park_name"]=> array(1) { [0]=> string(0) "" } //水表名
                ["s_init_record"]=> array(1) { [0]=> string(0) "" } //初始度数
                ["s_rate"]=> array(1) { [0]=> string(0) "" } //倍率
                ["s_loss"]=> array(1) { [0]=> string(0) "" } //损耗
                ["s_share"]=> array(1) { [0]=> string(0) "" } //分摊比例
                ["s_readings_begin_0"]=> array(1) { [0]=> string(0) "" }  //开始读数
                ["s_readings_end_0"]=> array(1) { [0]=> string(0) "" }  //结束读数
                ["s_price_0"]=> array(1) { [0]=> string(0) "" }  //单价
                ["city"]=> string(0) "" 
                ["exacct"]=> array(1) { [0]=> string(0) "" } //费用科目类型
                ["y_monthly_type"]=> array(1) { [0]=> string(0) "" } //费用月租类型
                ["y_monthly_value"]=> array(1) { [0]=> string(0) "" } //费用月租类型值
                ["y_time_begin"]=> array(1) { [0]=> string(0) "" }  //费用开始时间
                ["y_time_end"]=> array(1) { [0]=> string(0) "" } //费用结束时间
                ["y_rent"]=> array(1) { [0]=> string(0) "" } }//费用租金*/