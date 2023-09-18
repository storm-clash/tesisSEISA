<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $this         yii\web\View
 * @var $searchModel  \Da\User\Search\PermissionSearch
 */
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = Yii::t('usuario', 'Permissions');
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $this->beginContent('@Da/User/resources/views/shared/admin_layout.php') ?>
<div class="card">
    <div class="card-header card-header-warning">
        <h4 class="card-title"><?=$this->title?></h4>
        <p class="card-category">Registro de Permisos del Sistema</p>
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
                'attribute' => 'rule_name',
                'header' => Yii::t('usuario', 'Rule name'),
                'options' => [
                    'style' => 'width: 20%',
                ],
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, $model) {
                    return Url::to(['/user/permission/' . $action, 'name' => $model['name']]);
                },
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