<?php

namespace backend\modules\admin\modules\system\controllers;

use Yii;
use backend\models\SystemBannerBackend;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\helpers\CommonHelp;
use common\helpers\Models;

/**
 * SystemBannerController implements the CRUD actions for SystemBanner model.
 */
class SystemBannerController extends Controller
{


    public $layout = '/system_main';
    
    public $master_navigation_id = CommonHelp::CONTENT_MANAGER_ID; 
    
    public $enableCsrfValidation = false; 
    

    /**
     * @behaviors
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'delete', 'view'],
                'rules' => [
                    [
                        'allow' => true, 
                        'actions' => ['index', 'create', 'delete', 'view'],
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }
    

    /**
     * 列表
     * @return    void
     */
    public function actionIndex()
    {
        $model = new SystemBannerBackend();
        $dataProvider = $model->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'params' => Yii::$app->request->queryParams,
            'master_navigation_id' =>$this->master_navigation_id,
        ]);
    }

    
    /**
     * 展示
     * @return    void
     */
    public function actionView()
    {
        $model = new SystemBannerBackend();
        $id = Yii::$app->request->get('id',0);
        if($id >=1){
            $model = $model->getInfo($id);
            if(empty($model)){
               $model = new SystemBannerBackend();
               Yii::$app->getSession()->setFlash('error', '请求数据不存在!');
            }
        }
        echo $this->render('view', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
        ]);
    }

    
    /**
     * 创建
     * @return    void
     */
    public function actionCreate()
    {
        $model = new SystemBannerBackend();
        if(Yii::$app->request->post()){
            $model->load(Yii::$app->request->post());
            $data  = [];
            if($model->id>=1){
               $model = $model->getInfo($model->id);
               $data['cover'] = $model->cover;
               $model->load(Yii::$app->request->post());
            }
            CommonHelp::updatePhoto($model, array("cover"), $data); 
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
                $model = new SystemBannerBackend();
                Yii::$app->getSession()->setFlash('error', '请求数据不存在!');
            }
        }
        echo $this->render('create', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
        ]);
    }

  

    /**
     * 删除
     * @return    void
     */
    public function actionDelete()
    {
        $model = new SystemBannerBackend();
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
    
    
    /**
     * 隐藏显示
     * @return    void
     */
    public function actionShowHide()
    {
        $model = new SystemBannerBackend();
        $id = Yii::$app->request->get('id',0);
        $value = Yii::$app->request->get('value',1);
        if($id >=1){
            $result = $model->myShowHide($id, $value);
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
