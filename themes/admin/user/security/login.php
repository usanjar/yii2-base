<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Авторизация');
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
        <?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
        <p class="login-box-msg"><?= Html::encode($this->title) ?></p>

        <?php $form = ActiveForm::begin([
            'id'                     => 'login-form',
            'enableAjaxValidation'   => true,
            'enableClientValidation' => false,
            'validateOnBlur'         => false,
            'validateOnType'         => false,
            'validateOnChange'       => false,
        ]) ?>

        <?php if ($module->debug): ?>
            <?= $form->field($model, 'login', [
                'inputOptions' => [
                    'autofocus' => 'autofocus',
                    'class'     => 'form-control',
                    'tabindex'  => '1']])->dropDownList(LoginForm::loginList());
            ?>

        <?php else: ?>

            <?= $form->field($model, 'login',
                ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]
            );
            ?>

        <?php endif ?>

        <?php if ($module->debug): ?>
            <div class="alert alert-warning">
                <?= Yii::t('user', 'Password is not necessary because the module is in DEBUG mode.'); ?>
            </div>
        <?php else: ?>
            <?= $form->field(
                $model,
                'password',
                ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])
                ->passwordInput()
                ->label(
                    Yii::t('user', 'Password')
                    . ($module->enablePasswordRecovery ?
                        ' (' . Html::a(
                            Yii::t('user', 'Забыли пароль?'),
                            ['/user/recovery/request'],
                            ['tabindex' => '5']
                        )
                        . ')' : '')
                ) ?>
        <?php endif ?>

        <?= $form->field($model, 'rememberMe', ['options' => ['class' => 'form-group field-login-form-rememberme icheck']])->checkbox(['tabindex' => '3']) ?>

        <?= Html::submitButton(
            Yii::t('user', 'Войти'),
            ['class' => 'btn btn-flat btn-primary btn-block', 'tabindex' => '4']
        ) ?>

        <?php ActiveForm::end(); ?>

        <?php if ($module->enableConfirmation): ?>
            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
            </p>
        <?php endif ?>
        <?php if ($module->enableRegistration): ?>
            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
            </p>
        <?php endif ?>
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
    </div>
</div>
