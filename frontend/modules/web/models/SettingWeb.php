<?php

namespace frontend\modules\web\models;

use Yii;
use common\models\Setting;


/**
 * 系统相关配置模型
 *
 * @deprec        系统相关配置模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-10-06
 * @version       $Id: SettingWeb.php 2016-10-06 xlc $
 */
class SettingWeb extends Setting {


    /**
     * 后台获取封面路径
     */
    public function getImgPath($cover) {
        if (!empty($cover)) {
            return Yii::$app->request->hostInfo."/".$cover;
        } else {
            return "";
        }
    }
    
    
    /**
     * 首页获取公司简介
     */   
    public function getCompanyContentByHome($limit=330){
         $_content = strip_tags(Yii::$app->setting->get('companyContent'));
         $content = mb_substr($_content, 0, $limit, "utf-8");
         $content = str_replace('　','', $content);
         $content = str_replace(' ','', $content);
         if(mb_strlen($_content, "utf-8") > $limit){
             $content.="...";
         }
         return $content;
    }    
    
    
    
}
