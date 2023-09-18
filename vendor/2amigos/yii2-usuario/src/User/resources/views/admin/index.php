<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use kartik\export\ExportMenu;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
use yii\bootstrap4\LinkPager;

/**
 * @var $this         yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel  Da\User\Search\UserSearch
 * @var $module       Da\User\Module
 */

$this->title = Yii::t('usuario', 'Manage users');
$this->params['breadcrumbs'][] = $this->title;

$module = Yii::$app->getModule('user');
?>
<div class="card">
    <div class="card-header card-header-warning">
        <h4 class="card-title"><?=$this->title?></h4>
        <p class="card-category">Registro de Usuarios</p>
    </div>
    <div class="card-body" style="padding: 15px">
        <div class="p-3">
<?php $this->beginContent('@Da/User/resources/views/shared/admin_layout.php') ?>

<?php Pjax::begin() ?>
<?php
$gridColumns=[
    // 'id',
    'clienteIdcliente.nombreCliente',
    'tipoSistemaSeguridad.nombre',
    //  'ponderacion',
    // 'puntacion',
];
echo ExportMenu::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>$gridColumns

]);
?>

<?= GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager'=>[
                'firstPageLabel'=>'Primero',
            'lastPageLabel'=>'Ultimo',
           'prevPageLabel'=>'<div style="borde:none" class="fas fa-menu-left"></div>',
            'options'=>['class'=>'pagination pagination-primary'],

        ],
        'layout' => "{items}\n{pager}",
        'columns' => [
           // 'username',
            [
                'attribute'=>'username',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            'email:email',
            [
                'attribute' => 'registration_ip',
                'value' => function ($model) {
                    return $model->registration_ip == null
                        ? '<span class="not-set">' . Yii::t('usuario', '(not set)') . '</span>'
                        : $model->registration_ip;
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    if (extension_loaded('intl')) {
                        return Yii::t('usuario', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);
                    }

                    return date('Y-m-d G:i:s', $model->created_at);
                },
            ],
            [
                'attribute' => 'last_login_at',
                'value' => function ($model) {
                    if (!$model->last_login_at || $model->last_login_at == 0) {
                        return Yii::t('usuario', 'Never');
                    } elseif (extension_loaded('intl')) {
                        return Yii::t('usuario', '{0, date, MMMM dd, YYYY HH:mm}', [$model->last_login_at]);
                    } else {
                        return date('Y-m-d G:i:s', $model->last_login_at);
                    }
                },
            ],
            [
                'header' => Yii::t('usuario', 'Confirmation'),
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'value' => function ($model) {
                    if ($model->isConfirmed) {
                        return '<div class="text-center">
                                <span class="text-success">' . Yii::t('usuario', 'Confirmed') . '</span>
                            </div>';
                    }

                    return Html::a(
                        Yii::t('usuario', 'Confirm'),
                        ['confirm', 'id' => $model->id],
                        [
                            'class' => 'btn btn-xs btn-success btn-block',
                            'data-method' => 'post',
                            'data-confirm' => Yii::t('usuario', 'Are you sure you want to confirm this user?'),
                        ]
                    );
                },
                'format' => 'raw',
                'visible' => Yii::$app->getModule('user')->enableEmailConfirmation,
            ],

            [
                'header' => Yii::t('usuario', 'Block status'),
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'value' => function ($model) {
                    if ($model->isBlocked) {
                        return Html::a(
                            Yii::t('usuario', 'Unblock'),
                            ['block', 'id' => $model->id],
                            [
                                'class' => 'btn btn-xs btn-success btn-block',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('usuario', 'Are you sure you want to unblock this user?'),
                            ]
                        );
                    }

                    return Html::a(
                        Yii::t('usuario', 'Block'),
                        ['block', 'id' => $model->id],
                        [
                            'class' => 'btn btn-xs btn-danger btn-block',
                            'data-method' => 'post',
                            'data-confirm' => Yii::t('usuario', 'Are you sure you want to block this user?'),
                        ]
                    );
                },
                'format' => 'raw',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Acciones',
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'template' => '{switch} {reset} {force-password-change} {update} {delete}',
                'buttons' => [
                    'switch' => function ($url, $model) use ($module) {
                        if ($model->id != Yii::$app->user->id && $module->enableSwitchIdentities) {
                            return Html::a(
                                '<span class="fas fa-user"></span>',
                                ['/user/admin/switch-identity', 'id' => $model->id],
                                [
                                    'title' => Yii::t('usuario', 'Impersonate this user'),
                                    'data-confirm' => Yii::t(
                                        'usuario',
                                        'Are you sure you want to switch to this user for the rest of this Session?'
                                    ),
                                    'data-method' => 'POST',
                                ]
                            );
                        }

                        return null;
                    },
                    'update' => function ($url, $model) use ($module) {
                        if ($model->id != Yii::$app->user->id && $module->id) {
                            return Html::a(
                                '<span class="fas fa-pencil-alt"></span>',
                                ['/user/admin/update', 'id' => $model->id],
                                [
                                    'title' => Yii::t('usuario', 'Update'),
                                    'data-confirm' => Yii::t(
                                        'usuario',
                                        'Seguro desea actualizar este usuario?'
                                    ),
                                    'data-method' => 'POST',
                                ]
                            );
                        }

                        return null;
                    },

                    'reset' => function ($url, $model) use ($module) {
                        if($module->allowAdminPasswordRecovery) {
                            return Html::a(
                                '<span class="fas fa-flash"></span>',
                                ['/user/admin/password-reset', 'id' => $model->id],
                                [
                                    'title' => Yii::t('usuario', 'Send password recovery email'),
                                    'data-confirm' => Yii::t(
                                        'usuario',
                                        'Are you sure you wish to send a password recovery email to this user?'
                                    ),
                                    'data-method' => 'POST',
                                ]
                            );
                        }

                        return null;
                    },
                    'force-password-change' => function ($url, $model) use ($module) {
                        if (is_null($module->maxPasswordAge)) {

                            return Html::a(
                                '<span class="fas fa-time"></span>',
                                ['/user/admin/force-password-change', 'id' => $model->id],
                                [
                                    'title' => Yii::t('usuario', 'Force password change at next login'),
                                    'data-confirm' => Yii::t(
                                        'usuario',
                                        'Are you sure you wish the user to change their password at next login?'
                                    ),
                                    'data-method' => 'POST',
                                ]
                            );
                        }
                        return null;
                    },
                ]
            ],
        ],

    ]
); ?>

<?php Pjax::end() ?>

<?php $this->endContent() ?>
        </div>
    </div>
</div>
</div>