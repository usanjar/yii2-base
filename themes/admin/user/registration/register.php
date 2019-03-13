<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Зарегистрироваться');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-logo">
        <?= Html::a(
            '<b>' . Yii::$app->params['brand_name']['bold'] . '</b>' . Yii::$app->params['brand_name']['normal'],
            ['/']
        ) ?>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg"><?= Html::encode($this->title) ?></p>
        <?php $form = ActiveForm::begin([
            'id'                     => 'registration-form',
            'enableAjaxValidation'   => true,
            'enableClientValidation' => false,
        ]); ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'username') ?>

        <?php if ($module->enableGeneratingPassword === false): ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
        <?php endif ?>

        <?= Html::submitButton(Yii::t('user', 'Зарегистрироваться'), ['class' => 'btn btn-success btn-block']) ?>

        <?php ActiveForm::end(); ?>

        <?= Html::a(Yii::t('user', 'Уже зарегистрирован? Войти!'), ['/user/security/login']) ?>
    </div>
</div>