<?php
namespace app\admin\model;
use \think\Model;
class Order extends Model{
    public function asa(){
        return 1;
    }
public function asaa(){
  $name = db('user')->field('id')->select();
  var_dump($name);
    }
}