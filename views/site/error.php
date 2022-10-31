<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */

/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="d-flex h-100 text-center bg-light" style="padding-top:20vh">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <main class="px-3">
            <div class="alert alert-danger">
                <?= nl2br(Html::encode($message)) ?>
            </div>
            <p class="lead">
                The above error occurred while the Web server was processing your request.
            </p>
            <p class="lead">
                Please contact us if you think this is a server error. Thank you.
            </p>
        </main>

    </div>


</div>