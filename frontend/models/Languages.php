<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $id
 * @property string $lang_name
 *
 * @property CityLang[] $cityLangs
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_name'], 'required'],
            [['lang_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang_name' => 'Lang Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityLangs()
    {
        return $this->hasMany(CityLang::className(), ['lang_id' => 'id']);
    }
}
