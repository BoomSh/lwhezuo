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
                        $star = substr($arr[$i],stripos($arr[$i],"/")+1);
                        $last = substr($arr[$i],0,stripos($arr[$i],"/"));
                        $res[$k]['vals'] .= "<input type='radio' name='".$res[$k]['field']."'  value='".$star."'/>".$last;
                    }
                }else if($res[$k]['type'] == 'select'){
                    $arr = explode(",",$res[$k]['val']);
                    $len = count($arr);
                    $res[$k]['vals'] .= "<select class='combox' name='".$res[$k]['field']."'>";
                    for($i=0;$i<$len;$i++){
                        $star = substr($arr[$i],stripos($arr[$i],"/")+1);
                        $last = substr($arr[$i],0,stripos($arr[$i],"/"));
                        $res[$k]['vals'] .= "<option value='".$star."'>".$last."</option>";
                    }
                    $res[$k]['vals'] .= "</select>";
                }else if($res[$k]['type'] == 'checkbox'){
                    $arr = explode(",",$res[$k]['val']);
                    $len = count($arr);
                    for($i=0;$i<$len;$i++){
                        $star = substr($arr[$i],stripos($arr[$i],"/")+1);
                        $last = substr($arr[$i],0,stripos($arr[$i],"/"));
                        $res[$k]['vals'] .="<input type='checkbox' name='".$res[$k]['field']."[]'  value='".$star."'/>".$last;
                    }
                }else if($res[$k]['type'] == 'text'){
                        $res[$k]['vals'] .="<input type='text' class='required'  name='".$res[$k]['field']."'>";
                }else if($res[$k]['type'] == 'textarea'){
                   $res[$k]['vals'] .="<textarea name='".$res[$k]['field']."' cols='50' rows='6'></textarea>";
                }else if($res[$k]['type'] == 'file'){
                   $res[$k]['vals'] .="<div class='upimg'><ul class='c-ul'><li><input type='file' id='".$res[$k]['field']."c' name='imgsrc'></li></ul><div style='width:80px;height:80px;margin-top:-70px;margin-left:80px;' id='".$res[$k]['field']."s'></div></div>";
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
public function szxaa(){
    if(!empty(input('text'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('text'))){
                        $check['text']=array('like',input('text').'%');
                            $sql .= 'text'."//";
                            $gz .= "3//";
                            $neir .= input('text')."//";
                    }
                    $this->assign("text",input('text'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("text",'');}
        $data['auth_id'] = 133;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->szxaa($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function szxaa_del(){
        $index = model('Order');
        $res = $index->szxaa_del();
        return $res;
    }
    /*添加*/
    public function szxaa_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->szxaa_add();
            return $res;
          }else{
            $data = 133;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function szxaa_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','szxaa');
        if(isset($_GET['uid'])){
            $data = 133;
            $row = db('aa')->where('id',$_GET['uid'])->field('id,text,lbq,role,type,username,file')->find();
            $table = 'aa';
            $zd_str = "id,text,lbq,role,type,username,file";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->szxaa_edit();
            return $res;
          }
    }
public function order(){
    if(!empty(input('type')) || !empty(input('role')) || !empty(input('username')) || !empty(input('lbq'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('type'))){
                        $check['type']=array('like','%'.input('type').'%');
                        $sql .= 'type'."//";
                        $gz .= "4//";
                        $neir .= input('type')."//";
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                            $sql .= 'role'."//";
                            $gz .= "3//";
                            $neir .= input('role')."//";
                    }
                    $this->assign("role",input('role'));if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                            $sql .= 'username'."//";
                            $gz .= "2//";
                            $neir .= input('username')."//";
                    }
                    $this->assign("username",input('username'));if(!empty(input('lbq'))){
                        $check['lbq']=array('like',input('lbq'));
                            $sql .= 'lbq'."//";
                            $gz .= "1//";
                            $neir .= input('lbq')."//";
                    }
                    $this->assign("lbq",input('lbq'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("type",'');$this->assign("role",'');$this->assign("username",'');$this->assign("lbq",'');}
        $data['auth_id'] = 134;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->order($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function order_del(){
        $index = model('Order');
        $res = $index->order_del();
        return $res;
    }
    /*添加*/
    public function order_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->order_add();
            return $res;
          }else{
            $data['auth_id'] = 134;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function order_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','order');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 134;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq,text,file,xs')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->order_edit();
            return $res;
          }
    }
public function sxzi(){
    if(!empty(input('type')) || !empty(input('role'))){
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
                    $this->assign("role",input('role'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 135;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxzi($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxzi_del(){
        $index = model('Order');
        $res = $index->sxzi_del();
        return $res;
    }
    /*添加*/
    public function sxzi_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxzi_add();
            return $res;
          }else{
            $data['auth_id'] = 135;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxzi_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxzi');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 135;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq,text')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxzi_edit();
            return $res;
          }
    }
public function isq(){
    if(!empty(input('type')) || !empty(input('username')) || !empty(input('role'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                            $sql .= 'type'."//";
                            $gz .= "3//";
                            $neir .= input('type')."//";
                    }
                    $this->assign("type",input('type'));if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                            $sql .= 'username'."//";
                            $gz .= "2//";
                            $neir .= input('username')."//";
                    }
                    $this->assign("username",input('username'));if(!empty(input('role'))){
                        $check['role']=array('like','%'.input('role'));
                            $sql .= 'role'."//";
                            $gz .= "2//";
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
        $this->assign("neir",1);$this->assign("type",'');$this->assign("username",'');$this->assign("role",'');}
        $data['auth_id'] = 136;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->isq($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function isq_del(){
        $index = model('Order');
        $res = $index->isq_del();
        return $res;
    }
    /*添加*/
    public function isq_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->isq_add();
            return $res;
          }else{
            $data['auth_id'] = 136;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function isq_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','isq');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 136;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role,username,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->isq_edit();
            return $res;
          }
    }
public function xzi(){
    if(!empty(input('username')) || !empty(input('type')) || !empty(input('role'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('username'))){
                        $check['username']=array('like',input('username').'%');
                            $sql .= 'username'."//";
                            $gz .= "3//";
                            $neir .= input('username')."//";
                    }
                    $this->assign("username",input('username'));if(!empty(input('type'))){
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
                    $this->assign("role",input('role'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("username",'');$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 138;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xzi($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xzi_del(){
        $index = model('Order');
        $res = $index->xzi_del();
        return $res;
    }
    /*添加*/
    public function xzi_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xzi_add();
            return $res;
          }else{
            $data['auth_id'] = 138;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xzi_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xzi');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 138;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq,text')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xzi_edit();
            return $res;
          }
    }
public function cc(){
    if(!empty(input('type'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                            $sql .= 'type'."//";
                            $gz .= "3//";
                            $neir .= input('type')."//";
                    }
                    $this->assign("type",input('type'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("type",'');}
        $data['auth_id'] = 139;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->cc($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function cc_del(){
        $index = model('Order');
        $res = $index->cc_del();
        return $res;
    }
    /*添加*/
    public function cc_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->cc_add();
            return $res;
          }else{
            $data = 139;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function cc_edit(){
        if(isset($_GET['uid'])){
             $data = 139;
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq')->find();
            $table = 'aa';
            $zd_str = "id,username,type,role,lbq";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->cc_edit();
            return $res;
          }
    }
}