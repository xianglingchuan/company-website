<?php

/**
 * 常用函数类帮助类
 *
 * @deprec        控制器帮助类
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-08-25
 * @copyright    2016
 * @version      $Id: CommonHelp.php xlc $
 */

namespace frontend\helpers;

use yii;
use yii\web\UploadedFile;
use common\helpers\Common;

class CommonHelp extends Common {
    /*
     * 计算两个时间之间相差的时分钟数是多少
     * @param   Int    $begin_time   开始时间秒数
     * @param   Int    $end_time     结束时间秒数
     * @return  string 格式如:10:00:00
     * @author Xlc
     */

    public static function timediff($begin_time, $end_time) {
        if ($begin_time < $end_time) {
            $starttime = $begin_time;
            $endtime = $end_time;
        } else {
            $starttime = $end_time;
            $endtime = $begin_time;
        }
        //计算天数
        $timediff = $endtime - $starttime;
        $days = intval($timediff / 86400);

        //计算小时数
        $remain = $timediff % 86400;
        $hours = intval($remain / 3600);
        $hours += $days * 24;

        //计算分钟数
        $remain = $remain % 3600;
        $mins = intval($remain / 60);
        //计算秒数
        $secs = $remain % 60;
        $hours = $hours <= 9 ? "0" . $hours : $hours;
        $mins = $mins <= 9 ? "0" . $mins : $mins;
        $secs = $secs <= 9 ? "0" . $secs : $secs;
        return $hours . ":" . $mins . ":" . $secs;
    }

    /**
     * 客户端上传图片
     *
     * @param    Object   $model          当前model对象 
     * @param    array    $fileds         字段数组
     * @param    string   $thumbnailSize  生成缩略图的配置键值
     * @return   void
     * @author xlc
     */
    public static function updateImage(&$model, $fileds, $thumbnailSize = "") {
        foreach ($fileds as &$buf) {
            $model->$buf = UploadedFile::getInstance($model, $buf);
            if (!empty($model->$buf)) {
                $fileName = self::createImageDirectory() . "" . self::createFileName($model->$buf->getExtension());
                if ($model->$buf->saveAs($fileName)) {
                    $model->$buf = $fileName;
                    if (!empty($thumbnailSize)) {
                        $paramsThumbnailSize = Yii::$app->params[$thumbnailSize]; //开始生成缩略图
                        if (!empty($paramsThumbnailSize)) {
                            CommonHelp::createThumbnail($fileName, $paramsThumbnailSize);
                        }
                    }
                } else {
                    $model->$buf = "";
                }
            }
        }
    }

