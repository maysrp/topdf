<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Released under the MIT License.
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------

namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use think\Db;

class PdfController extends HomeBaseController
{
    public function index()
    {
        return $this->fetch(':pdfupload');
    }

    // public function ws()
    // {
    //     return $this->fetch(':ws');
    // }
	// public function pdfupload(){
	// 	return $this->fetch(':pdfupload');
    // }
    public function wordupload(){
		return $this->fetch(':wordupload');
    }
    public function excelupload(){
		return $this->fetch(':excelupload');
    }
    public function pptupload(){
		return $this->fetch(':pptupload');
    }
    public function txtupload(){
		return $this->fetch(':txtupload');
    }
    // public function uploadpdf(){
    //     $file = request()->file('file');
    //     $info=$file->validate(['size'=>10210241024,'ext'=>'pdf'])->move("upload");
    //     if($info){
    //         $vif=$file->getInfo();
    //         $ins['ip']=get_client_ip();
    //         $ins['time']=time();
    //         $ins['uid']=0;
    //         $ins['task_type']=0;
    //         $ins['size']=$vif['size'];
    //         $ins['yz']=input('post.yz/d');
    //         $id=Db::name('tasks')->insertGetId($ins);
    //         $one['tid']=$id;
    //         $one['name']=$vif['name'];
    //         $one['file_ext']=$info->getExtension(); 
    //         $one['file_type']='pdf';
    //         $one['file_url']=$info->getSaveName();
    //         $one['size']=$info->getSize();
    //         Db::name('files')->insert($one);
    //         // $tid
    //         $this->success('上传成功',url('pdf/download',['tid'=>$id]));
    //     }else{
    //         $this->error($file->getError());
    //     }
    // }
    // public function uploadpdfhb(){
    //     $file = request()->file('file');
    //     $files = request()->file('files');
    //     if($file&&$files){
    //         $vif=$file->getInfo();
    //         $size=0;
    //         foreach($files as $onex){
    //             $vifo=$onex->getInfo();
    //             if(stristr($vifo['name'],'pdf')&&$vifo['size']<5010241024){
    //                 $size=$size+$vifo['size'];
    //             }
    //         }
    //         if($size>0&&$size<10010241024){
    //             $info=$file->validate(['size'=>1210241024,'ext'=>'pdf'])->move("upload");
    //             if($info){
    //                 $ins['ip']=get_client_ip();
    //                 $ins['time']=time();
    //                 $ins['uid']=0;
    //                 $ins['task_type']=1;
    //                 $ins['size']=$vif['size']+$size;
    //                 $id=Db::name('tasks')->insertGetId($ins);
    //                 $one['tid']=$id;
    //                 $one['name']=$vif['name'];
    //                 $one['file_ext']=$info->getExtension(); 
    //                 $one['file_type']='pdf';
    //                 $one['file_url']=$info->getSaveName();
    //                 $one['size']=$info->getSize();
    //                 Db::name('files')->insert($one);
    //                 foreach ($files as $onefile) { 
    //                     $vif=$onefile->getInfo();
    //                     $info=$onefile->validate(['size'=>10210241024,'ext'=>'pdf'])->move("upload");
    //                     if($info){
    //                         $one['tid']=$id;
    //                         $one['name']=$vif['name'];
    //                         $one['file_ext']=$info->getExtension(); 
    //                         $one['file_type']='pdf';
    //                         $one['file_url']=$info->getSaveName();
    //                         $one['size']=$info->getSize();
    //                         Db::name('files')->insert($one);
    //                     }
    //                 }
    //                 $this->redirect('Index/download',['tid'=>$id]);
                    
    //             }else{
    //                 $this->error($file->getError());
    //             }

