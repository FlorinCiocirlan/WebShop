<?php

require_once 'basecontroller.php';

class Request
{
    public function get_response()
    {
        if ($_POST["type"] === "getDataFilter") {

            return json_encode($this->getProduct($_POST['category'], $_POST['price'], $_POST['alphabetic'])) ;

//            return getAllUsersWithOutThis($_SESSION['userId']);
//            category: none
//price: none
//alphabetic: none
        }
    }
    public function getProduct($category, $price, $alphabetic)
    {

        $query = "SELECT * FROM product WHERE category_name = :category AND deleted = 0 ORDER BY 
        price DESC , name DESC ";


        if(($category == 'none' && $price == 'priceUp' && $alphabetic == 'alphabeticalUp') || ($category == 'none' && $price == 'none' && $alphabetic == 'none')){
            $query = "SELECT * FROM product WHERE deleted = 0 ";
        } elseif ($category != 'none' && $price == 'priceUp' && $alphabetic == 'alphabeticalUp'){
            $query = "SELECT * FROM product WHERE deleted = 0 AND category_name = :category";
        } elseif ($category != 'none' && $price == 'priceUp' && $alphabetic == 'alphabeticalDown') {
            $query = "SELECT * FROM product WHERE category_name = :category AND deleted = 0 ORDER BY 
        price ASC , name DESC ";
        } elseif ($category != 'none' && $price == 'priceDown' && $alphabetic == 'alphabeticalUp') {
            $query = "SELECT * FROM product WHERE category_name = :category AND deleted = 0 ORDER BY 
        price DESC , name ASC ";
        } elseif ($category != 'none' && $price == 'priceDown' && $alphabetic == 'alphabeticalDown') {
            $query = "SELECT * FROM product WHERE category_name = :category AND deleted = 0 ORDER BY 
        price DESC , name DESC ";
        } elseif ($category == 'none' && $price == 'priceUp' && $alphabetic == 'alphabeticalDown') {
            $query = "SELECT * FROM product WHERE  deleted = 0 ORDER BY 
        price ASC , name DESC ";
        } elseif ($category == 'none' && $price == 'priceDown' && $alphabetic == 'alphabeticalUp') {
            $query = "SELECT * FROM product WHERE  deleted = 0 ORDER BY 
        price DESC , name ASC ";
        } elseif ($category == 'none' && $price == 'priceDown' && $alphabetic == 'alphabeticalDown') {
            $query = "SELECT * FROM product WHERE  deleted = 0 ORDER BY 
        price DESC , name DESC ";
        } elseif ($category == 'none' && $price == 'priceDown' && $alphabetic == 'none') {
            $query = "SELECT * FROM product WHERE  deleted = 0 ORDER BY 
        price DESC ";
        } elseif ($category == 'none' && $price == 'priceUp' && $alphabetic == 'none') {
            $query = "SELECT * FROM product WHERE  deleted = 0 ORDER BY 
        price ASC ";
        } elseif ($category == 'none' && $price == 'none' && $alphabetic == 'alphabeticalDown') {
            $query = "SELECT * FROM product WHERE  deleted = 0 ORDER BY 
         name DESC ";
        } elseif ($category == 'none' && $price == 'none' && $alphabetic == 'alphabeticalUp') {
            $query = "SELECT * FROM product WHERE  deleted = 0 ORDER BY 
         name ASC ";}
             elseif ($category != 'none' && $price == 'priceDown' && $alphabetic == 'none') {
            $query = "SELECT * FROM product WHERE category_name = :category AND  deleted = 0 ORDER BY 
                    price DESC ";
            } elseif ($category != 'none' && $price == 'priceUp' && $alphabetic == 'none') {
            $query = "SELECT * FROM product WHERE category_name = :category AND deleted = 0 ORDER BY 
                    price ASC ";
            } elseif ($category != 'none' && $price == 'none' && $alphabetic == 'alphabeticalDown') {
            $query = "SELECT * FROM product WHERE category_name = :category AND deleted = 0 ORDER BY 
                     name DESC ";
            } elseif ($category != 'none' && $price == 'none' && $alphabetic == 'alphabeticalUp') {
            $query = "SELECT * FROM product WHERE category_name = :category AND deleted = 0 ORDER BY 
                     name ASC ";}


        $connection = getConnection();
        $statement = $connection->prepare($query);
        $data = ['category' => $category];
        $statement->execute($data);
        $resultset = $statement->fetchAll();
        return $resultset;
    }
}



$request = new Request();
header( 'Content-Type: application/json' );

echo $request->get_response();

exit(0);
