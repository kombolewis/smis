<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\BootstrapIconAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);

BootstrapPluginAsset::register($this);
BootstrapIconAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SMIS">
    <meta name="author" content="Anthony G., UoN, ICTC">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<main>
    <nav class="border-bottom" style="background-color: #d82323;">
        <header class="py-3 border-bottom">
            <div class="container-fluid d-flex justify-content-between fs-5" style="grid-template-columns: 1fr 1fr;">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none fw-1 text-white">
                    SMIS
                </a>

                <div class="d-flex justify-content-end">
                    <div class="flex-shrink-0 dropdown w-100 me-3">
                        <a href="javascript:void(0);" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-bounding-box"></i> <?=Yii::$app->user->identity->username?>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li>
                                <?= Html::a('Sign Out', ['logout'], [
                                    'class' => 'dropdown-item',
                                    'data' => ['method' => 'post',],
                                ])
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </nav>
    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-white font-weight-bold" style="background-color: #13185A">
    <div class="container ">
        <span class="float-start">&copy;<?=Yii::$app->params['orgName'] ?> | PRUDENTIA, EXCELLENCIA ET OPERA</span>
        <span class="float-end"><?= date('Y') ?></span>
    </div>
</footer>


<?php
$img = Url::to('/img/topography.svg');
$this->registerCss(
    <<<CSS
body{
background-color: #dbf6ff;
background-image: url('$img');
}
.not-active {
     pointer-events: none;
     cursor: not-allowed;
 }
CSS
);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
