<?php
namespace app\admin\controller;
class Asds extends Common{
    public function sad(){
       if(!empty(input('name'))){
                $check['lbq']=array("like","%".input('name')."%");
        }else{
                $check='1';
        }
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Asds');
        $row = $index->sad($page,$check);
        //var_dump($row);exit;
        $this->assign('row',$row);
        return $this->fetch();
    }
    /*删除*/
    public function sad_del(){
        $index = model('Asds');
        $res = $index->sad_del();
        return $res;
    }
    /*添加*/
    public function sad_add(){
        if(request()->isPost()){
            $index = model('Asds');
            $res = $index->sad_add();
            return $res;
          }else{
            $this->assign('contrll','Asds');
            $this->assign('ff','sad');
            return $this->fetch();
          }
    }
    /*修改*/
    public function sad_edit(){
        $this->assign('contrll','Asds');
        $this->assign('ff','sad');
        if(isset($_GET['uid'])){
            $res=db('aa')->where('id',$_GET['uid'])->field('id,username,lbq')->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Asds');
            $res = $index->sad_edit();
            return $res;
          }
    }
    public function aa_del(){
        return 1;
    }
}