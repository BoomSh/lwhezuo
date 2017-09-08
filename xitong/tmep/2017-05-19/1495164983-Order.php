<?php
namespace app\admin\controller;
use \think\Request;
use \think\Db;
class Order extends Common
{
    public function index(){
        $sql = "SHOW TABLEs";
        $id = Db::query($sql);
        var_dump($id);exit;
        return $id;
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
        return $row;
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
public function lasx(){
    if(!empty(input('type')) || !empty(input('role')) || !empty(input('lbq')) || !empty(input('xs_s')) || !empty(input('xs_l'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                            $sql .= 'type'."//";
                            $gz .= "3//";
                            $neir .= input('type')."//";
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like','%'.input('role'));
                            $sql .= 'role'."//";
                            $gz .= "2//";
                            $neir .= input('role')."//";
                    }
                    $this->assign("role",input('role'));if(!empty(input('lbq'))){
                        $check['lbq']=array('like',input('lbq'));
                            $sql .= 'lbq'."//";
                            $gz .= "1//";
                            $neir .= input('lbq')."//";
                    }
                    $this->assign("lbq",input('lbq'));if(!empty(input('xs_s')) && !empty(input('xs_l'))){
                    $check['xs'] = array(array("gt",input('xs_s')),array("lt",input('xs_l')));
                        $sql .= 'xs'."//";
                        $gz .= "5//";
                        $neir .= input('xs_s')."||"."gt||".input('xs_l')."||lt//";
                }else if(!empty(input('xs_s')) && empty(input('xs_l'))){
                    $check['xs'] = array("gt",input('xs_s'));
                    $sql .= 'xs'."//";
                    $gz .= "5//";
                    $neir .= input('xs_s')."||"."gt//";
                }else if(empty(input('xs_s')) && !empty(input('xs_l'))){
                    $check['xs'] = array("lt",input('xs_l'));
                    $sql .= 'xs'."//";
                    $gz .= "5//";
                    $neir .= input('xs_l')."||"."lt//";
                }
                $this->assign('xs_l',input('xs_l'));
                $this->assign('xs_s',input('xs_s'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("type",'');$this->assign("role",'');$this->assign("lbq",'');$this->assign("xs_s",'');
                        $this->assign("xs_l",'');}
        $data['auth_id'] = 131;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->lasx($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function lasx_del(){
        $index = model('Order');
        $res = $index->lasx_del();
        return $res;
    }
    /*添加*/
    public function lasx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->lasx_add();
            return $res;
          }else{
            $data['auth_id'] = 131;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function lasx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','lasx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 131;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq,xs,file')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->lasx_edit();
            return $res;
          }
    }
}