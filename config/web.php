<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
//Yii::setAlias('@bedezing'.dirname('/app/vendor/bedezing'));

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language'=>'es',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        //'@yii2'=>'@vendor/bedezing',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'seisa',
        ],
        'dateTimeConversion'=>[
            'class'=>'ruturajmaniyar\mod\audit\components\DateTimeHelper',
        ],
     /* 'view'=>[
            'theme'=>[
                'pathMap'=>[
                    '@app/views'=>'@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
            'class'=>'yii\web\View',
            'renderers'=>[
                'twig'=>[
            'class'=>'yii\twig\ViewRenderer',
            'cachePath'=>'@runtime/Twig/cache',
            'options'=>[
                'auto_reload'=>true,
            ],
            'globals'=>['html'=>'\yii\helpers\Html'],
            'uses'=>['yii\bootstrap'],
                    ],
          ],
         ],*/


        /*'assetManager' => [
            'bundles' => [
                'rce\material\Assets' => [
                    'siteTitle' => 'SEISA:Mantenimientos',
                    'sidebarColor' => 'orange',
                    'sidebarBackgroundColor' => 'black',
                    'sidebarBackgroundImage' => 'web/img/tema/sidebar-2.jpg',
                   // 'logoMini'=>'web/img/tema/favicon.png',
                ],
            ],
        ],*/


        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
         //   'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'authTimeout'=>800,
        ],

        'authManager'=>
            [
                'class'=>'Da\User\Component\AuthDbManagerComponent',
                //'defaultRoles'=>['guest'],
                //'authTimeout'=>50,

            ],
        'errorHandler' => [

           // 'class'=>'\bedezing\yii2\audit\components\web\ErrorHandler',
            'errorAction' => 'site/error',


           ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
           // 'showScriptName' => false,
           /* 'rules' => [
                'home'=>'site/index',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/action:\w+>/<id:\d+'=>'<controller>/<action>',
                '<controller:\w+>/action:\w+>'=>'<controller>/<action>',
            ],*/
        ],

    ],
    'container'=>[
        'definitions'=>[
            \yii\widgets\LinkPager::className()=>\yii\bootstrap4\LinkPager::className()
        ],
    ],
    'modules'=>[
        'gridview'=>[
            'class'=>'kartik\grid\Module'
        ],
        'user'=>[
            'class'=>'Da\User\Module',
            'administrators'=>['storm'],
          /*  'classMap'=>[
                'User'=>'app\models\User',
            ],*/
        ],
       // 'auditlog'=>[
         //   'class'=>'ruturajmaniyar\mod\audit\AuditEntryModule',
       // ],
       /* 'auditing'=>[
            'class'=>'cornernote\yii2\audit\Auditing',
            'ignoreActions'=>'debug/*',
            'accessRoles'=>['administrador'],
        ],*/
       'social'=>[
          'class'=> 'kartik\social\Module',
           'disqus'=>[
               'settings'=>['shortname'=>'DISQUS_SHORTNAME']
           ],
           'facebook'=>[
               'appId'=>'FACEBOOK_APP_ID',
               'secret'=>'FACEBOOK_APP_SECRET',
           ],
           'google'=>[
               'pageId'=>'GOOGLE_PLUS_PAGE_ID',
               'clientId'=>'GOOGLE_API_CLIENT_ID',
           ],
           'googleAnalytics'=>[
               'id'=>'TRACKING_ID',
               'domain'=>'TRACKING_DOMAIN',
           ],
           'twitter'=>[
               'screenName'=>'TWITTER_SCREEN_NAME'
           ],
           ],
        'gridview'=>[
            'class'=>'\kartik\grid\Module',

        ],




    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