    /**
     * 处理图片路径
     *
     * @param  array   &$list              图片处理的List
     * @param  array   $fieldNames         图片的名称
     * @param  string  $thumbnailSize      图片缩略图尺寸配置的Key值
     * @param  int     $thumbnailSizeKey   图片缩略图尺寸配置数组的元素值 
     * @return void
     */
    static function handleImagePath(&$list, $fieldNames = ["path"], $thumbnailSize = "", $thumbnailSizeKey = 0) {
        if (!empty($list)) {
            foreach ($list as &$buf) {
                if (!empty($fieldNames)) {
                    foreach ($fieldNames as $field) {
                        if (!empty($buf[$field]) && (strpos($buf[$field], Yii::$app->request->hostInfo) === false) && (strpos($buf[$field], "http://") === false)) {
                            $buf[$field] = Yii::$app->request->hostInfo . "/" . $buf[$field];
                            if (!empty($thumbnailSize)) {
                                $paramsThumbnailSize = Yii::$app->params[$thumbnailSize]; //开始生成缩略图
                                $thumbnailSizeValue = isset($paramsThumbnailSize[$thumbnailSizeKey]) && !empty($paramsThumbnailSize[$thumbnailSizeKey]) ? $paramsThumbnailSize[$thumbnailSizeKey] : "";
                                if (!empty($thumbnailSizeValue)) {
                                    $buf[$field] = self::getThumbnail($buf[$field], $thumbnailSizeValue[0], $thumbnailSizeValue[1]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * 处理图片路径
     *
     * @param  array   &$info 
     * @param  array   $fieldNames         图片的名称
     * @param  string  $thumbnailSize      图片缩略图尺寸配置的Key值
     * @param  int     $thumbnailSizeKey   图片缩略图尺寸配置数组的元素值 
     * @return void
     */
    static public function handleImagePathBySingle(&$info, $fieldNames = ["path"], $thumbnailSize = "", $thumbnailSizeKey = "") {
        if (!empty($info) && !empty($fieldNames)) {
            foreach ($fieldNames as $field) {
                if (!empty($info[$field]) && (strpos($info[$field], Yii::$app->request->hostInfo) === false) && (strpos($info[$field], "http://") === false)) {
                    $info[$field] = Yii::$app->request->hostInfo . "/" . $info[$field];
                    if (!empty($thumbnailSize)) {
                        $paramsThumbnailSize = Yii::$app->params[$thumbnailSize]; //开始生成缩略图
                        $thumbnailSizeValue = isset($paramsThumbnailSize[$thumbnailSizeKey]) && !empty($paramsThumbnailSize[$thumbnailSizeKey]) ? $paramsThumbnailSize[$thumbnailSizeKey] : "";
                        if (!empty($thumbnailSizeValue)) {
                            $info[$field] = self::getThumbnail($info[$field], $thumbnailSizeValue[0], $thumbnailSizeValue[1]);
                        }
                    }
                }
            }
        }
    }
    
    
    /**
     * 处理图片路径
     *
     * @param  array   &$info 
     * @param  array   $fieldNames         图片的名称
     * @param  string  $thumbnailSize      图片缩略图尺寸配置的Key值
     * @param  int     $thumbnailSizeKey   图片缩略图尺寸配置数组的元素值 
     * @return void
     */
    static public function handleImagePathBySingleByAppend(&$info, $fieldNames = ["path"], $thumbnailSize = "") {
        if (!empty($info) && !empty($fieldNames)) {
            foreach ($fieldNames as $field) {
                if (!empty($info[$field]) && (strpos($info[$field], Yii::$app->request->hostInfo) === false) && (strpos($info[$field], "http://") === false)) {
                    $info[$field] = Yii::$app->request->hostInfo . "/" . $info[$field];
                    if (!empty($thumbnailSize)) {
                        $paramsThumbnailSize = Yii::$app->params[$thumbnailSize]; //开始生成缩略图
                        foreach($paramsThumbnailSize as &$_size){
                            $key = "thumbnail_".$_size[0]."x".$_size[1]; 
                            $info[$key] = self::getThumbnail($info[$field], $_size[0], $_size[1]);
                        }
                    }
                }
            }
        }
    }
    
    
    /**
     * 处理图片路径
     *
     * @param  array   &$list              图片处理的List
     * @param  array   $fieldNames         图片的名称
     * @param  string  $thumbnailSize      图片缩略图尺寸配置的Key值
     * @param  int     $thumbnailSizeKey   图片缩略图尺寸配置数组的元素值 
     * @return void
     */
    static function handleImagePathByAppend(&$list, $fieldNames = ["path"], $thumbnailSize = "") {
        if (!empty($list)) {
            foreach ($list as &$buf) {
                if (!empty($fieldNames)) {
                    foreach ($fieldNames as $field) {
                        if (!empty($buf[$field]) && (strpos($buf[$field], Yii::$app->request->hostInfo) === false) && (strpos($buf[$field], "http://") === false)) {
                            $buf[$field] = Yii::$app->request->hostInfo . "/" . $buf[$field];
                            if (!empty($thumbnailSize)) {
                                $paramsThumbnailSize = Yii::$app->params[$thumbnailSize]; //开始生成缩略图
                                foreach($paramsThumbnailSize as &$_size){
                                    $key ="thumbnail_".$_size[0]."x".$_size[1]; 
                                    $buf[$key] = self::getThumbnail($buf[$field], $_size[0], $_size[1]);
                                }                                
                            }
                        }
                    }
                }
            }
        }
    }    
    
    
    
    /**
     *  @author  Xlc 
     *  @date    2014-09-11
     *  @Desc    替换文章中图片的路径为绝对路径
     */
    static public function replaceContentImgUrl($content){     
        if(!empty($content)){
            return self::replaceImgUrl($content, Yii::$app->request->hostInfo."/");            
        }else{
            return "";
        }
    }
    
    
}
