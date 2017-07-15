<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property string $birthdate
 * @property string $gender
 * @property string $home_address
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property string $password_reset_token
 * @property integer $user_type_id
 *
 * @property FeedbackHasUser[] $feedbackHasUsers
 * @property Feedback[] $feedbacks
 * @property Order[] $orders
 * @property Penalty[] $penalties
 * @property UserType $userType
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'string', 'max' => 100],
            [['last_name', 'first_name', 'birthdate', 'gender', 'home_address', 'username', 'email', 'password', 'salt', 'user_type_id'], 'required'],
            [['birthdate'], 'safe'],
            [['user_type_id'], 'integer'],
            [['last_name', 'first_name'], 'string', 'max' => 90],
            [['middle_name', 'gender', 'username', 'password_reset_token'], 'string', 'max' => 45],
            [['home_address', 'password', 'salt'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'birthdate' => 'Birthdate',
            'gender' => 'Gender',
            'home_address' => 'Home Address',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'salt' => 'Salt',
            'password_reset_token' => 'Password Reset Token',
            'user_type_id' => 'User Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbackHasUsers()
    {
        return $this->hasMany(FeedbackHasUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['id' => 'feedback_id'])->viaTable('feedback_has_user', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['user_id' => 'id', 'user_user_type_id' => 'user_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenalties()
    {
        return $this->hasMany(Penalty::className(), ['user_id' => 'id', 'user_user_type_id' => 'user_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }
}
