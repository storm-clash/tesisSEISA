<?php

namespace app\models;

use Yii;
use lisi4ok\auditlog\behaviors\LoggableBehavior;

/**
 * This is the model class for table "auditlog".
 *
 * @property int $id
 * @property string $model
 * @property string $action
 * @property string $old
 * @property string $new
 * @property string $at
 * @property int $by
 */
class Auditlog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auditlog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model', 'action'], 'required'],
            [['old', 'new'], 'string'],
            [['at'], 'safe'],
            [['by'], 'integer'],
            [['model', 'action'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'action' => 'Action',
            'old' => 'Old',
            'new' => 'New',
            'at' => 'At',
            'by' => 'By',
        ];
    }
    public function behaviors()
    {
        return [
            [ 'class'=>LoggableBehavior::className(),
                'ignoredAttributes'=>['created_at','updated_at','created_by','updated_by'],
                'ignorePrimaryKey'=>true,
                'ignorePrimaryKeyForActions'=>['insert', 'update'],
                'dateTimeFormat'=>'Y-M-D',
            ],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(),['id'=>'by']);
    }


}
