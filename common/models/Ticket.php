<?php

namespace common\models;

use Yii;
use common\models\query\TicketQuery;

/**
 * This is the model class for table "{{%purchased_ticket}}".
 *
 * @property int $id
 * @property int $row
 * @property int $seat
 * @property int $reserve_type
 * @property double $reserve_fee
 * @property string $paid_at
 *
 * @property Row $ticket_row
 */
class Ticket extends \yii\db\ActiveRecord 
{
    
    const RESERVE_TYPE = 1;
    const RESERVE_FEE = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName() 
    {
        return '{{%purchased_ticket}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() 
    {
        return [
            [['row', 'seat', 'reserve_type'], 'required'],
            [['row', 'seat', 'reserve_type'], 'integer'],
            [['reserve_fee'], 'number'],
            [['paid_at'], 'safe'],
            [['row'], 'exist', 'skipOnError' => true, 'targetClass' => Row::className(), 'targetAttribute' => ['row' => 'id']],
            ['seat', 'unique', 'targetAttribute' => ['row', 'seat'], 'message' => 'This seat has already been booked.']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() 
    {
        return [
            'id' => 'ID',
            'row' => 'Row',
            'seat' => 'Seat',
            'reserve_type' => 'Reserve Type',
            'reserve_fee' => 'Reserve Fee',
            'paid_at' => 'Paid At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketRow()
    {
        return $this->hasOne(Row::className(), ['id' => 'row']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TicketQuery the active query used by this AR class.
     */
    public static function find() 
    {
        return new TicketQuery(get_called_class());
    }

}
