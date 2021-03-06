<?php
namespace app\admin\controller;
use think\File;
class Cuscontract extends Common
{
    /*
    **业主合同
     */
    public function cuscontract_list(){
        $Cus = model('Cuscontract');
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['c.time_effect'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['c.time_effect'] = array("gt",strtotime(input('startime')));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['c.time_effect'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['c.time_effect'] = array("lt",strtotime(input('overtime')));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("contract_num"))){
            $where['c.contract_num'] = array("like","%".input("contract_num")."%");
            $this->assign("contract_num",input("contract_num"));
        }
        $where['c.type'] = 2;
        $res = $Cus->cuscontract_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
     /**
     * 园区信息新增
     * @Author   wcl
     * @DateTime 2017-09-10T20:53:24+0800
     * @return   [type]                   [description]
     */
    public function garden_add(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            $row = $Cuscontract->garden_add();
            return $row;
        }else{
            return $this->fetch();
        }
    }
    /*
    ** 业主添加合同
     */
    public function cuscontract_add(){
        $cus = model("Cuscontract");
        if(request()->isPost()){
            $res = $cus->cuscontract_add();
            return $res;
        }else{
            $res = $cus->cuscontract_add();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
    /*
    **添加出租方/业主
     */
    public function detailed_add(){
        $cus = model("Cuscontract");
        if(request()->isPost()){
            $res = $cus->detailed_add();
            return $res;
        }else{
            $res = $cus->detailed_add();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
    /*
    **合同退组
    */
    public function cuscontract_status(){
        $cus = model("Cuscontract");
        if(request()->isPost()){
            $res = $cus->cuscontract_status();
            return $res;
        }else{
            return "请选择退租的合同";
        }
    }
    /*
    **修改合同
     */
    public function Cuscontract_edit(){
       $cus = model("Cuscontract");
        if(request()->isPost()){
            $res = $cus->Cuscontract_edit();
            return $res;
        }else if(request()->isGet()){
            $res = $cus->Cuscontract_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请选择修改的合同";
        }
    }

    /*
    **异步查询相关的内容
    **val 输入的值   type 类型 1为业主  2公司  3为 园区
    ** 返回 html
     */
    public function cuscontract_find(){
        $cus = model("Cuscontract");
        if(request()->isPost()){
                $res = $cus->cuscontract_find();
                return $res;
        }else{
            return "";
        }
    }


    /*
    **房源添加
     */
    public function house_add(){
        return 1;
    }
    /*
    **添加公司
     */
        public function company_add(){
            $Enterprise = model("Cuscontract");
            if(request()->isPost()){
                $row = $Enterprise->company_add();
                return $row;
            }else{
                /*获取银行信息*/
                $bank = $Enterprise->company_add();
                $this->assign("bank",$bank);
                return $this->fetch();
            }
        }
    /*
    **删除合同
     */
    public function cuscontract_del(){
        $Cuscontract = model("Cuscontract");
            if(request()->isPost()){
                $row = $Cuscontract->cuscontract_del();
                return $row;
            }else{
                return "请选择删除的合同";
            }
    }
    /*
    **水表管理
     */
    public function water_list(){
        $Cuscontract = model("Cuscontract");
        if(!empty(input('park_id'))){
            $where['w.park_id'] = input('park_id');
            $this->assign("park_id",input('park_id'));
        }
        if(!empty(input('name'))){
            $where['w.name'] = array("like","%".input('name')."%");
            $this->assign("name",input('name'));
        }
        $where['w.type'] = 1;
        $where['c.type'] = 2;
        $res = $Cuscontract->water_list($where);
        //var_dump($res);exit;
        $this->assign("res",$res);
        return $this->fetch();
    }
    /*水表编辑*/
    public function water_edit(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            //var_dump(input());exit;
            $res = $Cuscontract->water_edit();
            return $res;
        }else if(request()->isGet()){
            $res = $Cuscontract->water_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
    /*删除水表*/
    public function water_del(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            $res = $Cuscontract->water_del();
            return $res;
        }else{
            return "请选择删除的水表信息";
        }
    }
    /*抄表*/
    public function water_add(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            //var_dump(input());exit;
            $res = $Cuscontract->water_add();
            return $res;
        }else if(request()->isGet()){
            $res = $Cuscontract->water_add();
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请选择抄表的水表";
        }
    }
    /*抄表记录*/
    public function waterhistory_list(){
        $Cuscontract = model("Cuscontract");
        if(request()->isGet()){
            $where['c.water_id'] = input("id");
            if(!empty(input("startime"))){
                if(!empty(input("overtime"))){
                    $where['c.time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                    $this->assign("startime",input("startime"));
                    $this->assign("overtime",input("overtime"));
                }else{
                    $where['c.time'] = array("gt",strtotime(input('startime')));
                    $this->assign("startime",input("startime"));
                }
            }
            if(!empty(input("overtime"))){
                if(!empty(input("startime"))){
                    $where['c.time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                    $this->assign("startime",input("startime"));
                    $this->assign("overtime",input("overtime"));
                }else{
                    $where['c.time'] = array("lt",strtotime(input('overtime')));
                    $this->assign("overtime",input("overtime"));
                }
            }
            $this->assign("id",input("id"));
            $res = $Cuscontract->waterhistory_list($where);
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请选择水表";
        }
    }
    /*抄表修改*/
    public function waterhistory_edit(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            //var_dump(input());exit;
            $res = $Cuscontract->waterhistory_edit();
            return $res;
        }else if(request()->isGet()){
            $res = $Cuscontract->waterhistory_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请修改抄表的水表";
        }
    }
    /*水表导入*/
    public function water_excelin(){
        if(request()->isPost()){
            $Cuscontract = model("Cuscontract");
        //引入文件（把扩展文件放入vendor目录下，路径自行修改）
        vendor("Classes.PHPExcel");

        //获取表单上传文件
        $file = request()->file('excel');
        $info = $file->validate(['ext' => 'xlsx,xls'])->move(ROOT_PATH . 'public' . DS . 'upload' . DS . 'TaoBao');

        //数据为空返回错误
        if(empty($info)){
            $output['status'] = false;
            $output['message'] = '导入数据失败~';
            return $output['message'];
        }

        //获取文件名
        $exclePath = $info->getSaveName();
        //上传文件的地址
        $filename = ROOT_PATH . 'public' . DS . 'upload' . DS . 'TaoBao'. DS . $exclePath;

        //判断截取文件
        $extension = strtolower( pathinfo($filename, PATHINFO_EXTENSION) );

        //区分上传文件格式
        if($extension == 'xlsx') {
            $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
        }else if($extension == 'xls'){
            $objReader =\PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
        }

        $excel_array = $objPHPExcel->getsheet(0)->toArray();   //转换为数组格式
        array_shift($excel_array);  //删除第一个数组(标题);
        $len = count($excel_array);
        if(empty($excel_array[$len-1][0])){
            unset($excel_array[$len-1]);
        }
        $res = $Cuscontract->water_excelin($excel_array);
        if($res == "success"){
            $return['gg'] = "success";
            return json_encode($return);
        }else{
            return json_encode($res);
        }
        }else{
            $Cuscontract = model("Cuscontract");
            $res = $Cuscontract->waterhistory_add();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
    /*导出相对应的水表模板*/
    public function water_excelout(){
        $Cuscontract = model("Cuscontract");
       if(request()->isGet()){
            $filename = "水表模板";
            $title = array("序号","园区","水表名","上期度数","当前度数","时间(请设置单元格式为 yyyy-mm)");
            $data = $Cuscontract->water_excelout();
            $this->goodsExcelExport($data,$title,$filename);
       }
    }
    /*导入*/
    public function water_excelins(){
        $Cuscontract = model("Cuscontract");
        //引入文件（把扩展文件放入vendor目录下，路径自行修改）
        vendor("Classes.PHPExcel");

        //获取表单上传文件
        $file = request()->file('excel');
        $info = $file->validate(['ext' => 'xlsx,xls'])->move(ROOT_PATH . 'public' . DS . 'upload' . DS . 'TaoBao');

        //数据为空返回错误
        if(empty($info)){
            $output['status'] = false;
            $output['message'] = '导入数据失败~';
            return $output['message'];
        }

        //获取文件名
        $exclePath = $info->getSaveName();
        //上传文件的地址
        $filename = ROOT_PATH . 'public' . DS . 'upload' . DS . 'TaoBao'. DS . $exclePath;

        //判断截取文件
        $extension = strtolower( pathinfo($filename, PATHINFO_EXTENSION) );

        //区分上传文件格式
        if($extension == 'xlsx') {
            $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
        }else if($extension == 'xls'){
            $objReader =\PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
        }

        $excel_array = $objPHPExcel->getsheet(0)->toArray();   //转换为数组格式
        array_shift($excel_array);  //删除第一个数组(标题);
        $len = count($excel_array);
        if(empty($excel_array[$len-1][0])){
            unset($excel_array[$len-1]);
        }
        $res = $Cuscontract->water_excelin($excel_array);
        if($res == "success"){
            $return['gg'] = "success";
            return json_encode($return);
        }else{
            return json_encode($res);
        }
    }
    //导入返回信息
    public function water_excelinmg(){
            $filename = "水表模板";
            $title = array("序号","园区","水表名","上期度数","当前度数","时间","详情");
            $data = json_decode(input("data"),true);
            $this->goodsExcelExport($data,$title,$filename);
    }
    /*
    **水表管理
     */
    public function electric_list(){
        $Cuscontract = model("Cuscontract");
        if(!empty(input('park_id'))){
            $where['w.park_id'] = input('park_id');
            $this->assign("park_id",input('park_id'));
        }
        if(!empty(input('name'))){
            $where['w.name'] = array("like","%".input('name')."%");
            $this->assign("name",input('name'));
        }
        $where['w.type'] = 1;
        $where['c.type'] = 2;
        $res = $Cuscontract->electric_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /*水表编辑*/
    public function electric_edit(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            //var_dump(input());exit;
            $res = $Cuscontract->electric_edit();
            return $res;
        }else if(request()->isGet()){
            $res = $Cuscontract->electric_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }
    }
    /*删除水表*/
    public function electric_del(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            $res = $Cuscontract->electric_del();
            return $res;
        }else{
            return "请选择删除的电表信息";
        }
    }
    /*抄表*/
    public function electric_add(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            //var_dump(input());exit;
            $res = $Cuscontract->electric_add();
            return $res;
        }else if(request()->isGet()){
            $res = $Cuscontract->electric_add();
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请选择抄表的水表";
        }
    }
    /*抄表记录*/
    public function electrichistory_list(){
        $Cuscontract = model("Cuscontract");
        if(request()->isGet()){
            $where['c.electric_id'] = input("id");
            if(!empty(input("startime"))){
                if(!empty(input("overtime"))){
                    $where['c.time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                    $this->assign("startime",input("startime"));
                    $this->assign("overtime",input("overtime"));
                }else{
                    $where['c.time'] = array("gt",strtotime(input('startime')));
                    $this->assign("startime",input("startime"));
                }
            }
            if(!empty(input("overtime"))){
                if(!empty(input("startime"))){
                    $where['c.time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                    $this->assign("startime",input("startime"));
                    $this->assign("overtime",input("overtime"));
                }else{
                    $where['c.time'] = array("lt",strtotime(input('overtime')));
                    $this->assign("overtime",input("overtime"));
                }
            }
            $this->assign("id",input("id"));
            $res = $Cuscontract->electrichistory_list($where);
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请选择水表";
        }
    }
     /*抄表修改*/
    public function electrichistory_edit(){
        $Cuscontract = model("Cuscontract");
        if(request()->isPost()){
            //var_dump(input());exit;
            $res = $Cuscontract->electrichistory_edit();
            return $res;
        }else if(request()->isGet()){
            $res = $Cuscontract->electrichistory_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else{
            return "请修改抄表的电表";
        }
    }

    /*水表导入*/
    public function electric_excelin(){
       if(request()->isPost()){
            $Cuscontract = model("Cuscontract");
            //引入文件（把扩展文件放入vendor目录下，路径自行修改）
            vendor("Classes.PHPExcel");

            //获取表单上传文件
            $file = request()->file('excel');
            $info = $file->validate(['ext' => 'xlsx,xls'])->move(ROOT_PATH . 'public' . DS . 'upload' . DS . 'TaoBao');

            //数据为空返回错误
            if(empty($info)){
                $output['status'] = false;
                $output['message'] = '导入数据失败~';
                return $output['message'];
            }

            //获取文件名
            $exclePath = $info->getSaveName();
            //上传文件的地址
            $filename = ROOT_PATH . 'public' . DS . 'upload' . DS . 'TaoBao'. DS . $exclePath;

            //判断截取文件
            $extension = strtolower( pathinfo($filename, PATHINFO_EXTENSION) );

            //区分上传文件格式
            if($extension == 'xlsx') {
                $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
                $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
            }else if($extension == 'xls'){
                $objReader =\PHPExcel_IOFactory::createReader('Excel5');
                $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
            }

            $excel_array = $objPHPExcel->getsheet(0)->toArray();   //转换为数组格式
            array_shift($excel_array);  //删除第一个数组(标题);
            $len = count($excel_array);
            if(empty($excel_array[$len-1][0])){
                unset($excel_array[$len-1]);
            }
            $res = $Cuscontract->electric_excelin($excel_array);
            if($res == "success"){
                $return['gg'] = "success";
                return json_encode($return);
            }else{
                return json_encode($res);
            }
       }else{
             $Cuscontract = model("Cuscontract");
            $res = $Cuscontract->electrichistory_add();
            $this->assign("res",$res);
            return $this->fetch();
       }
    }
    /*导出相对应的水表模板*/
    public function electric_excelout(){
        $Cuscontract = model("Cuscontract");
       if(request()->isGet()){
            $filename = "电表模板";
            $title = array("序号","园区","电表名","上期度数","当前度数","时间时间(请设置单元格式为 yyyy-mm)");
            $data = $Cuscontract->electric_excelout();
            $this->goodsExcelExport($data,$title,$filename);
       }
    }
    /*导入*/
    public function electric_excelins(){
        $Cuscontract = model("Cuscontract");
        //引入文件（把扩展文件放入vendor目录下，路径自行修改）
        vendor("Classes.PHPExcel");

        //获取表单上传文件
        $file = request()->file('excel');
        $info = $file->validate(['ext' => 'xlsx,xls'])->move(ROOT_PATH . 'public' . DS . 'upload' . DS . 'TaoBao');

        //数据为空返回错误
        if(empty($info)){
            $output['status'] = false;
            $output['message'] = '导入数据失败~';
            return $output['message'];
        }

        //获取文件名
        $exclePath = $info->getSaveName();
        //上传文件的地址
        $filename = ROOT_PATH . 'public' . DS . 'upload' . DS . 'TaoBao'. DS . $exclePath;

        //判断截取文件
        $extension = strtolower( pathinfo($filename, PATHINFO_EXTENSION) );

        //区分上传文件格式
        if($extension == 'xlsx') {
            $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
        }else if($extension == 'xls'){
            $objReader =\PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($filename, $encode = 'utf-8');
        }

        $excel_array = $objPHPExcel->getsheet(0)->toArray();   //转换为数组格式
        array_shift($excel_array);  //删除第一个数组(标题);
        $len = count($excel_array);
        if(empty($excel_array[$len-1][0])){
            unset($excel_array[$len-1]);
        }
        $res = $Cuscontract->electric_excelin($excel_array);
        if($res == "success"){
            $return['gg'] = "success";
            return json_encode($return);
        }else{
            return json_encode($res);
        }
    }
    //导入返回信息
    public function electric_excelinmg(){
            $filename = "水表模板";
            $title = array("序号","园区","电表名","上期度数","当前度数","时间","详情");
            $data = json_decode(input("data"),true);
            $this->goodsExcelExport($data,$title,$filename);
    }
    /*业主费用*/
    public function cost_list(){
        $Cuscontract = model("Cuscontract");
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['f.time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['f.time'] = array("gt",strtotime(input('startime')));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['f.time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['f.time'] = array("lt",strtotime(input('overtime')));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input('park'))){
            $where['f.park_id'] = input('park');
            $this->assign("park",input('park'));
        }
        if(!empty(input('status'))){
            if(input('status') == 1){
                $where['f.status'] = array("neq",2);
            }
            if(input('status') == 2){
                $where['f.status'] = 2;
            }
            $this->assign("status",input('status'));
        }
        if(!empty(input('name'))){
            $where['c.name'] = array("like","%".input('name')."%");
            $this->assign("name",input('name'));
        }
        $where['f.type'] = 2;
        $res = $Cuscontract->cost_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /*
    **费用添加
     */
    public function cost_add(){
        $Cuscontract = model("Cuscontract");
        if(request()->isGet()){
            $this->assign("id",input('id'));
            return $this->fetch();
        }else if(request()->isPost()){
            $res = $Cuscontract->cost_add();
            return $res;
        }else{
            return "请选择添加费用的费用单";
        }
    }
    /*详情*/
    public function costfees_list(){
        $Cuscontract = model("Cuscontract");
        $res = $Cuscontract->costfees_list();
        $this->assign("res",$res);
        var_dump($res);exit;
        return $this->fetch();
    }
}