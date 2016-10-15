<?php
namespace backend\modules\admin\widgets;
use common\models\SystemNavigation;


/**
 * 系统管理员侧导航
 *
 * @package    backend\modules\system\widgets
 * @author     xlc
 * @date       2016-09-08
 */
class AdminSideNav extends \yii\bootstrap\Widget
{

    public function run()
    {
        $parent_id = isset($this->id) ? $this->id : 100; 
        $nav = SystemNavigation::find()->where("parent_id=:parent_id",[":parent_id"=>$parent_id])->orderBy('sort')->all();
        return $this->render('adminSideNav',[
            'nav' => $nav,
        ]);
    }
}
?>