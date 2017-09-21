<?php
/**
 * @Author: anchen
 * @Date:   2017-05-04 09:15:10
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-09-19 17:04:10
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
        if(empty($_SESSION['id'])){
            $this->redirect("Login/login");
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
                $len="_";
                $len = strrpos($action,$len);
                if(!empty($len)){
                    $actions = substr($action,0,$len)."_list";
                }else{
                    $actions = "lists";
                }
                $lw_where['role_id'] = $_SESSION['role_id'];
                $lw_where['auth_c'] = $contro;
                $lw_where['auth_a'] = $actions;
                $lw_where['action_type'] = 4;
                $lw_auth = DB::name("role_value")->where($lw_where)->field("COUNT(*)")->find();
                //echo DB::name("role_value")->getlastsql();
                //exit;
                if($lw_auth['COUNT(*)'] == 0){
                     /*如果有某些方法不符合规则 则在这里添加控制器加方法*/
                      $pdarray = array("Cuscontractgarden_add","Cuscontractcompany_add","Cuscontractdetailed_add","Adminadmin_role_add","Adminadmin_role_edit","Adminadmin_role_del","Enterprisecompany_list","Enterprisestaff_list,Cuscontractwaterhistory_list","Cuscontractwaterhistory_list","Cuscontractwaterhistory_add","Cuscontractwaterhistory_edit","Enterprisegarden_selectinfo","Financeexpenditure_selectinfo");
                      $con_act = $contro.$action;
                      //echo $con_act;
                      if(!in_array($con_act,$pdarray)){
                                echo "<script>alert('你无权操作该操作');</script>";
                                exit;
                        }
                }
                unset($lw_where['action_type']);
                $lw_auth = DB::name("role_value")->where($lw_where)->field("action_type")->select();
                //echo DB::name("role_value")->getlastsql();
                //exit;
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
                       if($lw_auth[$k]['action_type'] == 6){
                          $lw_role['excelin'] = 1;//删除权限
                       }
                       if($lw_auth[$k]['action_type'] == 7){
                          $lw_role['excelout'] = 1;//删除权限
                       }
                    }
                }else{
                     $pdarray = array("Cuscontractgarden_add","Cuscontractcompany_add","Cuscontractdetailed_add","Adminadmin_role_add","Adminadmin_role_edit","Adminadmin_role_del","Enterprisecompany_list","Enterprisestaff_list,Cuscontractwaterhistory_list","Cuscontractwaterhistory_list","Cuscontractwaterhistory_add","Cuscontractwaterhistory_edit","Enterprisegarden_selectinfo","Financeexpenditure_selectinfo");
                      $con_act = $contro.$action;
                    if(!in_array($con_act,$pdarray)){
                         /*没有权限  需重新登录*/
                       echo "<script>alert('你无权操作该操作');</script>";
                       exit;
                    }
                }
            }
          }else{
            /*超级管理员拥有所有权限*/
            $lw_role['add'] = 1;
            $lw_role['edit'] = 1;
            $lw_role['del'] = 1;
            $lw_role['find'] = 1;
            $lw_role['status'] = 1;
            $lw_role['excelin'] = 1;
            $lw_role['excelout'] = 1;
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