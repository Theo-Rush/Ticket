<?php

namespace common\models\definitions;

/**
 * @SWG\Definition(required={"row", "seat", "reserve_type"})
 *
 * @SWG\Property(property="id", type="integer")
 * @SWG\Property(property="row", type="integer")
 * @SWG\Property(property="seat", type="integer")
 * @SWG\Property(property="reserve_type", type="integer")
 * @SWG\Property(property="reserve_fee", type="number")
 * @SWG\Property(property="paid_at", type="string")
 */
class Ticket
{
}