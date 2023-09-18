<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClasificarEntidad */

//$this->title = 'Create Clasificar Entidad';
$this->params['breadcrumbs'][] = ['label' => 'Clasificar Entidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificar-entidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
