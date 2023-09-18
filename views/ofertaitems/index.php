<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfertaitemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ofertaitems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ofertaitems-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ofertaitems', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            'clasificacion',
            'cantXano',
            'precioMN',
            //'precioCUC',
            //'ofertaComercial_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
