<?php
namespace frontend\modules\web\controllers;
use Yii;
use yii\web\Controller;
use frontend\modules\web\models\SystemProductWeb;
use frontend\modules\web\models\SystemCategoryWeb;

/**
 * 产品控制器
 *
 * @deprec        产品控制器
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-10-04
 * @version       $Id: ProductController.php 2016-10-04 xlc $
 */
class ProductController extends Controller
{

    public $layout = 'main';
     
    
    /**
     * 产品列表
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */
    public function actionIndex()
    {
        $categoryId = Yii::$app->request->get('category_id');
        $categoryInfo = "";
        if(intval($categoryId)>=1){
            $SystemCategoryWeb = new SystemCategoryWeb();
            $categoryInfo = $SystemCategoryWeb->getInfo($categoryId);  
        }
        //获取新闻列表
        $model = new SystemProductWeb();
        $list = $model->getList($categoryId);
        return $this->render("index",[
            "categoryInfo"=>$categoryInfo,
            "list" => $list,
        ]);
         
    }
    
    
    /**
     * 产品详细
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */
    public function actionView(){
        $id = Yii::$app->request->get('id');
        $model = new SystemProductWeb();
        $info = $categoryInfo = $nextInfo = $lastInfo = "";
        if(intval($id)>=1){
            $info = $model->getInfo($id); 
            if(!empty($info)){
                $SystemCategoryWeb = new SystemCategoryWeb();
                $categoryInfo = $SystemCategoryWeb->getInfo($info->category_id);                  
            }
            $nextInfo = $model->getNextArticle($info->id, $info->category_id);
            $lastInfo = $model->getLastArticle($info->id, $info->category_id);
        }
        return $this->render("view",[
            'model'=>$model,
            "info"=>$info,
            "categoryInfo"=>$categoryInfo,
            "lastInfo" => $lastInfo,
            "nextInfo" =>$nextInfo,
        ]);
    }
    
    
}
