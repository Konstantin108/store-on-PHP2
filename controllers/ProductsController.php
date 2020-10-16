<?php

namespace app\controllers;

use app\entities\Good;
use app\repositories\GoodRepository;

class ProductsController extends Controller
{
     public function productAllAction()
     {
        $goods = $this->container->goodRepository->getAll();
        return $this->render('products',
                            [
                                'goods' => $goods,
                            ]
                    );
     }
}