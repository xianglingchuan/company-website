<?php
namespace frontend\modules\mesh\controllers;
use Yii;
use yii\web\Controller;

/**
 * 测试
 *
 * @deprec        测试
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-08-23
 * @version       $Id: TestController.php 2016-08-23 xlc $
 */
class TestController extends Controller
{

    public $layout = false;
     
    
    /**
     * 测试
     *
     * @author    Xlc <xianglingchuan@sina.cn>
     * @date      2016-08-23
     * @deprec    测试
     * @return    void
     */
    public function actionIndex()
    {
         echo "index....";
    }
}
