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
public function sxzq(){
    if(!empty(input('type')) || !empty(input('username')) || !empty(input('role'))){
                $sql = '';
                $gz = '';
                $neir = '';
                if(!empty(input('type'))){
                        $check['type']=array('like','%'.input('type'));
                            $sql .= 'type'."//";
                            $gz .= "2//";
                            $neir .= input('type')."//";
                    }
                    $this->assign("type",input('type'));if(!empty(input('username'))){
                        $check['username']=array('like',input('username').'%');
                            $sql .= 'username'."//";
                            $gz .= "3//";
                            $neir .= input('username')."//";
                    }
                    $this->assign("username",input('username'));if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                            $sql .= 'role'."//";
                            $gz .= "3//";
                            $neir .= input('role')."//";
                    }
        $this->assign("role",input('role'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);
        $this->assign("type",'');
        $this->assign("username",'');
        $this->assign("role",'');}
        $data['auth_id'] = 132;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxzq($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxzq_del(){
        $index = model('Order');
        $res = $index->sxzq_del();
        return $res;
    }
    /*添加*/
    public function sxzq_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxzq_add();
            return $res;
          }else{
            $data['auth_id'] = 132;
            $res = db("auth_name")->where($data)->select();
            foreach ($res as $k => $v) {
                $res[$k]['vals'] = '';
                if($res[$k]['type'] == 'radio'){
                    $arr = explode(",",$res[$k]['val']);
                    $len = count($arr);
                    for($i=0;$i<$len;$i++){
                        $last = substr($arr[$i],stripos($arr[$i],"/")+1);
                        $star = substr($arr[$i],0,stripos($arr[$i],"/"));
                        $res[$k]['vals'] .= "<input type='radio' name='".$res[$k]['field']."'  value='".$star."'/>".$last;
                    }
                }else if($res[$k]['type'] == 'select'){
                    $arr = explode(",",$res[$k]['val']);
                    $len = count($arr);
                    $res[$k]['vals'] .= "<select class='combox' name='".$res[$k]['field']."'>";
                    for($i=0;$i<$len;$i++){
                        $last = substr($arr[$i],stripos($arr[$i],"/")+1);
                        $star = substr($arr[$i],0,stripos($arr[$i],"/"));
                        $res[$k]['vals'] .= "<option value='".$star."'>".$last."</option>";
                    }
                    $res[$k]['vals'] .= "</select>";
                }else if($res[$k]['type'] == 'checkbox'){
                    $arr = explode(",",$res[$k]['val']);
                    $len = count($arr);
                    for($i=0;$i<$len;$i++){
                        $last = substr($arr[$i],stripos($arr[$i],"/")+1);
                        $star = substr($arr[$i],0,stripos($arr[$i],"/"));
                        $res[$k]['vals'] .="<input type='checkbox' name='".$res[$k]['field']."[]'  value='".$star."'/>".$last;
                    }
                }else{
                        $res[$k]['vals'] .="<input type='text' class='required'  name='".$res[$k]['field']."'>";
                }
            }
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxzq_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxzq');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 132;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role,username,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxzq_edit();
            return $res;
          }
    }
}