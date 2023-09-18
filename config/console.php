
<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
//Yii::setAlias('@bedezing',dirname('/app/vendor'));

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',

        //"@bedezing"=>'@vendor/bedezing',
    ],

    'modules'=>[
        'user'=>[
            'class'=>'Da\User\Module',
        ]
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'authManager'=>[
            'class'=>'Da\User\Component\AuthDbManagerComponent',
        ],
    ],
    'params' => $params,


    'controllerMap' => [
        'migrate'=>[
            'class'=>
                '\yii\console\controllers\MigrateController',
              'migrationPath'=>[
                   '@app/migrations',
                  // '@yii/rbac/migrations',
                   //'@yii/audit/migrations',




                ],
                'migrationNamespaces'=>[
                   // 'Da\User\Migration',
                   // 'bedezing\yii2\audit\migrations',
                ],

        ],
    ],

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
