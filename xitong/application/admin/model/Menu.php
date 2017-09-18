<?php
namespace app\admin\model;

use think\Model;
use think\Db;
class Menu extends Common
{
    /*
    **字典设置
    */
   public function dictionary_list($where){
        $res['list'] = DB::name("dictionary")->where($where)->order("id desc")->field("id,type,name,status")->select();
        foreach ($res['list'] as $k => $v) {
             $res['list'][$k]['k'] = $k;
            if($res['list'][$k]['status'] == 1){
                $res['list'][$k]['status'] = "正常";
            }else{
                $res['list'][$k]['status'] = "失效";
            }
        }
        $res['num'] = count($res['list']);
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num'] = $arr[$k];
        }
        return $res;
   }

   /*
   **添加字典
    */
   public function dictionary_add(){
        if(request()->isPost()){
            $data['name'] = input('username');
            $data['type'] = input('city');
            if(empty(input('city'))){
                return "请选择一种字典类型";
            }
            if(empty(input('username'))){
                return "请填写字典名称";
            }
            $find = DB::name("dictionary")->where('name',input('username'))->field("COUNT(*)")->find();
            if($find['COUNT(*)'] != 0){
                 return "该字段名称已被占用";
            }
            if(empty(input('time'))){
                $data['status'] = 1;
            }else{
                $data['status'] = 2;
            }
            $res = DB::name("dictionary")->insertGetId($data);
            if($res){
                $this->lw_log("2","添加了字典为".input('username'),"Admin",'dictionary_list');
                return "success";
            }else{
                return "操作失败";
            }
        }
    }
    /*
     *字典删除
     **/
    public function dictionary_del(){
        if(request()->isPost()){
            /*判断银行类型字典值是否在使用*/
            $bank = DB::name("bank")->where(array('name'=>array('in',input('id'))))->field("COUNT(*)")->find();
            if($bank['COUNT(*)'] != 0){
                 return "该字典值正在被公司信息使用,请修改公司信息或删除公司信息后再来进行此操作";
            }
            $where['id'] = array("in",input('id'));
            $log = DB::name("dictionary")->where($where)->field('name')->select();
            foreach ($log as $k => $v) {
                $this->lw_log("3","删除了字典为".$log[$k]['name'],"Admin",'dictionary_list');
            }
            $res = DB::name("dictionary")->where($where)->delete();
            if($res){
                return "success";
            }else{
                return "操作失败!";
            }
        }else{
            return "请选择删除的信息";
        }
    }
    /*
   **编辑 字典
    */
   public function dictionary_edit(){
        if(request()->isGet()){
            $res = DB::name("dictionary")->where("id",input('id'))->field("id,type,name,status")->find();
            return $res;
        }else if(request()->isPost()){
            $data['id'] = input('id');
            $data['name'] = input('username');
            $data['type'] = input('city');
            if(empty(input('city'))){
                return "请选择一种字典类型";
            }
            if(empty(input('username'))){
                return "请填写字典名称";
            }
            $where['id'] = array("neq",input('id'));
            $where['name'] = input('username');
            $find = DB::name("dictionary")->where($where)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] != 0){
                 return "该字段名称已被占用";
            }
            if(empty(input('time'))){
                $data['status'] = 1;
            }else{
                $data['status'] = 2;
            }
            $res = DB::name("dictionary")->update($data);
            $this->lw_log("4","修改了字典为".input('username'),"Admin",'dictionary_list');
            if($res){
                return "success";
            }else{
                return "操作失败";
            }
        }
   }
   /*
    **系统设置
    */
   public function system_list($where){
        $res['list'] = DB::name("system")->where($where)->order("id desc")->field("id,field,description,name")->select();
        foreach ($res['list'] as $k => $v) {
            $res['list'][$k]['k'] = $k;
        }
        $res['num'] = count($res['list']);
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num'] = $arr[$k];
        }
        return $res;
   }
   /*
   **添加字典
    */
   public function system_add(){
        if(request()->isPost()){
            $data['description'] = input('sex');
            $data['name'] = input('uploadfile');
            $data['field'] = input('username');
            if(empty(input('sex'))){
                return "请选择该字段的描述";
            }
            if(empty(input('username'))){
                return "请填写字段";
            }
            if(empty(input('uploadfile'))){
                return "请填写字段值";
            }
            $find = DB::name("system")->where('name',input('username'))->field("COUNT(*)")->find();
            if($find['COUNT(*)'] != 0){
                 return "该字段已被占用";
            }
            $res = DB::name("system")->insertGetId($data);
            if($res){
                $this->lw_log("2","增加了字段为".input('uploadfile'),"Admin",'system_list');
                return "success";
            }else{
                return "操作失败";
            }
        }
    }
    /*
     *字段删除
     **/
    public function system_del(){
        if(request()->isPost()){
            $where['id'] = array("in",input('id'));
            $log = DB::name("system")->where($where)->field('name')->select();
            foreach ($log as $k => $v) {
                $this->lw_log("3","删除了字段为".$log[$k]['name'],"Admin",'system_list');
            }
            $res = DB::name("system")->where($where)->delete();
            if($res){
                return "success";
            }else{
                return "操作失败!";
            }
        }else{
            return "请选择删除的信息";
        }
    }
    /*
   **编辑 字典
    */
   public function system_edit(){
        if(request()->isGet()){
            $res = DB::name("system")->where("id",input('id'))->field("id,field,description,name")->find();
            return $res;
        }else if(request()->isPost()){
            $data['id'] = input('id');
            $data['description'] = input('sex');
            $data['name'] = input('uploadfile');
            $data['field'] = input('username');
            if(empty(input('sex'))){
                return "请选择该字段的描述";
            }
            if(empty(input('username'))){
                return "请填写字段";
            }
            if(empty(input('uploadfile'))){
                return "请填写字段值";
            }
            $where['id'] = array("neq",input('id'));
            $where['field'] = input('username');
            $find = DB::name("system")->where($where)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] != 0){
                 return "该字段已被占用";
            }
            $res = DB::name("system")->update($data);
            $this->lw_log("4","修改了字段为".input('username'),"Admin",'system_list');
            if($res){
                return "success";
            }else{
                return "操作失败";
            }
        }
   }

    /*
    **日志管理
    */
   public function systemlog_list($where){
        $res['list'] = DB::name("log")->where($where)->field("id,result,remarks,create_time,user_name,user_ip")->order("id desc")->select();
        foreach ($res['list'] as $k => $v) {
            $res['list'][$k]['k'] = $k;
            if($res['list'][$k]['result'] == 1){
                $res['list'][$k]['result'] = "登录";
            }
            if($res['list'][$k]['result'] == 2){
                $res['list'][$k]['result'] = "增加";
            }
            if($res['list'][$k]['result'] == 3){
                $res['list'][$k]['result'] = "删除";
            }
            if($res['list'][$k]['result'] == 4){
                $res['list'][$k]['result'] = "修改";
            }
            if($res['list'][$k]['result'] == 5){
                $res['list'][$k]['result'] = "审查";
            }
        }
        $res['num'] = count($res['list']);
        $arr = $this->lw_number($res['num']);
        foreach($res['list'] as $k => $v) {
            $res['list'][$k]['num'] = $arr[$k];
        }
        return $res;
   }
    /*
     *日志删除
     **/
    public function systemlog_del(){
        if(request()->isPost()){
            $where['id'] = array("in",input('id'));
            $res = DB::name("log")->where($where)->delete();
            if($res){
                return "success";
            }else{
                return "操作失败!";
            }
        }else{
            return "请选择删除的信息";
        }
    }

