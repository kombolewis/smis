<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'SMIS';
?>
<div class="px-4 py-5 my-5 text-center">
<!--    <img class="d-block mx-auto mb-4" src="https://via.placeholder.com/250x100/5cccf3/FFFFFF?text=Logo" alt="Logo">-->
    <div class="col-lg-6 mx-auto rounded pt-4 pb-3 px-5 bg-light border">
        <img class="mb-2 logo" src="/img/ndu-arms.png" alt="Logo">
        <h3 class="display-7 fw-bold">Student Management Information System</h3>
        <p class="lead mb-4 fw-bold">The student management information system (SMIS) is a web-based application that assists students, staff and administrators with managing their academic records</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <?= Html::a('Log In to Proceed',['/login'],['class'=>'btn btn-info btn-lg px-4 gap-3 fw-bold text-white'])?>
        </div>
    </div>
</div>

<?php
$this->registerCss(
<<<CSS

body{
    background-image: url('/img/ndu-model.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    padding-top: 70px !important;
}
CSS
);