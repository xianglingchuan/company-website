<?php
namespace frontend\modules\web\controllers;
use Yii;
use yii\web\Controller;
use frontend\modules\web\models\SettingWeb;

/**
 * 网站的首页控制器
 *
 * @deprec        网站的首页控制器
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-10-01
 * @version       $Id: IndexController.php 2016-10-01 xlc $
 */
class IndexController extends Controller
{

    public $layout = 'main';
     
    
    /**
     * 首页
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */
    public function actionIndex()
    {
         return $this->render("index"); 
    }
    
    
    /**
     * 联系我们
     * 
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */
    public function actionContactUs()
    {
         $model = new SettingWeb();
         $viewData = $model->getContact();
         return $this->render("contact-us",[
             "model"=>$model,
             "viewData" =>$viewData,
         ]); 
    }
    
    
    
    /**
     * 客户名录
     * 
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */
    public function actionClient()
    {
         return $this->render("client"); 
    }
    
    

    /**
     * 公司简介
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */    
    public function actionCompany()
    {
         return $this->render("company"); 
    }
    
    
    
    /**
     * 企业资质
     * 
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */
    public function actionCompanyCertificate()
    {
         return $this->render("company-certificate"); 
    }
    
    
}