    //         }
    //     }else{
    //         $this->error("请上传至少两个文件！");
    //     }
    // }
    // public function uploadpdf2img(){
    //     $file = request()->file('file');
    //     $info=$file->validate(['size'=>10210241024,'ext'=>'pdf'])->move("upload");
    //     if($info){
    //         $vif=$file->getInfo();
    //         $ins['ip']=get_client_ip();
    //         $ins['time']=time();
    //         $ins['uid']=0;
    //         $ins['task_type']=3;
    //         $ins['size']=$vif['size'];
    //         $id=Db::name('tasks')->insertGetId($ins);
    //         $one['tid']=$id;
    //         $one['name']=$vif['name'];
    //         $one['file_ext']=$info->getExtension(); 
    //         $one['file_type']='pdf';
    //         $one['file_url']=$info->getSaveName();
    //         $one['size']=$info->getSize();
    //         Db::name('files')->insert($one);
    //         $this->success('上传成功',url('Index/download',['tid'=>$id]));
    //     }else{
    //         $this->error($file->getError());
    //     }
    // }
    // public function uploadimg2pdf(){
    //     $files = request()->file('file');
    //     $jk=FALSE;
    //     $size=0;
    //     foreach ($files as $file) {
    //         $vif=$file->getInfo();
    //         if(stristr($vif['type'],'image')&&$vif['size']<1010241024){
    //             $jk=TRUE;
    //             $size=$size+$vif['size'];
    //         }
    //     }
    //     if($jk&&$size<10010241024){
    //         $ins['ip']=get_client_ip();
    //         $ins['time']=time();
    //         $ins['uid']=0;
    //         $ins['task_type']=2;
    //         $ins['size']=$size;
    //         $id=Db::name('tasks')->insertGetId($ins);
    //         foreach ($files as $file) {                
    //             $vif=$file->getInfo();
    //             $info=$file->validate(['size'=>1210241024,'ext'=>'jpg,png,gif,jpeg'])->move("upload");
    //             if($info){
    //                 $one['tid']=$id;
    //                 $one['name']=$vif['name'];
    //                 $one['file_ext']=$info->getExtension(); 
    //                 $one['file_type']='image';
    //                 $one['file_url']=$info->getSaveName();
    //                 $one['size']=$info->getSize();
    //                 Db::name('files')->insert($one);
    //             }
    //         }
    //         $this->success('上传成功',url('Index/download',['tid'=>$id]));
    //     }else{
    //         $this->error("请上传图片文件且总文件小于100MB！");
    //     }
       
