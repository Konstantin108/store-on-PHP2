<?php

namespace app\controllers;

class CheckoutController extends Controller
{
     public function checkoutMainAction()
     {
        return $this->render('checkout');
     }
}