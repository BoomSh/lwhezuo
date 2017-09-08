<?php
namespace app\admin\controller;
class Order extends Common{
    public function index(){
       if(!empty(input('goods_name')) || !empty(input('goods_img')) || !empty(input('volume')) || !empty(input('goods_price')) || !empty(input('goods_total'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('goods_name'))){
                        $check['goods_name']=array('like','%'.input('goods_name'));
                            $sql .= 'goods_name'."//";
                            $gz .= "2//";
                            $neir .= input('goods_name')."//";
                    }
                    $this->assign("goods_name",input('goods_name'));if(!empty(input('goods_img'))){
                        $check['goods_img']=array('like',input('goods_img'));
                            $sql .= 'goods_img'."//";
                            $gz .= "1//";
                            $neir .= input('goods_img')."//";
                    }
                    $this->assign("goods_img",input('goods_img'));if(!empty(input('volume'))){
                        $check['volume']=array('like',input('volume').'%');
                            $sql .= 'volume'."//";
                            $gz .= "3//";
                            $neir .= input('volume')."//";
                    }
                    $this->assign("volume",input('volume'));if(!empty(input('goods_price'))){
                        $check['goods_price']=array('like','%'.input('goods_price').'%');
                        $sql .= 'goods_price'."//";
                        $gz .= "4//";
                        $neir .= input('goods_price')."//";
                    }
                    $this->assign("goods_price",input('goods_price'));if(!empty(input('goods_total'))){
                        $check['goods_total']=array('like','%'.input('goods_total'));
                            $sql .= 'goods_total'."//";
                            $gz .= "2//";
                            $neir .= input('goods_total')."//";
                    }
                    $this->assign("goods_total",input('goods_total'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("goods_name",'');$this->assign("goods_img",'');$this->assign("volume",'');$this->assign("goods_price",'');$this->assign("goods_total",'');}
        $data['auth_id'] = 160;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->index($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function index_del(){
        $index = model('Order');
        $res = $index->index_del();
        return $res;
    }
    /*添加*/
    public function index_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->index_add();
            return $res;
          }else{
            $data = 160;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function index_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','index');
        if(isset($_GET['uid'])){
            $data = 160;
            $row=db('stored_goods')->where('id',$_GET['uid'])->field('id,goods_code,goods_name,goods_img,volume,unit,height,bespoke,put_receipt,s_numbers')->find();
            $table = 'stored_goods';
            $zd_str = "id,goods_code,goods_name,goods_img,volume,unit,height,bespoke,put_receipt,s_numbers";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->index_edit();
            return $res;
          }
    }
}