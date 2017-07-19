<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penalty".
 *
 * @property integer $id
 * @property double $amount
 * @property integer $user_id
 * @property integer $user_user_type_id
 * @property integer $order_id
 * @property integer $order_delivery_status_id
 *
 * @property Order $order
 * @property User $user
 */
class Penalty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penalty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'user_id', 'user_user_type_id', 'order_id', 'order_delivery_status_id'], 'required'],
            [['amount'], 'number'],
            [['user_id', 'user_user_type_id', 'order_id', 'order_delivery_status_id'], 'integer'],
            [['order_id', 'order_delivery_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id', 'order_delivery_status_id' => 'delivery_status_id']],
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
            'amount' => 'Amount',
            'user_id' => 'User ID',
            'user_user_type_id' => 'User User Type ID',
            'order_id' => 'Order ID',
            'order_delivery_status_id' => 'Order Delivery Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id', 'delivery_status_id' => 'order_delivery_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id', 'user_type_id' => 'user_user_type_id']);
    }
}
