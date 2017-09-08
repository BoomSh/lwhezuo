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




public function xzxc(){
    if(!empty(input('type')) || !empty(input('role')) || !empty(input('lbq')) || !empty(input('text'))){
                $sql = "";
                $gz = '';
                $neir = '';
                if(!empty(input('type'))){
                        $check['type']=array('like','%'.input('type'));
                        if(trim(input('type')) != ''){
                            $sql .= 'type'."//";
                            $gz .= "2//";
                            $neir .= input('type')."//";
                        }
                }
                $this->assign("type",input('type'));
                if(!empty(input('role'))){
                        $check['role']=array('like',input('role'));
                    if(trim(input('role')) != ''){
                        $sql .= 'role'."//";
                        $gz .= "1//";
                        $neir .= input('role')."//";
                    }
                }
                $this->assign("role",input('role'));
                if(!empty(input('lbq'))){
                        $check['lbq']=array('like',input('lbq').'%');
                    if(trim(input('lbq')) != ''){
                        $sql .= 'lbq'."//";
                        $gz .= "3//";
                        $neir .= input('lbq')."//";
                    }
                }
                    $this->assign("lbq",input('lbq'));
                if(!empty(input('text'))){
                        $check['text']=array('like','%'.input('text').'%');
                    if(trim(input('text')) != ''){
                        $sql .= 'text'."//";
                        $gz .= "4//";
                        $neir .= input('text')."//";
                    }
                }
                $this->assign("text",input('text'));
                $this->assign("sql",substr($sql,0,-2));
                $this->assign("gz",substr($gz,0,-2));
                $this->assign("neir",substr($neir,0,-2));
                }else{
                    $check='1';$this->assign("type",'');
                    $this->assign("role",'');
                    $this->assign("lbq",'');
                    $this->assign("text",'');
                    $this->assign("sql",'1');
                    $this->assign("gz",'1');
                    $this->assign("neir",'1');
                }
        $data['auth_id'] = 135;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->xzxc($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function xzxc_del(){
        $index = model('Order');
        $res = $index->xzxc_del();
        return $res;
    }
    /*添加*/
    public function xzxc_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->xzxc_add();
            return $res;
          }else{
            $data['auth_id'] = 135;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function xzxc_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','xzxc');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 135;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,lbq,role,type,text')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->xzxc_edit();
            return $res;
          }
    }
    /*导出*/
public function goodsExcelExport(){
  if(request()->isGet()){
    $find = explode("//",input('find'));
    $neir = explode("//",input('neir'));
    $gz = explode("//",input('gz'));
    $gz_len = count($gz);
    $find_len = count($find);
    $neir_len =  count($neir);
    if($gz_len != $find_len){
      return "出错";
    }else{
      if($gz_len != $neir_len){
        return "出错";
      }
    }
    for($i=0;$i<$gz_len;$i++){
      if($gz[$i] == 1){
        $where = [$find[$i]]." like %".$neir[$i];
      }
      if($gz[$i] == 2){
        $where[$find[$i]] = array('like',"%".$neir[$i]);
      }
      if($gz[$i] == 3){
        $where[$find[$i]] = array('like',$neir[$i]."%");
      }
      if($gz[$i] == 4){
        $where[$find[$i]] = array('like',"%".$neir[$i]."%");
      }
      if($gz[$i] == 5){
        $n_arr = explode("||",$neir[$i]);
        $len = count($n_arr);
        if($len == 2){
          $where[$find[$i]] = array($n_arr[0],$n_arr[1]);
        }else{
          $where[$find[$i]] = array(array($n_arr[0],$n_arr[1]),array($n_arr[2],$n_arr[3]));
        }
      }
    }
    $id = input('id');
    $row = db("excel")->where('id',$id)->field('table,excel_name,field,field_name,field_cr')->find();
    $sql = "SELECT ".$row['field']." FROM ".$row['table']." where";
    echo $where;exit;
    $data = Db::query($sql);
    $excelName = $row['excel_name'];
    if($row['field_cr'] != ''){
         $Header = array_merge(explode(";",$row['field_name']),explode(",",$row['field_cr']));
    }else{
         $Header = explode(";",$row['field_name']);
    }
  }else{
     $data = array();
     $excelName = '';
     $Header = array();
  }
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
public function ixz(){
    if(!empty(input('xs_s')) || !empty(input('xs_l')) || !empty(input('text'))){
            if(!empty(input('xs_s')) && !empty(input('xs_l'))){
                    $check['xs'] = array(array("gt",input('xs_s')),array("lt",input('xs_l')));
                }else if(!empty(input('xs_s')) && empty(input('xs_l'))){
                    $check['xs'] = array("gt",input('xs_s'));
                }else if(empty(input('xs_s')) && !empty(input('xs_l'))){
                    $check['xs'] = array("lt",input('xs_l'));
                }
                $this->assign('xs_l',input('xs_l'));
                $this->assign('xs_s',input('xs_s'));if(!empty(input('text'))){
                        $check['text']=array('like',input('text'));
                    }
                    $this->assign("text",input('text'));}else{
        $check='1';$this->assign("xs_s",'');
                        $this->assign("xs_l",'');$this->assign("text",'');}
        $data['auth_id'] = 136;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->ixz($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function ixz_del(){
        $index = model('Order');
        $res = $index->ixz_del();
        return $res;
    }
    /*添加*/
    public function ixz_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->ixz_add();
            return $res;
          }else{
            $data['auth_id'] = 136;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function ixz_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','ixz');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 136;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role,xs')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->ixz_edit();
            return $res;
          }
    }
}