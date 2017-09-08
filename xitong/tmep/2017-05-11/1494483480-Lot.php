<?php
namespace app\admin\controller;
class Lot extends Common{
    public function lot(){
       if(!empty(input('name'))){
        $check['role']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 51;
        $res = db("auth_name")->where($data)->select();
        $this->assign('res',$res);
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Lot');
        $row = $index->lot($page,$check);
        $this->assign('row',$row);
        return $this->fetch();
    }
    /*删除*/
    public function lot_del(){
        $index = model('Lot');
        $res = $index->lot_del();
        return $res;
    }
    /*添加*/
    public function lot_add(){
        if(request()->isPost()){
            $index = model('Lot');
            $res = $index->lot_add();
            return $res;
          }else{
            $data['auth_id'] = 51;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function lot_edit(){
        $this->assign('contrll','Lot');
        $this->assign('ff','lot');
        if(isset($_GET['uid'])){
            $res=db('aa')->where('id',$_GET['uid'])->field('id,lbq,role,type')->find();
            $data['auth_id'] = 51;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Lot');
            $res = $index->lot_edit();
            return $res;
          }
    }
public function sad(){
    if(!empty(input('name'))){
        $check['lbq']=array('like','%'.input('name').'%');
    }else{
        $check='1';
        }
        $data['auth_id'] = 52;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Lot');
        $row = $index->sad($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sad_del(){
        $index = model('Lot');
        $res = $index->sad_del();
        return $res;
    }
    /*添加*/
    public function sad_add(){
        if(request()->isPost()){
            $index = model('Lot');
            $res = $index->sad_add();
            return $res;
          }else{
            $data['auth_id'] = 52;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sad_edit(){
        $this->assign('contrll','Lot');
        $this->assign('ff','sad');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 52;
            $row = db("auth_name")->where($data)->select();
            $this->assign('row',$row);
            $res=db('aa')->where('id',$_GET['uid'])->field('id,lbq,role,type')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Lot');
            $res = $index->sad_edit();
            return $res;
          }
    }
}