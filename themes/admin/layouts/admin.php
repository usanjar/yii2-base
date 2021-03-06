<?php

use yii\web\View;
use yii\helpers\Html;
use app\assets\AdminLteAsset;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

/* @var $this View */
/* @var $content string */

AdminLteAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <?= Html::a(
                '<!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"><b>A</b>P</span>
                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>Admin</b>Panel</span>',
                ['/admin/default/dashboard'],
                ['class' => 'logo']
            ) ?>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/"><i class="fa fa-globe"></i></a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl(160) ?>"
                                     class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl(160) ?>"
                                         class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/user/settings/profile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <?= Html::a('Sign out', ['/user/security/logout'], ['class' => 'btn btn-default btn-flat', 'data' => ['method' => 'post']]) ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl(160) ?>" class="img-circle"
                             alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <?php try {
                    echo Menu::widget([
                        'items'        => [
                            [
                                'label'   => Yii::t('app', 'MAIN NAVIGATION'),
                                'options' => ['class' => 'header'],
                            ],
                            [
                                'label' => '<i class="fa fa-language"></i> <span>' . Yii::t('app', 'Translate manager') . '</span>',
                                'url'   => ['/admin/translate/language/list'],
                            ],
                            [
                                'label' => '<i class="fa fa-users"></i> <span>' . Yii::t('app', 'Users') . '</span>',
                                'url'   => ['/admin/user/admin/index'],
                            ],
                        ],
                        'options'      => [
                            'class' => 'sidebar-menu',
                            'data'  => [
                                'widget' => 'tree',
                            ],
                        ],
                        'encodeLabels' => false,
                    ]);
                } catch (\Throwable $e) {
                    echo $e->getMessage();
                } ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <?= $this->params['main_title'] ?? '' ?>
                    <small><?= $this->params['small_title'] ?? '' ?></small>
                </h1>
                <?php try {
                    echo Breadcrumbs::widget([
                        'itemTemplate' => "<li>{link}</li>\n",
                        'homeLink'     => [
                            'label' => '<i class="fa fa-dashboard"></i> ' . Yii::t('app', 'Dashboard'),
                            'url'   => ['/admin/default/dashboard'],
                        ],
                        'encodeLabels' => false,
                        'options'      => [
                            'class' => 'breadcrumb',
                        ],
                        'links'        => $this->params['breadcrumbs'] ?? [],
                    ]);
                } catch (\Throwable $e) {
                    echo $e->getMessage();
                } ?>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Content Header (Page header) -->
                <?= $content ?>
                <!-- /.content -->
            </section>

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="#">Awesome app</a>.</strong> All rights reserved.
        </footer>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>