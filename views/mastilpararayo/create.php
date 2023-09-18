<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mastilpararayo */

//$this->title = 'Create Mastilpararayo';
$this->params['breadcrumbs'][] = ['label' => 'Mastilpararayos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mastilpararayo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
