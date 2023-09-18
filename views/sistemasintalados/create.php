<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sistemasintalados */

//$this->title = 'Crear Sistemas Intalados';
$this->params['breadcrumbs'][] = ['label' => 'Sistemasintalados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemasintalados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,



    ]) ?>

</div>
