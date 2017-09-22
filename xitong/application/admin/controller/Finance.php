<?php
namespace app\admin\controller;

class Finance extends Common
{
    /**
     * 收入列表
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_list(){
        $Finance = model("Finance");
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['pay_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['pay_time'] = array("gt",strtotime(input('startime')));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['pay_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['pay_time'] = array("lt",strtotime(input('overtime')));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("customer_type"))){
            $where['customer_type'] = input("customer_type");
            $this->assign("customer_type",input("customer_type"));
        }
        if(!empty(input("park_id"))){
            $where['park_id'] = input("park_id");
            $this->assign("park_id",input("park_id"));
        }
        if(!empty(input("pay_type"))){
            $where['pay_type'] = input("pay_type");
            $this->assign("pay_type",input("pay_type"));
        }

        $where['type'] = 1;
        /*获取 符合条件的 管理员信息*/
        $res = $Finance->income_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /**
     * 新增收入
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_add(){
        $Finance = model("Finance");
        if(request()->isPost()){
            $row = $Finance->income_add();
            return $row;
        }else{
             /*获取下拉信息*/
            $res = $Finance->income_add();
            $this->assign('res',$res);
            return $this->fetch();
        }
    }
    /**
     * 修改收入
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_edit(){
       $Finance = model("Finance");
        if(request()->isGet()){
            /*获取支出信息*/
            $res = $Finance->income_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else if(request()->isPost()){
            $row = $Finance->income_edit();
            return $row;
        }else{
            return "请选择修改的信息";
        }
    }
    /**
     * 导入页面
     * @return [type] [description]
     */
    public function income_excelin(){
        return $this->fetch();
    }
    /**
     * 下载收入导入模板
     * @return [type] [description]
     */
    public function income_mb(){
        if(request()->isGet()){
            $filename = "收入模板";
            $title = array("序号","园区","付款人","手机","收款人","手机","金额","支付方式","费用类型");
            $data[0]['A']  = "1";
            $data[0]['B']  = "高新园";
            $data[0]['C']  = "张三";
            $data[0]['D']  = "13538269520";
            $data[0]['E']  = "张三";
            $data[0]['F']  = "13538269520";
            $data[0]['G']  = "1000";
            $data[0]['H']  = "现金";
            $data[0]['I']  = "物业管理费";
            $this->goodsExcelExport($data,$title,$filename);
        }
    }
    /**
     * 导入收入数据
     * @return [type] [description]
     */
    public function income_lead(){
        $Finance = model("Finance");
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
        array_shift($excel_array);
        $res = $Finance->income_lead($excel_array);
        if($res == "success"){
            $return['gg'] = "success";
            return json_encode($return);
        }else{
            return json_encode($res);
        }
    }
    //导入返回信息
    public function income_excelinmg(){
            $filename = "错误信息";
            $title = array("序号","园区","付款人","手机","收款人","手机","金额","支付方式","费用类型","详情");
            $data = json_decode(input("data"),true);
            $this->goodsExcelExport($data,$title,$filename);
    }
    /**
     * 支出列表
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_list(){
        $Finance = model("Finance");
        if(!empty(input("startime"))){
            if(!empty(input("overtime"))){
                $where['pay_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['pay_time'] = array("gt",strtotime(input('startime')));
                $this->assign("startime",input("startime"));
            }
        }
        if(!empty(input("overtime"))){
            if(!empty(input("startime"))){
                $where['pay_time'] = array("between",array(strtotime(input('startime')),strtotime(input('overtime'))));
                $this->assign("startime",input("startime"));
                $this->assign("overtime",input("overtime"));
            }else{
                $where['pay_time'] = array("lt",strtotime(input('overtime')));
                $this->assign("overtime",input("overtime"));
            }
        }
        if(!empty(input("customer_type"))){
            $where['customer_type'] = input("customer_type");
            $this->assign("customer_type",input("customer_type"));
        }
        if(!empty(input("park_id"))){
            $where['park_id'] = input("park_id");
            $this->assign("park_id",input("park_id"));
        }
        if(!empty(input("pay_type"))){
            $where['pay_type'] = input("pay_type");
            $this->assign("pay_type",input("pay_type"));
        }

        $where['type'] = 2;
        /*获取 符合条件的 管理员信息*/
        $res = $Finance->expenditure_list($where);
        $this->assign("res",$res);
        return $this->fetch();
    }
    /**
     * 新增支出
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_add(){
        $Finance = model("Finance");
        if(request()->isPost()){
            $row = $Finance->expenditure_add();
            return $row;
        }else{
             /*获取下拉信息*/
            $res = $Finance->expenditure_add();
            $this->assign('res',$res);
            return $this->fetch();
        }
    }
    /**
     * 修改支出
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_edit(){
        $Finance = model("Finance");
        if(request()->isGet()){
            /*获取支出信息*/
            $res = $Finance->expenditure_edit();
            $this->assign("res",$res);
            return $this->fetch();
        }else if(request()->isPost()){
            $row = $Finance->expenditure_edit();
            return $row;
        }else{
            return "请选择修改的信息";
        }
    }
    /**
     * 模糊搜索
     * @return [type] [description]
     */
    public function expenditure_selectinfo(){
        $Finance = model("Finance");
        if(request()->isAjax()){
            $res = $Finance-> expenditure_selectinfo();
            return $res;   
        }
    }
}  
