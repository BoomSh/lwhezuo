<?php
namespace app\admin\model;
use \think\Db;

class Order extends Common{
    public function index($page,$check){
        $res['row'] = db('admin')->field("id,username")->where($check)->order("id desc")->limit(($page-1)*2,2)->select();
        $num = db('admin')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/2);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?name=".input("name")."&"."page=".$page;
        }
       $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }


}