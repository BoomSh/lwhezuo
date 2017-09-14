<?php
namespace app\admin\model;

use think\Model;
use think\DB;
class Finance extends Common
{
    /**
     * 收入列表
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_list(){
        return $this->fetch();
    }
    /**
     * 新增收入
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_add(){
        return $this->fetch();
    }
    /**
     * 修改收入
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_edit(){
        return $this->fetch();
    }
    /**
     * 删除收入
     * @Author   wcl
     * @DateTime 2017-09-14T20:16:26+0800
     * @return   [type]                   [description]
     */
    public function income_del(){
        return $this->fetch();
    }
    /**
     * 支出列表
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_list(){
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
            $row = $Finance->company_add();
            return $row;
        }else{
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

    }
    /**
     * 删除支出
     * @Author   wcl
     * @DateTime 2017-09-14T20:20:34+0800
     * @return   [type]                   [description]
     */
    public function expenditure_del(){

    }
}