<?php
namespace app\admin\controller;
use \think;
class Order{
    public function index(){
        $data['type']=array('gt','122');
        $name=db('user')->where($data)->field('type')->select();
        var_dump($name);
    }
public function uses(){
            $order=123;
        }
public function uses1(){
            $order=123;
        }
public function user(){
            
        }
public function usss(){
            
        }
public function uss(){
            
        }
}