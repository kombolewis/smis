<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\BootstrapIconAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);
BootstrapIconAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SMIS">
    <meta name="author" content="Anthony G., UoN, ICTC">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">-->
<!--    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>-->
<!--    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
<!--    <div class="navbar-nav">-->
<!--        <div class="nav-item text-nowrap">-->
<!--            <a class="nav-link px-3" href="#">Sign out</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</header>-->
<?php
require_once('nav/top-bar.php');
?>

<div class="container-fluid">
    <div class="row">

        <?php require_once('nav/sidebar.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light pb-4">
            <?php
            require_once('nav/breadcrumbs.php');
            ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </main>
    </div>
</div>
<main>

</main>
<?php
$img = Url::to('/img/topography.svg');
$this->registerCss(
<<<CSS
body{
    background-color: #dbf6ff;
    background-image: url('$img');
}
CSS
);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
