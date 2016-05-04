<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%city_lang}}".
 *
 * @property integer $id
 * @property integer $city_id
 * @property integer $lang_id
 *
 * @property Cities $city
 * @property Languages $lang
 */
class CityLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%city_lang}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'lang_id'], 'required'],
            [['id', 'city_id', 'lang_id'], 'integer'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'lang_id' => 'Lang ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Languages::className(), ['id' => 'lang_id']);
    }

    public function __toString()
    {
        return $this->id.'<-->'.$this->lang_id;
    }
}
