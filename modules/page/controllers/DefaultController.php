<?php

namespace app\modules\page\controllers;

use yii\web\Controller;

/**
 * Default controller for the `page` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('home.twig');
    }

    public function actionAbout(): string
    {
        return $this->render('about.twig');
    }

    public function actionContacts(): string
    {
        return $this->render('contacts.twig');
    }
}
