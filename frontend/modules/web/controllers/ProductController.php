<?php
namespace frontend\modules\web\controllers;
use Yii;
use yii\web\Controller;

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
         return $this->render("index");
         
    }
    
    
    /**
     * 产品详细
     * @author    Xlc <xianglingchuan@sina.cn>
     * @return    void
     */
    public function actionView(){
        return $this->render("view");
    }
    
    
}
