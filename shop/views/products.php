<html>
<?php require "../layout/head.php"?>
<body>
<h1> Products : </h1>

<div class="container">
<div id="products" class="row">

    <?php

    foreach ( $prod['prod'] as $product )
    {
        echo  ' <div class="col col-sm-12 col-md-6 col-lg-4"> 
                    <div class="card" style=" width:20rem;"> 
                        <img class="card-img-top" style="height:20rem; width:auto;" src="../images/'. $product["image"] .'" alt=""/> 
                            <div class="card-header"> 
                                    <h4 class="card-title">Product name: '. $product["name"].'</h4>                                                                
                            </div>
                               <div class="card-body">
                                  <div class="card-text">
                                   <p class="card-text"> '.$product["brand"]  .'   </p>
                                          <p class="lead" >Price: '.$product["price"] .' USD</p>                                
                                  </div>
                                  <div class="card-text">
                 <a class="btn btn-success" href="#">Add to cart</a>    
                 <a class="btn btn-primary" href="#"> Details </a>                
                                    </div>
                               </div> 
                    </div>
                </div>';
    }


    ?>
</div>
</div>
<?php paging("product"); ?>
</body>
</html>
