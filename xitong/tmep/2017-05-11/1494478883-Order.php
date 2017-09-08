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
public function sad(){
    if(!empty(input('name'))){
        $check['username']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $data['auth_id'] = 41;
        $res = db("auth_name")->where($data)->select();
        $row = $index->sad($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sad_del(){
        $index = model('Order');
        $res = $index->sad_del();
        return $res;
    }
    /*添加*/
    public function sad_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sad_add();
            return $res;
          }else{
            $this->assign('contrll','Order');
            $this->assign('ff','sad');
            return $this->fetch();
          }
    }
    /*修改*/
    public function sad_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sad');
        if(isset($_GET['uid'])){
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,username')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sad_edit();
            return $res;
          }
    }
public function yy(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 44;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->yy($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        var_dump($res);
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
            $data['auth_id'] = 44;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            var_dump($res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function yy_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','yy');
        if(isset($_GET['uid'])){
            $data['id'] = 1;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,role')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->yy_edit();
            return $res;
          }
    }
public function ddgl(){
    if(!empty(input('name'))){
        $check['role']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 45;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->ddgl($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function ddgl_del(){
        $index = model('Order');
        $res = $index->ddgl_del();
        return $res;
    }
    /*添加*/
    public function ddgl_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->ddgl_add();
            return $res;
          }else{
            $data['auth_id'] = 45;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function ddgl_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','ddgl');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 45;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            var_dump($row);
            exit;
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,role,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->ddgl_edit();
            return $res;
          }
    }
public function sd(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 46;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sd($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sd_del(){
        $index = model('Order');
        $res = $index->sd_del();
        return $res;
    }
    /*添加*/
    public function sd_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sd_add();
            return $res;
          }else{
            $data['auth_id'] = 46;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sd_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sd');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 46;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,role,lbq')->find();
            $this->assign('res',$res);
            //var_dump($res);exit;
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sd_edit();
            return $res;
          }
    }
public function dd(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 47;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->dd($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function dd_del(){
        $index = model('Order');
        $res = $index->dd_del();
        return $res;
    }
    /*添加*/
    public function dd_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->dd_add();
            return $res;
          }else{
            $data['auth_id'] = 47;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function dd_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','dd');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 47;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,role,lbq')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->dd_edit();
            return $res;
          }
    }
}