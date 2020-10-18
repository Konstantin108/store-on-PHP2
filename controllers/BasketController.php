<?php



namespace app\controllers;

use app\entities\Good;
use app\repositories\GoodRepository;
use app\services\BasketService;


class BasketController extends Controller
{
     public function basketAllAction()
     {
	foreach ($_SESSION as $field => $value) {
	    if(is_array($value)){
	        foreach($value as $field){
	            foreach($field as $city){
	                //echo '<pre>';
	                //echo $city;
	                $cityArr = array_fill(-1, count($field), $city);
	            }
	        }
	    }else{
	        //echo '<pre>';
	        //echo $value;
	    }


	    }
        return $this->render('basket',
                        [
                            'cityArr' => $cityArr,
                            'value' => $value
                        ]
                    );
     }

    protected $actionDefault = 'index';

    public function indexAction()
    {
        echo '<pre>';
        var_dump($_SESSION);



        $good = [];
        $good = $_SESSION['goods'];

        foreach($good as $goods) {
          echo $good['name'];
        }
       // for ($i = 0; $i < count($good); $i++){
       //     if(is_object($good[$i])){
        //        echo 'this obj';
       //     }
       // }
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
