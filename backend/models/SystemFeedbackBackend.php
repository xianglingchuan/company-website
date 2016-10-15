<?php

namespace backend\models;

use Yii;
use common\models\SystemFeedback;
use yii\data\ActiveDataProvider;

/**
 * 系统意见反馈模型
 *
 * @deprec        系统意见反馈模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-09-10
 * @version       $Id: SystemFeedbackBackend.php 2016-09-10 xlc $
 */
class SystemFeedbackBackend extends SystemFeedback
{
    
    
   /**
     * 获取列表信息
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = $this::find()->orderBy("id DESC");
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
}