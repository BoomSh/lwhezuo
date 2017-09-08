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
public function yy($page,$check){
        $res['row'] = db('aa')->field('id,username,type,role,text,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
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
        if(request()->isPost()){$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['text'] = input('text');$data['lbq'] = input('lbq');
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
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = implode(',',input('username/a'));$data['type'] = input('type');$data['role'] = input('role');$data['text'] = input('text');$data['lbq'] = input('lbq');
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
public function sx($page,$check){
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
    public function sx_add(){
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
    public function sx_edit(){
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
    public function sx_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
}