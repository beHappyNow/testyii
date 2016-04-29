<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property integer $id
 * @property string $city_name
 * @property integer $country_id
 *
 * @property Countries $country
 * @property CityLang[] $cityLangs
 */
class TestCity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_name', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['city_name'], 'string', 'max' => 64],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_name' => 'City Name',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Languages::className(), ['id' => 'city_id'])
            ->viaTable('city_lang', ['lang_id' => 'id']);
    }
}
