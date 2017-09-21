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
    /**
     * 修改公司信息
     * @Author   wcl
     * @DateTime 2017-09-11T21:03:23+0800
     * @return   [type]                   [description]
     */
    public function company_edit(){
        if(request()->isGet()){
            $res = DB::name("company")->where("id",input('id'))->field("id,name,license_number,legal,legal_mobile,contact,contact_mobile,contact_phone,address,remark")->find();
            $res['bank'] =  DB::name("bank")->where(array('company_id'=>$res['id']))->order("id asc")->select();
            return $res;
        }else if(request()->isPost()){
            $data['id'] = input('id');
            $data['name']           = input('name');
            $data['license_number'] = input('license_number');
            $data['address']        = input('address');
            $data['legal']          = input('legal');
            $data['legal_mobile']   = input('legal_mobile');

            $data['contact']          = input('contact');
            $data['contact_mobile']   = input('contact_mobile');
            $data['contact_phone']    = input('contact_phone');
            $data['remark']           = input('remark');
            $data['update_time']      = time();
            $data['update_id']        = $_SESSION['id'];
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
            $where['id'] = array("neq",input('id'));
            $where['name'] = input('name');
            $find = DB::name("company")->where($where)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] != 0){
                 return "该字段名称已被占用";
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
            foreach ($datas as $key => $value) {
                $datas[$key]['company_id'] = $data['id'];
            }
            Db::startTrans();
            $resCompaty  = DB::name("company")->update($data);
            $resBankd    = DB::name("bank")->where(array('company_id'=>$data['id']))->delete();
            $resBanki    = DB::name("bank")->insertAll($datas);
            if($resCompaty&&$resBankd&&$resBanki){
                $this->lw_log("4","修改了公司为".input('name'),"Enterprise",'company_list');
                Db::commit();
                return "success";
            }else{
                Db::rollback();
                return "操作失败";
            }
        }
    }
    /*
     *公司删除
     **/
    public function company_del(){
        if(request()->isPost()){
            $where['id'] = array("in",input('id'));
             /*判断公司有没有管理的园区*/
            $parkf = DB::name("park")->where(array('company_id'=>array('in',input('id'))))->field("COUNT(*)")->find();
            if($parkf['COUNT(*)'] != 0){
                 return "该公司有负责园区,请修改园区信息或删除园区信息后再来进行此操作";
            }
            $log = DB::name("company")->where($where)->field('name')->select();
            $res = DB::name("company")->where($where)->delete();
            if($res){
                foreach ($log as $k => $v) {
                    $this->lw_log("3","删除了公司为".$log[$k]['name'],"Enterprise",'company_list');
                }
                return "success";
            }else{
                return "操作失败!";
            }
        }else{
            return "请选择删除的信息";
        }
    }
    public function staff_list($where){
        $res['list'] = DB::name("staff")->where($where)->order("id desc")->field("id,name,job_title,mobile,cornet,sex,extension,address")->select();
        $res['num']  = count($res['list']);
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num']  = $arr[$k]; 
            if($res['list'][$k]['sex']===0){
                $res['list'][$k]['sex']="保密";
            }elseif($res['list'][$k]['sex']==1){
                $res['list'][$k]['sex']="男";
            }else{
                $res['list'][$k]['sex']="女";
            }
            $res['list'][$k]['mobile']=explode(',', $res['list'][$k]['mobile']);
            $res['list'][$k]['cornet']   =explode(',',$res['list'][$k]['cornet']);
        }
        return $res; 
    }
    /**
     * 增加员工信息
     * @Author   wcl
     * @DateTime 2017-09-12T12:35:47+0800
     * @return   [type]                   [description]
     */
    public function staff_add(){
        if(request()->isPost()){
           
            $data['name']           = input('name');
            $data['job_title']       = input('job_title');
            $data['address']        = input('address');
            $data['mobile']         = implode(',',input('mobile/a'));
            $data['cornet']         = implode(',',input('cornet/a'));
            $data['sex']            = input('sex');
            $data['extension']   = input('extension');
            $data['create_time']      = time();
            $data['create_id']        = $_SESSION['id'];
            if(empty(input('name'))){
                return "请填写员工名";     
            }
            if(empty(input('job_title'))){
                return "请填写职称";     
            }
            if(empty(input('address'))){
                return "请填写地址";     
            }
            foreach (input('mobile/a') as $key => $value) {
                if(input('mobile/a')[$key]===""){
                    return "请填写手机";     
                }
            }
            foreach (input('cornet/a') as $key => $value) {
                if(input('cornet/a')[$key]===""){
                    return "请填写短号";     
                }
            }
            if(empty(input('extension'))){
                return "请填分机号";     
            }
            if(input('sex')===""){
                return "请选择性别";     
            }
            if(ty(input('address'))){
                return "请填写地址";     
            }
            $res = DB::name("staff")->insertGetId($data);
            

            if($res){
                $this->lw_log("2","添加了员工为".input('name'),"Enterprise",'staff_list');
                return "success";
            }else{
                return "操作失败";
            }
        }
    }
    /**
     * 修改员工信息
     * @Author   wcl
     * @DateTime 2017-09-11T21:03:23+0800
     * @return   [type]                   [description]
     */
    public function staff_edit(){
        if(request()->isGet()){
            $res          =DB::name("staff")->where("id",input('id'))->field("id,name,job_title,mobile,cornet,sex,extension,address,status")->find(); 
            $res['mobile']=explode(',', $res['mobile']);
            $res['cornet']=explode(',',$res['cornet']);
            return $res;
        }else if(request()->isPost()){
            $data['id'] = input('id');
            $data['name']           = input('name');
            $data['job_title']       = input('job_title');
            $data['address']        = input('address');
            $data['mobile']         = implode(',',input('mobile/a'));
            $data['cornet']         = implode(',',input('cornet/a'));
            $data['sex']            = input('sex');
            $data['extension']      = input('extension');
            $data['update_time']     = time();
            $data['update_id']       = $_SESSION['id'];
            if(empty(input('name'))){
                return "请填写员工名";     
            }
            if(empty(input('job_title'))){
                return "请填写职称";     
            }
            if(empty(input('address'))){
                return "请填写地址";     
            }
            foreach (input('mobile/a') as $key => $value) {
                if(input('mobile/a')[$key]===""){
                    return "请填写手机";     
                }
            }
            foreach (input('cornet/a') as $key => $value) {
                if(input('cornet/a')[$key]===""){
                    return "请填写手机";     
                }
            }
            if(empty(input('extension'))){
                return "请填分机号";     
            }
            if(input('sex')===""){
                return "请选择性别";     
            }
            if(input('status')=="on"){
                $data['status'] = 2;
            }
            else{
                $data['status'] = 1;
            }
            $res = DB::name("staff")->update($data);
            if($res){
                $this->lw_log("4","修改了员工为".input('name'),"Enterprise",'staff_list');
                return "success";
            }else{
                return "操作失败";
            }
        }
    }
    /*
     *员工删除
     **/
    public function staff_del(){
        if(request()->isPost()){
            $where['id'] = array("in",input('id'));
             /*判断员工是否有负责的园区财务*/
            $parkf = DB::name("park")->where(array('finance_id'=>array('in',input('id'))))->field("COUNT(*)")->find();
            if($parkf['COUNT(*)'] != 0){
                 return "该员工有负责园区财务,请修改园区信息或删除园区信息后再来进行此操作";
            }
            /*判断员工是否有负责的园区管理*/
            $parkm = DB::name("park")->where(array('managers_id'=>array('in',input('id'))))->field("COUNT(*)")->find();
            if($parkm['COUNT(*)'] != 0){
                 return "该员工有负责园区管理,请修改园区信息或删除园区信息后再来进行此操作";
            }
            /*判断员工是否有收款项*/
            $parkm = DB::name("incomeexpenditure")->where(array('payee_id'=>array('in',input('id'))))->field("COUNT(*)")->find();
            if($incomeexpenditurem['COUNT(*)'] != 0){
                 return "该员工有收款项,请修改收款信息或删除收款信息后再来进行此操作";
            }
            /*判断员工是否有付款项*/
            $parkm = DB::name("incomeexpenditure")->where(array('payment_id'=>array('in',input('id'))))->field("COUNT(*)")->find();
            if($parkm['COUNT(*)'] != 0){
                 return "该员工有付款项,请修改收款信息或删除收款信息后再来进行此操作";
            }
            $log = DB::name("staff")->where($where)->field('name')->select();
            $res = DB::name("staff")->where($where)->delete();
            if($res){
                foreach ($log as $k => $v) {
                    $this->lw_log("3","删除了员工为".$log[$k]['name'],"Enterprise",'staff_list');
                }
                return "success";
            }else{
                return "操作失败!";
            }
        }else{
            return "请选择删除的信息";
        }
    }
    /**
     * 园区列表
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public function garden_list($where){
        $res['list'] = DB::name("park")->where($where)->order("id desc")->field("id,name,company_id,bank_id,finance_id,managers_id,address")->select();
        $res['num']  = count($res['list']);
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num']  = $arr[$k]; 
            $company                       = DB::name('company')->where(array('id'=>$res['list'][$k]['company_id']))->field('name')->select();
            $res['list'][$k]['company_id'] = $company[0]['name'];
            $bank                          = DB::name('bank')->where(array('id'=>$res['list'][$k]['bank_id']))->field('bank_number')->select();
            $res['list'][$k]['bank_id']    = $bank[0]['bank_number'];
            $finance                       = DB::name('staff')->where(array('id'=>$res['list'][$k]['finance_id']))->field('name,mobile')->select();
            $res['list'][$k]['finance_id'] =  $finance[0]['name'];
            $res['list'][$k]['finance_m']  =  array_shift(explode(',',$finance[0]['mobile']));
            $managers                      = DB::name('staff')->where(array('id'=>$res['list'][$k]['managers_id']))->field('name,mobile')->select();
            $res['list'][$k]['managers_id']=  $managers[0]['name'];
            $res['list'][$k]['managers_m'] =  array_shift(explode(',',$managers[0]['mobile']));

        }
        return $res; 
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
            return "请填园区名";     
        }
        if(empty(input('address'))){
            return "请填写地址";     
        }
        if(empty(input('company_id'))){
            return "请选择正确的公司名";     
        }
        if(empty(input('bank_id'))){
            return "请选择正确的账户名";     
        }
        if(empty(input('finance_id'))){
            return "请选择正确财务人";     
        }
        if(empty(input('managers_id'))){
            return "请选择正确管理人";     
        }
        $where['name'] = input('name');
        $find = DB::name("park")->where($where)->field("COUNT(*)")->find();
        if($find['COUNT(*)'] != 0){
             return "该园区名已经被占用";
        }
        $compare = DB::name("bank")->where(array('company_id'=>input('company_id'),'id'=>input('bank_id')))->field("COUNT(*)")->find();
        if($compare['COUNT(*)'] == 0){
             return "公司和账户不匹配";
        }
        $res = DB::name("park")->insertGetId($data);
        if($res){
            $this->lw_log("2","添加了园区为".input('name'),"Enterprise",'garden_list');
            return "success";
        }else{
            return "操作失败";
        }

    }
    /**
     * 修改园区信息
     * @Author   wcl
     * @DateTime 2017-09-11T21:03:23+0800
     * @return   [type]                   [description]
     */
    public function garden_edit(){
        if(request()->isGet()){
           
            $res          =DB::name("park")->where("id",input('id'))->field("id,name,company_id,bank_id,finance_id,managers_id,address")->find(); 
            $company                       = DB::name('company')->where(array('id'=>$res['company_id']))->field('name')->select();
            $res['company_name'] = $company[0]['name'];
            $bank                          = DB::name('bank')->where(array('id'=>$res['bank_id']))->field('bank_number')->select();
            $res['bank_name']    = $bank[0]['bank_number'];
            $finance                       = DB::name('staff')->where(array('id'=>$res['finance_id']))->field('name,mobile')->select();
            $res['finance_name'] =  $finance[0]['name']." (".array_shift(explode(',',$finance[0]['mobile'])).")";
            $managers                      = DB::name('staff')->where(array('id'=>$res['managers_id']))->field('name,mobile')->select();
            $res['managers_name']=  $managers[0]['name']." (".array_shift(explode(',',$managers[0]['mobile'])).")";
          //  p_r($res );die();
            return $res;
        }else if(request()->isPost()){
            $data['id'] = input('id');
            $data['name']            = input('name');
            $data['address']         = input('address');
            $data['company_id']      = input('company_id');
            $data['bank_id']         = input('bank_id');
            $data['finance_id']      = input('finance_id');
            $data['managers_id']     = input('managers_id');
            $data['create_time']     = time();
            $data['create_id']       = $_SESSION['id']; 
            if(empty(input('name'))){
                return "请填园区名";     
            }
            if(empty(input('address'))){
                return "请填写地址";     
            }
            if(empty(input('company_id'))){
                return "请选择正确的公司名";     
            }
            if(empty(input('bank_id'))){
                return "请选择正确的账户名";     
            }
            if(empty(input('finance_id'))){
                return "请选择正确财务人";     
            }
            if(empty(input('managers_id'))){
                return "请选择正确管理人";     
            }
            $where['id'] = array("neq",input('id'));
            $where['name'] = input('name');
            $find = DB::name("park")->where($where)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] != 0){
                 return "该园区名已经被占用";
            }
            $compare = DB::name("bank")->where(array('company_id'=>input('company_id'),'id'=>input('bank_id')))->field("COUNT(*)")->find();
            if($compare['COUNT(*)'] == 0){
                 return "公司和账户不匹配";
            }
            $res = DB::name("park")->update($data);
            if($res){
                $this->lw_log("4","修改了园区为".input('name'),"Enterprise",'garden_list');
                return "success";
            }else{
                return "操作失败";
            }
        }
    }
    /*
     *园区删除
     **/
    public function garden_del(){
        if(request()->isPost()){
            $where['id'] = array("in",input('id'));
            $log = DB::name("park")->where($where)->field('name')->select();
            $res = DB::name("park")->where($where)->delete();
            if($res){
                foreach ($log as $k => $v) {
                    $this->lw_log("3","删除了园区为".$log[$k]['name'],"Enterprise",'staff_list');
                }
                return "success";
            }else{
                return "操作失败!";
            }
        }else{
            return "请选择删除的信息";
        }
    }
    /**
     * 异步获取下拉选项数据
     * @return [type] [description]
     */
    public function garden_selectinfo(){
        $type = input('type');
        $name = input('name');
        $company_id = input('company_id');
        switch ($type) {
            case 1:
                $where['name'] = array("like","%".$name."%");
                $res           = DB::name('company')->where($where)->field('id,name')->select();
                break;

            case 2:
                $where['bank_number'] = array("like","%".$name."%");
                if($company_id!=""){
                    $where['company_id'] = $company_id;
                }
                $res = DB::name('bank')->where($where)->field('id,bank_name,bank_number,name')->select();
                foreach ($res as $key => $value) {
                     $bank              = DB::name('dictionary')->where(array('id'=>$res[$key]['name']))->field('id,name')->select();
                     $res[$key]['name'] = $bank[0]['name'];
                     $res[$key]['name'] = $res[$key]['bank_number']." (".$res[$key]['bank_name'].") "." (".$res[$key]['name'].")";
                }
                break;

            case 3:
                $where['name'] = array("like","%".$name."%");
                $where['status'] = 1;
                $res = DB::name('staff')->where($where)->field('id,name,mobile')->select();
                foreach ($res as $key => $value) {
                    $res[$key]['name'] = $res[$key]['name']." (".array_shift(explode(',',$res[$key]['mobile'])).")";
                }
                break;

            default:
                $where['status'] = 1;
                $where['name'] = array("like","%".$name."%");
                $res = DB::name('staff')->where($where)->field('id,name,mobile')->select();
                foreach ($res as $key => $value) {
                    $res[$key]['name'] = $res[$key]['name']." (".array_shift(explode(',',$res[$key]['mobile'])).")";
                }
                break;
        }
        return $res;
    }
}