<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Equipos_Has_ProveedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipos  Has  Proveedors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos--has--proveedor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Equipos  Has  Proveedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'equipos_idequipos',
            'proveedor_idproveedor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
