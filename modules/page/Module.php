<?php

namespace app\modules\page;

/**
 * page module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\page\controllers';

    public $layout = '@app/themes/default/layouts/main.twig';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}