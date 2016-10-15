<?php

namespace backend\models;

use Yii;
use common\models\SystemCategory;
use yii\data\ActiveDataProvider;
use common\helpers\Models;

/**
 * 文章图书分类模型
 *
 * @deprec        文章图书分类模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-09-28
 * @version       $Id: SystemTaskBackend.php 2016-09-09 xlc $
 */
class SystemCategoryBackend extends SystemCategory
{
    
    
   /**
     * 获取列表信息
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = $this::find()->where("is_del=:is_del", [":is_del"=>Models::IS_DEL_NO])->orderBy("id DESC");
        if(isset($params['name']) && !empty($params['name'])){
            $query->andWhere("name like :name", [':name'=>"%".$params['name']."%"]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                    'pagesize' => 10,
             ]            
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        return $dataProvider;
    }   
    
   /**
     * 后台获取图片路径
     */
    public function getIcon(){
        if(!empty($this->icon)){
            return \backend\helpers\CommonHelp::getFrontendImg($this->icon);            
        }else{
            return "";
        }
    } 
}