<?php

/* @var $this yii\web\View */
/* @var $STUDENT_ID int */
/* @var $model Student */

use app\models\generated\Student;
use app\modules\studentRecords\components\StudentTabs;
use kartik\tabs\TabsX;
use Stidges\CountryFlags\CountryFlag;
use yii\helpers\Url;

$this->title = $model->SURNAME . ' ' . $model->OTHER_NAMES;
$this->params['breadcrumbs'][] = ['label' => 'Student Records', 'url' => ['/student-records']];
$this->params['breadcrumbs'][] = ['label' => 'Utilities',];
$this->params['breadcrumbs'][] = ['label' => 'Search', 'url' => ['/student-records/utility/student-search']];
$this->params['breadcrumbs'][] = $this->title;

$items = [
    [
        'label' => '<i class="bi bi-person-dash"></i> Personal Info',
        'content' => '<div class="text-primary fs-5 fw-bold"></div>',
        'options' => ['id' => 't-student'],
        'linkOptions' => ['data-url' => Url::to(['student/personal-info', 'id' => $STUDENT_ID,'view'=>true])],
    ],
];

?>
    <div class="bg-primary bg-opacity-10 border-primary border border-2 border-opacity-25 rounded">
        <div class="d-flex flex-md-row justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <div class="p-md-2 fs-1">
                    <img src="<?= $model->avatar() ?>"
                         style="width: 60px;" alt="Profile" class="rounded stdn-avtr" />
                </div>
                <div class="p-md-2 p-1">
                    <h5 class="stdn-name"><?= $model->SURNAME . ' ' . $model->OTHER_NAMES; ?></h5>
                    <div class="stdn-sponsor text-muted"><?= $model->sponsor->SPONSOR_NAME ?></div>
                </div>
            </div>
            <div class="d-flex flex-column">

                <h5>Blood Group</h5>
                <div class="text-danger">
                    <i class="fa-solid fa-droplet"></i>
                    <span class="stdn-blood"><?= $model->BLOOD_GROUP ?></span>
                </div>
            </div>
            <div class="d-flex flex-column">
                <h5>Contact</h5>
                <div class="text-muted">
                    <i class="bi bi-phone-flip text-primary p-1 rounded-circle"></i>
                    +254-000-123-456
                </div>

            </div>
            <div class="rounded p-lg-2 p-1">
                <div class="d-flex flex-md-row align-items-center">
                    <div class="d-flex flex-column align-items-center px-lg-3 px-md-2 px-1" id="border-right">
                        <div class="h5" id="count">Nationality</div>
                        <p class="h5 text-success stdn-nationality">
                            <?= (new CountryFlag)->get($model->nationality->CODE2) . ' ' . $model->nationality->NATIONALITY ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?=StudentTabs::main($items,[
                'position'=>TabsX::POS_LEFT,
                'sideways'=>true,
            ])
            ?>
        </div>
    </div>

