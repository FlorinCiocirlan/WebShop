<?php
require_once "../Core/basecontroller.php";
require_once "../utils/utils.php";

class HomeController extends BaseController
{

    public function handleGet(): string
    {
        return 'home';
    }

    public function handlePost(): string
    {
        // TODO: Implement handlePost() method.
    }
}

BaseController::run();