    // }
    public function download($tid){
        $incs=Db::name('tasks')->where('tid',$tid)->select()->toArray();
        if(!$incs){
            return $this->error("无该信息");
        }
        if(time()-$incs[0]['time']>600){
            return $this->error("无该信息");
        }
        $this->assign('id',$tid);
        return $this->fetch(':download');
    }
    public function download_ajax(){
        $id=input('post.tid/d');
        $incs=Db::name('tasks')->where('tid',$id)->select()->toArray();
        if($incs){
            $inc=$incs[0];
            if($inc['task_do']){
                if($inc['task_done']){
                    return $this->success($inc['download_url']);
                }
            }
        }
        return $this->error("none");
    }
    public function uploadword(){
        $re=$this->checkAuth();
        $uid=$re['uid'];
        $ip=$re['ip'];
        if(!$re['status']){
            return $this->error($re['err']);
        }
        $file = request()->file('file');
        $info=$file->validate(['size'=>10210241024,'ext'=>'doc,docx'])->move("upload");
        if($info){
            $vif=$file->getInfo();
            $ins['ip']=$ip;
            $ins['time']=time();
            $ins['uid']=$uid;
            $ins['task_type']=4;
            $ins['size']=$vif['size'];
            $id=Db::name('tasks')->insertGetId($ins);
            $one['tid']=$id;
            $one['name']=$vif['name'];
            $one['file_ext']=$info->getExtension(); 
            $one['file_type']='pdf';
            $one['file_url']=$info->getSaveName();
            $one['size']=$info->getSize();
            Db::name('files')->insert($one);
            // $this->redirect('Index/download',['tid'=>$id]);
            $this->success('上传成功',url('pdf/download',['tid'=>$id]));
        }else{
            $this->error($file->getError());
        }
    }
    public function uploadtxt(){
        $re=$this->checkAuth();
        $uid=$re['uid'];
        $ip=$re['ip'];
        if(!$re['status']){
            return $this->error($re['err']);
        }
        $file = request()->file('file');
        $info=$file->validate(['size'=>1021024102,'ext'=>'txt'])->move("upload");
        if($info){
            $vif=$file->getInfo();
            $ins['ip']=$ip;
            $ins['time']=time();
            $ins['uid']=$uid;
            $ins['task_type']=7;
            $ins['size']=$vif['size'];
            $id=Db::name('tasks')->insertGetId($ins);
            $one['tid']=$id;
            $one['name']=$vif['name'];
            $one['file_ext']=$info->getExtension(); 
            $one['file_type']='pdf';
            $one['file_url']=$info->getSaveName();
            $one['size']=$info->getSize();
            Db::name('files')->insert($one);
            // $this->success(url('Index/download',['tid'=>$id]));
            $this->success('上传成功',url('pdf/download',['tid'=>$id]));
        }else{
            $this->error($file->getError());
        }
    }
    public function uploadexcel(){
        $re=$this->checkAuth();
        $uid=$re['uid'];
        $ip=$re['ip'];
        if(!$re['status']){
            return $this->error($re['err']);
        }
        $file = request()->file('file');
        $info=$file->validate(['size'=>10210241024,'ext'=>'xls,xlsx'])->move("upload");
        if($info){
            $vif=$file->getInfo();
            $ins['ip']=$ip;
            $ins['time']=time();
            $ins['uid']=$uid;
            $ins['task_type']=5;
            $ins['size']=$vif['size'];
            $id=Db::name('tasks')->insertGetId($ins);
            $one['tid']=$id;
            $one['name']=$vif['name'];
            $one['file_ext']=$info->getExtension(); 
            $one['file_type']='pdf';
            $one['file_url']=$info->getSaveName();
            $one['size']=$info->getSize();
            Db::name('files')->insert($one);
            // $this->success(url('Index/download',['tid'=>$id]));
            $this->success('上传成功',url('pdf/download',['tid'=>$id]));
        }else{
            $this->error($file->getError());
        }
    }
    public function uploadppt(){
        $re=$this->checkAuth();
        $uid=$re['uid'];
        $ip=$re['ip'];
        if(!$re['status']){
            return $this->error($re['err']);
        }
        $file = request()->file('file');
        $info=$file->validate(['size'=>10210241024,'ext'=>'ppt,pptx'])->move("upload");
        if($info){
            $vif=$file->getInfo();
            $ins['ip']=$ip;
            $ins['time']=time();
            $ins['uid']=$uid;
            $ins['task_type']=6;
            $ins['size']=$vif['size'];
            $id=Db::name('tasks')->insertGetId($ins);
            $one['tid']=$id;
            $one['name']=$vif['name'];
            $one['file_ext']=$info->getExtension(); 
            $one['file_type']='pdf';
            $one['file_url']=$info->getSaveName();
            $one['size']=$info->getSize();
            Db::name('files')->insert($one);
            // $this->redirect('Index/download',['tid'=>$id]);
            $this->success('上传成功',url('Pdf/download',['tid'=>$id]));
        }else{
            $this->error($file->getError());
        }
    }
    // public function pdfhb(){
	// 	return $this->fetch(':pdfhb');
    // }
    // public function pdf2img(){
	// 	return $this->fetch(':pdf2img');
    // }
    // public function img2pdf(){
	// 	return $this->fetch(':img2pdf');
    // }
    protected function checkAuth(){
        $ip=get_client_ip();
        $uid=cmf_get_current_user_id();
        $set=Db::name("pdf_set")->find(1);
        $re['ip']=$ip;
        $re['err']="";
        $re['status']=false;
        $re['uid']=$uid;
        // var_dump($set);
        // var_dump($uid);
        if(!$uid){
            $ac=Db::name("tasks")->where('ip',$ip)->where('time','between',[time()-86400,time()])->count();
            // var_dump($ac);
            if($ac<$set['ip']){
                $re['status']=true;
            }else{
                $re['status']=false;
                $re['err']="您的免费转换次数不足，请先登入！";
            }
        }else{
            $ac=Db::name("tasks")->where('uid',$uid)->where('time','between',[time()-86400,time()])->count();
            // var_dump($ac);
            if($ac<$set['user']){
                $re['status']=true;
            }else{
                $re['status']=false;
                $re['err']="您的免费转换次数不足，请联系站长！";
            }

        }
        // var_dump($re);
        return $re;
    }
    
}
