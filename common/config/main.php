<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    //'timeZone' => 'America/Shanghai', //设置时区
    'language' => 'zh-CN', 
    'components' => [        
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=bank',
            'username' => 'toys178',
            'password' => 'toys178@2014',
            'charset' => 'utf8',
            'tablePrefix' => 'tb_',
        ],
        //音乐资源数据表
        'dbmusic' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=bank_music',
            'username' => 'toys178',
            'password' => 'toys178@2014',
            'charset' => 'utf8',
            'tablePrefix' => 'tb_',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'setting' => [
            'class' => 'funson86\setting\Setting',
        ],
    ],
];
