<?php
use sizeg\jwt\Jwt;
use common\components\JwtValidationData;


$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'hostInfo' => 'http://applecart.ebrtest.ru',
            'baseUrl' => '/api',
            'csrfParam' => '_csrf-api',
		    'parsers' => [
        		'application/json' => 'yii\web\JsonParser',
    		]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
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
       'urlManager' => [
            'enablePrettyUrl' => true,
    		'showScriptName' => false,
    		'rules' => [
                'v1/catalog/<alias:([\w\d\-]+)>/<palias:([\w\d\-]+)>' => 'v1/catalog/view',
                'v1/catalog/<alias:([\w\d]+)>' => 'v1/catalog/index',
            ],
        ],
        'jwt' => [
            'class' => Jwt::class,
            'key' => 'M5fuaCumz7k6s0XNrOa8Oi2GMyPY8TVj',
            'jwtValidationData' => JwtValidationData::class,
        ],
    ],
    'params' => $params,
];
