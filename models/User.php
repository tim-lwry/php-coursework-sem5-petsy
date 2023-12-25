<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $role
 * @property string $authKey
 * 
 * @property Client[] $clients
 * @property Employee[] $employees
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role'], 'required'],
            [['username', 'password'], 'string', 'max' => 45],
            [['role'], 'string', 'max' => 25],
            [['authKey'], 'string', 'max' => 200]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'authKey' => 'AuthKey'
        ];
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Client::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::class, ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return User::find()->select('*')->where(['username'=>$username])->one();//static::findOne($username);
        // return $this->hasOne(User::class, ['username' => 'animal_race_fk']);
        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        // return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    public static function getAuthority()
    {
        if(Yii::$app->user->identity==null)
        return 0;
        switch(Yii::$app->user->identity->role){
            case "ADMINISTRATOR": return 3;
            case "WORKER": return 2;
            case "CLIENT": return 1;
        }
        return 0;
    }

    public function getUserData(){
        if(Yii::$app->user->identity==null)
        return "Пользователь не найден";
        else
        {
            switch(Yii::$app->user->identity->role){
                case "ADMINISTRATOR":
                case "WORKER": {
                    $emp = Employee::find()->select('name, surname, patronymic, employee_type_fk')->where(['user_id'=>Yii::$app->user->identity->id])->one();
                    $emp_type = EmployeeType::findOne($emp->employee_type_fk);
                    return ["FIO"=>$emp, "type"=>$emp_type];
                }
                case "CLIENT": {
                    $cli = Client::find()->select('name, surname, patronymic')->where(['user_id'=>Yii::$app->user->identity->id])->one();
                    return ["FIO"=>$cli];
                }
            }
        }

    }
}
