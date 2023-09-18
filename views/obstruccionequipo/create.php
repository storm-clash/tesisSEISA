<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Obstruccionequipo */

//$this->title = 'Create Obstruccionequipo';
$this->params['breadcrumbs'][] = ['label' => 'Obstruccionequipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obstruccionequipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
