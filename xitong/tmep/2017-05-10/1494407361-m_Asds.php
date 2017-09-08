<?php
namespace app\admin\model;
use \think\Db;
class Asds extends Common{
    public function sad($page,$check){
        $res['row'] = db('aa')->field('id,username,lbq')->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
       //$sql = Db::table("aa")->getLastSql();
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?name=".input("name")."&"."page=".$page;
        }
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function sad_add(){
        if(request()->isPost()){
          $data['username'] = input('username');
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
    public function sad_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['username'] = input('username');$data['lbq'] = input('lbq');
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
    public function sad_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
}