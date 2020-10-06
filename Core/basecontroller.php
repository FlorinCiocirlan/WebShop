<?php

require_once "user.php";


abstract class BaseController{
    protected $templateData=array();
    public static $VIEWS_FOLDER="views/";


    protected function getUser():User{

        return new User();
    }


    public abstract function handleGet():string;
    public abstract function handlePost():string;


    public function render(string $viewName):void{
        //print_r($this->templateData);
        extract($this->templateData);

        require(self::$VIEWS_FOLDER.$viewName.".php");
    }


    public function handleRequest():void{

        if ($_SERVER['REQUEST_METHOD']=="GET")
            $this->render($this->handleGet());
        elseif ($_SERVER['REQUEST_METHOD']=="POST")
            $this->render($this->handlePost());
    }


    public static function run():void{
        $controllerName=ucfirst(basename($_SERVER["SCRIPT_FILENAME"],".php"))."Controller";
        $controller=new $controllerName;
        $controller->handleRequest();


    }



}