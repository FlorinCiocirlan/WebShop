<html lang="en">
<?php require "../layout/header.php"?>

<div class="container " style="margin-top: 25px" >
    <div role="group">
    <form action="products.php" method="post" class="form-inline">

        <input class="form-control col-8"  type="text" placeholder="Looking for a product?" name="searchValue">

        <button class="col-2 btn" style="background-color: #546A7B; color: white;" type="submit"> Search </button>

    </form>
    <button onclick="mainToggle()"  class="btn" style="background-color: #546A7B; color: white;" >  Filter  </button>
    </div>
    <div id="toggle" style="display: none">
        <hr class="m-4">

        <button id="category"  class="btn" style="background-color: #546A7B; color: white;" onclick="categoryToggle()" > Category </button>

        <button id="priceTog"  class="btn" style="background-color: #546A7B; color: white;" onclick="priceToggle()"> Price </button>
        <button id="alphabeticalTog" class="btn" style="background-color: #546A7B; color: white;" onclick="alphabeticalToggle()"> Alphabetical </button>
        <button class="btn" style="background-color: #546A7B; color: white;" onclick="submitFilterValue()"  >  Apply  </button>
        <form>
            <div class="form-group" style="display: none"  id="categoryToggle">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select class="form-control" id="categoryOptions" name="categoryToggle">
                    <option value="none" id="optionHide" hidden> choose </option>
                    <?php  foreach ($categ as $category)
                        echo '<option value="'.$category['name'].'" > '.$category['name'] .'  </option>  '

                        ?>

                </select>
            </div>

            <div id="priceToggle" style="display: none">
                <label for="exampleFormControlSelect1">Select Price</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="price" id="priceHide"  value="none" checked hidden>
                </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="price" id="priceUp" value="priceUp" >
                <label class="form-check-label" for="priceUp">
                   Price up
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="price" id="priceDown" value="priceDown">
                <label class="form-check-label" for="priceUp">
                    Price down
                </label>
            </div>
            </div>
            <div id="alphabeticalToggle" style="display: none">
                <label for="exampleFormControlSelect1">Select Alphabetical</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="alphabetical" id="alphabeticalHide"  value="none" checked hidden>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="alphabetical" id="alphabeticalUp" value="alphabeticalUp" >
                    <label class="form-check-label" for="alphabeticalUp">
                        Alphabetical up
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="alphabetical" id="alphabeticalDown" value="alphabeticalDown">
                    <label class="form-check-label" for="alphabeticalDown">
                        Alphabetical down
                    </label>
                </div>
            </div>

        </form>

    </div>
    <hr class="m-4">

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
                 <a class="btn" style="background-color: #0D1F2D; color: white;" href="#">Add to cart</a>    
                 <a class="btn" style="background-color: #546A7B; color: white;" href="product.php?id='.$product['id'] .'"> Details </a>                
                                    </div>
                               </div> 
                    </div> <br>
                </div>';
    }


    ?>
</div>
    <script rel="script" src="../../Static/js/filter.js" defer ></script>
    <script>

    </script>

<?php paging("product",FALSE); ?>

    <?php require "../layout/footer.php" ?>

</html>
