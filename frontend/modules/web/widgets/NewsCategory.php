<?php

namespace frontend\modules\web\widgets;
use yii;
use frontend\modules\web\models\SystemCategoryWeb;
use common\helpers\Models;

/**
 * 信贷经理导航小部件
 *
 * @package frontend\widgets
 * @author      dzer
 * @date        2016-05-27
 * @copyright   2016 PRG
 */
class NewsCategory extends \yii\bootstrap\Widget
{

    public function run()
    {
        //读取顶部的logo图片
        $model = new SystemCategoryWeb();
        $list = SystemCategoryWeb::find()->where("type=:type AND is_del=:is_del AND is_show=:is_show",
                                                [":type"=>SystemCategoryWeb::TYPE_NEWS, ":is_del"=>Models::IS_DEL_NO, ":is_show"=>Models::IS_SHOW_YES])->orderBy("sort ASC, id ASC")->asArray()->all();
        return $this->render('newsCategory', [
            "model"=>$model,
            "list" => $list,
        ]);
    }
}