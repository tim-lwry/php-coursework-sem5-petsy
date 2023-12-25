<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property int $employee_type_fk
 * @property int $user_id
 *
 * @property Donation[] $donations
 * @property EmployeeType $employeeTypeFk
 * @property Request[] $requests
 * @property User $user
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'employee_type_fk', 'user_id'], 'required'],
            [['employee_type_fk', 'user_id'], 'integer'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['employee_type_fk'], 'exist', 'skipOnError' => true, 'targetClass' => EmployeeType::class, 'targetAttribute' => ['employee_type_fk' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'employee_type_fk' => 'Employee Type Fk',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Donations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonations()
    {
        return $this->hasMany(Donation::class, ['employee_id_fk' => 'id']);
    }

    /**
     * Gets query for [[EmployeeTypeFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeTypeFk()
    {
        return $this->hasOne(EmployeeType::class, ['id' => 'employee_type_fk']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::class, ['employee_id_fk' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
