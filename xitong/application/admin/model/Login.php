<?php
/**
 * @Author: anchen
 * @Date:   2017-05-05 14:51:14
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-09-07 15:54:58
 */
namespace app\admin\model;

use think\Model;
use think\Cookie;
use think\DB;
class Login extends Model
{
    /**
    登陆验证
    **/
    public function login(){
        session_start();
        $where['username'] = input('username');
        $where['password'] = md5(md5(input('password'))."weizone");
        $where['state'] = 1;
        $res = DB::name("admin")->where($where)->field("id,loginsum,name,role_id,new_ip,new_time")->find();
        //return DB::name("admin")->getlastsql();
        /*判断是否有选择保存登录账户*/
        $online = input("online");
        if(!empty($online)){
            /**防止版本不一样 参数做不了变量判断**/
            Cookie::set('id',$res['id'],60*60*24*30);
        }
        if($res){
            $_SESSION['id'] = $res['id'];
            $_SESSION['role_id'] = $res['role_id'];
            $_SESSION['name'] = $res['name'];
            /*添加登录次数*/
            $data['loginsum'] = $res['loginsum'] + 1;
            $data['id'] = $res['id'];
            $data['last_time'] = $res['new_time'];
            $data['last_ip'] = $res['new_ip'];
            $data['new_time'] = date("Y-m-d H:i:s",time());
            $data['new_ip'] = $_SERVER["REMOTE_ADDR"];
            DB::name("admin")->update($data);
            $this->lw_log("1","登录成功","login",'login');
            return "success";
        }else{
            return "账号或者密码错误";
        }
    }
    /*通过cookie 进入网站*/
    public function xxkie($id){
        $res = DB::name("admin")->where("id",$id)->field("id,loginsum,name,role_id,new_ip,new_time")->find();
        if($res){
            $_SESSION['id'] = $res['id'];
            $_SESSION['role_id'] = $res['role_id'];
            $_SESSION['name'] = $res['name'];
            /*添加登录次数*/
            $data['loginsum'] = $res['loginsum'] + 1;
            $data['id'] = $res['id'];
            $data['last_time'] = $res['new_time'];
            $data['last_ip'] = $res['new_ip'];
            $data['new_time'] = date("Y-m-d H:i:s",time());
            $data['new_ip'] = $_SERVER["REMOTE_ADDR"];
            DB::name("admin")->update($data);
            return "success";
        }else{
             /*cookie 不存在  则对应的管理员被删除  需重新登录*/
            return "error";
        }
    }
/**
     * 操作日志
     * @access protected
     * @param  string  $order   操作类型  1 登录 2添加  3 删除 4 改
     * @param  string $fluff       操作内容
     * @param  string $auth_c       操作控制器
     * @param  string $auth_a     展示页面的方法
     */
     public function lw_log($order='',$fluff='',$auth_c='',$auth_a=''){
            $data['user_id'] = $_SESSION['id'];
            $data['user_name'] = $_SESSION['name'];
            $where['auth_c'] = $auth_c;
            $where['auth_a'] = $auth_a;
            $find = DB::name("auth")->where($where)->field("id")->find();
            if($find){
                $data['menu_id'] = $find['id'];
            }else{
                $data['menu_id'] = 0;
            }
            $data['create_time'] = date("Y-m-d H:i:s",time());
            $data['result'] = $order;
            $data['remarks'] = $fluff;
            $data['user_ip'] = $_SERVER["REMOTE_ADDR"];
            $log = DB::name("log")->insert($data);
            if($log){
                return "success";
            }else{
                return "error";
            }
     }
}