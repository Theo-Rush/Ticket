<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "theaters".
 *
 * @property int $id
 * @property int $type
 */
class Theater extends \yii\db\ActiveRecord 
{

    private $film;
    private $rows = [];
    private $date;
    private $time;

    public function __construct(Film $film, Array $rows, $film_date, $starts_at) 
    {
        $this->film = $film;
        $this->rows = $rows;
        $this->date = $film_date;
        $this->time = $starts_at;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName() 
    {
        return 'theater';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() 
    {
        return [
            [['film', 'date', 'time'], 'required'],
            [['film'], 'integer'],
            [['date'], 'date'],
            [['time'], 'time'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() 
    {
        return [
            'film' => \Yii::t('app', 'Кинолента'),
            'date' => \Yii::t('app', 'Дата сеанса'),
            'time' => \Yii::t('app', 'Время сеанса'),
        ];
    }

    public function getRows() 
    {
        return $this->hasMany(Row::className(), ['theater_id' => 'id']);
    }

}
