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


public function asd(){
    if(input('name')){
        $check['username']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->asd($page,$check);
        var_dump($row);exit;
        $this->assign('row',$row);
        return $this->fetch();
    }
public function asds(){
    if(input('name')){
        $check['username']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->asds($page,$check);
        $this->assign('row',$row);
        return $this->fetch();
    }
public function asdsd(){
    if(input('name')){
        $check['username']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->asdsd($page,$check);
        $this->assign('row',$row);
        return $this->fetch();
    }
}