<?php
namespace app\admin\controller;
use \think;
use think\Controller;
class Order extends Controller
{
    public function index(){
        $data['type']=array('gt','122');
        $name=db('user')->where($data)->field('type')->select();
        var_dump($name);
    }
public function in(){
 $row=1;   
    }
}