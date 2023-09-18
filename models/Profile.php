<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "profile".
 *
 * @property int $user_id
 * @property string $name
 * @property string $public_email
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $location
 * @property string $website
 * @property string $timezone
 * @property string $bio
 *
 * @property User $user
 */


class Profile extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['bio'], 'string'],
            [['name', 'public_email', 'gravatar_email', 'website'], 'string', 'max' => 255],
            [['gravatar_id'], 'string', 'max' => 32],
            [['location'], 'string', 'max' => 60],
            [['timezone'], 'string', 'max' => 40],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'name' => 'Name',
            'public_email' => 'Public Email',
            'gravatar_email' => 'Gravatar Email',
            'gravatar_id' => 'Gravatar ID',
            'location' => 'Location',
            'website' => 'Website',
            'timezone' => 'Timezone',
            'bio' => 'Bio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function combo($prov,$id){
        return Profile::find()->Where(['location'=>$prov])->andwhere(['user_id'=>$id])->all();
    }
    public static function comboXprovincia($provincia,$id){
        return ArrayHelper::map(self::find()->where(['location'=>$provincia])->andWhere(['user_id'=>$id])->all(),'user_id','name');
    }

    public function comboJefe($prov){
        return Profile::find()->where(['location'=>$prov])->all();
    }

}

