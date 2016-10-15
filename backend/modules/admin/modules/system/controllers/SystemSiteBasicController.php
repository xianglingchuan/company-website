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
class SystemSiteBasicController extends Controller
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
        $model = new SettingBackend();
        $list = $model->getSiteBasic();
        $viewData = [];
        if(!empty($list)){
            foreach($list as $buf){
                $viewData[$buf['code']] = $buf['value'];
            }
        }
        echo $this->render('view', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
            'viewData' => $viewData,
        ]);
    }

    
    
    /**
     * 创建
     * @return    void
     */
    public function actionCreate()
    {
        $model = new SettingBackend();
        $list = $model->getSiteBasic();
        $viewData = [];
        $saveDataId = [];
        if(!empty($list)){
            foreach($list as $buf){
                $viewData[$buf['code']] = $buf['value'];
                $saveDataId[$buf['code']] = $buf['id'];
            }
        }
        if(Yii::$app->request->post()){
            $sitename = Yii::$app->request->post('siteName');
            $sitekeyword = Yii::$app->request->post('siteKeyword');
            $sitedescription = Yii::$app->request->post('siteDescription');
            $siteqrcode = Yii::$app->request->post('siteQrCode');
            $sitetoplog = Yii::$app->request->post('siteTopLog');
            $sitetopad = Yii::$app->request->post('siteTopAd'); 
            $siteleftad = Yii::$app->request->post('siteLeftAd'); 
            $saveData =  [["id"=>$saveDataId['siteName'], "value"=>$sitename],['id'=>$saveDataId['siteKeyword'], "value"=>$sitekeyword],
                         ["id"=>$saveDataId['siteDescription'], "value"=>$sitedescription],['id'=>$saveDataId['siteQrCode'], "value"=>$siteqrcode],
                         ["id"=>$saveDataId['siteTopLog'], "value"=>$sitetoplog],['id'=>$saveDataId['siteTopAd'], "value"=>$sitetopad],
                         ['id'=>$saveDataId['siteLeftAd'], "value"=>$siteleftad]];
            $result = $model->updateContact($saveData);
            if(!$result){
                Yii::$app->getSession()->setFlash('error', "操作失败!"); 
            }else{
                Yii::$app->getSession()->setFlash('success', '操作成功!');
            }
        }
        echo $this->render('create', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
            'viewData' => $viewData,
        ]);
    }
}