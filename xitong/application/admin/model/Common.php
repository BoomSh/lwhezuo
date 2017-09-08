<?php
/**
 * @Author: anchen
 * @Date:   2017-05-03 10:15:05
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-07-08 10:05:13
 */
namespace app\admin\model;
use \think;
use \think\Model;
use \think\Db;
use \think\Exception;
class Common extends Model{
     public function __construct(){
        parent::__construct();
        //session_start();
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
    /**
 * 分页样式
 *
 * @access  private
 * @param   integer  $num     总页数
 * @param   integer  $page      当前页
 * @param   integer  $url         当前的链接
 */
   
  public function pages($num,$page,$url){
    $row="";
    $b="?";     //判断是否是多条件件判断
    $now_url="page=";
    file_put_contents("aa.txt",$url);
    if(strstr($url,$b)){
        if(strstr($url,$now_url)){
            $tmp = stripos($url, $now_url);
            $plase=substr($url,0,$tmp);
        }else{
            $plase=$url."&";
        }
    }else{
        $plase=$url."?";
    }
    $pd=$num-$page;//判断所在页数是否靠近末尾
    if($num>10){
        if($page<=5){
            for($i=1;$i<=10;$i++){
                if($page==$i){
                    $row.="<a href='".$plase."page=".$i."' target='navTab'><span class='page_now'>".$i."</span></a>";
                }else{
                    if($i==10){
                        $row.="<span class='page_num'>···</span><a href='".$plase."page=".$num."' target='navTab'><span class='page_num'>".$num."</span></a>";
                    }else{
                        $row.="<a href='".$plase."page=".$i."' target='navTab'><span class='page_num'>".$i."</span></a>";
                    }
                }
            }
            
    }else if($page==6){
         for($i=1;$i<=11;$i++){
            if($i==6){
                    $row.="<a href='".$plase."page=".$i."' target='navTab'><span class='page_now'>".$i."</span></a>";
                }else{
                    if($i==11){
                        $row.="<span class='page_num'>···</span><a href='".$plase."page=".$num."' target='navTab'><span class='page_num'>".$num."</span></a>";
                    }else{
                        $row.="<a href='".$plase."page=".$i."' target='navTab'><span class='page_num'>".$i."</span></a>";
                    }
                }
         }
    }else{
        if($pd<=4){
            for($i=1;$i<=10;$i++){
                if($i==1){
                    $row.="<a href='".$plase."page=1' target='navTab'><span class='page_num'>1</span></a><span class='page_num'>···</span>";
                }else{
                    $j=$num-10+$i;
                    if($page==$j){
                    $row.="<a href='".$plase."page=".$j."' target='navTab'><span class='page_now'>".$j."</span></a>";
                    }else{
                    $row.="<a href='".$plase."page=".$j."' target='navTab'><span class='page_num'>".$j."</span></a>";
                    }
                }
            }
        }else{
             for($i=1;$i<=10;$i++){
                if($i==1){
                    $row.="<a href='".$plase."page=1' target='navTab'><span class='page_num'>1</span></a><span class='page_num'>···</span>";
                }else if($i==10){
                    $row.="<span class='page_num'>···</span><a href='".$plase."page=".$num."' target='navTab'><span class='page_num'>".$num."</span></a>";
                }else{
                    $j=$page-6+$i;
                    if($j==$page){
                         $row.="<a href='".$plase."page=".$j."' target='navTab'><span class='page_now'>".$j."</span></a>";
                     }else{
                        $row.="<a href='".$plase."page=".$j."' target='navTab'><span class='page_num'>".$j."</span></a>";
                     }
                }
             }
        }
    }
    }else{
        for($i=1;$i<$num+1;$i++){
            if($page==$i){
                    $row.="<a href='".$plase."page=".$i."' target='navTab'><span class='page_now'>".$i."</span></a>";
                }else{
                    $row.="<a href='".$plase."page=".$i."' target='navTab'><span class='page_num'>".$i."</span></a>";
                }
        }
    }
    return $row;
}
/**
 * *
 * @param  [type] $arr    [展示的字段（去掉主键）]
 * @param  [type] $finds  [板块id ]
 * @param  [type] $table  [数据表]
 * @param  [type] $zd_str [展示的字段 （第一个为主键）]
 * @param  [type] $page   [当前页数]
 * @param  [type] $check  [查询条件，没查询时带过来 1]
 * @return [type]     返回展示数组     
 */
public function zhanshi($arr,$finds,$table,$zd_str,$page,$check){
        $res['row'] =  Db::table($table)->field($zd_str)->where($check)->order('id desc')->limit(($page-1)*20,20)->select();
        $find['auth_id'] = $finds;
        $len = count($arr);
          for($i=0;$i<$len;$i++){
            $find['field'] = $arr[$i];
            $val = db("auth_name")->where($find)->field('type,val')->find();
            if($val['type'] == "radio"){
              $v_arr = explode(",",$val['val']);
              $v_len = count($v_arr);
              foreach($res['row'] as $k => $v){
                for($j=0;$j<$v_len;$j++){
                  $star = substr($v_arr[$j],stripos($v_arr[$j],"/")+1);
                  $last = substr($v_arr[$j],0,stripos($v_arr[$j],"/"));
                  if($res['row'][$k][$find['field']] == $star){
                    $res['row'][$k][$find['field']] = $last;
                  }
                }
              }
            }
            if($val['type'] == "select"){
              $v_arr = explode(",",$val['val']);
              $v_len = count($v_arr);
              foreach($res['row'] as $k => $v){
                for($j=0;$j<$v_len;$j++){
                  $star = substr($v_arr[$j],stripos($v_arr[$j],"/")+1);
                  $last = substr($v_arr[$j],0,stripos($v_arr[$j],"/"));
                  if($res['row'][$k][$find['field']] == $star){
                    $res['row'][$k][$find['field']] = $last;
                  }
                }
              }
            }
            if($val['type'] == "checkbox"){
              $v_arr = explode(",",$val['val']);
              $v_len = count($v_arr);
              foreach($res['row'] as $k => $v){
                $cb_arr = explode(",",$res['row'][$k][$find['field']]);
                $cb_len = count($cb_arr);
                $res['row'][$k][$find['field']] = '';
                for($j=0;$j<$cb_len;$j++){
                  for($h=0;$h<$v_len;$h++){
                    $star = substr($v_arr[$h],stripos($v_arr[$h],"/")+1);
                    $last = substr($v_arr[$h],0,stripos($v_arr[$h],"/"));
                    if($cb_arr[$j] == $star){
                      $res['row'][$k][$find['field']] .= $last.",";
                    }
                  }
                }
                $res['row'][$k][$find['field']] = substr($res['row'][$k][$find['field']],0,-1);
              }
            }
          }
          return $res['row'];
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
      /*
   编码规则   只满足 RC + 170612001  类似的规则
   prefix    前缀
   table     表（不带前缀）
   find      字段
   */
   public function rule($prefix,$table,$find){
        $y = date("Y",time());
        $m = date("m",time());
        $d = date("d",time());
        $str = $y.$m.$d;
        $where[$find] = array("like","%".$prefix.substr($str,2)."%");
        //获取符合规则 最大的序号
        $row = db($table)->where($where)->field($find)->order("id desc")->find();
        //序号加上1
        if($row){
            $last = substr($row[$find],-3)+1;
            if(strlen($last) == "1"){
                $last = "00".$last;
            }else if(strlen($last) == "2"){
                $last = "0".$last;
            }
            $res = substr($row[$find],0,-3).$last;
            return $res;
        }else{
            return $prefix.substr($str,2)."001";
        }
   }
     public function dwz_pages($num,$page,$url){
    $row="";
    $b="?";     //判断是否是多条件件判断
    $now_url="page=";
    file_put_contents("aa.txt",$url);
    if(strstr($url,$b)){
        if(strstr($url,$now_url)){
            $tmp = stripos($url, $now_url);
            $plase=substr($url,0,$tmp);
        }else{
            $plase=$url."&";
        }
    }else{
        $plase=$url."?";
    }
    $pd=$num-$page;//判断所在页数是否靠近末尾
    if($num>10){
        if($page<=5){
            for($i=1;$i<=10;$i++){
                if($page==$i){
                    $row.="<a href='javascript:;' class='goodslj'><span class='page_now'>".$i."</span></a>";
                }else{
                    if($i==10){
                        $row.="<span class='page_num'>···</span><a href='javascript:;' class='goodslj'><span class='page_num'>".$num."</span></a>";
                    }else{
                        $row.="<a href='javascript:;' class='goodslj'><span class='page_num'>".$i."</span></a>";
                    }
                }
            }
            
    }else if($page==6){
         for($i=1;$i<=11;$i++){
            if($i==6){
                    $row.="<a href='javascript:;' class='goodslj'><span class='page_now'>".$i."</span></a>";
                }else{
                    if($i==11){
                        $row.="<span class='page_num'>···</span><a href='javascript:;' class='goodslj'><span class='page_num'>".$num."</span></a>";
                    }else{
                        $row.="<a href='javascript:;' class='goodslj'><span class='page_num'>".$i."</span></a>";
                    }
                }
         }
    }else{
        if($pd<=4){
            for($i=1;$i<=10;$i++){
                if($i==1){
                    $row.="<a href='javascript:;' class='goodslj'><span class='page_num'>1</span></a><span class='page_num'>···</span>";
                }else{
                    $j=$num-10+$i;
                    if($page==$j){
                    $row.="<a href='javascript:;' class='goodslj'><span class='page_now'>".$j."</span></a>";
                    }else{
                    $row.="<a href='javascript:;' class='goodslj'><span class='page_num'>".$j."</span></a>";
                    }
                }
            }
        }else{
             for($i=1;$i<=10;$i++){
                if($i==1){
                    $row.="<a href='javascript:;' class='goodslj'><span class='page_num'>1</span></a><span class='page_num'>···</span>";
                }else if($i==10){
                    $row.="<span class='page_num'>···</span><a href='javascript:;' class='goodslj'><span class='page_num'>".$num."</span></a>";
                }else{
                    $j=$page-6+$i;
                    if($j==$page){
                         $row.="<a href='javascript:;' class='goodslj'><span class='page_now'>".$j."</span></a>";
                     }else{
                        $row.="<a href='javascript:;' class='goodslj'><span class='page_num'>".$j."</span></a>";
                     }
                }
             }
        }
    }
    }else{
        for($i=1;$i<$num+1;$i++){
            if($page==$i){
                    $row.="<a href='javascript:;' class='goodslj'><span class='page_now'>".$i."</span></a>";
                }else{
                    $row.="<a href='javascript:;' class='goodslj'><span class='page_num'>".$i."</span></a>";
                }
        }
    }
    return $row;
}
}