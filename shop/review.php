<?php

require_once "../Core/basecontroller.php";
require_once '../utils/utils.php';

class ReviewController extends BaseController
{

    public function handleGet(): string
    {
        $prodId = $_GET['id'];
        $allComments = getCommentsForProductId($prodId);
        $this->templateData['comments'] = $allComments;

        return 'review';
    }

    public function handlePost(): string
    {
        // TODO: Implement handlePost() method.
    }
}

baseController::run();