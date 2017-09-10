<?php
/**
 * @Author: anchen
 * @Date:   2017-05-04 09:15:10
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-09-07 16:05:35
 */
namespace app\admin\controller;
use \think;
use think\Controller;
use \think\Db;
use \think\Exception;
class Common extends Controller
{
    public function __construct(){
        parent::__construct();
        //*开启session*//
        session_start(); 
        $cookie = cookie('id');
        if(empty($_SESSION['id']) && empty($cookie)){
            $this->redirect("Login/login");
        }
        /*存在cookie时  客户直接输入非登录页面时 需重新保存 session 和更新登录次数 */
        if($cookie && empty($_SESSION['id'])){
           $cookwhere['id'] = $cookie;
           $cookwhere['state'] = 1;
            $cook_dl = DB::name("admin")->where($cookwhere)->field("id,loginsum,name,role_id,new_ip,new_time,state")->find();
            if($cook_dl){
                    if($cook_dl['state'] == 2){
                        return "该管理员已被停用";
                    }
                    $_SESSION['id'] = $cook_dl['id'];
                    $_SESSION['role_id'] = $cook_dl['role_id'];
                    $_SESSION['name'] = $cook_dl['name'];
                    /*添加登录次数*/
                    $data['loginsum'] = $cook_dl['loginsum'] + 1;
                    $data['id'] = $cook_dl['id'];
                    $data['last_time'] = $res['new_time'];
                    $data['last_ip'] = $res['new_ip'];
                    $data['new_time'] = date("Y-m-d H:i:s",time());
                    $data['new_ip'] = $_SERVER["REMOTE_ADDR"];
                    DB::name("admin")->update($data);
                    $this->lw_log("1","登录成功","login",'login');
            }else{
                /*cookie 不存在  则对应的管理员被删除  需重新登录*/
                $this->redirect("Login/out");
            }
        }
        if($_SESSION['role_id'] != 0){
            $request = \think\Request::instance();
            //获取当前控制器
            $contro = $request->controller();
            //获取所在的方法
            $action = $request->action();
            if($contro=="Index" && $action == "index"){
               /*目前首页 只要是登录的都能看见*/
            }else if($contro=="Index" && $action == "welcome"){
                /*目前欢迎页 只要是登录的都能看见*/
            }else{
                $lw_where['role_id'] = $_SESSION['role_id'];
                $lw_where['auth_c'] = $contro;
                $lw_where['auth_a'] = $action;
                $lw_auth = DB::name("role_value")->where($lw_where)->field("action_type")->select();
               if($lw_auth){
                        //用于判断用户是否拥有某个权限
                    foreach ($lw_auth as $k => $v) {
                       if($lw_auth[$k]['action_type'] == 1){
                          $lw_role['add'] = 1;//添加权限
                       }
                       if($lw_auth[$k]['action_type'] == 2){
                          $lw_role['edit'] = 1;//修改权限
                       }
                       if($lw_auth[$k]['action_type'] == 3){
                          $lw_role['del'] = 1;//删除权限
                       }
                       if($lw_auth[$k]['action_type'] == 4){
                          $lw_role['find'] = 1;//查询权限
                       }
                       if($lw_auth[$k]['action_type'] == 5){
                          $lw_role['status'] = 1;//审查权限
                       }
                    }
                }else{
                    echo "<script>alert('你无权操作该操作');</script>";
                    /*没有权限  则对应的管理员被删除  需重新登录*/
                    $this->redirect("Login/out");
                }
            }
          }else{
            /*超级管理员拥有所有权限*/
            $lw_role['add'] = 1;
            $lw_role['edit'] = 1;
            $lw_role['del'] = 1;
            $lw_role['find'] = 1;
            $lw_role['status'] = 1;
          }
          $this->assign("lw_role",$lw_role);
    }
    /*保存增删改查 权限*/
    public function keepauth(){
        $list = array('1',"2");
        return $list;
    }
    
     /**
     * 操作日志
     * @access protected
     * @param  string  $order   操作类型  1 登录 2添加  3 删除 4 改
     * @param  string $fluff       操作内容
     * @param  string $auth_c       操作控制器
     * @param  string $auth_a     展示页面的方法
     */
     public function lw_log($order='',$fluff='',$auth_c='',$auth_a=''){
            $data['user_id'] = $_SESSION['id'];
            $data['user_name'] = $_SESSION['name'];
            $where['auth_c'] = $auth_c;
            $where['auth_a'] = $auth_a;
            $find = DB::name("auth")->where($where)->field("id")->find();
            $data['menu_id'] = $find['id'];
            $data['create_time'] = date("Y-m-d H:i:s",time());
            $data['result'] = $order;
            $data['remarks'] = $fluff;
            $data['user_ip'] = $_SERVER["REMOTE_ADDR"];
            $log = DB::name("log")->insert($data);
            if($log){
                return "success";
            }else{
                return "error";
            }
     }
    /*
     order          执行的任务
     fluff          报错的信息
     warm_level     错误级别  0为正常  1为 初级报错   2 为中等报错  3 为最高级报错
    */
    public function log($order='',$fluff='',$warm_level=0){
        $data['admin_id'] = $_SESSION['id'];
        $data['fluff'] = $fluff;
        $data['order'] = $order;
        $data['warm_level'] = $warm_level;
        $data['creat_time'] = date("Y-m-d H:i:s",time());
           try {
               DB::name('admin_log')->insert($data);
                throw new Exception("数据操作出错，请联系管理员");
            } catch(Exception $e) {
                  return $e->getMessage();
            }
    }
   //下载模板
  public function download_files($file){
        $length = filesize($file);
        $showname =  ltrim(strrchr($file,'/'),'/');
        header("Content-Description: File Transfer");
        header('Content-type:  application/vnd.ms-excel');
        header('Content-Length:' . $length);
         if (preg_match('/MSIE/', $_SERVER['HTTP_USER_AGENT'])) { //for IE
             header('Content-Disposition: attachment; filename="' . $file . '"');
         } else {
             header('Content-Disposition: attachment; filename="' . $file . '"');
         }
         readfile($file);
 }
   /*导出*/
public function goodsExcelExport($data='',$title='',$Header=''){
        import("Util.PHPExcel");
        import("Util.PHPExcel.Writer.Excel5");
        import("Util.PHPExcel.IOFactory.php");
  if(request()->isGet()){
    $data = $data;
    $excelName = $Header;
    $Header = $title;
  }else{
     $data = array();
     $excelName = '';
     $Header = array();
  }
     //$goodsModel = new GoodsModel();
     $this->exportexcel($excelName,$Header,$data);
}

public static function exportexcel($fileName,$headArr,$data){
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
            header("Content-Disposition: attachment;filename=\"$fileName\"");
            header('Cache-Control: max-age=0');

            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
}
}