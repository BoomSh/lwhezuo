<?php
namespace app\admin\controller;
use \think\Request;
use \think\Db;
class Order extends Common
{
    public function index(){
        if(!empty(input('name'))){
          $check['username']=array("like","%".input('name')."%");
          $this->assign("name",input('name'));
        }else{
          $check="1";
          $this->assign("name",'');
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




public function xzxc(){
    if(!empty(input('type')) || !empty(input('role')) || !empty(input('lbq')) || !empty(input('text'))){
                $sql = "";
                $gz = '';
                $neir = '';
                if(!empty(input('type'))){
                        $check['type']=array('like','%'.input('type'));
                        if(trim(input('type')) != ''){
                            $sql .= 'type'."//";
                            $gz .= "2//";
                            $neir .= input('type')."//";
                        }
                }
                $this->assign("type",input('type'));
                if(!empty(input('role'))){
                        $check['role']=array('like',input('role'));
                    if(trim(input('role')) != ''){
                        $sql .= 'role'."//";
                        $gz .= "1//";
                        $neir .= input('role')."//";
                    }
                }
                $this->assign("role",input('role'));
                if(!empty(input('lbq'))){
                        $check['lbq']=array('like',input('lbq').'%');
                    if(trim(input('lbq')) != ''){
                        $sql .= 'lbq'."//";
                        $gz .= "3//";
                        $neir .= input('lbq')."//";
                    }
                }
                    $this->assign("lbq",input('lbq'));
                if(!empty(input('text'))){
                        $check['text']=array('like','%'.input('text').'%');
                    if(trim(input('text')) != ''){
                        $sql .= 'text'."//";
                        $gz .= "4//";
                        $neir .= input('text')."//";
                    }
                }
                $this->assign("text",input('text'));
                $this->assign("sql",substr($sql,0,-2));
                $this->assign("gz",substr($gz,0,-2));
                $this->assign("neir",substr($neir,0,-2));
                }else{
                    $check='1';$this->assign("type",'');
                    $this->assign("role",'');
                    $this->assign("lbq",'');
                    $this->assign("text",'');
                    $this->assign("sql",'1');
                    $this->assign("gz",'1');
                    $this->assign("neir",'1');
                }
        $data['auth_id'] = 135;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xzxc($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xzxc_del(){
        $index = model('Order');
        $res = $index->xzxc_del();
        return $res;
    }
    /*添加*/
    public function xzxc_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xzxc_add();
            return $res;
          }else{
            $data['auth_id'] = 135;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xzxc_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xzxc');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 135;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,lbq,role,type,text')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xzxc_edit();
            return $res;
          }
    }
}