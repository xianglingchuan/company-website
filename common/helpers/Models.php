<?php

namespace common\helpers;
use yii;

/**
 * 模型的常用函数类
 *
 * @author      xlc
 * @date        2016-08-24
 */
class Models {

    
    /*
     * 是否删除
     * 0=没有删除/1=已删除
     */
    const IS_DEL_NO = 0;    //未删除
    const IS_DEL_YES  = 1;  //已删除
    
    
    /**
     * 获取删除状态
     * @param   Int   $key   key值
     * @return  array|string
     * @author xlc
     */    
    static public function getIsDel($key=false){
        $data = [self::IS_DEL_NO=>"未删除",
                 self::IS_DEL_YES=>"已删除"];
        if($key===false){
            return $data;
        }
        return isset($data[$key]) ? $data[$key] : "";
    }
    
    
    /*
     * 是否显示
     * 1=显示/0=隐藏默认为1
     */
    const IS_SHOW_YES = 1;
    const IS_SHOW_NO = 0;
    
    
    /**
     * 获取显示状态
     * @param   Int   $key   key值
     * @return  array|string
     * @author  xlc
     */    
    static public function getIsShow($key=false){
        $data = [self::IS_SHOW_YES=>"显示",
                 self::IS_SHOW_NO=>"隐藏"];
        if($key===false){
            return $data;
        }
        return isset($data[$key]) ? $data[$key] : "";
    }
    
    
    /*
     * 系统任务的类型
     * 1=收拾家务/2=公益活动/3=学习/99=其它/4=培养习惯
     */
    const TYPE_MENAGE = 1;
    const TYPE_COMMONWEAL = 2;
    const TYPE_STUDY = 3;
    const TYPE_FOSTER_CUSTOM = 4;
    const TYPE_OTHER = 99;
    
    
    
    /**
     * 获取类型
     * @param   Int   $key   key值
     * @return  array|string
     * @author xlc
     */    
    static public function getType($key=false){
        $data = [self::TYPE_MENAGE=>"收拾家务",
                 self::TYPE_COMMONWEAL=>"公益活动",
                 self::TYPE_STUDY=>"学习",
                 self::TYPE_FOSTER_CUSTOM => "培养习惯",
                 self::TYPE_OTHER=>"其它"];
        if($key===false){
            return $data;
        }
        return isset($data[$key]) ? $data[$key] : "";
    }
    
    
    
}
