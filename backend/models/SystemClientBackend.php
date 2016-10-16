<?php

namespace backend\models;

use Yii;
use common\models\SystemClient;
use yii\data\ActiveDataProvider;
use common\helpers\Models;

/**
 * 系统图书模型
 *
 * @deprec        系统图书模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-09-21
 * @version       $Id: SystemBookBackend.php 2016-09-21 xlc $
 */
class SystemClientBackend extends SystemClient
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
            $query->andWhere("title like :title", [':title'=>"%".$params['name']."%"]);
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
     * 后台获取封面路径
     */
    public function getCover(){
        if(!empty($this->cover)){
            return \backend\helpers\CommonHelp::getFrontendImg($this->cover);            
        }else{
            return "";
        }
    } 
}