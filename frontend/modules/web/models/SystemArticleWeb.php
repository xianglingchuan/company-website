<?php

namespace frontend\modules\web\models;

use Yii;
use common\models\SystemArticle;
use yii\data\Pagination;
use common\helpers\Models;


/**
 * 系统相关配置模型
 *
 * @deprec        系统相关配置模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-10-06
 * @version       $Id: SettingWeb.php 2016-10-06 xlc $
 */
class SystemArticleWeb extends SystemArticle {


    /**
     * 获取文章分页
     */
    public function getArticleList($categoryId=0) {
       $data = $this::find()->where("is_del=:is_del AND is_show=:is_show", [":is_del"=>Models::IS_DEL_NO,":is_show"=>  Models::IS_SHOW_YES]);
       if(intval($categoryId)>=1){
          $data->andWhere("category_id=:category_id",[":category_id"=>$categoryId]);   
       }
       $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => 10]);
       $model = $data->offset($pages->offset)->limit($pages->limit)->orderBy("id DESC")->all();
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
    
    
    
    /**
     * 获取文章描述内容
     */
    public function getDescribe($describe, $limit=65){
         $_content = strip_tags($describe);
         $content = mb_substr($_content, 0, $limit, "utf-8");
         $content = str_replace('　','', $content);
         $content = str_replace(' ','', $content);
         if(mb_strlen($_content, "utf-8") > $limit){
             $content.="...";
         }
         return $content;
    }
    
}
