<?php
namespace app\admin\controller;
use \think\Db;
use \think\Exception;
class Order extends Common{
      //    导入
    public function import(){
         if(!empty($_FILES['file_stu']['name'])){
            file_put_contents("aa.txt", $_FILES['file_stu']['name']);
           $tmp_file = $_FILES['file_stu']['tmp_name'];    //临时文件名
            $file_types = explode('.',$_FILES['file_stu']['name']); //  拆分文件名
            $file_type = $file_types [count ( $file_types ) - 1];   //  文件类型
            /*判断是否为excel文件*/
            if($file_type == 'xls' || $file_type == 'xlsx'|| $file_type == 'csv'){    //  符合类型
                /*上传业务*/
                $upload = new \think\Upload();
                $upload->maxSize   =     3145728 ;
                $upload->exts      =     array('xls', 'csv', 'xlsx');
                $upload->rootPath  =      './Public';
                $upload->savePath  =      '/Excel/';
                $upload->saveName  =      date('YmdHis');
                $info   =   $upload->upload();
                if(!$info) {    // 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{  // 上传成功
                    import("Util.PHPExcel");
                        $filename='./Public'.$info['file_stu']['savepath'].$info['file_stu']['savename'];
                        $PHPExcel=new \PHPExcel();
                        
                        $fileExtension=substr(strrchr($filename, '.'), 1);
                        
                        if($fileExtension=="xls"){
                            import("Util.PHPExcel.Reader.Excel5");
                            $PHPReader=new \PHPExcel_Reader_Excel5();
                        }elseif($fileExtension=="xlsx"){
                            import("Util.PHPExcel.Reader.Excel2007");
                            $PHPReader=new \PHPExcel_Reader_Excel2007();
                        }
                        
                            //载入文件          
                        $PHPExcel=$PHPReader->load($filename);
                        //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
                        $currentSheet=$PHPExcel->getSheet(0);
                        //获取总列数
                        $allColumn=$currentSheet->getHighestColumn();
                       //获取总行数
                        $allRow=$currentSheet->getHighestRow();
                        ++$allColumn;
                        //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
                        for($currentRow=1;$currentRow<=$allRow;$currentRow++){
                            //从哪列开始，A表示第一列
                           for ($currentColumn = 'A'; $currentColumn !=$allColumn; $currentColumn++){
                                //数据坐标
                                $address=$currentColumn.$currentRow;
                                //读取到的数据，保存到数组$arr中
                                $data[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
                            }
                        
                        }
                       return  $rs = $this->save_import($data);
                }
            } else{ //  不符合类型业务
                $this->error('不是excel文件，请重新上传...');
            }
        }else{
            file_put_contents("aa.txt", "123");
            $this->error('(⊙o⊙)~没传数据就导入');
        }
    }
    public function save_import($data){
        foreach ($data as $k => $v) {
            if($k>=2){
                $besp['reservation'] = $v['A'];
                //判断编码是否存在
                /*$bbh['reservation'] =  $v['A'];
                $pd = db("bespoke")->where($bbh)->field("id,state")->find();*/
                $name = $v['B'];
                $row = db("users")->where("name",$name)->field("id")->find();
                if($row){
                    //$bbh['user_id'] = $row['id'];
                    $bbh['reservation'] =  $v['A'];
                    $pd = db("bespoke")->where($bbh)->field("id,state")->find();
                    if($pd){
                        $whild['user_id'] = $row['id'];
                        $whild['reservation'] =  $v['A'];
                        $zdy = db("bespoke")->where($whild)->field("id,state")->find();
                        if($zdy){
                            //预约单信息存在 则直接添加商品
                            if($zdy['state'] != 3 || $zdy['state'] != 4){
                                $info['bespoke_id'] = $zdy['id'];
                                //$info['user_id'] = $row['id'];
                                $where['code'] = $v['C'];
                                $where['goods_name'] = $v['D'];
                                $number = $v['J'];
                                if($number > 0){
                                    //预约数量大于0
                                $goods = db("goods")->where($where)->field("id")->find();
                                    if($goods){
                                        $whid['code'] = $v['C'];
                                        $whid['goods_name'] = $v['D'];
                                        $whid['bespoke_id'] = $zdy['id'];
                                        $yy = db("bespoke_goods")->where($whid)->field("id")->find();
                                        if($yy){
                                            db("bespoke_goods")->where("id",$yy['id'])->delete();
                                        }
                                        //商品信息正确 则导入
                                        $info['code'] = $v['C'];
                                        $info['goods_name'] = $v['D'];
                                        $info['plt'] = $v['E'];
                                        $info['p_spec'] = $v['F'];
                                        $info['ctn'] = $v['G'];
                                        $info['c_spec'] = $v['H'];
                                        $info['pcs'] = $v['I'];
                                        $info['r_numbers'] = $v['J'];
                                        $info['long'] = $v['C'];
                                        $info['wide'] = $v['C'];
                                        $info['height'] = $v['C'];
                                        $info['volume'] = $v['C'];
                                        $info['gross'] = $v['C'];
                                        $info['suttle'] = $v['C'];
                                        $info['s_numbers'] = $v['C'];
                                        $info['goods_uncode'] = $v['C'];
                                        $info['goods_unit'] = $v['C'];
                                        db("bespoke_goods")->insert($info);
                                    }
                                }
                            }
                        }
                    }else{
                        //新生产预约单insertGetId
                        $zhuru['reservation'] = $v['A'];
                        $zhuru['user_id'] = $row['id'];
                        $zhuru['state'] = 1;
                        $zhuru['type'] = 1;
                        $where['code'] = $v['C'];
                        $where['goods_name'] = $v['D'];
                        $number = $v['J'];
                        if($number > 0){
                                    //预约数量大于0
                                $goods = db("goods")->where($where)->field("id")->find();
                                    if($goods){
                                        $x_id = db("bespoke")->insertGetId($zhuru);
                                        $info['bespoke_id'] = $x_id;
                                        $info['user_id'] = $row['id'];
                                        $whid['code'] = $v['C'];
                                        $whid['goods_name'] = $v['D'];
                                        $whid['bespoke_id'] = $x_id;
                                        $yy = db("bespoke_goods")->where($whid)->field("id")->find();
                                        if($yy){
                                            db("bespoke_goods")->where("id",$yy['id'])->delete();
                                        }
                                        //商品信息正确 则导入
                                        $info['code'] = $v['C'];
                                        $info['goods_name'] = $v['D'];
                                        $info['plt'] = $v['E'];
                                        $info['p_spec'] = $v['F'];
                                        $info['ctn'] = $v['G'];
                                        $info['c_spec'] = $v['H'];
                                        $info['pcs'] = $v['I'];
                                        $info['r_numbers'] = $v['J'];
                                        $info['long'] = $v['C'];
                                        $info['wide'] = $v['C'];
                                        $info['height'] = $v['C'];
                                        $info['volume'] = $v['C'];
                                        $info['gross'] = $v['C'];
                                        $info['suttle'] = $v['C'];
                                        $info['s_numbers'] = $v['C'];
                                        $info['goods_uncode'] = $v['C'];
                                        $info['goods_unit'] = $v['C'];
                                        db("bespoke_goods")->insert($info);
                                    }
                                }
                    }
                }
            }
        }
    }
    public function asd(){
        return $this->fetch();
    }
    public function index(){
                $where['code'] = array("eq",'');
                $row = db("goods")->where($where)->field("*")->order("id desc")->select();
                var_dump($row);exit;
         exit;
return $res;
            exit;
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
    public function lszd(){
        if(request()->isPost()){
            $str = input('zb');
            $arr = explode(",",$str);
            $count = count($arr);
            if($count>1){
                for($i=0;$i<$count;$i++){
                    $h = $i+1;
                    for($j=$h;$j<$count;$j++){
                        if($arr[$i] == $arr[$j]){
                            return "附表有重复的";
                        }
                    }
                }
            }
            return 'success';
        }else{
            return 2;
        }
    }
    /*删除*/
    public function index_del(){
        file_put_contents("aa.txt",input('ids'));
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
public function sanlb(){
    if(!empty(input('username')) || !empty(input('type')) || !empty(input('role')) || !empty(input('file'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('username'))){
                        $check['username']=array('like',input('username').'%');
                            $sql .= 'username'."//";
                            $gz .= "3//";
                            $neir .= input('username')."//";
                    }
                    $this->assign("username",input('username'));if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                            $sql .= 'type'."//";
                            $gz .= "3//";
                            $neir .= input('type')."//";
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like','%'.input('role'));
                            $sql .= 'role'."//";
                            $gz .= "2//";
                            $neir .= input('role')."//";
                    }
                    $this->assign("role",input('role'));if(!empty(input('file'))){
                        $check['file']=array('like',input('file').'%');
                            $sql .= 'file'."//";
                            $gz .= "3//";
                            $neir .= input('file')."//";
                    }
                    $this->assign("file",input('file'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("username",'');$this->assign("type",'');$this->assign("role",'');$this->assign("file",'');}
        $data['auth_id'] = 161;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sanlb($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sanlb_del(){
        $index = model('Order');
        $res = $index->sanlb_del();
        return $res;
    }
    /*添加*/
    public function sanlb_add(){
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
            $this->assign("admin_id",$_SESSION['id']);
            $this->assign("auths",$auths);
            $this->assign("commonts",$commonts);
            return $this->fetch("Order/sanlb_addpro");;
          }
            $row = $auth->tabsta();
            //var_dump($row);
            $this->assign("row",$row);
            return $this->fetch();
    }
    /*修改*/
    public function sanlb_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sanlb');
        if(isset($_GET['uid'])){
            $data = 161;
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,username,lbq,role,text,file,xs')->find();
            $table = 'aa';
            $zd_str = "id,type,username,lbq,role,text,file,xs";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sanlb_edit();
            return $res;
          }
    }
    public function export(){
        $field =array('id,bespoke_id');
        $data  = db("bespoke_goods")->field($field)->select();
        /*var_dump($data);die;*/
        
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Util.PHPExcel");
        import("Util.PHPExcel.Writer.Excel5");
        import("Util.PHPExcel.IOFactory.php");
        $headArr=array("订单号","收货人");
        $filename="book_excel";
        
        $this->getExcel($filename,$headArr,$data);
    }

    private function getExcel($fileName,$headArr,$data){
            //对数据进行检验
            if(empty($data) || !is_array($data)){
                die("data must be a array");
            }
            //检查文件名
            if(empty($fileName)){
                exit;
            }

            $date = date("Y_m_d",time());
            $fileName .= "_{$date}.xls";

            //创建PHPExcel对象，注意，不能少了\
            $objPHPExcel = new \PHPExcel();
            $objProps = $objPHPExcel->getProperties();
            
            //设置表头
            $key = ord("A");
            foreach($headArr as $v){
                $colum = chr($key);
                $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
                $key += 1;
            }
            
            $column = 2;
            $objActSheet = $objPHPExcel->getActiveSheet();
            foreach($data as $key => $rows){ //行写入
                $span = ord("A");
                foreach($rows as $keyName=>$value){// 列写入
                    $j = chr($span);
                    $objActSheet->setCellValue($j.$column, $value);
                    $span++;
                }
                $column++;
        }

            $fileName = iconv("utf-8", "gb2312", $fileName);
            //重命名表
            // $objPHPExcel->getActiveSheet()->setTitle('test');
            //设置活动单指数到第一个表,所以Excel打开这是第一个表
            $objPHPExcel->setActiveSheetIndex(0);
            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename=\"$fileName\"");
            header('Cache-Control: max-age=0');

            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            exit;
        }
public function fild(){
    if(!empty(input('file')) || !empty(input('text')) || !empty(input('lbq'))){
                        $sql = '';
                        $gz = '';
                        $neir = '';if(!empty(input('file'))){
                        $check['file']=array('like','%'.input('file').'%');
                        $sql .= 'file'."//";
                        $gz .= "4//";
                        $neir .= input('file')."//";
                    }
                    $this->assign("file",input('file'));if(!empty(input('text'))){
                        $check['text']=array('like',input('text').'%');
                            $sql .= 'text'."//";
                            $gz .= "3//";
                            $neir .= input('text')."//";
                    }
                    $this->assign("text",input('text'));if(!empty(input('lbq'))){
                        $check['lbq']=array('like','%'.input('lbq'));
                            $sql .= 'lbq'."//";
                            $gz .= "2//";
                            $neir .= input('lbq')."//";
                    }
                    $this->assign("lbq",input('lbq'));
        $this->assign("sql",substr($sql,0,-2));
        $this->assign("gz",substr($gz,0,-2));
        $this->assign("neir",substr($neir,0,-2));
        }else{
        $check='1';
        $this->assign("sql",1);
        $this->assign("gz",1);
        $this->assign("neir",1);$this->assign("file",'');$this->assign("text",'');$this->assign("lbq",'');}
        $data['auth_id'] = 180;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->fild($page,$check);
        $this->assign('page',$page);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function fild_del(){
        $index = model('Order');
        $res = $index->fild_del();
        return $res;
    }
    /*添加*/
    public function fild_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->fild_add();
            return $res;
          }else{
            $data = 180;
            $res = $this->zengjia($data);
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function fild_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','fild');
        if(isset($_GET['uid'])){
            $data = 180;
            $row=db('aa')->where('id',$_GET['uid'])->field('id,text,lbq,role,type')->find();
            $table = 'aa';
            $zd_str = "id,text,lbq,role,type";
            $res = $this->xiugai($data,$table,$zd_str);
            $this->assign('res',$res);
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->fild_edit();
            return $res;
          }
    }
}