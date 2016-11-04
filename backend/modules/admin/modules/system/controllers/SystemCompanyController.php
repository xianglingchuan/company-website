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
class SystemCompanyController extends Controller
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
        $list = $model->getCompany();
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
        $viewData = $data = $saveDataId = [];
        $list = $model->getCompany();
        if (!empty($list)) {
            foreach ($list as $buf) {
                $viewData[$buf['code']] = $buf['value'];
                $saveDataId[$buf['code']] = $buf['id'];
                if ($buf['code'] == "companyHomeImg") {
                    $data['value'] = $buf['value'];
                }
            }
        }
        
        if (Yii::$app->request->post()) {
            $model = new SettingBackend();
            $companyContent = Yii::$app->request->post('content');
            $companyContent = CommonHelp::saveSummernoteImgs($companyContent);
            //上传图片信息
            $_FILES['SettingBackend[value]'] = $_FILES['cover'];
            CommonHelp::updatePhoto($model, array("value"), $data);
            $companyHomeImg = $model->value;
            $saveData = [["id" => $saveDataId['companyContent'], "value" => $companyContent], ['id' => $saveDataId['companyHomeImg'], "value" => $companyHomeImg]];
            $result = $model->updateCompany($saveData);
            if (!$result) {
                Yii::$app->getSession()->setFlash('error', "操作失败!");
            } else {
                $viewData['companyContent'] = CommonHelp::replaceContentImgUrl($companyContent);
                $viewData['companyHomeImg'] = $companyHomeImg;
                Yii::$app->getSession()->setFlash('success', '操作成功!');
            }
        }
        if (!empty($viewData['companyContent'])) {
            $viewData['companyContent'] = CommonHelp::replaceContentImgUrl($viewData['companyContent']);
        }
        echo $this->render('create', [
            'model' => $model,
            'master_navigation_id' => $this->master_navigation_id,
            'viewData' => $viewData,
        ]);
    }

}