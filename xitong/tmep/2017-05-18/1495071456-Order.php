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
public function saxz(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 131;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->saxz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function saxz_del(){
        $index = model('Order');
        $res = $index->saxz_del();
        return $res;
    }
    /*添加*/
    public function saxz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->saxz_add();
            return $res;
          }else{
            $data['auth_id'] = 131;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function saxz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','saxz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 131;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->saxz_edit();
            return $res;
          }
    }
public function sxzx(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 132;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxzx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxzx_del(){
        $index = model('Order');
        $res = $index->sxzx_del();
        return $res;
    }
    /*添加*/
    public function sxzx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxzx_add();
            return $res;
          }else{
            $data['auth_id'] = 132;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxzx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxzx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 132;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxzx_edit();
            return $res;
          }
    }
public function sdaxa(){
    if(!empty(input('type'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));}else{
        $check='1';$this->assign("type",'');}
        $data['auth_id'] = 134;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sdaxa($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sdaxa_del(){
        $index = model('Order');
        $res = $index->sdaxa_del();
        return $res;
    }
    /*添加*/
    public function sdaxa_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sdaxa_add();
            return $res;
          }else{
            $data['auth_id'] = 134;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sdaxa_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sdaxa');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 134;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sdaxa_edit();
            return $res;
          }
    }
public function sxzcx(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like',input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 135;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxzcx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxzcx_del(){
        $index = model('Order');
        $res = $index->sxzcx_del();
        return $res;
    }
    /*添加*/
    public function sxzcx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxzcx_add();
            return $res;
          }else{
            $data['auth_id'] = 135;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxzcx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxzcx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 135;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxzcx_edit();
            return $res;
          }
    }
public function sxzxzd(){
    if(!empty(input('type'))){if(!empty(input('type'))){
                        $check['type']=array('like','%'.input('type'));
                    }
                    $this->assign("type",input('type'));}else{
        $check='1';$this->assign("type",'');}
        $data['auth_id'] = 136;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxzxzd($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxzxzd_del(){
        $index = model('Order');
        $res = $index->sxzxzd_del();
        return $res;
    }
    /*添加*/
    public function sxzxzd_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxzxzd_add();
            return $res;
          }else{
            $data['auth_id'] = 136;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxzxzd_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxzxzd');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 136;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxzxzd_edit();
            return $res;
          }
    }
public function xxz(){
    if(!empty(input('type')) || !empty(input('role'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 137;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xxz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xxz_del(){
        $index = model('Order');
        $res = $index->xxz_del();
        return $res;
    }
    /*添加*/
    public function xxz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xxz_add();
            return $res;
          }else{
            $data['auth_id'] = 137;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xxz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xxz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 137;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xxz_edit();
            return $res;
          }
    }
public function xzx(){
    if(!empty(input('role')) || !empty(input('type'))){if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                    }
                    $this->assign("role",input('role'));if(!empty(input('type'))){
                        $check['type']=array('like','%'.input('type'));
                    }
                    $this->assign("type",input('type'));}else{
        $check='1';$this->assign("role",'');$this->assign("type",'');}
        $data['auth_id'] = 138;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xzx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xzx_del(){
        $index = model('Order');
        $res = $index->xzx_del();
        return $res;
    }
    /*添加*/
    public function xzx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xzx_add();
            return $res;
          }else{
            $data['auth_id'] = 138;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xzx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xzx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 138;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xzx_edit();
            return $res;
          }
    }
public function xxs(){
    if(!empty(input('username')) || !empty(input('type'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));}else{
        $check='1';$this->assign("username",'');$this->assign("type",'');}
        $data['auth_id'] = 139;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xxs($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xxs_del(){
        $index = model('Order');
        $res = $index->xxs_del();
        return $res;
    }
    /*添加*/
    public function xxs_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xxs_add();
            return $res;
          }else{
            $data['auth_id'] = 139;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xxs_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xxs');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 139;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xxs_edit();
            return $res;
          }
    }
public function sxc(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like',input('username').'%');
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 140;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxc($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxc_del(){
        $index = model('Order');
        $res = $index->sxc_del();
        return $res;
    }
    /*添加*/
    public function sxc_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxc_add();
            return $res;
          }else{
            $data['auth_id'] = 140;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxc_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxc');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 140;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxc_edit();
            return $res;
          }
    }
public function xoi(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 141;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xoi($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xoi_del(){
        $index = model('Order');
        $res = $index->xoi_del();
        return $res;
    }
    /*添加*/
    public function xoi_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xoi_add();
            return $res;
          }else{
            $data['auth_id'] = 141;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xoi_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xoi');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 141;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xoi_edit();
            return $res;
          }
    }
public function xxsa(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like',input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 142;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xxsa($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xxsa_del(){
        $index = model('Order');
        $res = $index->xxsa_del();
        return $res;
    }
    /*添加*/
    public function xxsa_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xxsa_add();
            return $res;
          }else{
            $data['auth_id'] = 142;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xxsa_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xxsa');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 142;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xxsa_edit();
            return $res;
          }
    }
