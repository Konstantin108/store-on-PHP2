<?php

namespace app\controllers;

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