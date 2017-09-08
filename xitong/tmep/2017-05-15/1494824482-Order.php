<?php
namespace app\admin\controller;
use \think\Request;
use \think\PHPExcel\Worksheet;
use \think\PHPExcel;
class Order extends Common
{
    public function index(){
        if(!empty(input('name'))){
          $check['username']=array("like","%".input('name')."%");
          $this->assign("name",input('name'));
        }else{
          $check="1";
          $this->assign("name",'');
        }
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model("Order");
        $row = $index->index($page,$check);
        $res = db("auth_name")->where("auth_id","37")->select();
        $this->assign("res",$res);
        //var_dump($res);
        $this->assign("row",$row);
        $this->assign("contrll","Order");
        return $this->fetch();
    }
public function index_del(){
  $index = model("Order");
  $res = $index->index_del();
  return $res;
}

public function index_add(){
  if(request()->isPost()){
    $index = model("Order");
    $res = $index->index_add();
    return $res;
  }else{
    $this->assign("contrll","Order");
    return $this->fetch();
  }
}
/*
 * excel表格导出
 * @param string $fileName 文件名称
 * @param array $headArr 表头名称
 * @param array $data 要导出的数据
 * @author static7  */
function excelExport($fileName = '', $headArr = [], $data = []) {
    $fileName .= "_" . date("Y_m_d", Request::instance()->time()) . ".xls";
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties();
    $key = ord("A"); // 设置表头
    foreach ($headArr as $v) {
        $colum = chr($key);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
        $key += 1;
    }
    $column = 2;
    $objActSheet = $objPHPExcel->getActiveSheet();
    foreach ($data as $key => $rows) { // 行写入
        $span = ord("A");
        foreach ($rows as $keyName => $value) { // 列写入
            $objActSheet->setCellValue(chr($span) . $column, $value);
            $span++;
        }
        $column++;
    }
    $fileName = iconv("utf-8", "gb2312", $fileName); // 重命名表
    $objPHPExcel->setActiveSheetIndex(0); // 设置活动单指数到第一个表,所以Excel打开这是第一个表
    header('Content-Type: application/vnd.ms-excel');
    header("Content-Disposition: attachment;filename='$fileName'");
    header('Cache-Control: max-age=0');
    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output'); // 文件通过浏览器下载
    exit();
}

public function excel() {
   $name='测试导出';
   $header=['表头A','表头B'];
   $data=[
       ['嘿嘿','heihei'],
       ['哈哈','haha']
   ];
   $this->excelExport($name,$header,$data);
}

    public function export(){
        //$ids  = implode(",",$ids);
        $field =array('id','lbq');
        $data  = db('aa')->field($field)->select();
        //var_dump($data);die;
        import("think.PHPExcel");
        import("think.PHPExcel.Writer.Excel5");
        import("think.PHPExcel.IOFactory.php");
        $headArr=array("asd","asda");
        $filename="book_excel";
        $res = $this->getExcel($filename,$headArr,$data);
        return $res;
    }
        private function getExcel($fileName,$headArr,$data){
            if(empty($data) || !is_array($data)){
                die("data must be a array");
            }
            if(empty($fileName)){
                exit;
            }
            $date = date("Y_m_d",time());
            $fileName .= "_{$date}.xls";
            $objPHPExcel = new \PHPExcel();
            $objProps = $objPHPExcel->getProperties();
            $key = ord("A");
            foreach($headArr as $v){
                $colum = chr($key);
                $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
                $key += 1;
            }
            $column = 2;
            $objActSheet = $objPHPExcel->getActiveSheet();
            foreach($data as $key => $rows){ 
                $span = ord("A");
                foreach($rows as $keyName=>$value){
                    $j = chr($span);
                    $objActSheet->setCellValue($j.$column, $value);
                    $span++;
                }
                $column++;
        }

            $fileName = iconv("utf-8", "gb2312", $fileName);
            $objPHPExcel->setActiveSheetIndex(0);
            header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition: attachment;filename='$fileName'");
            header('Cache-Control: max-age=0');
            $objPHPExcel = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objPHPExcel->save('php://output'); // 文件通过浏览器下载
            exit;
        }

public function sxa(){
    if(!empty(input('type'))){if(!empty(input('type'))){
                        $check['type']=array('like',input('type').'%');
                    }
                    $this->assign("type",input('type'));}else{
        $check='1';$this->assign("type",'');}
        $data['auth_id'] = 123;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxa($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxa_del(){
        $index = model('Order');
        $res = $index->sxa_del();
        return $res;
    }
    /*添加*/
    public function sxa_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxa_add();
            return $res;
          }else{
            $data['auth_id'] = 123;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxa_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxa');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 123;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxa_edit();
            return $res;
          }
    }
public function sasd(){
    if(!empty(input('type')) || !empty(input('xs_s')) || !empty(input('xs_l')) || !empty(input('text'))){if(!empty(input('type'))){
                        $check['type']=array('like','%'.input('type').'%');
                    }
                    $this->assign("type",input('type'));if(!empty(input('xs_s')) && !empty(input('xs_l'))){
                    $check['xs'] = array(array("gt",input('xs_s')),array("lt",input('xs_l')));
                }else if(!empty(input('xs_s')) && empty(input('xs_l'))){
                    $check['xs'] = array("gt",input('xs_s'));
                }else if(empty(input('xs_s')) && !empty(input('xs_l'))){
                    $check['xs'] = array("lt",input('xs_l'));
                }
                $this->assign('xs_l',input('xs_l'));
                $this->assign('xs_s',input('xs_s'));if(!empty(input('text'))){
                        $check['text']=array('like',input('text').'%');
                    }
                    $this->assign("text",input('text'));}else{
        $check='1';$this->assign("type",'');$this->assign("xs_s",'');
                        $this->assign("xs_l",'');$this->assign("text",'');}
        $data['auth_id'] = 124;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sasd($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sasd_del(){
        $index = model('Order');
        $res = $index->sasd_del();
        return $res;
    }
    /*添加*/
    public function sasd_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sasd_add();
            return $res;
          }else{
            $data['auth_id'] = 124;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sasd_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sasd');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 124;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sasd_edit();
            return $res;
          }
    }
public function sad(){
    if(!empty(input('type')) || !empty(input('role'))){
        if(!empty(input('type'))){
                        $check['type']=array('like','%'.input('type').'%');
                    }
                    $this->assign("type",input('type'));if(!empty(input('role'))){
                        $check['role']=array('like',input('role').'%');
                    }
                    $this->assign("role",input('role'));}else{
        $check='1';$this->assign("type",'');$this->assign("role",'');}
        $data['auth_id'] = 127;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sad($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sad_del(){
        $index = model('Order');
        $res = $index->sad_del();
        return $res;
    }
    /*添加*/
    public function sad_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sad_add();
            return $res;
          }else{
            $data['auth_id'] = 127;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sad_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sad');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 127;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,type,lbq,role')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sad_edit();
            return $res;
          }
    }
