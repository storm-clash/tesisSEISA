<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property string $unconfirmed_email
 * @property string $registration_ip
 * @property int $flags
 * @property int $confirmed_at
 * @property int $blocked_at
 * @property int $updated_at
 * @property int $created_at
 * @property int $last_login_at
 * @property string $last_login_ip
 * @property string $auth_tf_key
 * @property int $auth_tf_enabled
 * @property int $password_changed_at
 * @property int $gdpr_consent
 * @property int $gdpr_consent_date
 * @property int $gdpr_deleted
 *
 * @property Profile $profile
 * @property SocialAccount[] $socialAccounts
 * @property Token[] $tokens
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'auth_key', 'updated_at', 'created_at'], 'required'],
            [['flags', 'confirmed_at', 'blocked_at', 'updated_at', 'created_at', 'last_login_at', 'auth_tf_enabled', 'password_changed_at', 'gdpr_consent', 'gdpr_consent_date', 'gdpr_deleted'], 'integer'],
            [['username', 'email', 'unconfirmed_email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
            [['registration_ip', 'last_login_ip'], 'string', 'max' => 45],
            [['auth_tf_key'], 'string', 'max' => 16],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'unconfirmed_email' => 'Unconfirmed Email',
            'registration_ip' => 'Registration Ip',
            'flags' => 'Flags',
            'confirmed_at' => 'Confirmed At',
            'blocked_at' => 'Blocked At',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'last_login_at' => 'Last Login At',
            'last_login_ip' => 'Last Login Ip',
            'auth_tf_key' => 'Auth Tf Key',
            'auth_tf_enabled' => 'Auth Tf Enabled',
            'password_changed_at' => 'Password Changed At',
            'gdpr_consent' => 'Gdpr Consent',
            'gdpr_consent_date' => 'Gdpr Consent Date',
            'gdpr_deleted' => 'Gdpr Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialAccounts()
    {
        return $this->hasMany(SocialAccount::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens()
    {
        return $this->hasMany(Token::className(), ['user_id' => 'id']);
    }
}
