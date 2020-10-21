<html lang="en">
<?php require "../layout/header.php"?>

<div class="container " style="margin-top: 25px">

    <form action="products.php" method="post" class="form-inline">

        <input class="form-control col-8" type="text" placeholder="Looking for a product?" name="searchValue">

        <button class="col-2 btn" style="background-color: #546A7B; color: white;" type="submit"> Search </button>
    </form>


<div id="products" class="row" >

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
        echo  ' <div class="col col-sm-12 col-md-6 col-lg-4 js-product"> 
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
                                <a class="btn js-add-product" 
                                    data-url = "cart.php"
                                    data-product-id = '. $product['id'] .'
                                    data-action = "add"
                                    data-toggle="modal" 
                                    data-target="#exampleModal"
                                    style="background-color: #0D1F2D; color: white;" href="#">Add to cart</a>    
                                <a class="btn" style="background-color: #546A7B; color: white;" href="product.php?id='.$product['id'] .'"> Details </a>                
                                    </div>
                               </div> 
                    </div> <br>
                    
                    <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Product added to you cart</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                '. $product["name"].'
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue shopping</button>
                                <a type="button" class="btn" style="background-color: #0D1F2D; color: white; " href="cart.php">Go to cart</a>
                              </div>
                            </div>
                          </div>
                        </div>
                                            
                </div>';
    }


    ?>
</div>

<?php paging("product",FALSE); ?>

    <?php require "../layout/footer.php" ?>

<script>
<?php require "../Static/js/product.js" ?>
</script>

</html>
