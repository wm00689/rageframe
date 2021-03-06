<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath'      => dirname(__DIR__),
    'bootstrap'     => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute'         => 'index',//默认控制器
    'components' => [
        'user' => [
            'identityClass' => 'common\models\member\Member',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => ['site/login'],
            'idParam' => '__user',
            'as afterLogin' => 'common\behaviors\AfterLogin',
        ],
        'session' => [
            'name' => 'advanced-frontend',// 这是用于在前台登录的会话cookie的名称
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

        /**----------------------路由配置--------------------**/
        'urlManager' => [
            'class'           => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,  //这个是生成路由 ?r=site/about--->/site/about
            'showScriptName'  => false,
            'suffix'          => '.html',//静态
            'rules'           =>[

            ],
        ],

        'request'=>[
            'csrfParam'=>'_csrf_frontend'
        ],
    ],
    'params' => $params,
];
