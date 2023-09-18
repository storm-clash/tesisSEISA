<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Altura */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="altura-view">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Altura</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Atras', ['index'], ['class' => 'btn btn-danger'])?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nombre',
            'niveles',
            'ponderacion',
            'puntuacion',
            //'altura',
        ],
    ]) ?>
            </div>
        </div>
    </div>
</div>
</div>
