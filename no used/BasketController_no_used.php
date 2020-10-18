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

    //protected $actionDefault = 'index';

    //public function indexAction()
    //{
    //    echo '<pre>';
    //    var_dump($_SESSION);
//
    //}

       public function addAction()
       {
            $id_orders = $_POST['idForUpdate'];
            $name_orders = $_POST['nameForUpdate'];
            $price_orders = $_POST['priceForUpdate'];
            $material_orders = $_POST['materialForUpdate'];
            $designer_orders = $_POST['designerForUpdate'];
            $size_orders = $_POST['sizeForUpdate'];
            $color_orders = $_POST['colorForUpdate'];
            $sex_orders = $_POST['sexForUpdate'];
            $info_orders = $_POST['infoForUpdate'];
            $img_orders = "/img/unnamed.jpg";

            $good = new Good();
            $good->id = $id;
            $good->name = $name;
            $good->price = $price;
            $good->material = $material;
            $good->designer = $designer;
            $good->color = $color;
            $good->info = $info;
            $good->img = $img;

            switch($sizeForUpdate){
                                case 'xs':
                                    $sizeForUpdate = 'xs';
                                    break;
                                case 's';
                                    $sizeForUpdate = 's';
                                    break;
                                case 'm';
                                    $sizeForUpdate = 'm';
                                    break;
                                case 'l';
                                    $sizeForUpdate = 'l';
                                    break;
                                case 'xl';
                                    $sizeForUpdate = 'xl';
                                    break;
                                case 'xxl';
                                    $sizeForUpdate = 'xxl';
                                    break;
                            }

            switch($sexForUpdate){
                                case 'men':
                                    $sexForUpdate = 'men';
                                    break;
                                case 'women';
                                    $sexForUpdate = 'women';
                                    break;
                            }

            $good->sex = $sex;
            $good->size = $size;

            if(!empty($name) &&
            !empty($price) &&
            !empty($material) &&
            !empty($designer) &&
            !empty($size) &&
            !empty($color) &&
            !empty($sex) &&
            !empty($info) &&
            !empty($img)
                ){
                $this->container->goodRepository->save($good);
                header('Location: /good');   //<--путь изменён для twig
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
