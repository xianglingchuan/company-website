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
class SystemContactController extends Controller
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
        $viewData = $model->getContact();
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
        $list = SettingBackend::find()->select("id, parent_id, code, type, value")->where("parent_id=" . $model->CONTACT_ID)->asArray()->all();
        $viewData = [];
        $saveDataId = [];
        if(!empty($list)){
            foreach($list as $buf){
                $viewData[$buf['code']] = $buf['value'];
                $saveDataId[$buf['code']] = $buf['id'];
            }
        }
        if(Yii::$app->request->post()){
              $tel = Yii::$app->request->post('contactTel');
              $phone = Yii::$app->request->post('contactPhone');
              $email = Yii::$app->request->post('contactEmail');
              $addressOne = Yii::$app->request->post('contactAddressOne');
              $addressTwo = Yii::$app->request->post('contactAddressTwo');
              $addressThree = Yii::$app->request->post('contactAddressThree');
              $saveData = [["id"=>$saveDataId['contactTel'], "value"=>$tel],['id'=>$saveDataId['contactPhone'], "value"=>$phone],
                           ["id"=>$saveDataId['contactEmail'], "value"=>$email],['id'=>$saveDataId['contactAddressOne'], "value"=>$addressOne],
                           ["id"=>$saveDataId['contactAddressTwo'], "value"=>$addressTwo],['id'=>$saveDataId['contactAddressThree'], "value"=>$addressThree],
                          ];
            $result = $model->updateContact($saveData);
            if(!$result){
                Yii::$app->getSession()->setFlash('error', "操作失败!"); 
            }else{
                Yii::$app->getSession()->setFlash('success', '操作成功!');
                $viewData = $model->getContact();
            }
        }
        echo $this->render('create', [
            'model' => $model,
            'master_navigation_id' =>$this->master_navigation_id,
            'viewData' => $viewData,
        ]);
    }
}