<?php
namespace app\admin\controller;
use \think;
use think\Controller;
class Order extends Controller
{
    public function index(){
        return $this->fetch();
    }
public function asd(){
  $name = db('user')->field('id')->select();
  var_dump($name);
    }
public function asa(){
  $name = db('user')->field('id')->select();
  var_dump($name);
    }
public function asaa(){
  $name = db('user')->field('id')->select();
  var_dump($name);
    }
}