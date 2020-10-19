<?php

namespace app\controllers;

use app\entities\Good;
use app\repositories\GoodRepository;

class GoodController extends Controller
{
    public function allAction()
    {
        $goods = $this->container->goodRepository->getAll();
        return $this->render('goodAll',
                                    [
                                        'goods' => $goods,
                                    ]
                                 );
    }

    public function oneAction()
    {
        $id = $this->getId();
        $good = $this->container->goodRepository->getOne($id);
        return $this->render('goodOne',
                        [
                            'good' => $good,
                        ]
                     );
    }

    public function updateGoodAction()
    {
        $id = $this->getId();
        $good = $this->container->goodRepository->getOne($id);
        return $this->render('goodUpdate',
                        [
                            'good' => $good,
                        ]
                     );
    }

    public function getUpdateGoodAction()
    {
            $id = $_POST['idForUpdate'];
            $name = $_POST['nameForUpdate'];
            $price = $_POST['priceForUpdate'];
            $material = $_POST['materialForUpdate'];
            $designer = $_POST['designerForUpdate'];
            $size = $_POST['sizeForUpdate'];
            $color = $_POST['colorForUpdate'];
            $sex = $_POST['sexForUpdate'];
            $info = $_POST['infoForUpdate'];
            $img = "/img/unnamed.jpg";

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

    public function delGoodAction()
    {
                $id = $this->getId();
                $good = $this->container->goodRepository->getOne($id);
                return $this->render('goodDel',
                                 [
                                    'good' => $good,
                                 ]
                             );
    }

    public function getDelGoodAction()
    {
            $id = $_POST['idForDel'];
            $good = new Good();
            $good->id = $id;
            $this->container->goodRepository->delete($good);
            header('Location: /good');   //<--путь изменён для twig
            return '';
    }



public function addToCartAction()

       {
            $id = $this->getId();

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
                header('Location: /good/one/?id=' . $id_basket);   //<--путь изменён для twig
                return '';

            }else{
                return $this->render('emptyFields');
            }
       }


}