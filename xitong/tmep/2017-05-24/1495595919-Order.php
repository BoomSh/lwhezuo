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
public function xcc(){
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
        $data['auth_id'] = 140;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xcc($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xcc_del(){
        $index = model('Order');
        $res = $index->xcc_del();
        return $res;
    }
    /*添加*/
    public function xcc_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xcc_add();
            return $res;
          }else{
            $data = 140;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xcc_edit(){
        if(isset($_GET['uid'])){
             $data = 140;
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role,username')->find();
            $table = 'aa';
            $zd_str = "id,type,role,username";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xcc_edit();
            return $res;
          }
    }
public function ccc(){
    if(!empty(input('lbq')) || !empty(input('role'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('lbq'))){
                        $check['lbq']=array('like',input('lbq').'%');
                            $sql .= 'lbq'."//";
                            $gz .= "3//";
                            $neir .= input('lbq')."//";
                    }
                    $this->assign("lbq",input('lbq'));if(!empty(input('role'))){
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
        $this->assign("neir",1);$this->assign("lbq",'');$this->assign("role",'');}
        $data['auth_id'] = 141;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->ccc($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function ccc_del(){
        $index = model('Order');
        $res = $index->ccc_del();
        return $res;
    }
    /*添加*/
    public function ccc_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->ccc_add();
            return $res;
          }else{
            $data = 141;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function ccc_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','ccc');
        if(isset($_GET['uid'])){
            $data = 141;
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role,lbq,text')->find();
            $table = 'aa';
            $zd_str = "id,username,type,role,lbq,text";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->ccc_edit();
            return $res;
          }
    }
public function xcv(){
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
        $this->assign("neir",1);$this->assign("username",'');$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 142;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xcv($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xcv_del(){
        $index = model('Order');
        $res = $index->xcv_del();
        return $res;
    }
    /*添加*/
    public function xcv_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xcv_add();
            return $res;
          }else{
            $data = 142;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xcv_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xcv');
        if(isset($_GET['uid'])){
            $data = 142;
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,lbq,role,username')->find();
            $table = 'aa';
            $zd_str = "id,type,lbq,role,username";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xcv_edit();
            return $res;
          }
    }
public function vvc(){
    if(!empty(input('username'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                            $sql .= 'username'."//";
                            $gz .= "2//";
                            $neir .= input('username')."//";
                    }
                    $this->assign("username",input('username'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("username",'');}
        $data['auth_id'] = 145;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->vvc($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function vvc_del(){
        $index = model('Order');
        $res = $index->vvc_del();
        return $res;
    }
    /*添加*/
    public function vvc_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->vvc_add();
            return $res;
          }else{
            $data = 145;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function vvc_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','vvc');
        if(isset($_GET['uid'])){
            $data = 145;
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role')->find();
            $table = 'aa';
            $zd_str = "id,username,type,role";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->vvc_edit();
            return $res;
          }
    }
public function xczg(){
    if(!empty(input('username'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('username'))){
                        $check['username']=array('like',input('username'));
                            $sql .= 'username'."//";
                            $gz .= "1//";
                            $neir .= input('username')."//";
                    }
                    $this->assign("username",input('username'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("username",'');}
        $data['auth_id'] = 149;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xczg($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xczg_del(){
        $index = model('Order');
        $res = $index->xczg_del();
        return $res;
    }
    /*添加*/
    public function xczg_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xczg_add();
            return $res;
          }else{
            $data = 149;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xczg_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xczg');
        if(isset($_GET['uid'])){
            $data = 149;
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role')->find();
            $table = 'aa';
            $zd_str = "id,type,username,role";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xczg_edit();
            return $res;
          }
    }
public function cxz(){
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
        $data['auth_id'] = 153;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->cxz($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function cxz_del(){
        $index = model('Order');
        $res = $index->cxz_del();
        return $res;
    }
    /*添加*/
    public function cxz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->cxz_add();
            return $res;
          }else{
            $data = 153;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function cxz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','cxz');
        if(isset($_GET['uid'])){
            $data = 153;
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role,lbq')->find();
            $table = 'aa';
            $zd_str = "id,type,username,role,lbq";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->cxz_edit();
            return $res;
          }
    }
public function xzca(){
    if(!empty(input('owner')) || !empty(input('supplier')) || !empty(input('web'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('owner'))){
                        $check['owner']=array('like','%'.input('owner'));
                            $sql .= 'owner'."//";
                            $gz .= "2//";
                            $neir .= input('owner')."//";
                    }
                    $this->assign("owner",input('owner'));if(!empty(input('supplier'))){
                        $check['supplier']=array('like',input('supplier').'%');
                            $sql .= 'supplier'."//";
                            $gz .= "3//";
                            $neir .= input('supplier')."//";
                    }
                    $this->assign("supplier",input('supplier'));if(!empty(input('web'))){
                        $check['web']=array('like','%'.input('web').'%');
                        $sql .= 'web'."//";
                        $gz .= "4//";
                        $neir .= input('web')."//";
                    }
                    $this->assign("web",input('web'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("owner",'');$this->assign("supplier",'');$this->assign("web",'');}
        $data['auth_id'] = 154;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xzca($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xzca_del(){
        $index = model('Order');
        $res = $index->xzca_del();
        return $res;
    }
    /*添加*/
    public function xzca_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xzca_add();
            return $res;
          }else{
            $data = 154;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xzca_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xzca');
        if(isset($_GET['uid'])){
            $data = 154;
            $row=db('users')->where('id',$_GET['uid'])->field('id,owner,supplier,web,consignee,tel,mobile')->find();
            $table = 'users';
            $zd_str = "id,owner,supplier,web,consignee,tel,mobile";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xzca_edit();
            return $res;
          }
    }
public function lxms(){
    if(!empty(input('locator')) || !empty(input('type')) || !empty(input('state')) || !empty(input('depot')) || !empty(input('tracking')) || !empty(input('code'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('locator'))){
                        $check['locator']=array('like','%'.input('locator'));
                            $sql .= 'locator'."//";
                            $gz .= "2//";
                            $neir .= input('locator')."//";
                    }
                    $this->assign("locator",input('locator'));if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                            $sql .= 'type'."//";
                            $gz .= "3//";
                            $neir .= input('type')."//";
                    }
                    $this->assign("type",input('type'));if(!empty(input('state'))){
                        $check['state']=array('like','%'.input('state'));
                            $sql .= 'state'."//";
                            $gz .= "2//";
                            $neir .= input('state')."//";
                    }
                    $this->assign("state",input('state'));if(!empty(input('depot'))){
                        $check['depot']=array('like',input('depot').'%');
                            $sql .= 'depot'."//";
                            $gz .= "3//";
                            $neir .= input('depot')."//";
                    }
                    $this->assign("depot",input('depot'));if(!empty(input('tracking'))){
                        $check['tracking']=array('like','%'.input('tracking'));
                            $sql .= 'tracking'."//";
                            $gz .= "2//";
                            $neir .= input('tracking')."//";
                    }
                    $this->assign("tracking",input('tracking'));if(!empty(input('code'))){
                        $check['code']=array('like',input('code').'%');
                            $sql .= 'code'."//";
                            $gz .= "3//";
                            $neir .= input('code')."//";
                    }
                    $this->assign("code",input('code'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("locator",'');$this->assign("type",'');$this->assign("state",'');$this->assign("depot",'');$this->assign("tracking",'');$this->assign("code",'');}
        $data['auth_id'] = 155;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->lxms($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function lxms_del(){
        $index = model('Order');
        $res = $index->lxms_del();
        return $res;
    }
    /*添加*/
    public function lxms_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->lxms_add();
            return $res;
          }else{
            $data = 155;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function lxms_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','lxms');
        if(isset($_GET['uid'])){
            $data = 155;
            $row=db('bespoke')->where('id',$_GET['uid'])->field('id,type,state,depot,locator,tracking,postscript,creat_time,order_time')->find();
            $table = 'bespoke';
            $zd_str = "id,type,state,depot,locator,tracking,postscript,creat_time,order_time";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->lxms_edit();
            return $res;
          }
    }
public function czx(){
    if(!empty(input('supplier'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('supplier'))){
                        $check['supplier']=array('like',input('supplier').'%');
                            $sql .= 'supplier'."//";
                            $gz .= "3//";
                            $neir .= input('supplier')."//";
                    }
                    $this->assign("supplier",input('supplier'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("supplier",'');}
        $data['auth_id'] = 157;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->czx($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function czx_del(){
        $index = model('Order');
        $res = $index->czx_del();
        return $res;
    }
    /*添加*/
    public function czx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->czx_add();
            return $res;
          }else{
            $data = 157;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function czx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','czx');
        if(isset($_GET['uid'])){
            $data = 157;
            $row=db('purchase')->where('id',$_GET['uid'])->field('id,put_receipt,warehouse,w_locator,goods_amount,supplier,common,air_no,user_id,postscript,put_time,add_time')->find();
            $table = 'purchase';
            $zd_str = "id,put_receipt,warehouse,w_locator,goods_amount,supplier,common,air_no,user_id,postscript,put_time,add_time";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->czx_edit();
            return $res;
          }
    }
       public function import(){
        if(!empty($_FILES['file_stu']['name'])){
            $tmp_file = $_FILES['file_stu']['tmp_name'];    //临时文件名
            $file_types = explode('.',$_FILES['file_stu']['name']); //  拆分文件名
            $file_type = $file_types [count ( $file_types ) - 1];   //  文件类型
            /*判断是否为excel文件*/
            if($file_type == 'xls' || $file_type == 'xlsx'|| $file_type == 'csv'){    //  符合类型
                /*上传业务*/
                $upload = new \Think\Upload();
                $upload->maxSize   =     3145728 ;
                $upload->exts      =     array('xls', 'csv', 'xlsx');
                $upload->rootPath  =      './Public';
                $upload->savePath  =      '/Excel/';
                $upload->saveName  =      date('YmdHis');
                $info   =   $upload->upload();
                if(!$info) {    // 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{  // 上传成功

                    //  读取文件
                    $filename='./Public'.$info['file_stu']['savepath'].$info['file_stu']['savename'];
                    //import("Org.Yufan.ExcelReader");
                    vendor('Classes.PHPExcel.PHPExcel');
                    $reader = \PHPExcel_IOFactory::createReader('Excel2007'); //设置以Excel5格式(Excel97-2003工作簿)
                    $PHPExcel = $reader->load($filename); // 载入excel文件
                    $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
                    $highestRow = $sheet->getHighestRow(); // 取得总行数
                    //var_dump($highestRow);
                    $highestColumm = $sheet->getHighestColumn(); // 取得总列数

                    /** 循环读取每个单元格的数据 */
                    $data = array();
                    for ($row = 2; $row <= $highestRow; $row++){//行数是以第1行开始

                        if($column = 'A'){
                            $data['name'] = $sheet->getCell($column.$row)->getValue();
                        }
                        if($column = 'B'){
                            $data['account'] = $sheet->getCell($column.$row)->getValue();
                        }
                        if($column = 'C'){
                            $data['password'] = $sheet->getCell($column.$row)->getValue();
                        }
                        M('data')->add($data);
                    }
                        $this->success('导入数据库成功',U('Excel/show'));
                }
            } else{ //  不符合类型业务
                $this->error('不是excel文件，请重新上传...');
            }
        }else{
            $this->error('(⊙o⊙)~没传数据就导入');
        }
    }

    public function save_import($data){
        foreach ($data as $k=>$v){
            if($k >= 2){                
                $info[$k-2]['username'] = $v['A'];
                $info[$k-2]['type'] = $v['B'];
                $info[$k-2]['role'] = $v['C'];
                $info[$k-2]['lbq'] = $v['D'];
                $info[$k-2]['text'] = $v['E'];
                $result = db('aa')->insert($info[$k-2]);
            }
        }
    }
}