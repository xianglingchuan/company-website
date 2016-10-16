<?php

/**
 * 常用函数类
 *
 * @author      xlc
 * @date        2016-09-24
 * @copyright   2016 PRG
 */

namespace backend\helpers;

use yii;
use common\helpers;
use yii\web\UploadedFile;

class CommonHelp extends \common\helpers\Common {
    
    /**
     * 后台导航 - 系统管理的ID号
     */
    const SYSTEM_MANAGER_ID = 10;
    
    
    /**
     * 后台导航 - 任务管理的ID号
     */
    const TASK_MANAGER_ID = 7;

    /**
     * 后台导航 - 用户管理的ID号
     */
    const USER_MANAGER_ID = 5;  
    
    
    /**
     * 后台导航 - 首页的ID号
     */
    const HOME_MANAGER_ID = 1;
    
    /**
     * 后台导航 - 内容管理ID
     */
    const CONTENT_MANAGER_ID = 49;
    
    
    
    /**
     * 后台上传图片
     *
     * @param    Object      $model          当前model对象 
     * @param    Array       $fileds         字段数组
     * @param    Array       $oldPhoto       图片信息数组
     * @param    string      $thumbnailSize  生成缩略图的配置键值
     * @return void
     * @author xlc
     */
    public static function updatePhoto(&$model, $fileds, $oldPhoto = array(), $thumbnailSize="") {
        foreach ($fileds as &$buf) {
            $oldFieldValue = isset($oldPhoto[$buf]) && !empty($oldPhoto[$buf]) ? $oldPhoto[$buf] : "";
            $model->$buf = UploadedFile::getInstance($model, $buf);
            if (!empty($model->$buf)) {
                $fileName = helpers\Common::createImageDirectory() . "" . self::createFileName($model->$buf->getExtension());
                if ($model->$buf->saveAs($fileName)) {
                    //生成缩略图
                    if (!empty($thumbnailSize)) {
                        $paramsThumbnailSize = Yii::$app->params[$thumbnailSize]; //开始生成缩略图
                        if (!empty($paramsThumbnailSize)) {
                            self::createThumbnail($fileName, $paramsThumbnailSize);
                        }
                    }
                    $fileName = str_replace("../../frontend/web/", "", $fileName);
                    $model->$buf = $fileName;
                } else {
                    if (!empty($oldFieldValue)) {
                        $model->$buf = $oldFieldValue;
                    } else {
                        unset($model->$buf); //去掉该属性
                    }
                }
            } else {
                if (!empty($oldFieldValue)) {
                    $model->$buf = $oldFieldValue;
                } else {
                    unset($model->$buf); //去掉该属性
                }
            }
        }
    }

