<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- End of Bootstrap components -->


    <link rel="stylesheet" type="text/css" href="../Static/css/Custom.css"/>

</head>
<body>
<h1> Products : </h1>
<div class="container ">
    <div class="card-header">
    <form action="products.php" method="post">
        <div class="row">
        <input class="form-control col-8" type="text" placeholder="Looking for a product?" name="searchValue">
        <button class="col-4 btn btn-info" type="submit"> Submit </button>
        </div>
    </form>
    </div>

<div id="products" class="row">

    <?php

    foreach ( $prod['prod'] as $product )
    {
        $color = 'green';
        $stock = 'in stock';
        if($product['stock'] <= 0 ){
            $color = 'red';
            $stock = 'out of stock';
        } elseif ($product['stock'] == 1){
            $color = 'orange';
            $stock = 'last product in stock';
        }
        echo  ' <div class="col col-sm-12 col-md-6 col-lg-4"> 
                    <div class="card" style=" width:20rem;"> 
                        <img class="card-img-top" style="height:20rem; width:auto;" src="../images/'. $product["image"] .'" alt=""/> 
                            <div class="card-header"> 
                                    <h4 class="card-title">Product name: '. $product["name"].'</h4>                                                                
                            </div>
                               <div class="card-body">
                                  <div class="card-text">
                                   <p class="card-text" style="text-align: center; color: '.$color .'">'.$stock  .'   </p>
                                    <p class="lead"  style="text-align: center;" >Price: '.$product["price"] .' USD</p>                                
                                  </div>
                                  <div class="card-text" style="text-align: center;">
                 <a class="btn btn-success" href="#">Add to cart</a>    
                 <a class="btn btn-primary" href="/shop/product.php?id='.$product['id'] .'"> Details </a>                
                                    </div>
                               </div> 
                    </div> <br>
                </div>';
    }


    ?>
</div>
<<<<<<< HEAD
<<<<<<< HEAD
<?php paging("product",FALSE); ?>
=======
=======
>>>>>>> cart
</div>
<?php paging("product"); ?>
>>>>>>> e34bcf5088460bc63bdd9f942de3d51674dd841a
</body>
</html>
