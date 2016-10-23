<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/',
    'defaultRoute' => 'web/index/index',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
      
        'request' => [
            'baseUrl' => '',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'modules' => [
        //接口模块
        'interfaces' => [ 
            'class' => 'frontend\modules\interfaces\Module',
            'modules' => [               
                'user' => [ //用户 
                    'class' => 'frontend\modules\interfaces\modules\user\Module',
                ],
                'task' => [ 
                    'class' => 'frontend\modules\interfaces\modules\task\Module',
                ],  
                'wish' => [ 
                    'class' => 'frontend\modules\interfaces\modules\wish\Module',
                ],                                 
            ],
        ],   
        //Mesh模块
        'mesh' => [ 
            'class' => 'frontend\modules\mesh\Module',
            'modules' => [
                'user' => [ //用户 
                    'class' => 'frontend\modules\mesh\modules\user\Module',
                ],
            ],
        ],  
        //web模块
        'web' => [ 
            'class' => 'frontend\modules\web\Module',
        ], 
        
    ],
    'params' => $params,
];
