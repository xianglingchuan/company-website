<?php

namespace backend\modules\admin\modules\system\controllers;

use Yii;
use yii\web\Controller;
use backend\models\SystemFeedbackBackend;
use yii\filters\AccessControl;
use backend\helpers\CommonHelp;

/**
 * 系统意见反馈控制器
 *
 * @deprec        系统意见反馈控制器
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-09-10
 * @version      $Id: SystemFeedbackController.php xlc $
 */
class SystemFeedbackController extends Controller
{
    
    public $layout = '/system_main';
    
    public $master_navigation_id = CommonHelp::SYSTEM_MANAGER_ID;
    
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'delete', 'view', 'show-hide'],
                'rules' => [
                    [
                        'allow' => true, 
                        'actions' => ['index', 'create', 'delete', 'view', 'show-hide'],
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    /**
     * 列表
     * @date      2016-09-08
     * @return    void
     */
    public function actionIndex()
    {
        $model = new SystemFeedbackBackend();
        $dataProvider = $model->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'params' => Yii::$app->request->queryParams,
            'master_navigation_id' =>$this->master_navigation_id,
        ]);
    }

    /**
     * 创建
     * @date      2016-09-08
     * @return    void
     */
    public function actionCreate()
    {
        $model = new SystemFeedbackBackend();
        if(Yii::$app->request->post()){
            $model->load(Yii::$app->request->post());
            $data = [];
            if($model->id>=1){
               $model = $model->getInfo($model->id);
               $model->load(Yii::$app->request->post());
            }
            if(!$model->validate() || !$model->save()){
                $validateError = current($model->getFirstErrors());
                $validateError = !empty($validateError) ? $validateError : "操作失败!";
                Yii::$app->getSession()->setFlash('error', $validateError); 
            }else{
                Yii::$app->getSession()->setFlash('success', '操作成功!');
            }
        }
        $id = Yii::$app->request->get('id',0);
        if($id >=1){
            $model = $model->getInfo($id);
            if(empty($model)){
                $model = new SystemFeedbackBackend();
                Yii::$app->getSession()->setFlash('error', '请求数据不存在!');
            }
        }
        echo $this->render('create', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
        ]);
    }
    
    

    /**
     * 展示
     * @date      2016-09-08
     * @return    void
     */
    public function actionView()
    {
        $model = new SystemFeedbackBackend();
        $id = Yii::$app->request->get('id',0);
        if($id >=1){
            $model = $model->getInfo($id);
            if(empty($model)){
               $model = new SystemFeedbackBackend();
               Yii::$app->getSession()->setFlash('error', '请求数据不存在!');
            }
        }
        echo $this->render('view', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
        ]);
    }    
    
    
    /**
     * 删除
     * @date      2016-09-08
     * @return    void
     */
    public function actionDelete()
    {
        $model = new SystemFeedbackBackend();
        $id = Yii::$app->request->get('id',0);
        if($id >=1){
            $result = $model->myDelete($id);
            if($result){
                Yii::$app->getSession()->setFlash('success', '操作成功!');
            }else{
                Yii::$app->getSession()->setFlash('error', '操作失败!');
            }
        }else{
            Yii::$app->getSession()->setFlash('error', '参数错误!');
        }
        return $this->redirect(['index']);
    }    
}
