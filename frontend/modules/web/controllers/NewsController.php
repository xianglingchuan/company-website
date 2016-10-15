<?php
namespace frontend\modules\web\controllers;
use Yii;
use yii\web\Controller;

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
         return $this->render("index");
         
    }
    
    
    /**
     * 新闻详细
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */
    public function actionView(){
        return $this->render("view");
    }
    
    
}
