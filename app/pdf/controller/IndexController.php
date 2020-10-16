<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2019 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小夏 < 449134904@qq.com>
// +----------------------------------------------------------------------
namespace app\pdf\controller;

use cmf\controller\AdminBaseController;
use think\Db;

class IndexController extends AdminBaseController
{
    public function index(){
        $all=Db::name('tasks')->where('del',0)->order('tid','desc')->paginate(20);
        $this->assign('all',$all);
        return $this->fetch(':index');
    }
    public function ori($tid){
        $naew=Db::name('files')->where('tid',(int)$tid)->select();
        if($naew->isEmpty()){
            $this->error("无该数据");
        }else{
            $this->assign('info',$naew);
            return $this->fetch(":info");
        }

    }
    public function del($tid){
        $naew=Db::name('files')->where('tid',(int)$tid)->select();
        if($naew->isEmpty()){
            $this->error("无该数据");
        }else{
            Db::name('tasks')->where('tid',(int)$tid)->update(['del'=>time()]);
            $this->success("删除成功");
        }

    }
    public function setting(){
        $info=Db::name('pdf_set')->where('id',1)->find();
        $this->assign('info',$info);
        return $this->fetch(":set");
    }
    public function update_setting(){
        $up['xh']=input('get.xh/d');
        $up['ip']=input('get.ip/d');
        $up['user']=input('get.user/d');
        $info=Db::name('pdf_set')->where('id',1)->update($up);
        $this->success("设置成功");
    }
}
