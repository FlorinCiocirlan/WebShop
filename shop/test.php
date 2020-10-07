<?php

require_once "../Core/basecontroller.php";


class TestController extends BaseController{


    public function handleGet(): string
    {
        //echo(md5("gica"));
       $this->getUser()->login("adamalt@gmail.com","gica");


        $this->templateData['test']="a fost odata ca in povesti";

        return "test";

    }

    public function handlePost(): string
    {

    }
}


BaseController::run();