<?php
namespace backend\modules\admin\modules\home\controllers;

use Yii;
use yii\web\Controller;


/**
 * 用户注册登录控制器
 *
 * @deprec        用户注册登录控制器
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-08-24
 * @version       $Id: IndexController.php 2016-08-24 xlc $
 */
class HelpController extends Controller {

    
    
    public $layout = '/system_main';
    
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
        return $this->render('index');         
    } 
    
}
