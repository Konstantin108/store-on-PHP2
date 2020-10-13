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

        $color = $_POST['chooseColor'];
        $size = $_POST['chooseSize'];

        $good = new Good();
                    $good->id = $id;
                    $good->quantity = $quantity;

        switch($color){
                            case 'Red':
                                $color = 'Red';
                                break;
                            case 'Black';
                                $color = 'Black';
                                break;
                            case 'Yellow';
                                $color = 'Yellow';
                                break;
                            case 'Pink';
                                $color = 'Pink';
                                break;
                            case 'Green';
                                $color = 'Green';
                                break;
                            case 'Blue';
                                $color = 'Blue';
                                break;
                            default:
                                $color = 'White';
                                break;
                        }

        switch($size){
                            case 'xl':
                                $size = 'xl';
                                break;
                            case 'l';
                                $size = 'l';
                                break;
                            case 's';
                                $size = 's';
                                break;
                            case 'xs';
                                $size = 'xs';
                                break;
                            case 'm';
                                $size = 'm';
                                break;
                            case 'xxs';
                                $size = 'xxs';
                                break;
                            default:
                                $size = 'xxl';
                                break;
                        }

        $good->color = $color;
        $good->size = $size;
                if(!empty($quantity) && !empty($quantity) && !empty($quantity)){
                    $this->container->goodRepository->save($good);   //<--изменение для репозиториев и сущностей
                    header('Location: /good/one/?id=' . $id);   //<--путь изменён для twig
                    return '';
                }else{
                    return $this->render('emptyFields');
                }
    }

}