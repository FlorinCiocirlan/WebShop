<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- End of Bootstrap components -->

    <link rel="stylesheet" type="text/css" href="/static/css/custom.css"/>
</head>
<body>
<h1> Products : </h1>
<div id="products" class="row">

    <?php

    foreach ( $prod['prod'] as $product )
    {
        echo  ' <div class="col col-sm-12 col-md-6 col-lg-4"> 
                    <div class="card" style=" width:450px;"> 
                        <img class="card-img-top" style="height:400px; width:auto;" src="../images/'. $product["image"] .'" alt=""/> 
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
<?php paging("product"); ?>
</body>
</html>
