<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Emails */

$this->title = 'Update Emails: ' . $model->id_email;
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_email, 'url' => ['view', 'id' => $model->id_email]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
