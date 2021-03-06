<?php

namespace frontend\modules\web\widgets;
use yii;
use frontend\modules\web\models\SettingWeb;

/**
 * 信贷经理导航小部件
 *
 * @package frontend\widgets
 * @author      dzer
 * @date        2016-05-27
 * @copyright   2016 PRG
 */
class LeftAd extends \yii\bootstrap\Widget
{

    public function run()
    {
        //读取顶部的logo图片
        $model = new SettingWeb();
        return $this->render('leftAd', [
            "model"=>$model,
        ]);
    }
}