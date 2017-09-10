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

public function xx(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 89;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xx_del(){
        $index = model('Order');
        $res = $index->xx_del();
        return $res;
    }
    /*添加*/
    public function xx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xx_add();
            return $res;
          }else{
            $data['auth_id'] = 89;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 89;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role,lbq,text')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xx_edit();
            return $res;
          }
    }
public function yy(){
    if(!empty(input('name'))){
        $check['lbq']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 90;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->yy($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function yy_del(){
        $index = model('Order');
        $res = $index->yy_del();
        return $res;
    }
    /*添加*/
    public function yy_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->yy_add();
            return $res;
          }else{
            $data['auth_id'] = 90;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function yy_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','yy');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 90;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);

            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,text,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->yy_edit();
            return $res;
          }
    }
public function sx(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 92;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sx_del(){
        $index = model('Order');
        $res = $index->sx_del();
        return $res;
    }
    /*添加*/
    public function sx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sx_add();
            return $res;
          }else{
            $data['auth_id'] = 92;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 92;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq,text')->find();
            $this->assign('row',$row);
            //var_dump($row);exit;
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sx_edit();
            return $res;
          }
    }
public function sxz(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 93;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxz_del(){
        $index = model('Order');
        $res = $index->sxz_del();
        return $res;
    }
    /*添加*/
    public function sxz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxz_add();
            return $res;
          }else{
            $data['auth_id'] = 93;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 93;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role,lbq,text')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxz_edit();
            return $res;
          }
    }
}