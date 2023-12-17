<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animal_race".
 *
 * @property int $id
 * @property string $race
 *
 * @property Animal[] $animals
 */
class AnimalRace extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal_race';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['race'], 'required'],
            [['race'], 'string', 'max' => 45],
            [['race'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'race' => 'Race',
        ];
    }

    /**
     * Gets query for [[Animals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::class, ['animal_race_fk' => 'id']);
    }
}
