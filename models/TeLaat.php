<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "te_laat".
 *
 * @property int $id
 * @property string $Naam_student
 * @property string $Klas
 * @property string $Minuten_te_laat
 * @property string $Reden_te_laat
 */
class TeLaat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'te_laat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Naam_student', 'Klas', 'Minuten_te_laat', 'Reden_te_laat'], 'required'],
            [['Naam_student', 'Klas', 'Minuten_te_laat', 'Reden_te_laat'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Naam_student' => 'Naam Student',
            'Klas' => 'Klas',
            'Minuten_te_laat' => 'Minuten Te Laat',
            'Reden_te_laat' => 'Reden Te Laat',
        ];
    }
}
