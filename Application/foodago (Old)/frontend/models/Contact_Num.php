<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_num".
 *
 * @property integer $id
 * @property string $contact_num
 *
 * @property RestaurantHasContactNum[] $restaurantHasContactNums
 * @property Restaurant[] $restaurants
 */
class Contact_Num extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_num';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_num'], 'required'],
            [['contact_num'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contact_num' => 'Contact Num',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantHasContactNums()
    {
        return $this->hasMany(RestaurantHasContactNum::className(), ['contact_num_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurants()
    {
        return $this->hasMany(Restaurant::className(), ['id' => 'restaurant_id'])->viaTable('restaurant_has_contact_num', ['contact_num_id' => 'id']);
    }
}
