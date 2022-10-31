<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class'=>'px-4 py-1 rounded',],
    'fieldConfig' => [
        'template' => '<div class="form-floating">{input}{label}{error}</div>',
        'labelOptions' => ['class' => false, 'tag' => false,],
        'inputOptions' => ['class' => 'form-control', 'tag' => false, 'placeholder' => 'Needed'],
        'errorOptions' => ['class' => 'invalid-feedback'],
    ],
]); ?>

    <img class="mb-2 logo" src="/img/ndu-arms.png" alt="Logo">
    <h1 class="h3 mb-3 fw-normal">Log In</h1>

<?= $form->field($model, 'username', ['options' => ['class' => 'form-floating']])->textInput() ?>
<?= $form->field($model, 'password', ['options' => ['class' => 'form-floating']])->passwordInput() ?>

<!--
<?= $form->field($model, 'rememberMe')->checkbox([
    'template' => "<div class=\"checkbox mb-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
]) ?>
-->

<?= Html::submitButton('Login', ['class' => 'w-100 btn btn-lg btn-primary', 'name' => 'login-button']) ?>
    <p class="mt-1 mb-3"><?= Html::a('Reset Password','javascript:void(0)', ['class' => 'w-100']) ?></p>
    <p class="mt-5 mb-3">&copy; <?= date('Y') ?></p>

<?php ActiveForm::end(); ?>

<?php
$this->registerCss(
    <<<CSS
body{
    background-image: url('/img/ndu-model.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}
.logo{
    height: 90px;
}
.invalid-feedback{
    font-weight: bold;
    text-shadow: 0 0 10px #fff;
}
CSS
);