<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $id_email
 * @property string $receiver_email
 * @property string $subject
 * @property string $content
 * @property string $attachment
 * @property int $id
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receiver_email', 'subject', 'content', 'id'], 'required'],
            [['content'], 'string','max'=>300],
            [['receiver_email'], 'email'],
            [['id'], 'integer'],
            [['receiver_email'], 'string', 'max' => 200],
            [['subject', 'attachment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_email' => 'Id Email',
            'receiver_email' => 'Para',
            'subject' => 'Asunto',
            'content' => 'Contenido',
            'attachment' => 'Adjunto',
            'id' => 'ID',
        ];
    }
}
