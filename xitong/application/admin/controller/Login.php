<?php
/**
 * @Author: anchen
 * @Date:   2017-05-05 14:50:05
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-09-08 20:17:29
 */
namespace app\admin\controller;
use \think;
use think\Controller;
use think\DB;
use think\Cookie;
class Login extends Controller
{
       /*登录*/
    public function login(){
        $index = model('Login');
        $cookie = cookie('id')?cookie("id"):'';
        /**防止版本不一样 参数做不了变量判断**/
        if($cookie){
          /*存在cookie 先保存 session 后 直接跳转*/
          $result = $index->xxkie($cookie);
          if($result == "success"){
              $this->redirect("Index/Index");
          }else{
              /*清除记录*/
              session_start(); 
              $_SESSION['id'] = null;
              Cookie::set('id',null,-1);
              return $this->fetch();
          }
        }else{
           /*开启session*/
        $this->assign("contrll","Index");
        $this->assign("action","index");
        if(request()->isPost()){
           /*先匹配下验证码*/
           $code = $this->checkVerify(input('code'));
           if(!$code){
             return "验证码错误";
           }
           $login = $index->login();
           return $login;
        }else{
               /*清除记录*/
              session_start(); 
              $_SESSION['id'] = null;
              Cookie::set('id',null,-1);
              return $this->fetch();
        }
        }
    }
    /**验证码**/
    public function verify(){
        $Verify = new \Verify();
        $Verify->length=4;
        $Verify->imageH="60px";
        $Verify->imageW="120px";
        $Verify->fontSize="18px";
        $Verify->useNoise=false;
        $Verify->entry();
    }
    /**
     * 验证码检测
     * 检测输入的验证码是否正确，$code为用户输入的验证码字符串
     **/
    function checkVerify($code){
        $verify = new \Verify();
        return $verify->check($code);
    }
    /*退出 重新登录 
    清除session 和 cookie
    */
    public function out(){
              session_start(); 
              $_SESSION['id'] = null;
              Cookie::set('id',null,-1);
              $this->redirect("Index/Index");
    }
}