    /**
     * 创建上传文件名称
     * 
     * @param String $ext  文件后缀
     * @return String
     * @author Xlc
     */
    public static function createFileName($ext = "") {
        $fileName = time() . rand(1000, 9999);
        return !empty($ext) ? $fileName . "." . $ext : $fileName;
    }

    
    /**
     * 获取前端上传的图片地址
     * 
     * @param String $path  获取前端上传的图片地址
     * @return String
     * @author Xlc
     */
    public static function getFrontendImg($path) {
        return Yii::$app->params['frontend_domain'].$path;
    }
    
    
    /**
     * 后台上传文件
     *
     * @param    Object      $model      当前model对象 
     * @param    Array       $fileds     字段数组
     * @param    Array       $oldFile    文件信息数组
     * @return void
     * @author xlc
     */
    public static function updateFile(&$model, $fileds, $oldFile = array()) {
        foreach ($fileds as &$buf) {
            $oldFieldValue = isset($oldFile[$buf]) && !empty($oldFile[$buf]) ? $oldFile[$buf] : "";
            $model->$buf = UploadedFile::getInstance($model, $buf);
            if (!empty($model->$buf)) {
                $fileName = helpers\Common::createImageDirectory() . "" . self::createFileName($model->$buf->getExtension());
                if ($model->$buf->saveAs($fileName)) {
                    $fileName = str_replace("../../frontend/web/", "", $fileName);
                    $model->$buf = $fileName;
                } else {
                    if (!empty($oldFieldValue)) {
                        $model->$buf = $oldFieldValue;
                    } else {
                        unset($model->$buf); //去掉该属性
                    }
                }
            } else {
                if (!empty($oldFieldValue)) {
                    $model->$buf = $oldFieldValue;
                } else {
                    unset($model->$buf); //去掉该属性
                }
            }
        }
    }
    
    
    /**
     * 保存Summernote编辑器的图片信息
     * 
     * @param   string  $content  文件的流信息
     * @author  xlc
     * @return  string
     */    
    /**
     * 保存Summernote编辑器的图片信息
     * 
     * @param   string  $content  文件的流信息
     * @author  xlc
     * @return  string
     */    
    static public function saveSummernoteImgs($content) {
        $array = array();
        preg_match_all('/<img(.*?)>/', $content, $array);
        if (!empty($array[0])) {
            foreach ($array[0] as $tmp) {
                $str = $tmp;
                if (!empty($str)) {
                    if (strpos($str, "data:")) {
                        $arr = array('<img src="', '">"', 'data:image/png;base64,', 'data:image/jpeg;base64,', 'data:image/jpg;base64,', 'data:image/gif;base64,');
                        $suffix = strpos($str, "image/png") ? "png" : "jpg";
                        $str = str_replace($arr, "", $str);
                        //发现会出现这种情况 UpSmApSlAClKUAf/Z" style="width: 547px;">
                        if(strpos($str, '"') !==false){
                            $str = substr($str, 0, strpos($str, '"'));
                        }
                        $filename = self::SaveFileStream(base64_decode($str), $suffix);
                        if ($filename != "") {
                            $filename = str_replace("../../frontend/web/", "", $filename);
                            $filename = "<img src=\"" . $filename . "\">";
                        }
                        $content = str_replace($tmp, $filename, $content);
                    }else{
                        //去掉img中的其它标记内容
                        $str = substr($tmp, strpos($tmp, "src=")+5);
                        $filename = "";
                        if(!empty($str)){
                            $str = substr($str, 0, strpos($str, '"'));
                            $filename = "<img src=\"" . $str . "\">";
                        }
                        $content = str_replace($tmp, $filename, $content);
                        //echo "<BR>".$str."<BR>";
                    }
                }
            }
        }
        $content = str_replace("'", "\"", $content);
        return $content;
    }

    
    /**
     * 保存图片文件流信息
     * 
     * @param   string  $fileStream  文件的流信息
     * @param    string  $suffix     文件的后缀
     * @author  xlc
     * @return  string
     */
    static public function SaveFileStream($fileStream, $suffix) {
        $file = "";
        if (!empty($fileStream)) {
            $path = helpers\Common::createImageDirectory();
            $filename = $path . self::createFileName($suffix);
            if (file_put_contents($filename, $fileStream)) {
                $file = str_replace("\\", "/", $filename);
            }
        }
        return $file;
    }
    
    
    
    /**
     * 替换文章中图片的路径为绝对路径
     * 
     *  @param   string  $content 
     *  @author  xlc
     *  @return  string
     */
    static public function replaceContentImgUrl($content){     
        if(!empty($content)){
            return self::replaceImgUrl($content, Yii::$app->params['frontend_domain']);            
        }else{
            return "";
        }
    }
    
    
    /**
     * 保存的时候去掉前端的域名地址
     * 
     *  @param   string  $content 
     *  @author  xlc
     *  @return  string
     */  
    static public function removeContentFrontendDomain($content){
        if(!empty($content)){
            return str_replace(Yii::$app->params['frontend_domain'], "", $content);                    
        }else{
            return "";
        }
    }    
}
