<?php

namespace app\models;

use Yii;
use \yii\db\Expression;

/**
 * ContactForm is the model behind the contact form.
 */
class Authors extends \yii\db\ActiveRecord
{

	public static function tableName()
    {
        return 'authors';
    }

	public function rules()
	{
		return array(
			array('name', 'required'),
		);
	}

	public static function primaryKey()
    {
        return array('id');
    }
	
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name of author',
        ];
    }

	public function beforeSave($insert)
	{
		if ($this->isNewRecord)
		{
			$this->id = NULL;
			$this->creat = new Expression('NOW()');
		}
		
		$this->upd = new Expression('NOW()');
		return parent::beforeSave($insert);
	}
	
}
