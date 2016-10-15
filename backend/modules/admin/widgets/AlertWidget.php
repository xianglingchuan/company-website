<?php

namespace backend\modules\admin\widgets;
use yii;

/**
 * 首页banner小部件
 *
 * @package frontend\widgets
 * @author      dzer
 * @date        2016-05-27
 * @copyright   2016 PRG
 */
class AlertWidget extends \yii\bootstrap\Widget
{

    public function run()
    {
        return $this->render('alertWidget');
    }
}