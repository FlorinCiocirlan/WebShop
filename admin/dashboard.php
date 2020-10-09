<?php


require_once "../Core/basecontroller.php";


class DashboardController extends BaseController
{



    public function handleGet(): string
    {

        $this->getUser()->checkIfLoggedInAsAdmin();

        //var_dump(getcwd());
        return "dashboard";

    }

    public function handlePost(): string
    {

    }




}


BaseController::run();