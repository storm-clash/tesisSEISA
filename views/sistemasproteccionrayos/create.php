<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasproteccionrayos */

$this->title = 'Create Sistemasproteccionrayos';
$this->params['breadcrumbs'][] = ['label' => 'Sistemasproteccionrayos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemasproteccionrayos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
