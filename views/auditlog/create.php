<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Auditlog */

$this->title = 'Create Auditlog';
$this->params['breadcrumbs'][] = ['label' => 'Auditlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditlog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
