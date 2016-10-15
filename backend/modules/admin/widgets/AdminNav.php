<?php

namespace backend\modules\admin\widgets;
use yii;
use common\models\SystemNavigation;
/**
 * 信贷经理导航小部件
 *
 * @package frontend\widgets
 * @author      dzer
 * @date        2016-05-27
 * @copyright   2016 PRG
 */
class AdminNav extends \yii\bootstrap\Widget
{

    public function run()
    {
        //查询信贷经理导航
        $nav = SystemNavigation::find()->where("parent_id<=0")->orderBy('sort')->all();
        return $this->render('adminNav', [
            'nav' => $nav,
        ]);
    }
}