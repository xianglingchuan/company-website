<?php

namespace backend\models;

use Yii;
use common\models\SystemNavigation;
use yii\data\ActiveDataProvider;

/**
 * 系统导航模型
 *
 * @deprec        系统导航模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-09-08
 * @version       $Id: SystemNavigationBackend.php 2016-09-08 xlc $
 */
class SystemNavigationBackend extends SystemNavigation
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