<?php
namespace app\admin\model;
use \think\Db;
class Order extends Common{
    public function index($page,$check){
                    $table = "wx_stored_goods";
                    $zd_str = "id,goods_code,goods_name,goods_img,volume,unit,height,bespoke,put_receipt,s_numbers";
                    $find = 160;$arr = array("goods_code","goods_name","goods_img","volume","unit","height","bespoke","put_receipt","s_numbers");
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
        if(request()->isPost()){$data['goods_code'] = input('goods_code');$data['goods_name'] = input('goods_name');$data['goods_img'] = input('goods_img');$data['volume'] = input('volume');$data['unit'] = input('unit');$data['height'] = input('height');$data['bespoke'] = input('bespoke');$data['put_receipt'] = input('put_receipt');$data['s_numbers'] = input('s_numbers');
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
}