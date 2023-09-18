<?php

use yii\bootstrap4\Alert; ?>
<div>
    <?= yii\bootstrap4\Alert::widget(
        [
            'options' => [
                'class' => 'alert-danger alert-dismissible',
            ],
            'body' => Yii::t('usuario', 'Si no tiene permiso para visualizar esta página, Contacte con el administrador de la web, Gracias'),
        ]
    ) ?>

    <?=\yii\helpers\Html::img('/img/denegado.jpg',['width'=>'100%'])?>


    
</div>
