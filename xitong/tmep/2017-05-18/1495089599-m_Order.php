<?php
namespace app\admin\model;
use \think\Db;

class Order extends Common{
    public function index($page,$check){
        $res['row'] = Db::table("wx_aa")->field("id,username")->where($check)->order("id desc")->limit(($page-1)*2,2)->select();
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $sql = Db::table("wx_aa")->getLastSql();
        $star = stripos($sql,'where');
        $res['sql'] = substr($sql,$star);
        $where['auth_id'] = 116;
        $where['is_show'] = 1;
        $excel = db("excel")->where($where)->field("id")->find();
        $res['id'] = $excel['id'];
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/2);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?type=".input("type")."&role=".input("role")."&"."page=".$page;
        }
       $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }

    public function index_add(){
      if(request()->isPost()){
        $data['username'] = input("username");
        $data['lbq'] = input("lbq");
        $data['role'] = input("role");
        $res = db("aa")->insert($data);
        if($res){
          return "success";
        }else{
          return "error";
        }
      }else{
        return "error";
      }
    }
    public function index_edit(){
      if(request()->isPost()){
        $data['username'] = input("username");
        $data['lbq'] = input("lbq");
        $data['role'] = input("role");
        $data['id'] = input("id");
        $res = db("aa")->update($data);
        if($res){
          return "success";
        }else{
          return "error";
        }
      }else{
        return "error";
      }
    }
    public function index_del(){
      $data['id']=array("in",input('ids'));
      $res=db("aa")->where($data)->delete();
      if($res){
        return "success";
    }else{
     return "error";
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
        $where[$find[$i]] = array('like',$neir[$i]."%");
      }
    }
    $id = input('id');
    $row = db("excel")->where('id',$id)->field('table,excel_name,field,field_name,field_cr')->find();
    $sql = "SELECT ".$row['field']." FROM ".$row['table']." ".$where;
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
public function xzxc($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,lbq,role,type,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 135;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&role=".input('role')."&lbq=".input('lbq')."&text=".input('text')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xzxc_add(){
        if(request()->isPost()){$data['lbq'] = input('lbq');$data['role'] = input('role');$data['type'] = input('type');$data['text'] = input('text');
        $res = db('aa')->insert($data);
            if($res){
              return 'success';
            }else{
              return 'error';
            }
          }else{
            return 'error';
          }
    }
    public function xzxc_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['lbq'] = input('lbq');$data['role'] = input('role');$data['type'] = input('type');$data['text'] = input('text');
            $res = db('aa')->update($data);
            if($res){
              return 'success';
            }else{
              return 'error';
            }
        }else{
            return 'error';
        }
    }
    public function xzxc_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
}