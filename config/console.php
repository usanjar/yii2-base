<?php

use dektrium\user\Module;
use yii\console\controllers\MigrateController;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id'                  => 'basic-console',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases'             => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components'          => [
        'cache' => [
            'class' => yii\caching\FileCache::class,
        ],
        'log'   => [
            'targets' => [
                [
                    'class'  => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'    => $db,
    ],
    'params'              => $params,
    'controllerMap'       => [
        'fixture' => [ // Fixture generation command line.
                       'class' => yii\faker\FixtureController::class,
        ],
        'migrate' => [
            'class'         => MigrateController::class,
            'migrationPath' => [
                '@app/migrations',
                '@vendor/dektrium/yii2-user/migrations',
                '@yii/rbac/migrations',
                '@vendor/lajax/yii2-translate-manager/migrations'
            ],
        ],
    ],
    'modules'             => [
        'rbac' => dektrium\rbac\RbacConsoleModule::class,
        'user' => Module::class,
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
    ];
}

return $config;
