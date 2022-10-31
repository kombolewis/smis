<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use kartik\alert\AlertBlock;
use yii\bootstrap5\BootstrapIconAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);

BootstrapPluginAsset::register($this);
BootstrapIconAsset::register($this);
\app\assets\FontAwesomeAsset::register($this);
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

    <style>

        @media (min-width: 768px) {
        }
    </style>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<main>
    <nav class="d-print-none " style="background-color: #d82323;">
        <header class="py-3 border-bottom">
            <div class="container-fluid d-flex justify-content-between fs-5" style="grid-template-columns: 1fr 1fr;">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none fw-1 text-white">
                    SMIS
                </a>

                <div class="d-flex justify-content-end">
                    <div class="flex-shrink-0 dropdown w-100 me-3">
                        <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-tie"></i> <?=Yii::$app->user->identity->username?>
                        </a>
                        <ul class="dropdown-menu text-small shadow">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <?= Html::a('<i class="fa-solid fa-right-from-bracket"></i> Sign out', ['/logout'], [
                                    'class' => 'dropdown-item',
                                    'data' => [
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </nav>
    <div class="bg-white my-2 d-print-none ">
        <?= Breadcrumbs::widget([
            'links' => $this->params['breadcrumbs'] ?? [],
            'options' => ['class'=>'mx-3 my-1'],
        ]) ?>
    </div>
    <div class="container-fluid">
        <div class="content-container bg-white border-radius px-1 py-2">
            <?=
            AlertBlock::widget([
                'useSessionFlash' => true,
                'type' => AlertBlock::TYPE_ALERT
            ]);
            ?>
            <?= $content ?>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3 text-light font-weight-bold d-print-none " style="background-color: #13185A">
    <div class="container ">
        <span class="float-start">&copy;<?= Yii::$app->params['orgName'] ?> | PRUDENTIA, EXCELLENCIA ET OPERA</span>
        <span class="float-end"><?= date('Y') ?></span>
    </div>
</footer>

<?php
$img = Url::to('/img/topography.svg');
$this->registerCss(
    css: <<<CSS
body{
background-color: #dbf6ff;
background-image: url('$img');
}
label.lip-placeholder{
    color:#999 !important;
}
CSS
);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
