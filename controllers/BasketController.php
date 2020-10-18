<?php

namespace app\controllers;

use app\entities\Basket;
use app\repositories\BasketRepository;
use app\entities\Good;
use app\repositories\GoodRepository;
use app\services\BasketService;


class BasketController extends Controller
{
     public function basketAllAction()
     {
        return $this->render('basket');
     }

    //protected $actionDefault = 'index';

    //public function indexAction()
    //{
    //    echo '<pre>';
    //    var_dump($_SESSION);
//
    //}

       public function addAction()
       {
            $id_basket = $_POST['idForUpdate'];
            $name_basket = $_POST['nameForUpdate'];
            $price_basket = $_POST['priceForUpdate'];
            $material_basket = $_POST['materialForUpdate'];
            $designer_basket = $_POST['designerForUpdate'];
            $img_basket = $_POST['imgForUpdate'];
             $color_basket = $_POST['colorForUpdate'];
             $sex_basket = $_POST['sexForUpdate'];
           $info_basket = $_POST['infoForUpdate'];
            $quantity_basket = $_POST['quantityForUpdate'];
            $size_basket = $_POST['sizeForUpdate'];


            $basket = new Basket();
            $basket->id_basket = $id_basket;
            $basket->name_basket = $name_basket;
            $basket->price_basket = $price_basket;
            $basket->material_basket = $material_basket;
            $basket->designer_basket = $designer_basket;
            $basket->img_basket = $img_basket;
            $basket->color_basket = $color_basket;
            $basket->sex_basket = $sex_basket;
            $basket->info_basket = $info_basket;
            $basket->quantity_basket = $quantity_basket;
            $basket->size_basket = $size_basket;





            if(!empty($id_basket) &&
            !empty($name_basket) &&
            !empty($price_basket) &&
            !empty($material_basket) &&
            !empty($designer_basket) &&
            !empty($img_basket) &&
            !empty($color_basket) &&
            !empty($sex_basket) &&
            !empty($info_basket) &&
            !empty($quantity_basket) &&
            !empty($size_basket)
                ){
                $this->container->basketRepository->save($basket);
                header('Location: /basket');   //<--путь изменён для twig
                return '';

            }else{
                return $this->render('emptyFields');
            }
       }

   //public function addAction()
   //{
//
   //    $msg = $this->container->basketService->add(
   //         $this->getId(),
   //         $this->container->goodRepository,
    //        $this->request
    //   );
   //    return $this->redirect('', $msg);
   //}

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
