<?php

namespace common\models;

class Film extends \yii\db\ActiveRecord
{
    private $_title;
    private $_price;

    public function __construct($title, $price)
    {
        $this->_title = $title;
        $this->_price = $price;
        parent::__construct();
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getPrice()
    {
        return $this->_price;
    }
}