public function sxaw(){
    if(!empty(input('role')) || !empty(input('lbq'))){if(!empty(input('role'))){
                        $check['role']=array('like','%'.input('role').'%');
                    }
                    $this->assign("role",input('role'));if(!empty(input('lbq'))){
                        $check['lbq']=array('like',input('lbq').'%');
                    }
                    $this->assign("lbq",input('lbq'));}else{
        $check='1';$this->assign("role",'');$this->assign("lbq",'');}
        $data['auth_id'] = 128;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->sxaw($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function sxaw_del(){
        $index = model('Order');
        $res = $index->sxaw_del();
        return $res;
    }
    /*添加*/
    public function sxaw_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->sxaw_add();
            return $res;
          }else{
            $data['auth_id'] = 128;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function sxaw_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','sxaw');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 128;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,role,text,lbq,file,type,username')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->sxaw_edit();
            return $res;
          }
    }
public function wsx(){
    if(!empty(input('text')) || !empty(input('lbq'))){if(!empty(input('text'))){
                        $check['text']=array('like','%'.input('text').'%');
                    }
                    $this->assign("text",input('text'));if(!empty(input('lbq'))){
                        $check['lbq']=array('like',input('lbq').'%');
                    }
                    $this->assign("lbq",input('lbq'));}else{
        $check='1';$this->assign("text",'');$this->assign("lbq",'');}
        $data['auth_id'] = 129;
        $res = db("auth_name")->where($data)->select();
        $page = !empty($_GET['page']) ?$_GET['page']: 1;
        $index = model('Order');
        $row = $index->wsx($page,$check);
        $this->assign('row',$row);
        $this->assign('res',$res);
        return $this->fetch();
    }
    /*删除*/
    public function wsx_del(){
        $index = model('Order');
        $res = $index->wsx_del();
        return $res;
    }
    /*添加*/
    public function wsx_add(){
        if(request()->isPost()){
            $index = model('Order');
            $res = $index->wsx_add();
            return $res;
          }else{
            $data['auth_id'] = 129;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            return $this->fetch();
          }
    }
    /*修改*/
    public function wsx_edit(){
        $this->assign('contrll','Order');
        $this->assign('ff','wsx');
        if(isset($_GET['uid'])){
            $data['auth_id'] = 129;
            $res = db("auth_name")->where($data)->select();
            $this->assign('res',$res);
            $row=db('aa')->where('id',$_GET['uid'])->field('id,lbq,text,role,type')->find();
            $this->assign('row',$row);
            return $this->fetch();
        }
        if(isset($_POST)){
            $index = model('Order');
            $res = $index->wsx_edit();
            return $res;
          }
    }
}