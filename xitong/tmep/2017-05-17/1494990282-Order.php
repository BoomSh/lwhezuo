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



public function goodsExcelExport(){
  if(request()->isGet()){
    $sql = input('sql');
    $data = Db::query($sql);
  }
     $excelName = '商品信息';
     $Header = array('商品id','商品货号','商品名称','商品分类','单位名称','商圈');
     //$goodsModel = new GoodsModel();
     $this->exportexcel($data,$Header,$excelName);
}

public static function exportexcel($data=array(),$title=array(),$filename='report'){
   header("Content-type:application/octet-stream");
   header("Accept-Ranges:bytes");
   header("Content-type:application/vnd.ms-excel");
   header("Content-Disposition:attachment;filename=".$filename.date("Y-m-d").".xls");
   header("Pragma: no-cache");
   header("Expires: 0");
   //导出xls 开始
   if (!empty($title)){
      foreach ($title as $k => $v) {
         $title[$k]= $v;
      }
      $title= implode("\t", $title);
      echo "$title\n";
   }
   if (!empty($data)){
      foreach($data as $key=>$val){
         $data[$key]=implode("\t", $data[$key]);
      }
      echo implode("\n",$data);
   }
}
public function szx(){
    if(!empty(input('type')) || !empty(input('role'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like','%'.input('role'));
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 117;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->szx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function szx_del(){
        $index = model('Order');
        $res = $index->szx_del();
        return $res;
    }
    /*添加*/
    public function szx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->szx_add();
            return $res;
          }else{
            $data['auth_id'] = 117;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function szx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','szx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 117;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,role,type,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->szx_edit();
            return $res;
          }
    }
public function xsa(){
    if(!empty(input('type')) || !empty(input('xs_s')) || !empty(input('xs_l'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));if(!empty(input('xs_s')) && !empty(input('xs_l'))){
                    $check['xs'] = array(array("gt",input('xs_s')),array("lt",input('xs_l')));
                }else if(!empty(input('xs_s')) && empty(input('xs_l'))){
                    $check['xs'] = array("gt",input('xs_s'));
                }else if(empty(input('xs_s')) && !empty(input('xs_l'))){
                    $check['xs'] = array("lt",input('xs_l'));
                }
                $this->assign('xs_l',input('xs_l'));
                $this->assign('xs_s',input('xs_s'));}else{
        $check='1';$this->assign("type",'');$this->assign("xs_s",'');
                        $this->assign("xs_l",'');}
        $data['auth_id'] = 118;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xsa($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xsa_del(){
        $index = model('Order');
        $res = $index->xsa_del();
        return $res;
    }
    /*添加*/
    public function xsa_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xsa_add();
            return $res;
          }else{
            $data['auth_id'] = 118;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xsa_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xsa');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 118;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xsa_edit();
            return $res;
          }
    }
public function lxa(){
    if(!empty(input('type'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));}else{
        $check='1';$this->assign("type",'');}
        $data['auth_id'] = 119;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->lxa($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function lxa_del(){
        $index = model('Order');
        $res = $index->lxa_del();
        return $res;
    }
    /*添加*/
    public function lxa_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->lxa_add();
            return $res;
          }else{
            $data['auth_id'] = 119;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function lxa_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','lxa');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 119;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->lxa_edit();
            return $res;
          }
    }
public function xsaz(){
    if(!empty(input('username')) || !empty(input('lbq'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));if(!empty(input('lbq'))){
                        $check['lbq']=array('like','%'.input('lbq').'%');
                    }
                    $this->assign("lbq",input('lbq'));}else{
        $check='1';$this->assign("username",'');$this->assign("lbq",'');}
        $data['auth_id'] = 120;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xsaz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xsaz_del(){
        $index = model('Order');
        $res = $index->xsaz_del();
        return $res;
    }
    /*添加*/
    public function xsaz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xsaz_add();
            return $res;
          }else{
            $data['auth_id'] = 120;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xsaz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xsaz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 120;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role,lbq,text')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xsaz_edit();
            return $res;
          }
    }
public function sada(){
    if(!empty(input('type')) || !empty(input('role'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 121;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sada($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sada_del(){
        $index = model('Order');
        $res = $index->sada_del();
        return $res;
    }
    /*添加*/
    public function sada_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sada_add();
            return $res;
          }else{
            $data['auth_id'] = 121;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sada_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sada');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 121;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sada_edit();
            return $res;
          }
    }
public function sxaz(){
    if(!empty(input('type')) || !empty(input('role'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like','%'.input('role').'%');
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 123;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxaz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxaz_del(){
        $index = model('Order');
        $res = $index->sxaz_del();
        return $res;
    }
    /*添加*/
    public function sxaz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxaz_add();
            return $res;
          }else{
            $data['auth_id'] = 123;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxaz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxaz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 123;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,role,lbq,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxaz_edit();
            return $res;
          }
    }
public function sxzxc(){
    if(!empty(input('username')) || !empty(input('role'))){if(!empty(input('username'))){
                        $check['username']=array('like',input('username').'%');
                    }
                    $this->assign("username",input('username'));if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("username",'');$this->assign("role",'');}
        $data['auth_id'] = 124;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxzxc($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxzxc_del(){
        $index = model('Order');
        $res = $index->sxzxc_del();
        return $res;
    }
    /*添加*/
    public function sxzxc_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxzxc_add();
            return $res;
          }else{
            $data['auth_id'] = 124;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxzxc_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxzxc');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 124;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,role,type,lbq,text')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxzxc_edit();
            return $res;
          }
    }
public function sxd(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 125;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxd($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxd_del(){
        $index = model('Order');
        $res = $index->sxd_del();
        return $res;
    }
    /*添加*/
    public function sxd_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxd_add();
            return $res;
          }else{
            $data['auth_id'] = 125;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxd_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxd');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 125;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxd_edit();
            return $res;
          }
    }
public function sxzc(){
    if(!empty(input('type')) || !empty(input('role'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 126;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxzc($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxzc_del(){
        $index = model('Order');
        $res = $index->sxzc_del();
        return $res;
    }
    /*添加*/
    public function sxzc_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxzc_add();
            return $res;
          }else{
            $data['auth_id'] = 126;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxzc_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxzc');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 126;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxzc_edit();
            return $res;
          }
    }
public function sxa(){
    if(!empty(input('type')) || !empty(input('role'))){if(!empty(input('type'))){
                        $check['type']=array('like','%'.input('type'));
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 127;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxa($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxa_del(){
        $index = model('Order');
        $res = $index->sxa_del();
        return $res;
    }
    /*添加*/
    public function sxa_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxa_add();
            return $res;
          }else{
            $data['auth_id'] = 127;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxa_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxa');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 127;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxa_edit();
            return $res;
          }
    }
public function xaz(){
    if(!empty(input('username')) || !empty(input('role'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("username",'');$this->assign("role",'');}
        $data['auth_id'] = 128;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xaz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xaz_del(){
        $index = model('Order');
        $res = $index->xaz_del();
        return $res;
    }
    /*添加*/
    public function xaz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xaz_add();
            return $res;
          }else{
            $data['auth_id'] = 128;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xaz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xaz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 128;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,role,type,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xaz_edit();
            return $res;
          }
    }
public function sxsaz(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 130;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxsaz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxsaz_del(){
        $index = model('Order');
        $res = $index->sxsaz_del();
        return $res;
    }
    /*添加*/
    public function sxsaz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxsaz_add();
            return $res;
          }else{
            $data['auth_id'] = 130;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxsaz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxsaz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 130;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxsaz_edit();
            return $res;
          }
    }
}