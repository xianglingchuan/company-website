<?php
namespace frontend\modules\web\widgets;
use yii;

/**
 * 信贷经理导航小部件
 *
 * @package frontend\widgets
 * @author      dzer
 * @date        2016-05-27
 * @copyright   2016 PRG
 */
class TopBanner extends \yii\bootstrap\Widget
{

    public function run()
    {
        return $this->render('topBanner', []);
    }
}