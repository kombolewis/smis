<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;

$pre_header = Yii::$app->controller->module->id;
$pre_header = str_replace('-',' ',$pre_header);
$pre_header = ucwords($pre_header);
?>

    <header class="navbar text-white border-bottom sticky-top bg-dark flex-md-nowrap p-0 shadow" style="background-color: #d82323 !important;">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white" href="/"><?=Yii::$app->params['sysName'] ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="form-control form-control-dark w-100"><?= $pre_header . ': ' . $this->title?></span>
<!--        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <?= Html::a('Sign Out  <i class="bi bi-box-arrow-right"></i>', ['/logout'], [
                    'class' => 'nav-link px-3 text-white',
                    'data' => [
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </header>

<?php
$this->registerCss(
<<<CSS

body {
  font-size: .875rem;
}

/*.feather {*/
/*  width: 16px;*/
/*  height: 16px;*/
/*  vertical-align: text-bottom;*/
/*}*/

/*
 * Navbar
 */

.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: 1rem;
  background-color: rgba(0, 0, 0, .25);
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
}

.navbar .navbar-toggler {
  top: .25rem;
  right: 1rem;
}

.navbar .form-control {
  padding: .75rem 1rem;
  border-width: 0;
  border-radius: 0;
}

.form-control-dark {
  color: #dbf6ff;
  background-color: rgba(255, 255, 255, .1);
  border-color: rgba(255, 255, 255, .1);
}

.form-control-dark:focus {
  border-color: transparent;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
}

CSS

);