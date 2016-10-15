<?php
namespace backend\helpers;

use yii;
use common\helpers;
use yii\web\UploadedFile;

/**
 * zip帮助类
 *
 * @deprec        zip帮助类
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-09-24
 * @copyright    2016
 * @version      $Id: ZipHelp.php xlc $
 */
class ZipHelp{
    
    /**
     * 解压zip到指定的目录
     *
     * @param    Object      $model          当前model对象 
     * @param    Array       $fileds         字段数组
     * @param    Array       $oldPhoto       图片信息数组
     * @param    string      $thumbnailSize  生成缩略图的配置键值
     * @return void
     * @author xlc
     */   
    static public function untieZip($zipPath){
        $result = ["ret"=>0, "msg"=>"", "browse_url"=>""];
        if(!empty($zipPath)){
            $uploadPath = yii::$app->params['uploadPath'];
            $uploadPath = str_replace("assets/upload/", "", $uploadPath);
            $zipPath = $uploadPath.$zipPath;   
            $zipClass = Yii::$app->ZipArchive;
            if($zipClass->open($zipPath) !== TRUE){
                $result['msg'] = "zip文件打开失败.";
            }else{
                $pathInfo = pathinfo($zipPath);
                $dirname = isset($pathInfo['dirname']) && !empty($pathInfo['dirname']) ? $pathInfo['dirname'] : "";
                if(!empty($dirname)){
                    $firstName = $zipClass->getNameIndex(0);
                    if($zipClass->extractTo($dirname) && !empty($firstName)){ //将压缩文件解压到指定的目录下
                        $result['msg'] = "解压成功.";
                        $result['ret'] = 1;
                        $browseUrl = $dirname."/".$firstName;
                        $result['browse_url'] = str_replace("../../frontend/web/", "", $browseUrl);
                    }else{
                        $result['msg'] = "解压失败.";
                    }
                    $zipClass->close();//关闭zip文档                      
                }else{
                    $result['msg'] = "解压的目录为空";
                }
            }
        }else{
            $result['msg'] = "zip内容为空,不需要解压.";
            $result['ret'] = 1;
        }
        return $result;
    }    
}