/*获取菜单导航信息*/
    public function lists($where){
        $res['list'] = DB::name("auth")->field("id,auth_name,auth_c,auth_a,is_show,auth_level,auth_pid")->where($where)->order("id desc")->select();
        foreach ($res['list'] as $k => $v) {
            $res['list'][$k]['k'] = $k;
            if($res['list'][$k]['auth_pid'] == 0){
                $res['list'][$k]['name'] = "主菜单";
            }else{
                $find = DB::name("auth")->field("auth_name")->where("id",$res['list'][$k]['auth_pid'])->find();
                $res['list'][$k]['name'] = $find['auth_name'];
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


    /*添加菜单导航*/
    public function listsadd(){
        if(request()->isPost()){
            /*开启事物*/
            Db::startTrans();
            $data['auth_name'] = input('auth_name');
            $data['auth_pid'] = input('pid');
            if(!empty(input('auths'))){
                $data['auth'] = substr(input('auths'),0,-1);
            }
            if(input('pid') == 0){
                /*选择为主菜单时*/
                $where['auth_name'] = input('auth_name');
                $where['auth_pid'] = 0;
                $find = DB::name("auth")->where($where)->field("COUNT(*)")->find();
                if($find['COUNT(*)'] != 0){
                    return "该主菜单名称已被占用";
                }else{
                    $data['auth_pid'] = 0;
                    $data['sort'] = !empty(input('sort'))?input('sort'):0;
                    $data['img'] = input('img');
                    $data['remark'] = input('remark');
                    $data['auth_level'] = 0;
                    $id =  DB::name("auth")->insertGetId($data);
                    $next['id'] = $id;
                    $next['auth_path'] = $id;
                    $upd = DB::name("auth")->update($next);
                    if($id && $upd){
                        Db::commit();
                        $this->lw_log("2","增加了了菜单为".input('auth_name'),"Menu",'lists');
                        return "success";
                    }else{
                      Db::rollback();
                      return "操作失败";
                    }
                }
            }else{
                /*选择为二级主菜单时*/
                $data['auth_c'] = input('auth_c');
                $data['auth_a'] = input('auth_a');
                $data['sort'] = !empty(input('sort'))?input('sort'):0;
                if(empty($data['auth_c'])){
                    return "请输入控制器的名称";
                }
                if(empty($data['auth_a'])){
                    return "请输入方法的名称";
                }
                $where['auth_name'] = input('auth_name');
                $where['auth_pid'] = input('pid');
                $find = DB::name("auth")->where($where)->field("COUNT(*)")->find();
                if($find['COUNT(*)'] != 0){
                    return "该主菜单已存在该名称的导航";
                }else{
                    $data['auth_pid'] = input('pid');
                    $data['remark'] = input('remark');
                    $data['auth_level'] = 1;
                    $id =  DB::name("auth")->insertGetId($data);
                    $next['id'] = $id;
                    $next['auth_path'] = $id."-".input('pid');
                    $upd = DB::name("auth")->update($next);
                    if($id && $upd){
                        Db::commit();
                        $this->lw_log("2","增加了了菜单为".input('auth_name'),"Menu",'lists');
                        return "success";
                    }else{
                      Db::rollback();
                      return "操作失败";
                    }
                }
            }
        }else{
            /*获取一级菜单导航信息*/
            $res = DB::name("auth")->where("auth_pid",0)->field("id,auth_name")->select();
            return $res;
        }
    }
    /*修改菜单导航*/
    public function listsedit(){
        if(request()->isPost()){
            $data['auth_name'] = input('auth_name');
            $data['auth_pid'] = input('pid');
            $data['id'] = input('id');
            if(input('pid') == 0){
                /*选择为主菜单时*/
                $where['id'] = array("neq",input('id'));
                $where['auth_name'] = input('auth_name');
                $where['auth_pid'] = 0;
                $find = DB::name("auth")->where($where)->field("COUNT(*)")->find();
                if($find['COUNT(*)'] != 0){
                    return "该主菜单名称已被占用";
                }else{
                    $data['remark'] = input('remark');
                    $data['sort'] = !empty(input('sort'))?input('sort'):0;
                    if(!empty(input('img'))){
                        $data['img'] = input('img');
                    }
                    $id =  DB::name("auth")->update($data);
                    //return DB::name("auth")->getlastsql();
                    if($id){
                        $this->lw_log("4","修改了菜单为".input('auth_name'),"Menu",'lists');
                        return "success";
                    }else{
                      return "操作失败";
                    }
                }
            }else{
                /*选择为二级主菜单时*/
                $data['auth_c'] = input('auth_c');
                $data['auth_a'] = input('auth_a');
                if(!empty(input('auths'))){
                    $data['auth'] = substr(input('auths'),0,-1);
                }
                if(empty($data['auth_c'])){
                    return "请输入控制器的名称";
                }
                if(empty($data['auth_a'])){
                    return "请输入方法的名称";
                }
                $find = DB::name("auth")->where("auth_pid",input('id'))->field("COUNT(*)")->find();
                if($find['COUNT(*)'] != 0){
                    return "该主菜单存在二级菜单";
                }
                $where['id'] = array("neq",input('id'));
                $where['auth_name'] = input('auth_name');
                $where['auth_pid'] = input('pid');
                $find = DB::name("auth")->where($where)->field("COUNT(*)")->find();
                if($find['COUNT(*)'] != 0){
                    return "该主菜单已存在该名称的导航";
                }else{
                    $data['auth_pid'] = input('pid');
                    $data['remark'] = input('remark');
                    $data['auth_level'] = 1;
                    $data['sort'] = !empty(input('sort'))?input('sort'):0;
                    $data['auth_path'] = input('pid')."-".input('id');
                    $id =  DB::name("auth")->update($data);
                    if($id){
                        $this->lw_log("4","修改了菜单为".input('auth_name'),"Menu",'lists');
                        return "success";
                    }else{
                      return "操作失败";
                    }
                }
            }
        }else if(request()->isGet()){
            /*获取被选择菜单导航信息*/
            $res = DB::name("auth")->where("id",input('id'))->field("id,auth_name,auth_a,auth_c,remark,auth_pid,auth,sort,img")->find();
            if(!empty($res['auth'])){
                $arr = explode(",", $res['auth']);
                if(in_array("1",$arr)){
                    $res['auths']['add'] = 1;
                }
                if(in_array("2",$arr)){
                    $res['auths']['edit'] = 1;
                }
                if(in_array("3",$arr)){
                    $res['auths']['del'] = 1;
                }
                if(in_array("4",$arr)){
                    $res['auths']['view'] = 1;
                }
                if(in_array("6",$arr)){
                    $res['auths']['excelin'] = 1;
                }
                if(in_array("7",$arr)){
                    $res['auths']['excelout'] = 1;
                }
            }
             /*获取一级菜单导航信息*/
            $res['list'] = DB::name("auth")->where("auth_pid",0)->field("id,auth_name")->select();
            return $res;
        }else{
            return "请选择修改的菜单";
        }
    }

    /*删除菜单栏*/
    public function listsdel(){
        if(request()->isPost()){
            $where['auth_pid'] = array("in",input('id'));
            $find = DB::name("auth")->where($where)->field("COUNT(*)")->find();
            if($find['COUNT(*)'] != 0){
                return "主菜单存在二级菜单,无法直接删除";
            }
            $data['id'] = array("in",input('id'));
            $log = DB::name("auth")->where($data)->field('auth_name')->select();
            foreach ($log as $k => $v) {
               $this->lw_log("3","删除了菜单为".$log[$k]['auth_name'],"Menu",'lists');
            }
            $del = DB::name("auth")->where($data)->delete();
            if($del){
                    return "success";
            }else{
                    return "操作失败";
            }
        }
    }

}