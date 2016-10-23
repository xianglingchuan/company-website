<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class SystemAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/backend/web/style/css/public.css',
        '/backend/web/style/css/iconfont.css'
    ];
    public $js = [
       '/backend/web/style/js/bootstrap.min.js'
    ];
    public $depends = [
      'yii\web\YiiAsset',
      'yii\bootstrap\BootstrapAsset',
    ];
    
    //设置JS在View中出现的位置
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];    
   
}
