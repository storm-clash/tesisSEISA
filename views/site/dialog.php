

<?php


use yii\widgets\ActiveForm;

if($flashes=Yii::$app->session->getAllFlashes())
{
    foreach ($flashes as $key => $message)
    {
        if($key != 'counters')
        {
            ActiveForm::begin(['zii.widgets.jui.CJuiDialog',array(
                'id'=>$key,
                'options'=>array(
                    'show'=>'blind',
                    'hide'=>'explode',
                    'modal'=>'true',
                    //'title'=>$message['title'],
                    'autoOpen'=>true,
                ),
            )]);
            printf('<span class="dialog">%s</span>',$message['content']);
            $this->endWidget('zii.widgets.jui.CJuiDialog');

        }
    }
}
