<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property double $total_amt
 * @property string $timestamp
 * @property string $tracking_number
 * @property integer $delivery_status_id
 * @property integer $user_id
 * @property integer $user_user_type_id
 *
 * @property DeliveryStatus $deliveryStatus
 * @property User $user
 * @property OrderHasFoodItems[] $orderHasFoodItems
 * @property FoodItems[] $foodItems
 * @property Penalty[] $penalties
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_amt', 'timestamp', 'tracking_number', 'delivery_status_id', 'user_id', 'user_user_type_id'], 'required'],
            [['total_amt'], 'number'],
            [['timestamp'], 'safe'],
            [['delivery_status_id', 'user_id', 'user_user_type_id'], 'integer'],
            [['tracking_number'], 'string', 'max' => 45],
            [['tracking_number'], 'unique'],
            [['delivery_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryStatus::className(), 'targetAttribute' => ['delivery_status_id' => 'id']],
            [['user_id', 'user_user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id', 'user_user_type_id' => 'user_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total_amt' => 'Total Amt',
            'timestamp' => 'Timestamp',
            'tracking_number' => 'Tracking Number',
            'delivery_status_id' => 'Delivery Status ID',
            'user_id' => 'User ID',
            'user_user_type_id' => 'User User Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryStatus()
    {
        return $this->hasOne(DeliveryStatus::className(), ['id' => 'delivery_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id', 'user_type_id' => 'user_user_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderHasFoodItems()
    {
        return $this->hasMany(OrderHasFoodItems::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoodItems()
    {
        return $this->hasMany(FoodItems::className(), ['id' => 'food_items_id', 'restaurant_id' => 'food_items_restaurant_id'])->viaTable('order_has_food_items', ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenalties()
    {
        return $this->hasMany(Penalty::className(), ['order_id' => 'id', 'order_delivery_status_id' => 'delivery_status_id']);
    }
}
