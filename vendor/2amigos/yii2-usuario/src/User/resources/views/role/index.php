<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $dataProvider array
 * @var $searchModel  \Da\User\Search\RoleSearch
 * @var $this         yii\web\View
 */

$this->title = Yii::t('usuario', 'Roles');
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $this->beginContent('@Da/User/resources/views/shared/admin_layout.php') ?>
<div class="card">
    <div class="card-header card-header-warning">
        <h4 class="card-title"><?=$this->title?></h4>
        <p class="card-category">Registro de Roles del Sistema</p>
    </div>
    <div class="card-body" style="padding: 15px">
        <div class="p-3">
<?= GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
                'attribute' => 'name',
                'header' => Yii::t('usuario', 'Name'),
                'options' => [
                    'style' => 'width: 20%',
                ],
            ],
            [
                'attribute' => 'description',
                'header' => Yii::t('usuario', 'Description'),
                'options' => [
                    'style' => 'width: 55%',
                ],
            ],

            [
                'class' => ActionColumn::className(),
                'options'=>['class'=>'fa fa-pencil'],
                'template' => '{update} {delete}',
                'buttons'=>[
                    'update'=>function ($url,$model){
                        return Html::a('<span class="fas fa-pencil-alt fa-lg"><span',['update','name'=>$model['name']],[
                            'title'=>Yii::t('app','Editar'),
                        ]);
                    },
                    ],
                'options' => [
                    'style' => 'width: 5%',
                ],
            ],
        ],
    ]
) ?>

<?php $this->endContent() ?>
        </div>
    </div>
</div>