<?php

namespace backend\modules\admin\modules\system\controllers;

use Yii;
use backend\models\SystemProductBackend;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\helpers\CommonHelp;
use common\helpers\Models;
use backend\models\SystemCategoryBackend;
use backend\helpers\ZipHelp;

/**
 * SystemBookController implements the CRUD actions for SystemBook model.
 */
class SystemProductController extends Controller
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
        $model = new SystemProductBackend();
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
        $model = new SystemProductBackend();
        $id = Yii::$app->request->get('id',0);
        if($id >=1){
            $model = $model->getInfo($id);
            if(empty($model)){
               $model = new SystemProductBackend();
               Yii::$app->getSession()->setFlash('error', '请求数据不存在!');
            }else{
                $model->content = CommonHelp::replaceContentImgUrl($model->content);
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
        $model = new SystemProductBackend();
        if(Yii::$app->request->post()){
            $model->load(Yii::$app->request->post());
            $data  = [];
            if($model->id>=1){
               $model = $model->getInfo($model->id);
               $data['cover'] = $model->cover;
               $model->load(Yii::$app->request->post());
            }
            CommonHelp::updatePhoto($model, array("cover"), $data, $model->getCoverThumbnailKey()); 
            
            $model->content = CommonHelp::saveSummernoteImgs($model->content);
            $model->content = CommonHelp::removeContentFrontendDomain($model->content);
            
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
                $model = new SystemProductBackend();
                Yii::$app->getSession()->setFlash('error', '请求数据不存在!');
            }
        }
        
        if(isset($model->content) && !empty($model->content)){
            $model->content = CommonHelp::replaceContentImgUrl($model->content);
        }        
        $categoryList = SystemCategoryBackend::find()->where("type=:type AND is_show=:is_show AND is_del=:is_del", 
                                                    [":type"=>SystemCategoryBackend::TYPE_PRODUCT, ":is_show"=>  Models::IS_SHOW_YES, ":is_del"=>Models::IS_DEL_NO])->asArray()->all();
        echo $this->render('create', [
            'model' => $model,
            'categoryList' => $categoryList,
            'master_navigation_id' =>$this->master_navigation_id,
        ]);
    }

  

    /**
     * 删除
     * @return    void
     */
    public function actionDelete()
    {
        $model = new SystemProductBackend();
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
        $model = new SystemProductBackend();
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
