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
use backend\models\SettingBackend;
use yii\web\UploadedFile;


/**
 * SystemBookController implements the CRUD actions for SystemBook model.
 */
class SystemCompanyCertificateController extends Controller
{


    public $layout = '/system_main';
    
    public $master_navigation_id = CommonHelp::SYSTEM_MANAGER_ID; 
    
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
        $model = new SettingBackend();
        $info = $model->getCompanyCertificate();
        $content = !empty($info) && isset($info['value']) ? $info['value'] : "";
        $content = CommonHelp::replaceContentImgUrl($content);
        echo $this->render('view', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
            'content' => $content,
        ]);
    }

    
    
    /**
     * 创建
     * @return    void
     */
    public function actionCreate()
    {
        $model = new SettingBackend();
        $info = $model->getCompanyCertificate();
        $content = !empty($info) && isset($info['value']) ? $info['value'] : "";
        if(Yii::$app->request->post()){
            $content = Yii::$app->request->post('content');
            $content = CommonHelp::saveSummernoteImgs($content);            
            $result = $model->updateCompanyCertificate($content);
            if(!$result){
                Yii::$app->getSession()->setFlash('error', "操作失败!"); 
            }else{
                Yii::$app->getSession()->setFlash('success', '操作成功!');
            }
        }
        if(isset($content) && !empty($content)){
            $content = CommonHelp::replaceContentImgUrl($content);
        }
        echo $this->render('create', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
            'content' => $content,
        ]);
    }
}