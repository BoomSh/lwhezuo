<?php
namespace app\admin\controller;

class Order extends Common
{
    public function index(){
        if(!empty(input('name'))){
          $check['username']=array("like","%".input('name')."%");
        }else{
          $check="1";
        }
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model("Order");
        $row = $index->index($page,$check);
        $res = db("auth_name")->where("auth_id","37")->select();
        $this->assign("res",$res);
        //var_dump($res);
        $this->assign("row",$row);
        $this->assign("contrll","Order");
        return $this->fetch();
    }
public function index_del(){
  $index = model("Order");
  $res = $index->index_del();
  return $res;
}

public function index_add(){
  if(request()->isPost()){
    $index = model("Order");
    $res = $index->index_add();
    return $res;
  }else{
    $this->assign("contrll","Order");
    return $this->fetch();
  }
}

public function ids(){
  file_put_contents("aa.txt", "asd");
  $res = db("auth")->field("id")->order("id desc")->find();
  return $res['id'];
}

public function index_edit(){
  $this->assign("contrll","Order");
  if(isset($_GET['uid'])){
   $res=db("aa")->where("id",$_GET['uid'])->field("id,username,lbq,role")->find();
   $this->assign("res",$res);
    return $this->fetch();
  }
  if(isset($_POST)){
    $index = model("Order");
    $res = $index->index_edit();
    return $res;
  }
}
}