<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restaurant".
 *
 * @property integer $id
 * @property string $name
 * @property integer $restaurant_status_id
 *
 * @property FoodItems[] $foodItems
 * @property RestaurantStatus $restaurantStatus
 * @property RestaurantHasCategory[] $restaurantHasCategories
 * @property Category[] $categories
 * @property RestaurantHasContactNum[] $restaurantHasContactNums
 * @property ContactNum[] $contactNums
 * @property RestaurantHasFeedback[] $restaurantHasFeedbacks
 * @property Feedback[] $feedbacks
 */
class Restaurant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'restaurant_status_id'], 'required'],
            [['restaurant_status_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['name'], 'unique'],
            [['restaurant_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => RestaurantStatus::className(), 'targetAttribute' => ['restaurant_status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'restaurant_status_id' => 'Restaurant Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoodItems()
    {
        return $this->hasMany(FoodItems::className(), ['restaurant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantStatus()
    {
        return $this->hasOne(RestaurantStatus::className(), ['id' => 'restaurant_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantHasCategories()
    {
        return $this->hasMany(RestaurantHasCategory::className(), ['restaurant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('restaurant_has_category', ['restaurant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantHasContactNums()
    {
        return $this->hasMany(RestaurantHasContactNum::className(), ['restaurant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactNums()
    {
        return $this->hasMany(ContactNum::className(), ['id' => 'contact_num_id'])->viaTable('restaurant_has_contact_num', ['restaurant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantHasFeedbacks()
    {
        return $this->hasMany(RestaurantHasFeedback::className(), ['restaurant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['id' => 'feedback_id'])->viaTable('restaurant_has_feedback', ['restaurant_id' => 'id']);
    }
}
