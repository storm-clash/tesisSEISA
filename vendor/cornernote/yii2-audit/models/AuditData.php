<?php
/**
 * Extra custom data associated with a specific auditing line. There are currently no guidelines concerning what the name/type
 * needs to be, this is at your own discretion.
 */

namespace bedezign\yii2\audit\models;

/**
 * Class AuditData
 * @package bedezign\yii2\audit\models
 *
 * @property int    $id
 * @property int    $audit_id
 * @property string $name
 * @property string $type
 * @property bool   $packed         true if the associated data has been serialized
 * @property string $data
 */
class AuditData extends AuditModel
{
    // By default we do not serialise values (unless they are complex)
    protected $autoSerialize = false;

    public function setEntry(AuditEntry $entry)
    {
        $this->audit_id = $entry->id;
    }

    public function beforeSave($insert)
    {
        // Only serialize complex values
        if (is_array($this->data) || is_object($this->data)) {
            $this->packed = true;
            $this->autoSerialize = true;
            $this->data = \bedezign\yii2\audit\components\Helper::compact($this->data);
        }
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        $this->autoSerialize = $this->packed;
        parent::afterFind();
    }

    public static function tableName()
    {
        return '{{%audit_data}}';
    }

    /**
     * @return AuditEntry
     */
    public function getEntry()
    {
        return static::hasOne(AuditEntry::className(), ['id' => 'audit_id']);
    }
}