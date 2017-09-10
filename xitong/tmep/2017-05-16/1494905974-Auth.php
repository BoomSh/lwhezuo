<?php

namespace app\admin\controller;

class Auth extends Common
{
    /**
    管理员管理页面
    **/
    public function index(){
        $index = model("Auth");
        $row = $index->index();
        $this->assign("row",$row);
        $this->assign("contrll","Auth");
        return $this->fetch();
    }

    public function index_edit(){
          $this->assign("contrll","Auth");
          if(isset($_GET['uid'])){
           $auth = model("Auth");
           $row = $auth->index_edit();
         //  var_dump($row);exit;
           $this->assign("row",$row);
            return $this->fetch();
          }
          if(isset($_POST)){
            $auth = model("Auth");
            $row = $auth->index_edit();
            return $row;
          }
        }

    public function index_add(){
            $auth = model("Auth");
          if(!empty($_POST)){
            $row = $auth->index_add();
            return $row;
          }else{
            $this->assign("row",$auth->index_add());
            $this->assign("contrll","Auth");
            return $this->fetch();
          }
        }

    public function index_del(){
          $data['id']=array("in",$_REQUEST['ids']);
          $res=db("admin")->where($data)->delete();
          if($res){
            return "success";
          }else{
            return "error";
          }
    }



    /**
    权限管理页面
    **/
    public function auth(){
        $row = db("auth")->field("id,auth_name,auth_c,auth_a,is_show,auth_level")->order("auth_path")->select();
        foreach ($row as $k => $v) {
            if($row[$k]['auth_level'] == 1){
                $row[$k]['auth_name'] = "----　".$row[$k]['auth_name'];
            }
        }
        $this->assign("row",$row);
        return $this->fetch();
    }

    public function auth_edit(){
        $this->assign("contrll","Auth");
        $this->assign("action","auth");
          if(isset($_GET['uid'])){
           $auth = model("Auth");
           $row = $auth->auth_edit();
         // var_dump($row);exit;
           $this->assign("row",$row);
            return $this->fetch();
          }
          if(isset($_POST)){
             //var_dump($_POST);exit;
            $auth = model("Auth");
            $row = $auth->auth_edit();
            return $row;
          }
    }
     public function auth_add(){
            $auth = model("Auth");
            /*控制器*/
            $this->assign("contrll","Auth");
            /*方法*/
            $this->assign("action","auth");
          if(request()->isPost()){
            $commont = input("table");
            $this->assign("table",$commont);
            /*获取所有数据表*/
            $commonts = $auth->commont($commont);
            $auths = $auth->auth();
            $this->assign("auths",$auths);
            $this->assign("commonts",$commonts);
            return $this->fetch("Auth/auth_addpro");;
          }
            $row = $auth->tables();
            //var_dump($row);
            $this->assign("row",$row);
            return $this->fetch();
        }
      public function auth_check(){
        if(request()->isPost()){
           $table = input('table');
           /*判断表 是否存在*/
           $res = $this->table($table);
           return $res;
          }
      }
    /**
    角色管理页面
    **/
    public function admin(){
        $this->assign("contrll","Auth");
        $this->assign("action","admin");
        $index = model("Auth");
        $row = $index->admin();
        $this->assign("row",$row);
        return $this->fetch();
    }
    public function admin_add(){
        $auth = model("Auth");
        $this->assign("contrll","Auth");
        $this->assign("action","auth");
        if(!empty($_POST)){
            //var_dump($_POST);exit;
        $row = $auth->admin_add();
        return $row;
        }else{
         $auth = model("Auth");
         $row = $auth->admin_add();
         $this->assign("row",$row);
         return $this->fetch();
        }
    }

   public function admin_del(){
          $data['id']=array("in",$_REQUEST['ids']);
          $res=db("role")->where($data)->delete();
          if($res){
            return "success";
          }else{
            return "error";
          }
    }

    public function admin_edit(){
        $this->assign("contrll","Auth");
        $this->assign("action","auth");
          if(isset($_GET['uid'])){
           $auth = model("Auth");
           $row = $auth->admin_edit();
           //var_dump($row['auth']);exit;
           $this->assign("row",$row);
            return $this->fetch();
          }
          if(isset($_POST)){
            //var_dump($_POST);exit;
            $auth = model("Auth");
            $row = $auth->admin_edit();
            return $row;
          }
    }
public function zdcoll(){
        $index = model('Auth');
        $res = $index->zdcoll();
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*修改*/
    public function zdcoll_edit(){
        if(isset($_GET['uid'])){
            $row = db("auth_name")->where("auth_id",input('uid'))->field('auth_id',true)->select();
            $this->assign("id",input('uid'));
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Auth');
            $res = $index->zdcoll_edit();
            return $res;
          }
    }
}