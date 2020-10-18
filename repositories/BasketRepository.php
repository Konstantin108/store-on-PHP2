<?php

namespace app\repositories;

use app\entities\Basket;

class BasketRepository extends Repository
{
    protected function getTableName() :string
    {
        return 'basket';
    }

    protected function getEntityName() :string
    {
        return Basket::class;
    }

}