<?php
namespace app\admin\controller;
use \think\Request;
use \think\Db;
class Order extends Common
{
    public function index(){
      $row = Db::table("wx_aa")->select();
      var_dump($row);
      echo Db::table("wx_aa")->getlastsql();


      exit;
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
  $data = db('aa')->field('id,username')->select();
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
}