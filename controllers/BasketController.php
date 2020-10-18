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
        //echo '<pre>';
        //var_dump($_SESSION);

	foreach ($_SESSION as $field => $value) {
	    if(is_array($value)){
	        foreach($value as $field){
	            foreach($field as $city){
	                echo '<pre>';
	                echo $city;
	            }
	        }
	    }else{
	        echo '<pre>';
	        echo $value;
	    }

       // while($array = current($_SESSION)){
       //     if(is_array($array)){
       //         echo key($array);
       //     }
       //     next($array);
       // }

    	$user = [
    		'login' => 'admin',
    		'password' => '123',
    		'isAdmin' => true,
    		'roles' => [
    			'key_1' => 'moderator',      //foreach
    			'key_2' => 'user'
    		],
    	];

    	foreach ($user as $field => $value) {
    		if(!is_array($value)){
    				echo "$field => $value" . '<br>';      //foreach внутри foreach
    				continue;
    			}
    			echo $field . '=>';
    			foreach ($value as $role) {
    				echo $role . ' <br>';
    		}
    	}

    }}

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
