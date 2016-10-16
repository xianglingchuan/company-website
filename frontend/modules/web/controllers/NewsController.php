<?php
namespace frontend\modules\web\controllers;
use Yii;
use yii\web\Controller;
use frontend\modules\web\models\SystemCategoryWeb;
use frontend\modules\web\models\SystemArticleWeb;

/**
 * 新闻控制器
 *
 * @deprec        新闻控制器
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-10-04
 * @version       $Id: NewsController.php 2016-10-04 xlc $
 */
class NewsController extends Controller
{

    public $layout = "main";
     
    
    /**
     * 新闻列表
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
        $SystemArticleWeb = new SystemArticleWeb();
        $articleList = $SystemArticleWeb->getArticleList($categoryId);
        return $this->render("index",[
            "categoryInfo"=>$categoryInfo,
            "articleList" => $articleList,
        ]);
    }
    
    
    /**
     * 新闻详细
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */
    public function actionView(){
        $id = Yii::$app->request->get('id');
        $model = new SystemArticleWeb();
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
