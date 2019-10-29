<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Row]].
 *
 * @see \common\models\Row
 */
class RowQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Row[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Row|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
