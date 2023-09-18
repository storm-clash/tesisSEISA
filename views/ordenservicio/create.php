<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordenservicio */

//$this->title = 'Create Ordenservicio';
$this->params['breadcrumbs'][] = ['label' => 'Ordenservicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordenservicio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
