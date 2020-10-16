<?php
    function acca($variable){
        switch ($variable) {
            case '0':
                # code...\
                return "PDF压缩";
                break;
            
            case '1':
                # code...
                return "PDF合并";
                break;
            case '2':
                # code...
                return "图片合成PDF";
                break;
            case '3':
                # code...
                return "PDF转图片";
                break;
            case '4':
                    # code...
                    return "word转PDF";
                    break;
            case '5':
                # code...
                return "Excel转PDF";
                break;
            case '6':
                # code...
                return "PPT转PDF";
                break;
            case '7':
                # code...
                return "TXT转PDF";
                break;                    
            default:
                # code...
                break;
        }
    }

    function ax($uid){
        if($uid){
            return $uid;
        }else{
            return "匿名";
        }
    }