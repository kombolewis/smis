<?php

/** @var yii\web\View $this */

/** @var $model Student */
/** @var $canEdit bool Check if to enable editing */

use app\models\generated\Country;
use app\models\generated\Sponsor;
use app\models\generated\Student;
use kartik\editable\Editable;
use Stidges\CountryFlags\CountryFlag;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$flag = new CountryFlag;
$countries = ArrayHelper::map(Country::find()->asArray()->all(), 'CODE',
    function ($d) use ($flag) {
        $d = (object)$d;
        return $flag->get($d->CODE2) . ' ' . $d->NATIONALITY;
    });
$sponsors = ArrayHelper::map(Sponsor::find()->asArray()->all(), 'SPONSOR_ID', 'SPONSOR_NAME');
$cnf = Yii::$app->params;

$bloodGrp = array_combine($cnf['bloodGrp'], $cnf['bloodGrp']);

$Uurl = Url::to(['personal-info', 'id' => $model->STUDENT_ID]);

$nameEdit = function () use($model,$Uurl) {
    $editable = Editable::begin(config: [
        'model' => $model,
        'attribute' => 'SURNAME', 'format' => Editable::FORMAT_BUTTON,
        'showButtonLabels' => true,
        'inputType' => Editable::INPUT_TEXT,
        'inlineSettings' => [
            'templateBefore' => Editable::INLINE_BEFORE_2,
            'templateAfter' => Editable::INLINE_AFTER_2
        ],
        'asPopover' => false, 'formOptions' => ['action' => $Uurl],
        'displayValue' => $model->SURNAME . ' ' . $model->OTHER_NAMES,
        'pluginEvents' => [
            "editableSuccess" => '(event, val, form, data)=>{$(".stdn-name").html(data.output);}',
        ],
    ]);
    $form = $editable->getForm();
    $editable->afterInput =
        '' . $form->field($model, 'OTHER_NAMES')->textInput();
    Editable::end();
};
?>

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <div>
                                <img src="<?= $model->avatar() ?>"
                                     alt="Profile"
                                     class="rounded mx-auto d-block img-fluid stdn-avtr" style="width: 100px;">
                                <?php if ($canEdit): ?>
                                    <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#stdn-photo-upload"
                                            style="position: absolute; bottom: 30%; right: 24%; cursor: pointer;"
                                            class="btn btn-sm btn-outline-secondary kv-editable-button kv-editable-toggle">
                                        <i class="fas fa-pencil-alt"></i></button>
                                <?php endif; ?>

                            </div>
                            <h5 class="stdn-name my-3"><?= $model->SURNAME . ' ' . $model->OTHER_NAMES; ?></h5>
                            <p class="text-muted mb-1"></p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Sponsor</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">

                                        <?= $canEdit ? Editable::widget([
                                            'model' => $model, 'format' => Editable::FORMAT_BUTTON,
                                            'attribute' => 'SPONSOR', 'showButtonLabels' => true,
                                            'displayValueConfig' => $model->sponsor->SPONSOR_NAME,
                                            'displayValue' => $model->sponsor->SPONSOR_NAME,
                                            'asPopover' => false,
                                            'inputType' => Editable::INPUT_SELECT2,
                                            'data' => $sponsors, 'formOptions' => ['action' => $Uurl],
                                            'options' => [
                                                'data' => $sponsors, 'pluginOptions' => ['allowClear' => false, 'placeholder' => 'Choose Sponsor..',],
                                            ],
                                            'pluginEvents' => [
                                                'editableSuccess' => '(event, val, form, data)=>{
                                                $(".stdn-sponsor").html(data.output);
                                            }',
                                            ],
                                        ]) : $model->sponsor->SPONSOR_NAME;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?=$canEdit ? $nameEdit() : $model->SURNAME . ' ' . $model->OTHER_NAMES?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Student Number</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $model->STUDENT_NUMBER ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?= $canEdit ? Editable::widget([
                                            'model' => $model, 'formOptions' => ['action' => $Uurl],
                                            'attribute' => 'GENDER', 'showButtonLabels' => true,
                                            'asPopover' => false, 'format' => Editable::FORMAT_BUTTON,
                                            'inputType' => Editable::INPUT_DROPDOWN_LIST,
                                            'data' => $cnf['gender'],
                                            'options' => ['class' => 'form-control', 'prompt' => 'Select Gender...'],
                                            'displayValueConfig' => [
                                                'M' => '<i class="fa-solid fa-male"></i> MALE',
                                                'F' => '<i class="fa-solid fa-female"></i> FEMALE',
                                            ],
                                        ]) : $cnf['gender'][$model->GENDER];
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Blood Group</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?= $canEdit ? Editable::widget([
                                            'model' => $model, 'format' => Editable::FORMAT_BUTTON,
                                            'attribute' => 'BLOOD_GROUP', 'showButtonLabels' => true,
                                            'asPopover' => false,
                                            'inputType' => Editable::INPUT_SELECT2,
                                            'data' => $bloodGrp, 'formOptions' => ['action' => $Uurl,],
                                            'options' => [
                                                'data' => $bloodGrp,
                                                'pluginOptions' => [
                                                    'allowClear' => true, 'placeholder' => 'Select Blood Group',
                                                ],
                                            ],
                                            'pluginEvents' => [
                                                'editableSuccess' => '(event, val, form, data)=>{
                                                $(".stdn-blood").html(val);
                                            }',
                                            ],
                                        ]) : $model->BLOOD_GROUP??'~';
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nationality</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?= $canEdit ? Editable::widget([
                                            'model' => $model, 'format' => Editable::FORMAT_BUTTON,
                                            'attribute' => 'NATIONALITY', 'showButtonLabels' => true,
                                            'displayValueConfig' => $flag->get($model->nationality->CODE2) . ' ' . $model->nationality->NATIONALITY,
                                            'displayValue' => $flag->get($model->nationality->CODE2) . ' ' . $model->nationality->NATIONALITY,
                                            'asPopover' => false,
                                            'inputType' => Editable::INPUT_SELECT2,
                                            'data' => $countries, 'formOptions' => ['action' => $Uurl,],
                                            'options' => [
                                                'data' => $countries,
                                                'pluginOptions' => [
                                                    'allowClear' => false, 'placeholder' => 'Choose Country..',
                                                ],
                                            ],
                                            'pluginEvents' => [
                                                'editableSuccess' => '(event, val, form, data)=>{
                                                $(".stdn-nationality").html(data.output);
                                            }',
                                            ],
                                        ]) : $flag->get($model->nationality->CODE2) . ' ' . $model->nationality->NATIONALITY;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">National ID No.</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?= $canEdit ? Editable::widget([
                                            'model' => $model, 'format' => Editable::FORMAT_BUTTON,
                                            'attribute' => 'ID_NO', 'showButtonLabels' => true,
                                            'asPopover' => false, 'formOptions' => ['action' => $Uurl],
                                        ]) : $model->ID_NO ?? '~';
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Passport No</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?= $canEdit ? Editable::widget([
                                            'model' => $model, 'format' => Editable::FORMAT_BUTTON,
                                            'attribute' => 'PASSPORT_NO', 'showButtonLabels' => true,
                                            'asPopover' => false, 'formOptions' => ['action' => $Uurl],
                                        ]) : $model->PASSPORT_NO ?? '~';
                                        ?></p>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php


$this->registerCss(
    <<<CSS
.field-student-nationality > .select2-container
{ width: 250px !important;}
CSS

);