<?php
/**
 * @package    yiisoft\yii2
 * @subpackage lisi4ok\yii2-auditlog
 * @author     Nikola Haralamov <lisi4ok@gmail.com>
 * @since      2.0.6
 */

namespace lisi4ok\auditlog\behaviors;

use Exception;
use DateTime;
use Yii;
use yii\base\Behavior;
use yii\base\Application;
use yii\db\BaseActiveRecord;
use lisi4ok\auditlog\models\AuditLog;

class LoggableBehavior extends Behavior
{
	const ACTION_FIND = 'find';
	const ACTION_INSERT = 'insert';
	const ACTION_UPDATE = 'update';
	const ACTION_DELETE = 'delete';

	public $ignoredAttributes = [];
	public $ignorePrimaryKey = false;
	public $ignorePrimaryKeyForActions = [];

	public $dateTimeFormat = 'Y-m-d H:i:s';

	private static $_oldAttributes;
	private static $_newAttributes;

	public function events()
	{
		return [
			BaseActiveRecord::EVENT_AFTER_FIND => 'afterFind',
			BaseActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
			BaseActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
			BaseActiveRecord::EVENT_AFTER_UPDATE => 'afterUpdate',
			BaseActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
		];
	}

	public function afterFind()
	{
	}

	public function afterInsert()
	{
		$auditLog = new AuditLog;
		$dateTime = new DateTime;
		$this->setNewAttributes($this->owner->attributes);
		$newAttributes = $this->getNewAttributes();
		if ($this->ignorePrimaryKey == true && is_array($this->ignorePrimaryKeyForActions))
		{
			if (empty($this->ignorePrimaryKeyForActions))
			{
				if (is_array($this->owner->tableSchema->primaryKey) && array_key_exists(0, $this->owner->tableSchema->primaryKey))
				{
					unset($newAttributes[$this->owner->tableSchema->primaryKey[0]]);
				}
			}
			elseif (in_array(self::ACTION_INSERT, $this->ignorePrimaryKeyForActions))
			{
				if (is_array($this->owner->tableSchema->primaryKey) && array_key_exists(0, $this->owner->tableSchema->primaryKey))
				{
					unset($newAttributes[$this->owner->tableSchema->primaryKey[0]]);
				}
			}
		}
		foreach ($this->ignoredAttributes as $ignoredAttribute)
		{
			if (array_key_exists($ignoredAttribute, $newAttributes))
			{
				unset($newAttributes[$ignoredAttribute]);
			}
		}
		$classNamePath = explode('\\', $this->owner->className());
		$auditLog->model = end($classNamePath);
		$auditLog->action = self::ACTION_INSERT;
		$auditLog->old = null;
		$auditLog->new = json_encode($newAttributes);
		$auditLog->at = $dateTime->format($this->dateTimeFormat);
		$auditLog->by = $this->getUserId();
		if ($auditLog->save())
		{
			$this->normalizeNewAttributes();
		}
	}

	public function beforeUpdate()
	{
		$this->normalizeOldAttributes();
		$this->setOldAttributes($this->owner->getOldAttributes());
	}

	public function afterUpdate()
	{
		$auditLog = new AuditLog;
		$dateTime = new DateTime;
		$oldAttributes = $this->getOldAttributes();
		$this->setNewAttributes($this->owner->attributes);
		$newAttributes = $this->getNewAttributes();
		if ($this->ignorePrimaryKey == true && is_array($this->ignorePrimaryKeyForActions))
		{
			if (empty($this->ignorePrimaryKeyForActions))
			{
				if (is_array($this->owner->tableSchema->primaryKey) && array_key_exists(0, $this->owner->tableSchema->primaryKey))
				{
					unset($oldAttributes[$this->owner->tableSchema->primaryKey[0]]);
					unset($newAttributes[$this->owner->tableSchema->primaryKey[0]]);
				}
			}
			elseif (in_array(self::ACTION_UPDATE, $this->ignorePrimaryKeyForActions))
			{
				if (is_array($this->owner->tableSchema->primaryKey) && array_key_exists(0, $this->owner->tableSchema->primaryKey))
				{
					unset($oldAttributes[$this->owner->tableSchema->primaryKey[0]]);
					unset($newAttributes[$this->owner->tableSchema->primaryKey[0]]);
				}
			}
		}
		foreach ($this->ignoredAttributes as $ignoredAttribute)
		{
			if (array_key_exists($ignoredAttribute, $oldAttributes))
			{
				unset($oldAttributes[$ignoredAttribute]);
			}
			if (array_key_exists($ignoredAttribute, $newAttributes))
			{
				unset($newAttributes[$ignoredAttribute]);
			}
		}
		$classNamePath = explode('\\', $this->owner->className());
		$auditLog->model = end($classNamePath);
		$auditLog->action = self::ACTION_UPDATE;
		$auditLog->old = json_encode($oldAttributes);
		$auditLog->new = json_encode($newAttributes);
		$auditLog->at = $dateTime->format($this->dateTimeFormat);
		$auditLog->by = $this->getUserId();
		if ($auditLog->save())
		{
			$this->normalizeNewAttributes();
			$this->normalizeOldAttributes();
		}
	}

	public function beforeDelete()
	{
		$auditLog = new AuditLog;
		$dateTime = new DateTime;
		$this->setOldAttributes($this->owner->attributes);
		$oldAttributes = $this->getOldAttributes();
		if ($this->ignorePrimaryKey == true && is_array($this->ignorePrimaryKeyForActions))
		{
			if (empty($this->ignorePrimaryKeyForActions))
			{
				if (is_array($this->owner->tableSchema->primaryKey) && array_key_exists(0, $this->owner->tableSchema->primaryKey))
				{
					unset($newAttributes[$this->owner->tableSchema->primaryKey[0]]);
				}
			}
			elseif (in_array(self::ACTION_DELETE, $this->ignorePrimaryKeyForActions))
			{
				if (is_array($this->owner->tableSchema->primaryKey) && array_key_exists(0, $this->owner->tableSchema->primaryKey))
				{
					unset($newAttributes[$this->owner->tableSchema->primaryKey[0]]);
				}
			}
		}
		foreach ($this->ignoredAttributes as $ignoredAttribute)
		{
			if (array_key_exists($ignoredAttribute, $oldAttributes))
			{
				unset($oldAttributes[$ignoredAttribute]);
			}
		}
		$classNamePath = explode('\\', $this->owner->className());
		$auditLog->model = end($classNamePath);
		$auditLog->action = self::ACTION_DELETE;
		$auditLog->old = json_encode($oldAttributes);
		$auditLog->new = null;
		$auditLog->at = $dateTime->format($this->dateTimeFormat);
		$auditLog->by = $this->getUserId();
		if ($auditLog->save())
		{
			$this->normalizeOldAttributes();
		}
	}

	public function getUserId()
	{
		if (Yii::$app instanceof Application && Yii::$app->user)
		{
			return Yii::$app->user->id;
		}
		else
		{
			return null;	
		}
	}

	public function getNewAttributes()
	{
		return self::$_newAttributes;
	}

	public function setNewAttributes($attributes)
	{
		self::$_newAttributes = $attributes;
	}

	public function normalizeNewAttributes()
	{
		self::$_newAttributes = null;
	}

	public function getOldAttributes()
	{
		return self::$_oldAttributes;
	}

	public function setOldAttributes($attributes)
	{
		self::$_oldAttributes = $attributes;
	}

	public function normalizeOldAttributes()
	{
		self::$_oldAttributes = null;
	}
}