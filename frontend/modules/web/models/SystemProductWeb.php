<?php

namespace frontend\modules\web\models;

use Yii;
use common\models\SystemProduct;
use yii\data\Pagination;
use common\helpers\Models;
use frontend\helpers\CommonHelp;


/**
 * 系统相关配置模型
 *
 * @deprec        系统相关配置模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-10-06
 * @version       $Id: SettingWeb.php 2016-10-06 xlc $
 */
class SystemProductWeb extends SystemProduct {


    /**
     * 获取文章分页
     */
    public function getList($categoryId=0) {
       $data = $this::find()->where("is_del=:is_del AND is_show=:is_show", [":is_del"=>Models::IS_DEL_NO,":is_show"=>  Models::IS_SHOW_YES]);
       if(intval($categoryId)>=1){
          $data->andWhere("category_id=:category_id",[":category_id"=>$categoryId]);   
       }
       $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => 9]);
       $model = $data->offset($pages->offset)->limit($pages->limit)->orderBy("id DESC")->asArray()->all();
       //$this->getCoverThumbnailKey();
       CommonHelp::handleImagePath($model, ["cover"], $this->getCoverThumbnailKey(), 0);
       return ["model"=>$model, "pages"=>$pages];
    }    
    
    
    /**
     * 获取下一篇文章
     */
    public function getNextArticle($articleId, $categoryId){
        $info = $this->find()->where("id>:id AND category_id=:category_id AND is_del=:is_del AND is_show=:is_show",
                       [":id"=>$articleId, ":category_id"=>$categoryId, ":is_del"=>Models::IS_DEL_NO, ":is_show"=>Models::IS_SHOW_YES])->orderBy("id ASC")->asArray()->one();
        return $info;
    }
    
    
    /**
     * 获取上篇文章
     */
    public function getLastArticle($articleId, $categoryId){
        $info = $this->find()->where("id<:id AND category_id=:category_id AND is_del=:is_del AND is_show=:is_show",
                       [":id"=>$articleId, ":category_id"=>$categoryId, ":is_del"=>Models::IS_DEL_NO, ":is_show"=>Models::IS_SHOW_YES])->orderBy("id DESC")->asArray()->one();
        return $info;
    }
    
    

    public function getListNotPage($categoryId=0, $limit=12) {
       $data = $this::find()->where("is_del=:is_del AND is_show=:is_show", [":is_del"=>Models::IS_DEL_NO,":is_show"=>  Models::IS_SHOW_YES]);
       if(intval($categoryId)>=1){
          $data->andWhere("category_id=:category_id",[":category_id"=>$categoryId]);   
       }
       $model = $data->limit($limit)->asArray()->orderBy("id DESC")->all();
       CommonHelp::handleImagePath($model, ["cover"]);
       return $model;
    } 
    
    
    
}
