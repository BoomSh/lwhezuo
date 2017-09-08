<?php
namespace app\admin\controller;
use \think;
class Order{
    public function index(){
        $data['type']=array('gt','122');
        $name=db('user')->where($data)->field('type')->select();
        var_dump($name);
    }
public function indexfs(){
            $order=123;
        }
}