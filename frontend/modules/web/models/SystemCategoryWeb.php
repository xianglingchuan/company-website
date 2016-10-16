<?php

namespace frontend\modules\web\models;

use Yii;
use common\models\SystemCategory;


/**
 * 系统相关配置模型
 *
 * @deprec        系统相关配置模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-10-06
 * @version       $Id: SettingWeb.php 2016-10-06 xlc $
 */
class SystemCategoryWeb extends SystemCategory {


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
    
}
