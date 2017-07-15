<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property string $remark
 * @property string $rating
 *
 * @property FeedbackHasUser[] $feedbackHasUsers
 * @property User[] $users
 * @property RestaurantHasFeedback[] $restaurantHasFeedbacks
 * @property Restaurant[] $restaurants
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['remark', 'rating'], 'required'],
            [['remark', 'rating'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'remark' => 'Remark',
            'rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbackHasUsers()
    {
        return $this->hasMany(FeedbackHasUser::className(), ['feedback_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('feedback_has_user', ['feedback_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantHasFeedbacks()
    {
        return $this->hasMany(RestaurantHasFeedback::className(), ['feedback_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurants()
    {
        return $this->hasMany(Restaurant::className(), ['id' => 'restaurant_id'])->viaTable('restaurant_has_feedback', ['feedback_id' => 'id']);
    }
}
