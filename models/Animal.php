<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property int $id
 * @property string $name
 * @property string $gender
 * @property string|null $info
 * @property int $taken
 * @property int $animal_race_fk
 *
 * @property AnimalRace $animalRaceFk
 * @property Request[] $requests
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'gender', 'animal_race_fk'], 'required'],
            [['info'], 'string'],
            [['taken', 'animal_race_fk'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['gender'], 'string', 'max' => 1],
            [['animal_race_fk'], 'exist', 'skipOnError' => true, 'targetClass' => AnimalRace::class, 'targetAttribute' => ['animal_race_fk' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'gender' => 'Пол',
            'info' => 'Подробная информация',
            'taken' => 'Взят',
            'animal_race_fk' => 'Animal Race Fk',
        ];
    }

    /**
     * Gets query for [[AnimalRaceFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimalRaceFk()
    {
        return $this->hasOne(AnimalRace::class, ['id' => 'animal_race_fk']);
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::class, ['animal_id_fk' => 'id']);
    }
}
