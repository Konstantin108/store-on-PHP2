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
            $good->size = $size;
            $good->color = $color;
            $good->sex = $sex;
            $good->info = $info;
            $good->img = $img;

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

    public function editAction()
    {
        $id = $_POST['idForEdit'];
        $quantity = $_POST['quantityForEdit'];

        $chooseColor = $_POST['chooseColor'];
        $chooseSize = $_POST['chooseSize'];

        $good = new Good();
                    $good->id = $id;
                    $good->quantity = $quantity;


        switch($chooseColor){
                            case 'Red':
                                $chooseColor = 'Red';
                                break;
                            case 'Black';
                                $chooseColor = 'Black';
                                break;
                            case 'Yellow';
                                $chooseColor = 'Yellow';
                                break;
                            case 'Pink';
                                $chooseColor = 'Pink';
                                break;
                            case 'Green';
                                $chooseColor = 'Green';
                                break;
                            case 'Blue';
                                $chooseColor = 'Blue';
                                break;
                            default:
                                $chooseColor = 'White';
                                break;
                        }

        switch($chooseSize){
                            case 'xl':
                                $chooseSize = 'xl';
                                break;
                            case 'l';
                                $chooseSize = 'l';
                                break;
                            case 's';
                                $chooseSize = 's';
                                break;
                            case 'xs';
                                $chooseSize = 'xs';
                                break;
                            case 'm';
                                $chooseSize = 'm';
                                break;
                            case 'xxs';
                                $chooseSize = 'xxs';
                                break;
                            default:
                                $chooseSize = 'xxl';
                                break;
                        }

        $good->chooseColor = $chooseColor;
        $good->chooseSize = $chooseSize;
                if(!empty($quantity)){
                    $this->container->goodRepository->save($good);   //<--изменение для репозиториев и сущностей
                    header('Location: /good/one/?id=' . $id);   //<--путь изменён для twig
                    return '';
                }else{
                    return $this->render('emptyFields');
                }
    }

}