<?php

namespace app\controllers;

use app\main\Container;
use app\services\Request;

abstract class Controller
{
    protected $actionDefault = 'all';
    /*
    *   @var RenderServices
    */
    protected $renderer;

    protected $request;

    protected $container;

    /**
     *   Controller constructor.
     * @param $renderer
     */
    public function __construct(Request $request, Container $container)
    {
        $this->container = $container;
        $this->request = $request;
    }

    public function run($action)
    {

        if (empty($action)) {
            $action = $this->actionDefault;
        }

        $action .= "Action";

        if (!method_exists($this, $action)) {
            return '404';
        }
        return $this->$action();
    }


    protected function getId()      //<-- получение id
    {
        return $this->request->getId();
    }

    protected function redirect($path = '', $msg = '')
    {
        if (!empty($msg)) {
            $_SESSION['msg'] = $msg;
        }
        if (empty($path)) {
            if (empty($_SERVER['HTTP_REFERER'])) {
                $path = '/';
            } else {
                $path = $_SERVER['HTTP_REFERER'];
            }
        }
        header('Location: ' . $path);
        return '';
    }

    protected function render($template, $params = [])
    {
        return $this->container->renderer->render($template, $params);
    }

    //protected function sendJson($data)
    //{
    //   header('Content-Type: application/json');
//
    //   return json_encode($data);
    //}


}