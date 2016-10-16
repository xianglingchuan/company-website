<?php

namespace frontend\modules\web\models;

use Yii;
use common\models\SystemClient;


/**
 * 系统相关配置模型
 *
 * @deprec        系统相关配置模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-10-06
 * @version       $Id: SettingWeb.php 2016-10-06 xlc $
 */
class SystemClientWeb extends SystemClient {


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
     * 获取列表
     */
    public function getList(){
        $list = $this->find()->where("is_del=:is_del AND is_show=:is_show",[":is_del"=>  \common\helpers\Models::IS_DEL_NO, ":is_show"=>  \common\helpers\Models::IS_SHOW_YES])->orderBy("sort ASC, id DESC")->asArray()->all();
        return $list;
    }
}
