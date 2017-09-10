<?php
namespace app\admin\controller;
use \think;
use think\Controller;
use \think\Db;
class Index extends Common
{
    // 框架首页
    public function index() {
        $index = model('Index');
        /*获取导航栏*/
        $ban = $index->ban();
        /*获取管理员的个人信息*/
        $admin = $index->admin();
        $this->assign("admin",$admin);
        $this->assign("ban",$ban);
        return $this->fetch();
    }
    /*欢迎页面*/
    public function welcome(){
        echo 1;
    }
}
