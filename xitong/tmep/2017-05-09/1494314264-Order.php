<?php
namespace app\admin\controller;
class Order extends Common
{
    public function index(){
        if(input('name')){
          $check['username']=array("like","%".input('name')."%");
        }else{
          $check="1";
        }
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model("Order");
        $row = $index->index($page,$check);
        $this->assign("row",$row);
        $this->assign("contrll","Order");
        return $this->fetch();
    }
    public function index_del(){
      return "success";
    }
}