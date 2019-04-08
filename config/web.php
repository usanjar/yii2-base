<?php

use app\components\User;
use dektrium\user\controllers\RecoveryController;
use dektrium\user\controllers\RegistrationController;
use dektrium\user\controllers\SecurityController;
use kartik\grid\Module;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\i18n\DbMessageSource;
use yii\twig\ViewRenderer;
use yii\web\View;
use yii\widgets\Menu;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id'             => 'basic',
    'basePath'       => dirname(__DIR__),
    'bootstrap'      => ['log'],
    'language'       => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'layout'         => '@app/themes/default/layouts/main.twig',
    'defaultRoute'   => '/page/default/index',
    'aliases'        => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components'     => [
        'user'         => [
            'class'         => User::class,
            'identityClass' => \dektrium\user\models\User::class,
        ],
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'OL5z8YVsI-aBAkTkbilk3JEtgbTeZmqy',
            'baseUrl'             => '',
        ],
        'cache'        => [
            'class' => yii\caching\FileCache::class,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => yii\swiftmailer\Mailer::class,
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'           => $db,
        'urlManager'   => [
            'class'          => codemix\localeurls\UrlManager::class,
            'languages'      => ['en' => 'en-US', 'ru' => 'ru-RU', 'uz' => 'uz-UZ'],
            'showScriptName' => false,

            'enableDefaultLanguageUrlCode' => true,

            'rules' => [
                'login'            => '/user/security/login',
                'forgot'           => 'user/recovery/request',
                'register'         => 'user/registration/register',
                '/'                => '/page/default/index',
                'about'            => '/page/default/about',
                'contacts'         => '/page/default/contacts',
            ],

            'ignoreLanguageUrlPatterns' => [
                '#^translatemanager#' => '#^translatemanager#',
                '#^[css|js]#'         => '#^[css|js]#',
                '#^images#'           => '#^images#',
                '#^admin#'            => '#^admin#',
            ],
        ],
        'i18n'         => [
            'translations' => [
                '*'   => [
                    'class'              => DbMessageSource::class,
                    'db'                 => 'db',
                    'sourceLanguage'     => 'ru-RU',
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable'       => '{{%language_translate}}',
                    'cachingDuration'    => 86400,
                    'enableCaching'      => true,
                ],
                'app' => [
                    'class'              => DbMessageSource::class,
                    'db'                 => 'db',
                    'sourceLanguage'     => 'ru-RU',
                    'sourceMessageTable' => '{{%language_source}}',
                    'messageTable'       => '{{%language_translate}}',
                    'cachingDuration'    => 86400,
                    'enableCaching'      => true,
                ],
            ],
        ],

        'view' => [
            'class'     => View::class,
            'theme'     => [
                'basePath' => '@app/themes/default',
                'baseUrl'  => '@web/themes/default',
                'pathMap'  => [
                    '@dektrium/user/views'             => '@app/themes/admin/user',
                    '@dektrium/rbac/views'             => '@app/themes/admin/user',
                    '@app/modules/admin/views/default' => '@app/themes/admin/default',
                    '@app/modules/page/views/default'  => '@app/themes/default',
                    '@lajax/translatemanager/views'    => '@app/themes/admin/translate_manager',
                ],
            ],
            'renderers' => [
                'twig' => [
                    'class'     => ViewRenderer::class,
                    'cachePath' => '@runtime/Twig/cache',
                    'options'   => [
                        'auto_reload' => true,
                    ],
                    'globals'   => [
                        'Html' => ['class' => Html::class],
                        'Url'  => ['class' => Url::class],
                        'Menu' => ['class' => Menu::class],
                    ],
                    'uses'      => ['yii\bootstrap'],
                ],
            ],
        ],
    ],
    'params'         => $params,

    'modules' => [

        'admin' => [
            'class' => app\modules\admin\Module::class,
        ],

        'page' => app\modules\page\Module::class,
        'rbac' => dektrium\rbac\RbacWebModule::class,

        'translatemanager' => [
            'class'             => lajax\translatemanager\Module::class,
            'root'              => '@app/views',
            'ignoredCategories' => ['yii'],
            'phpTranslators'    => ['::t'],
        ],

        'user' => [
            'class'              => dektrium\user\Module::class,
            'enableConfirmation' => false,
            'admins'             => ['admin'],
            'controllerMap'      => [
                'security' => [
                    'class'  => SecurityController::class,
                    'layout' => '@app/themes/default/layouts/login.twig',
                ],

                'registration' => [
                    'class'  => RegistrationController::class,
                    'layout' => '@app/themes/default/layouts/login.twig',

                    'on ' . RegistrationController::EVENT_AFTER_REGISTER => static function () {
                        Yii::$app->controller->redirect(['/user/security/login']);
                        Yii::$app->end();
                    },
                ],

                'recovery' => [
                    'class'  => RecoveryController::class,
                    'layout' => '@app/themes/default/layouts/login.twig',
                ],
            ],

            'urlRules' => [],
        ],

        'gridview' => Module::class,
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'      => yii\debug\Module::class,
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class'      => yii\gii\Module::class,
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
