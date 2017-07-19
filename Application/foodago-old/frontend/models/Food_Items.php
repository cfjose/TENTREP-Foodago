<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food_items".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $calorie_count
 * @property integer $restaurant_id
 * @property integer $sub_category_id
 *
 * @property Restaurant $restaurant
 * @property SubCategory $subCategory
 * @property OrderHasFoodItems[] $orderHasFoodItems
 * @property Order[] $orders
 */
class Food_Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'food_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'restaurant_id', 'sub_category_id'], 'required'],
            [['price'], 'number'],
            [['restaurant_id', 'sub_category_id'], 'integer'],
            [['name', 'calorie_count'], 'string', 'max' => 45],
            [['restaurant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['restaurant_id' => 'id']],
            [['sub_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubCategory::className(), 'targetAttribute' => ['sub_category_id' => 'id']],
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
            'price' => 'Price',
            'calorie_count' => 'Calorie Count',
            'restaurant_id' => 'Restaurant ID',
            'sub_category_id' => 'Sub Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurant::className(), ['id' => 'restaurant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategory()
    {
        return $this->hasOne(SubCategory::className(), ['id' => 'sub_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderHasFoodItems()
    {
        return $this->hasMany(OrderHasFoodItems::className(), ['food_items_id' => 'id', 'food_items_restaurant_id' => 'restaurant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id' => 'order_id'])->viaTable('order_has_food_items', ['food_items_id' => 'id', 'food_items_restaurant_id' => 'restaurant_id']);
    }
}
