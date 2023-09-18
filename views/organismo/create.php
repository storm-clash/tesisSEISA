<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Organismo */

$this->title = 'Create Organismo';
$this->params['breadcrumbs'][] = ['label' => 'Organismos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organismo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
