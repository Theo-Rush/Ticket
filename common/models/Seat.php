<?php

namespace common\models;

class Seat extends \yii\base\BaseObject
{
    private $_number;
    private $_is_available = true;

    public function __construct($n)
    {
        $this->_number = $n;
        parent::__construct();
    }

    public function getLabel()
    {
        return $this->_number;
    }

    public function getAvail()
    {
        return $this->_is_available;
    }

    public function setAvail($value)
    {
        $this->_is_available = $value;
    }
}
