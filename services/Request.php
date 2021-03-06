<?php

namespace app\services;

class Request
{
    protected $requestString;
    protected $controllerName = '';
    protected $actionName = '';
    protected $params = [
        'get' => [],
        'post' => []
    ];

    public function __construct()
    {
        session_start();
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
        $this->fillParams();
    }

    protected function parseRequest()
    {

        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        if(preg_match_all($pattern, $this->requestString, $matches)){
            if(!empty($matches['controller'][0])){
                $this->controllerName = $matches['controller'][0];
            }
            if(!empty($matches['action'][0])){
                $this->actionName = $matches['action'][0];
            }
        }
    }

    protected function fillParams()
    {
        $this->params = [
            'get' => $_GET,
            'post' => $_POST
        ];
    }

    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    public function getActionName(): string
    {
        return $this->actionName;
    }

    public function getId()
        {
            if(empty($this->params['get']['id'])){
              return 0;
            }
              return (int)$this->params['get']['id'];
        }

        public function getSession($key = null)
        {
            if(empty($key)){
                return $_SESSION;
            }
            if (empty($_SESSION[$key])){
                return [];
            }
            return $_SESSION[$key];
        }

        public function setSession($key, $value)
        {
            $_SESSION[$key] = $value;
        }
}