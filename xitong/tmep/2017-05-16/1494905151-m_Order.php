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
}