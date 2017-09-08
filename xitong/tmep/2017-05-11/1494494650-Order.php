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
    public function sd(){
      if(!empty(input('name'))){
        $check['username']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $data['auth_id'] = 41;
        $res = db("auth_name")->where($data)->select();
        $row = $index->sd($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
public function sas(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 69;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sas($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sas_del(){
        $index = model('Order');
        $res = $index->sas_del();
        return $res;
    }
    /*添加*/
    public function sas_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sas_add();
            return $res;
          }else{
            $data['auth_id'] = 69;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sas_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sas');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 69;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sas_edit();
            return $res;
          }
    }
public function sda(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 71;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sda($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sda_del(){
        $index = model('Order');
        $res = $index->sda_del();
        return $res;
    }
    /*添加*/
    public function sda_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sda_add();
            return $res;
          }else{
            $data['auth_id'] = 71;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sda_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sda');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 71;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,role,lbq,text,username')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sda_edit();
            return $res;
          }
    }
public function ssa(){
    if(!empty(input('name'))){
        $check['username']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 73;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->ssa($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function ssa_del(){
        $index = model('Order');
        $res = $index->ssa_del();
        return $res;
    }
    /*添加*/
    public function ssa_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->ssa_add();
            return $res;
          }else{
            $data['auth_id'] = 73;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function ssa_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','ssa');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 73;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,role,username')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->ssa_edit();
            return $res;
          }
    }
public function ssaax(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 74;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->ssaax($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function ssaax_del(){
        $index = model('Order');
        $res = $index->ssaax_del();
        return $res;
    }
    /*添加*/
    public function ssaax_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->ssaax_add();
            return $res;
          }else{
            $data['auth_id'] = 74;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function ssaax_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','ssaax');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 74;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role,lbq,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->ssaax_edit();
            return $res;
          }
    }
public function sadl(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 75;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sadl($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sadl_del(){
        $index = model('Order');
        $res = $index->sadl_del();
        return $res;
    }
    /*添加*/
    public function sadl_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sadl_add();
            return $res;
          }else{
            $data['auth_id'] = 75;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sadl_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sadl');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 75;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sadl_edit();
            return $res;
          }
    }
public function ii(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 76;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->ii($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function ii_del(){
        $index = model('Order');
        $res = $index->ii_del();
        return $res;
    }
    /*添加*/
    public function ii_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->ii_add();
            return $res;
          }else{
            $data['auth_id'] = 76;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function ii_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','ii');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 76;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,username,role,type,lbq,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->ii_edit();
            return $res;
          }
    }
public function os(){
    if(!empty(input('name'))){
        $check['lbq']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 77;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->os($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function os_del(){
        $index = model('Order');
        $res = $index->os_del();
        return $res;
    }
    /*添加*/
    public function os_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->os_add();
            return $res;
          }else{
            $data['auth_id'] = 77;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function os_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','os');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 77;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,role,username,lbq,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->os_edit();
            return $res;
          }
    }
public function yu(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 78;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->yu($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function yu_del(){
        $index = model('Order');
        $res = $index->yu_del();
        return $res;
    }
    /*添加*/
    public function yu_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->yu_add();
            return $res;
          }else{
            $data['auth_id'] = 78;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function yu_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','yu');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 78;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role,text,lbq')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->yu_edit();
            return $res;
          }
    }
public function sk(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 79;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sk($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sk_del(){
        $index = model('Order');
        $res = $index->sk_del();
        return $res;
    }
    /*添加*/
    public function sk_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sk_add();
            return $res;
          }else{
            $data['auth_id'] = 79;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sk_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sk');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 79;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,username,type,lbq,role,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sk_edit();
            return $res;
          }
    }
public function ords(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 80;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->ords($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function ords_del(){
        $index = model('Order');
        $res = $index->ords_del();
        return $res;
    }
    /*添加*/
    public function ords_add(){
        if(request()->isPost()){
            return 1;
            return $res;
          }else{
            $data['auth_id'] = 80;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function ords_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','ords');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 80;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role,lbq,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->ords_edit();
            return $res;
          }
    }
public function sax(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 81;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sax($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sax_del(){
        $index = model('Order');
        $res = $index->sax_del();
        return $res;
    }
    /*添加*/
    public function sax_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sax_add();
            return $res;
          }else{
            $data['auth_id'] = 81;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sax_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sax');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 81;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sax_edit();
            return $res;
          }
    }
public function saxs(){
    if(!empty(input('name'))){
        $check['type']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 82;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->saxs($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function saxs_del(){
        $index = model('Order');
        $res = $index->saxs_del();
        return $res;
    }
    /*添加*/
    public function saxs_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->saxs_add();
            return $res;
          }else{
            $data['auth_id'] = 82;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function saxs_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','saxs');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 82;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,username,lbq,role,type,text')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->saxs_edit();
            return $res;
          }
    }
}