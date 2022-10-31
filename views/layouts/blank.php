<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Html;

AppAsset::register($this);
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
<main>
    <?= Alert::widget() ?>
    <?= $content ?>
</main>
<?php
$img = \yii\helpers\Url::to('/img/topography.svg');
$this->registerCss(
    <<<CSS
body{
background-color: #dbf6ff;
/*background-image: url('$img');*/
}
CSS
);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
