<?php

/**
 * 常用函数类
 *
 * @author      dzer
 * @date        2016-05-31
 * @copyright   2016 PRG
 */
namespace common\helpers;
use yii;
use yii\imagine\Image;
use yii\web\UploadedFile;

class Common {
    
    /**
     * 创建用户上传图片目录
     *
     * @param int $userId 用户id
     * @return bool|string
     * @author dzer
     */
    public static function createImageDirectory() {
        $path = yii::$app->params['uploadPath'] . 'user/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
        return yii\helpers\FileHelper::createDirectory($path, 0775, true) ? $path : null;
    }

    /**
     * 隐藏手机号中间4位
     *
     * @param string $phone 手机号
     * @return mixed
     * @author dzer
     */
    public static function hidePhoneMiddle($phone) {
        return preg_replace('/^(\d{3})\d{4}(\d{4})$/', '$1****$2', $phone);
    }

    /**
     * 隐藏身份证中间年月日
     *
     * @param string $phone 手机号
     * @return mixed
     * @author dzer
     */
    public static function hideIdCardMiddle($phone) {
        return preg_replace('/^(\d{6})\d{8}$/', '$1********', $phone);
    }

    /**
     * 判断是否是身份证号码
     *
     * @param mixed $value 校验值
     * @return bool
     * @author dzer
     */
    public static function checkIsIdCard($value)
    {
        $vCity = array(
            '11', '12', '13', '14', '15', '21', '22',
            '23', '31', '32', '33', '34', '35', '36',
            '37', '41', '42', '43', '44', '45', '46',
            '50', '51', '52', '53', '54', '61', '62',
            '63', '64', '65', '71', '81', '82', '91'
        );
        if (!preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/', $value))
            return false;
        if (!in_array(substr($value, 0, 2), $vCity))
            return false;
        $value = preg_replace('/[xX]$/i', 'a', $value);
        $vLength = strlen($value);
        if ($vLength == 18) {
            $vBirthday = substr($value, 6, 4) . '-' . substr($value, 10, 2) . '-' . substr($value, 12, 2);
        } else {
            $vBirthday = '19' . substr($value, 6, 2) . '-' . substr($value, 8, 2) . '-' . substr($value, 10, 2);
        }
        if (date('Y-m-d', strtotime($vBirthday)) != $vBirthday)
            return false;
        if ($vLength == 18) {
            $vSum = 0;
            for ($i = 17; $i >= 0; $i--) {
                $vSubStr = substr($value, 17 - $i, 1);
                $vSum += (pow(2, $i) % 11) * (($vSubStr == 'a') ? 10 : intval($vSubStr, 11));
            }
            if ($vSum % 11 != 1)
                return false;
        }
        return true;
    }
    
    
    /**
     * 生成缩略图
     *
     * @param     string   $path  源图片地址
     * @param     array    $size  图片的尺寸，以二维数组形式例:[[200,200]]
     * @return mixed
     * @author xlc
     */
    public static function createThumbnail($path, $size){        
        if(!empty($path) && !empty($size) && count($size)>=1){
            $pathinfo = pathinfo($path);
            $path = $path[0]=="/" ? substr($path, 1) : $path;            
            foreach($size as $_size){
                if(!empty($_size) && count($_size)===2){
                    $width = isset($_size[0]) ? $_size[0] : 0;
                    $height = isset($_size[1]) ? $_size[1] : 0;
                    if($width >=1 && $height>=1){
                        $newFile = $pathinfo['dirname']."/".$pathinfo['filename']."_".$width."x".$height.".".$pathinfo['extension'];
                        Image::thumbnail('@webroot/'.$path, $width, $height)->save(Yii::getAlias('@webroot/'.$newFile), ['quality' => 100]);
                    }                
               }
            }
        }        
    }   
    
    
    /**
     * 获取缩略图
     *
     * @param   int   $width   图片宽度
     * @param   int   $height  图片高度
     * @return mixed
     * @author xlc
     */
    public static function getThumbnail($path, $width, $height){
        if(!empty($path) && !empty($width) && !empty($height)){
            $pathinfo = pathinfo($path);
            $newFile = $pathinfo['dirname']."/".$pathinfo['filename']."_".$width."x".$height.".".$pathinfo['extension'];
            return $newFile;
        }
        return $path;
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
     * 根据时间获取星期几
     * 
     * @param  String   $time   时间
     * @return String
     * @author Xlc
     */
    public static function getWeek($time){
        if(!empty($time)){
            $weekarray=array("日","一","二","三","四","五","六");
             return $weekarray[date("w", strtotime($time))];
        }else{
            return null;
        }
    }
    
    
    /**
     * 获取用户宝宝年龄
     * 
     * @param  string $birthday   宝宝出生日期   格式:0000-00-00
     * @return string 例: "3岁3个月"
     */  
    static public function getBabyAge($birthday){
        if(!empty($birthday) && $birthday!="0000-00-00"){
            $birthdayTime = strtotime($birthday);
            $currentTime = time();
            list($birthday_date['y'], $birthday_date['m']) = explode("-", date("Y-m",$birthdayTime));
            list($current_date['y'], $current_date['m']) = explode("-", date("Y-m",$currentTime));
            $diffCountMonth = abs(($current_date['y']-$birthday_date['y'])*12 + ($current_date['m']-$birthday_date['m']));
            $diffYear = ceil($diffCountMonth/12);
            $diffMonth = ceil($diffCountMonth%12);
            $str = "";
            if($diffYear >=1){
                $str.="{$diffYear}岁";
            }
            $str.="{$diffMonth}个月";
        }else{
            $str = "0个月";
        }
        return $str;        
    }   
    
    
    
    /**
     *
     * 替换文本框中的IMG标签进行处理
     *
     * @author    Xlc <xlc@toys178.com>
     * @param     string   $content
     * @param     string   $hostUrl  图片的ULR地址
     * @deprec    替换文本框中的IMG标签进行处理 - 将图片换成Http开头的地址,在style属性中添加"width:100%"
     * @return    String
     */
    static function replaceImgUrl($content, $hostUrl="")
    {
        $hostUrl = !empty($hostUrl) ? $hostUrl : Yii::$app->request->hostInfo."/";
        $array = array();
        preg_match_all('/<img(.*?)>/', $content, $array);
        if (!empty($array[0])) {
            foreach ($array[0] as $tmp) {
                $str = $tmp;
                if (!empty($str) && !strpos($str, "src=\"http://") && !strpos($str, "src=\"https://")) { //如果没有以http开头进行处理
                    $src = "src=\"";
                    $src_replace = "src=\"".$hostUrl;
                    $str = str_replace($src, $src_replace, $str);
                }
                $style = "style=\"";
                if (strpos($str, $style)) {
                    $style_replace = "style=\"width:100%;margin:0px; padding:0px; border:0px;";
                    $str = str_replace($style, $style_replace, $str);
                } else {
                    $endTag = "/>";
                    $endTag_replace =" style=\"width:100%;margin:0px; padding:0px; border:0px;\"/>";
                    $str = str_replace($endTag, $endTag_replace, $str);
                }
                $content = str_replace($tmp, $str, $content);
            }
        }
        //去掉空格
        $content = str_replace(" &nbsp;", "", $content);
        $content = str_replace("&nbsp;", "", $content);    
        //将所有P标签添加样式。
        //$content = str_replace("<p>", "<p style='padding:0px; margin:0px; border:0px;'>", $content);
        //$content = "<div style='margin:0px; padding:0px; border:0px; font-size:13px;'>{$content}</div>";
        return $content;
    }
    
    
    
    
}