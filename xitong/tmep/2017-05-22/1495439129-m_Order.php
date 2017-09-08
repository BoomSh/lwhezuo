<?php
namespace app\admin\model;
use \think\Db;

class Order extends Common{
    public function index($page,$check){
        $res['row'] = Db::table("wx_aa")->field("id,username")->where($check)->order("id desc")->limit(($page-1)*2,2)->select();
        return Db::table("wx_aa")->getLastSql(); 
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
        $where[$find[$i]] = array('like',$neir[$i]);
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

public function lasx($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,type,role,lbq,xs,file')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 131;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&role=".input('role')."&lbq=".input('lbq')."&xs_s=".input('xs_s')."&xs_l=".input('xs_l')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function lasx_add(){
        if(request()->isPost()){
          $data['username'] = implode(',',input('username/a'));
          $data['type'] = input('type');
          $data['role'] = input('role');
          $data['lbq'] = input('lbq');
          $data['xs'] = input('xs');
          $data['file'] = input('file');
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
    public function lasx_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['xs'] = input('xs');$data['file'] = input('file');
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
    public function lasx_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxzq($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role,username,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();

        $sql = Db::table("wx_aa")->getlastsql();
        $star = stripos($sql,'where');
        $res['sql'] = substr($sql,$star);
        $whid['auth_id'] = 132;
        $whid['is_show'] = 1;
        $ex_arr = db('excel')->where($whid)->field('id')->find();
        $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&username=".input('username')."&role=".input('role')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function sxzq_add(){
        if(request()->isPost()){
          $data['type'] = input('type');
          $data['role'] = input('role');
          $data['username'] = implode(',',input('username/a'));
          $data['lbq'] = input('lbq');
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
    public function sxzq_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['username'] = implode(',',input('username/a'));$data['lbq'] = input('lbq');
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
    public function sxzq_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }


public function szxaa($page,$check){
          $table = "wx_aa";
          $zd_str = "id,text,lbq,role,type,username,file";
          $find = 133;
          $arr = array("text","lbq","role","type","username","file");
          $res['row'] = $this->zhanshi($arr,$find,$table,$zd_str,$page,$check);
          $whid['auth_id'] = 133;
          $whid['is_show'] = 1;
          $ex_arr = db('excel')->where($whid)->field('id')->find();
          $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?text=".input('text')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function szxaa_add(){
        if(request()->isPost()){$data['text'] = input('text');$data['lbq'] = input('lbq');$data['role'] = input('role');$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['file'] = input('file');
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
    public function szxaa_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['text'] = input('text');$data['lbq'] = input('lbq');$data['role'] = input('role');$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['file'] = input('file');
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
    public function szxaa_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }








public function order($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,type,role,lbq,text,file,xs')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 134;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&role=".input('role')."&username=".input('username')."&lbq=".input('lbq')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function order_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');$data['file'] = input('file');$data['xs'] = input('xs');
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
    public function order_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');$data['file'] = input('file');$data['xs'] = input('xs');
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
    public function order_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxzi($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,type,role,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
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
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&role=".input('role')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function sxzi_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function sxzi_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function sxzi_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function isq($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role,username,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 136;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&username=".input('username')."&role=".input('role')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function isq_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['username'] = implode(',',input('username/a'));$data['lbq'] = input('lbq');
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
    public function isq_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['username'] = implode(',',input('username/a'));$data['lbq'] = input('lbq');
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
    public function isq_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xzi($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,type,role,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 138;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&type=".input('type')."&role=".input('role')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xzi_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function xzi_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function xzi_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function cc($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,type,role,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 139;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function cc_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');
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
    public function cc_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');
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
    public function cc_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xcc($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role,username')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 140;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xcc_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['username'] = implode(',',input('username/a'));
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
    public function xcc_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['username'] = implode(',',input('username/a'));
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
    public function xcc_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xcv($page,$check){
                      $table = "wx_aa";
                      $zd_str = "id,type,lbq,role,username";
                      $find = 142;$arr = array("type","lbq","role","username");
                 $res['row'] = $this->zhanshi($arr,$find,$table,$zd_str,$page,$check);$whid['auth_id'] = 142;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&type=".input('type')."&role=".input('role')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xcv_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['lbq'] = input('lbq');$data['role'] = input('role');$data['username'] = implode(',',input('username/a'));
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
    public function xcv_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['lbq'] = input('lbq');$data['role'] = input('role');$data['username'] = implode(',',input('username/a'));
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
    public function xcv_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function vvc($page,$check){
                      $table = "wx_aa";
                      $zd_str = "id,username,type,role";
                      $find = 145;$arr = array("username","type","role");
                 $res['row'] = $this->zhanshi($arr,$find,$table,$zd_str,$page,$check);$whid['auth_id'] = 145;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function vvc_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');
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
    public function vvc_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');
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
    public function vvc_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xczg($page,$check){
                      $table = "wx_aa";
                      $zd_str = "id,type,username,role";
                      $find = 149;$arr = array("type","username","role");
                 $res['row'] = $this->zhanshi($arr,$find,$table,$zd_str,$page,$check);$whid['auth_id'] = 149;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xczg_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['role'] = input('role');
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
    public function xczg_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['role'] = input('role');
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
    public function xczg_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function cxz($page,$check){
                      $table = "wx_aa";
                      $zd_str = "id,type,username,role,lbq";
                      $find = 153;$arr = array("type","username","role","lbq");
                 $res['row'] = $this->zhanshi($arr,$find,$table,$zd_str,$page,$check);$whid['auth_id'] = 153;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&type=".input('type')."&role=".input('role')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function cxz_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['role'] = input('role');$data['lbq'] = input('lbq');
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
    public function cxz_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['role'] = input('role');$data['lbq'] = input('lbq');
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
    public function cxz_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
}