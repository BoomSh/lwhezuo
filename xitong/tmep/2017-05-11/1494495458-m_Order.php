<?php
namespace app\admin\model;
use \think\Db;

class Order extends Common{
    public function index($page,$check){
        $res['row'] = db('aa')->field("id,username")->where($check)->order("id desc")->limit(($page-1)*2,2)->select();
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/2);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?name=".input("name")."&"."page=".$page;
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

public function yy($page,$check){
        $res['row'] = db('aa')->field('id,type,role')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function yy_add(){
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
    public function yy_edit(){
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
    public function yy_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function ddgl($page,$check){
        $res['row'] = db('aa')->field('id,type,role,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function ddgl_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['text'] = input('text');
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
    public function ddgl_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['text'] = input('text');
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
    public function ddgl_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sd($page,$check){
        $res['row'] = db('aa')->field('id,type,role,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function sd_add(){
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
    public function sd_edit(){
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
    public function sd_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function dd($page,$check){
        $res['row'] = db('aa')->field('id,type,role,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function dd_add(){
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
    public function dd_edit(){
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
    public function dd_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function ss($page,$check){
        $res['row'] = db('aa')->field('id,type,lbq,role')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function ss_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['lbq'] = input('lbq');$data['role'] = input('role');
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
    public function ss_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['lbq'] = input('lbq');$data['role'] = input('role');
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
    public function ss_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function dds($page,$check){
        $res['row'] = db('aa')->field('id,type,role,username')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function dds_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['username'] = input('username');
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
    public function dds_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['username'] = input('username');
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
    public function dds_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sas($page,$check){
        $res['row'] = db('aa')->field('id,username,type,role,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function sas_add(){
        if(request()->isPost()){$data['username'] = input('username');$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function sas_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = input('username');$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function sas_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sda($page,$check){
        $res['row'] = db('aa')->field('id,type,role,lbq,text,username')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function sda_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');$data['username'] = input('username');
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
    public function sda_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');$data['username'] = input('username');
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
    public function sda_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function ssa($page,$check){
        $res['row'] = db('aa')->field('id,type,role,username')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function ssa_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['username'] = input('username');
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
    public function ssa_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['username'] = input('username');
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
    public function ssa_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function ssaax($page,$check){
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
    public function ssaax_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['username'] = input('username');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function ssaax_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['username'] = input('username');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function ssaax_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sadl($page,$check){
        $res['row'] = db('aa')->field('id,username,type,role,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function sadl_add(){
        if(request()->isPost()){$data['username'] = input('username');$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function sadl_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = input('username');$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function sadl_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function ii($page,$check){
        $res['row'] = db('aa')->field('id,username,role,type,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function ii_add(){
        if(request()->isPost()){$data['username'] = input('username');$data['role'] = input('role');$data['type'] = input('type');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function ii_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = input('username');$data['role'] = input('role');$data['type'] = input('type');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function ii_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function os($page,$check){
        $res['row'] = db('aa')->field('id,type,role,username,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function os_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['role'] = input('role');$data['username'] = input('username');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function os_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['role'] = input('role');$data['username'] = input('username');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function os_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function yu($page,$check){
        $res['row'] = db('aa')->field('id,type,username,role,text,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function yu_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['username'] = input('username');$data['role'] = input('role');$data['text'] = input('text');$data['lbq'] = input('lbq');
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
    public function yu_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['username'] = input('username');$data['role'] = input('role');$data['text'] = input('text');$data['lbq'] = input('lbq');
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
    public function yu_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sk($page,$check){
        $res['row'] = db('aa')->field('id,username,type,lbq,role,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function sk_add(){
        if(request()->isPost()){$data['username'] = input('username');$data['type'] = input('type');$data['lbq'] = input('lbq');$data['role'] = input('role');$data['text'] = input('text');
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
    public function sk_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = input('username');$data['type'] = input('type');$data['lbq'] = input('lbq');$data['role'] = input('role');$data['text'] = input('text');
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
    public function sk_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function ords($page,$check){
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
    public function ords_add(){
        if(request()->isPost()){
          $data['type'] = input('type');
          //$data['username'] = input('username');
          $data['role'] = input('role');
          $data['lbq'] = input('lbq');
          $data['text'] = input('text');
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
    public function ords_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['username'] = input('username');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function ords_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sax($page,$check){
        $res['row'] = db('aa')->field('id,username,type,role,lbq,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function sax_add(){
        if(request()->isPost()){
          $aa = implode(",",input('username/a'));
          $data['username'] = $aa;
          $data['type'] = input('type');
          $data['role'] = input('role');
          $data['lbq'] = input('lbq');
          $data['text'] = input('text');
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
    public function sax_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = input('username');$data['type'] = input('type');$data['role'] = input('role');$data['lbq'] = input('lbq');$data['text'] = input('text');
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
    public function sax_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function saxs($page,$check){
        $res['row'] = db('aa')->field('id,username,lbq,role,type,text')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
    public function saxs_add(){
        if(request()->isPost()){$data['username'] = input('username');$data['lbq'] = input('lbq');$data['role'] = input('role');$data['type'] = input('type');$data['text'] = input('text');
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
    public function saxs_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = input('username');$data['lbq'] = input('lbq');$data['role'] = input('role');$data['type'] = input('type');$data['text'] = input('text');
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
    public function saxs_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
}