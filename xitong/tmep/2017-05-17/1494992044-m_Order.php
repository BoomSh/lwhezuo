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

public function xx($page,$check){
        $res['row'] = db('aa')->field('id,type,username,role,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?name=".input('name')."&"."page=".$page;
        }
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xx_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function xx_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function xx_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }

public function lxa($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $res['id'] = $excel_id;
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
    public function lxa_add(){
        if(request()->isPost()){$data['type'] = input('type');
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
    public function lxa_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');
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
    public function lxa_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xsaz($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $res['id'] = $excel_id;
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&lbq=".input('lbq')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xsaz_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function xsaz_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function xsaz_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sada($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $res['id'] = 4;
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
    public function sada_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');
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
    public function sada_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');
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
    public function sada_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxaz($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,role,lbq,type')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function sxaz_add(){
        if(request()->isPost()){$data['role'] = input('role');$data['lbq'] = input('lbq');$data['type'] = input('type');
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
    public function sxaz_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['type'] = input('type');
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
    public function sxaz_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxzxc($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,role,type,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $res['id'] = 21;
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&role=".input('role')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function sxzxc_add(){
        if(request()->isPost()){$data['role'] = input('role');$data['type'] = input('type');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function sxzxc_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['role'] = input('role');$data['type'] = input('type');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function sxzxc_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxd($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 125;
                    $whid['is_show'] = 1;
                    $sx = db("excel")->where($whid)->field("id")->find();
                    $res['id'] = $sx['id'];
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
    public function sxd_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');
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
    public function sxd_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');
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
    public function sxd_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxa($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,username,role,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 127;
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
    public function sxa_add(){
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
    public function sxa_edit(){
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
    public function sxa_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xaz($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,role,type,lbq')->where($check)->order('id desc')->limit(($page-1)*2,2)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 128;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/2);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&role=".input('role')."&
          page=".$page;
        }
        $ol = $_SERVER['REQUEST_URI'];
        $len = stripos($ol,"?");
        $res['now'] = substr($ol,$len);
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xaz_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['role'] = input('role');$data['type'] = input('type');$data['lbq'] = input('lbq');
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
    public function xaz_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['role'] = input('role');$data['type'] = input('type');$data['lbq'] = input('lbq');
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
    public function xaz_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxsaz($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,username,role')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function sxsaz_add(){
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
    public function sxsaz_edit(){
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
    public function sxsaz_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function saxz($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
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
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function saxz_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');
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
    public function saxz_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');
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
    public function saxz_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxzx($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
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
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function sxzx_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');
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
    public function sxzx_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');
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
    public function sxzx_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sdaxa($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
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
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function sdaxa_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');
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
    public function sdaxa_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');
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
    public function sdaxa_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxzcx($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,type')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
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
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function sxzcx_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');
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
    public function sxzcx_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');
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
    public function sxzcx_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxzxzd($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,type')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
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
          $url = $_SERVER['REQUEST_URI']."?type=".input('type')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function sxzxzd_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');
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
    public function sxzxzd_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');
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
    public function sxzxzd_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xxz($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function xxz_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));
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
    public function xxz_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));
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
    public function xxz_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xzx($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?role=".input('role')."&type=".input('type')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xzx_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');
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
    public function xzx_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');
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
    public function xzx_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xxs($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
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
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&type=".input('type')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function xxs_add(){
        if(request()->isPost()){$data['type'] = input('type');
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
    public function xxs_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');
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
    public function xxs_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxc($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function sxc_add(){
        if(request()->isPost()){$data['type'] = input('type');
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
    public function sxc_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');
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
    public function sxc_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xoi($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,type,role')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 141;
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
    public function xoi_add(){
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
    public function xoi_edit(){
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
    public function xoi_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xxsa($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 142;
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
    public function xxsa_add(){
        if(request()->isPost()){$data['type'] = input('type');
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
    public function xxsa_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');
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
    public function xxsa_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sxsa($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 143;
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
    public function sxsa_add(){
        if(request()->isPost()){$data['type'] = input('type');
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
    public function sxsa_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');
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
    public function sxsa_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xxcs($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,username,type')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 144;
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
    public function xxcs_add(){
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');
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
    public function xxcs_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');
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
    public function xxcs_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function xcs($page,$check){
        $res['row'] =  Db::table('wx_aa')->field('id,type,role')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();$sql = Db::table("wx_aa")->getlastsql();
                    $star = stripos($sql,'where');
                    $res['sql'] = substr($sql,$star);
                    $whid['auth_id'] = 145;
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
    public function xcs_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');
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
    public function xcs_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');
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
    public function xcs_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
}