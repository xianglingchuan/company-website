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
use common\helpers\Common;



/**
 * SystemBookController implements the CRUD actions for SystemBook model.
 */
class SystemSiteBasicController extends Controller
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
        $imageData = [];
        $imageFilter = ["siteQrCode","siteTopLog","siteTopAd", "siteLeftAd"];
        if(!empty($list)){
            foreach($list as $buf){
                $viewData[$buf['code']] = $buf['value'];
                $saveDataId[$buf['code']] = $buf['id'];
                if(in_array($buf['code'], $imageFilter)){
                    $imageData[$buf['code']] = $buf['value'];                    
                }
            }
        }
        if(Yii::$app->request->post()){
            $sitename = Yii::$app->request->post('siteName');
            $sitekeyword = Yii::$app->request->post('siteKeyword');
            $sitedescription = Yii::$app->request->post('siteDescription');
            //开始循环上传图片
            $saveImages = [];
            foreach($imageFilter as &$fileName){      
                $uploadImgPath = "";
                if(isset($_FILES[$fileName]) && !empty($_FILES[$fileName])){
                    $image = UploadedFile::getInstanceByName($fileName);    
                    if(!empty($image)){
                        $_fileName = CommonHelp::createImageDirectory() . "" . CommonHelp::createFileName($image->getExtension());
                        if ($image->saveAs($_fileName)) {
                            $_fileName = str_replace("../../frontend/web/", "", $_fileName);
                            $uploadImgPath = $_fileName;    
                        }                    
                    }
                }
                $saveImages[$fileName] = !empty($uploadImgPath) ? $uploadImgPath : $imageData[$fileName];
            }        
            $saveData =  [["id"=>$saveDataId['siteName'], "value"=>$sitename],['id'=>$saveDataId['siteKeyword'], "value"=>$sitekeyword],
                         ["id"=>$saveDataId['siteDescription'], "value"=>$sitedescription],['id'=>$saveDataId['siteQrCode'], "value"=>$saveImages['siteQrCode']],
                         ["id"=>$saveDataId['siteTopLog'], "value"=>$saveImages['siteTopLog']],['id'=>$saveDataId['siteTopAd'], "value"=>$saveImages['siteTopAd']],
                         ['id'=>$saveDataId['siteLeftAd'], "value"=>$saveImages['siteLeftAd']]];
            $result = $model->updateContact($saveData);
            if(!$result){
                Yii::$app->getSession()->setFlash('error', "操作失败!"); 
            }else{
                Yii::$app->getSession()->setFlash('success', '操作成功!');
                $list = $model->getSiteBasic();
                $viewData = [];
                $imageFilter = ["siteQrCode","siteTopLog","siteTopAd", "siteLeftAd"];
                if(!empty($list)){
                    foreach($list as $buf){
                        $viewData[$buf['code']] = $buf['value'];
                    }
                }
            }
        }
        echo $this->render('create', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
            'viewData' => $viewData,
        ]);
    }
}