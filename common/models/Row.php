<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%row}}".
 *
 * @property int $id
 * @property int $seats_quantity
 * @property double $price_coef
 * @property int $theater_id
 *
 * @property PurchasedTicket[] $purchasedTickets
 * @property Theater $theater
 */
class Row extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%row}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seats_quantity', 'theater_id'], 'integer'],
            [['price_coef'], 'number'],
            [['theater_id'], 'exist', 'skipOnError' => true, 'targetClass' => Theater::className(), 'targetAttribute' => ['theater_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seats_quantity' => 'Seats Quantity',
            'price_coef' => 'Price Coef',
            'theater_id' => 'Theater ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchasedTickets()
    {
        return $this->hasMany(PurchasedTicket::className(), ['row' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheater()
    {
        return $this->hasOne(Theater::className(), ['id' => 'theater_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RowQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RowQuery(get_called_class());
    }
}
