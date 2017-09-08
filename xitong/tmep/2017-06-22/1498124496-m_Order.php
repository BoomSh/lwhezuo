<?php
namespace app\admin\model;
use \think\Db;
use \think\Exception;
class Order extends Common{
    public function index($page,$check){
      $where['id'] = array("neq",1);
      $res = DB::name("domain")->where($where)->select();
      var_dump($res);exit;

          try {
                
                 DB::name("aa")->field("sss")->find();
                 DB::name("domain")->field("aa")->find();
                throw new Exception("ture");
            } catch(Exception $e) {
                 $data= $e->getMessage();
                 if($data != "ture"){
                   return $this->log("添加内容",$data,3);
                 }
            }
            return 1;
            exit;
                    $table = "wx_aa";
                    $zd_str = "id";
                    $find = 160;
                    $arr = array("id");
                 $res['row'] = $this->zhanshi($arr,$find,$table,$zd_str,$page,$check);$whid['auth_id'] = 160;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];$num = db('stored_goods')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?goods_name=".input('goods_name')."&goods_img=".input('goods_img')."&volume=".input('volume')."&goods_price=".input('goods_price')."&goods_total=".input('goods_total')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function index_add(){
        if(request()->isPost()){
          $data['goods_code'] = input('goods_code');
          $data['goods_name'] = input('goods_name');
          $data['goods_img'] = input('goods_img');
          $data['volume'] = input('volume');
          $data['unit'] = input('unit');$data['height'] = input('height');$data['bespoke'] = input('bespoke');$data['put_receipt'] = input('put_receipt');$data['s_numbers'] = input('s_numbers');
        $res = db('stored_goods')->insert($data);
            if($res){
              return 'success';
            }else{
              return 'error';
            }
          }else{
            return 'error';
          }
    }
    public function index_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['goods_code'] = input('goods_code');$data['goods_name'] = input('goods_name');$data['goods_img'] = input('goods_img');$data['volume'] = input('volume');$data['unit'] = input('unit');$data['height'] = input('height');$data['bespoke'] = input('bespoke');$data['put_receipt'] = input('put_receipt');$data['s_numbers'] = input('s_numbers');
            $res = db('stored_goods')->update($data);
            if($res){
              return 'success';
            }else{
              return 'error';
            }
        }else{
            return 'error';
        }
    }
    public function index_del(){
        $data['id']=array('in',input('ids'));
        $res=db('stored_goods')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
public function sanlb($page,$check){
                      $table = "wx_aa";
                      $zd_str = "id,type,username,lbq,role,text,file,xs";
                      $find = 161;$arr = array("type","username","lbq","role","text","file","xs");
                 $res['row'] = $this->zhanshi($arr,$find,$table,$zd_str,$page,$check);$whid['auth_id'] = 161;
                    $whid['is_show'] = 1;
                    $ex_arr = db('excel')->where($whid)->field('id')->find();
                    $res['id'] = $ex_arr['id'];
        $num = db('aa')->field('COUNT(*)')->where($check)->find();
        $res['num'] = $num['COUNT(*)'];
        $num = ceil($num['COUNT(*)']/20);
        if($check == 1){
          $url = $_SERVER['REQUEST_URI'];
        }else{
          $url = $_SERVER['REQUEST_URI']."?username=".input('username')."&type=".input('type')."&role=".input('role')."&file=".input('file')."&
        page=".$page;}
        $res['page'] = $this->pages($num,$page,$url);
        return $res;
    }
    public function sanlb_add(){
        if(request()->isPost()){$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['lbq'] = input('lbq');$data['role'] = input('role');$data['text'] = input('text');$data['file'] = input('file');$data['xs'] = input('xs');
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
    public function sanlb_edit(){
        if(request()->isPost()){$data['id'] = input('id');$data['type'] = input('type');$data['username'] = implode(',',input('username/a'));$data['lbq'] = input('lbq');$data['role'] = input('role');$data['text'] = input('text');$data['file'] = input('file');$data['xs'] = input('xs');
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
    public function sanlb_del(){
        $data['id']=array('in',input('ids'));
        $res=db('aa')->where($data)->delete();
          if($res){
            return 'success';
        }else{
         return 'error';
        }
    }
}