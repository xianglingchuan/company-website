<?php
namespace frontend\modules\web\controllers;
use Yii;
use yii\web\Controller;
use frontend\modules\web\models\SettingWeb;
use frontend\modules\web\models\SystemClientWeb;
use frontend\modules\web\models\SystemArticleWeb;
use common\helpers\Models;
use frontend\modules\web\models\SystemCategoryWeb;
use frontend\modules\web\models\SystemProductWeb;

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
         //新闻
         $SystemArticleWeb = new SystemArticleWeb();
         $articleList = $SystemArticleWeb->find()->where("is_del=:is_del AND is_show=:is_show", [":is_del"=>Models::IS_DEL_NO,":is_show"=>  Models::IS_SHOW_YES])
                                          ->limit(4)->orderBy("id DESC")->asArray()->all();
         if(!empty($articleList)){
             foreach($articleList as &$buf){
                 $buf['describe'] = $SystemArticleWeb->getDescribe($buf['describe']);
             }
         }
         //公司简介内容
         $model = new SettingWeb();
         //产品分类及内容
         $SystemCategoryWeb = new SystemCategoryWeb();
         $categoryList = $SystemCategoryWeb->find()->where("is_del=:is_del AND is_show=:is_show AND type=:type", [":type"=>SystemCategoryWeb::TYPE_PRODUCT,":is_del"=>Models::IS_DEL_NO,":is_show"=>  Models::IS_SHOW_YES])->asArray()->all();
         //获取每一个分类的12个产品
         $SystemProductWeb = new SystemProductWeb();
         if(!empty($categoryList)){
             foreach($categoryList as &$category){
                 $category['products'] = $SystemProductWeb->getListNotPage($category['id']);
             }
         }
         return $this->render("index",[
             "articleList"=>$articleList,
             "model" => $model,
             "categoryList" => $categoryList,
             
         ]); 
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
        $model = new SystemClientWeb();
        $list = $model->getList();
        return $this->render("client",[
            "list"=>$list,
        ]); 
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