public function sxsa(){
    if(!empty(input('type'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));}else{
        $check='1';$this->assign("type",'');}
        $data['auth_id'] = 143;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxsa($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxsa_del(){
        $index = model('Order');
        $res = $index->sxsa_del();
        return $res;
    }
    /*添加*/
    public function sxsa_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxsa_add();
            return $res;
          }else{
            $data['auth_id'] = 143;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxsa_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxsa');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 143;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxsa_edit();
            return $res;
          }
    }
public function xxcs(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like',input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 144;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xxcs($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xxcs_del(){
        $index = model('Order');
        $res = $index->xxcs_del();
        return $res;
    }
    /*添加*/
    public function xxcs_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xxcs_add();
            return $res;
          }else{
            $data['auth_id'] = 144;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xxcs_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xxcs');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 144;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xxcs_edit();
            return $res;
          }
    }
public function xcs(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 145;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xcs($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xcs_del(){
        $index = model('Order');
        $res = $index->xcs_del();
        return $res;
    }
    /*添加*/
    public function xcs_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xcs_add();
            return $res;
          }else{
            $data['auth_id'] = 145;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xcs_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xcs');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 145;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xcs_edit();
            return $res;
          }
    }
public function xsz(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like',input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 146;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xsz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xsz_del(){
        $index = model('Order');
        $res = $index->xsz_del();
        return $res;
    }
    /*添加*/
    public function xsz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xsz_add();
            return $res;
          }else{
            $data['auth_id'] = 146;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xsz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xsz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 146;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xsz_edit();
            return $res;
          }
    }
public function xszss(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like',input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 147;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xszss($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xszss_del(){
        $index = model('Order');
        $res = $index->xszss_del();
        return $res;
    }
    /*添加*/
    public function xszss_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xszss_add();
            return $res;
          }else{
            $data['auth_id'] = 147;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xszss_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xszss');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 147;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xszss_edit();
            return $res;
          }
    }
public function xszx(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 148;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xszx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xszx_del(){
        $index = model('Order');
        $res = $index->xszx_del();
        return $res;
    }
    /*添加*/
    public function xszx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xszx_add();
            return $res;
          }else{
            $data['auth_id'] = 148;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xszx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xszx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 148;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,role,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xszx_edit();
            return $res;
          }
    }
public function xcx(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 149;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xcx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xcx_del(){
        $index = model('Order');
        $res = $index->xcx_del();
        return $res;
    }
    /*添加*/
    public function xcx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xcx_add();
            return $res;
          }else{
            $data['auth_id'] = 149;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xcx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xcx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 149;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xcx_edit();
            return $res;
          }
    }
public function xsazaz(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 150;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xsazaz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xsazaz_del(){
        $index = model('Order');
        $res = $index->xsazaz_del();
        return $res;
    }
    /*添加*/
    public function xsazaz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xsazaz_add();
            return $res;
          }else{
            $data['auth_id'] = 150;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xsazaz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xsazaz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 150;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xsazaz_edit();
            return $res;
          }
    }
public function xcv(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 151;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xcv($page,$check);
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
            $data['auth_id'] = 151;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xcv_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xcv');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 151;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xcv_edit();
            return $res;
          }
    }
public function lsxz(){
    if(!empty(input('username')) || !empty(input('type'))){if(!empty(input('username'))){
                        $check['username']=array('like',input('username').'%');
                    }
                    $this->assign("username",input('username'));if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));}else{
        $check='1';$this->assign("username",'');$this->assign("type",'');}
        $data['auth_id'] = 130;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->lsxz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function lsxz_del(){
        $index = model('Order');
        $res = $index->lsxz_del();
        return $res;
    }
    /*添加*/
    public function lsxz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->lsxz_add();
            return $res;
          }else{
            $data['auth_id'] = 130;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function lsxz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','lsxz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 130;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,role,lbq,type,username')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->lsxz_edit();
            return $res;
          }
    }
public function xcxz(){
    if(!empty(input('type')) || !empty(input('role'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like','%'.input('role'));
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 131;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xcxz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xcxz_del(){
        $index = model('Order');
        $res = $index->xcxz_del();
        return $res;
    }
    /*添加*/
    public function xcxz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xcxz_add();
            return $res;
          }else{
            $data['auth_id'] = 131;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xcxz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xcxz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 131;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role,lbq')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xcxz_edit();
            return $res;
          }
    }
public function xczx(){
    if(!empty(input('username'))){if(!empty(input('username'))){
                        $check['username']=array('like','%'.input('username'));
                    }
                    $this->assign("username",input('username'));}else{
        $check='1';$this->assign("username",'');}
        $data['auth_id'] = 132;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xczx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xczx_del(){
        $index = model('Order');
        $res = $index->xczx_del();
        return $res;
    }
    /*添加*/
    public function xczx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xczx_add();
            return $res;
          }else{
            $data['auth_id'] = 132;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xczx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xczx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 132;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,username,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xczx_edit();
            return $res;
          }
    }
}