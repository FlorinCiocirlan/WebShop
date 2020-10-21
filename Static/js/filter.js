console.log("merge filter js ");

function doRequest(data, callBack ){
    console.log('do request')
    $.ajax({
        type: "POST",
        url: '../../Core/apiFilter.php',
        data: data,
        dataType: 'json'
    }).done(callBack);

}

function getDataCallBack(response){
    console.log('call back')

    let output = " ";
    for(let product of response){
        let color = 'green';
        let stock = 'in stock';
        if(product['stock'] <= 0){
            color = 'red';
            stock = 'out of stock'
        } else if (product['stock'] === 1) {
            color = 'orange';
            stock = 'last product in stock'
        }
        output += `
         <div class="col col-sm-12 col-md-6 col-lg-4 js-product"> 
                    <div class="card" style=" width:20rem;"> 
                        <img class="card-img-top" style="height:20rem; width:auto;" src="../images/${product["image"]}" alt=""/> 
                            <div class="card-header"> 
                                    <h4 class="card-title">Product name:  ${product["name"]}</h4>                                                                
                            </div>
                               <div class="card-body">
                                  <div class="card-text">
                                   <p class="card-text" style="text-align: center; color: ${color} "> ${stock} </p>
                                    <p class="lead"  style="text-align: center;" >Price: ${product["price"]} USD</p>                                
                                  </div>
                                  <div class="card-text" style="text-align: center;">
                                   <a class="btn js-add-product" 
                                    data-url = "cart.php"
                                    data-product-id = '${product['id']}'
                                    data-action = "add"
                                    data-toggle="modal" 
                                    data-target="#exampleModal"
                                    style="background-color: #0D1F2D; color: white;" href="#">Add to cart</a>    
               
                 <a class="btn" style="background-color: #546A7B; color: white;" href="product.php?id=${product['id']}"> Details </a>                
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
                                ${product["name"]}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue shopping</button>
                                <a type="button" class="btn" style="background-color: #0D1F2D; color: white; " href="cart.php">Go to cart</a>
                              </div>
                            </div>
                          </div>
                        </div>
                </div>
         `
    }

    // print data
    document.getElementById("products").innerHTML = output;
}

function fetchData(cat , pri , alpha){
    console.log('fetch data')
    const data = {
        type: 'getDataFilter',
        category: cat,
        price: pri,
        alphabetic : alpha
    };
    doRequest(data, getDataCallBack)
}

function mainToggle() {
    var x = document.getElementById("toggle");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function priceToggle() {
    var x = document.getElementById("priceToggle");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
        y = document.getElementById('priceHide').checked = true;
    }
}
function alphabeticalToggle() {
    var x = document.getElementById("alphabeticalToggle");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
        y = document.getElementById('alphabeticalHide').checked = true;
    }
}
function categoryToggle() {
    var x = document.getElementById("categoryToggle");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
        y = document.getElementById('optionHide').selected = true;
    }
}
function submitFilterValue(){
    let options = document.getElementById('categoryOptions').value;
    let price = document.getElementsByName('price');
    let alphabetical = document.getElementsByName('alphabetical');

    let selectedOption = options;
    let selectedPrice;
    let selectedAlphabetical;

    for (var i = 0, length = price.length; i < length; i++) {
        if (price[i].checked) {
            // do whatever you want with the checked radio
            console.log(price[i].value);
            selectedPrice = price[i].value;
            // only one radio can be logically checked, don't check the rest
            break;
        }
    }
    for (var j = 0, length2 = alphabetical.length; j < length2; j++) {
        if (alphabetical[j].checked) {
            console.log(alphabetical[j].value);
            selectedAlphabetical = alphabetical[j].value;
            break;
        }
    }
   console.log(options);
    fetchData(selectedOption, selectedPrice, selectedAlphabetical)


}


