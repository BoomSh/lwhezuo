<?php
namespace app\admin\controller;
use \think;
use think\Controller;
class Order extends Controller
{
    public function index(){
        return $this->fetch();
    }
}