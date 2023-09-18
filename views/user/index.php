<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email:email',
            'password_hash',
            'auth_key',
            //'unconfirmed_email:email',
            //'registration_ip',
            //'flags',
            //'confirmed_at',
            //'blocked_at',
            //'updated_at',
            //'created_at',
            //'last_login_at',
            //'last_login_ip',
            //'auth_tf_key',
            //'auth_tf_enabled',
            //'password_changed_at',
            //'gdpr_consent',
            //'gdpr_consent_date',
            //'gdpr_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
