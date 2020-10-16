<?php

namespace app\controllers;

use app\entities\Good;
use app\repositories\GoodRepository;
use app\services\BasketService;

class BasketController extends Controller
{
     public function basketAllAction()
     {
        return $this->render('basket');
     }


    protected $actionDefault = 'index';

    public function indexAction()
    {
        //echo '<pre>';
        //var_dump($_SESSION);

        foreach($_SESSION as $value){    //<-- сделать цикл внутри цикла
            echo '<pre>';
            echo $value;
        }
    }

   public function addAction()
   {

       $msg = $this->container->basketService->add(
            $this->getId(),
            $this->container->goodRepository,
            $this->request
       );
       return $this->redirect('', $msg);
   }

   //public function fakeAddAction()      <-- Метод для js
   //{
   //    $msg = $this->container->basketService->add(
   //         $this->getId(),
   //         $this->container->goodRepository,
   //         $this->request
   //    );
//
   //    return $this->sendJson([
   //           'COUNT' => count($_SESSION[BasketService::BASKET_NAME]),
   //           'MSG' => $msg,
   //    ]);
   //}
}
