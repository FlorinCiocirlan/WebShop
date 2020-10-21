let payment = document.getElementById('payment');
let amount =  document.getElementById('amount').innerText.replace('$','');
let modalContainer = document.querySelector('.modal-container');


payment.addEventListener('change', function(){
    if(payment.value === "PayPal"){
        document.getElementById('paypal-button-container').style.display='block';
    } else {
        document.getElementById('paypal-button-container').style.display='none';
    }
})


paypal.Buttons({
    createOrder: function(data, actions) {
        document.getElementById('continue-button').disabled=true;
        document.getElementById('paypal-button-container').style.display='none';
        payment.remove(document.getElementById('cash-payment'));
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: amount
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
            // alert('Transaction completed by ' + details.payer.name.given_name);
            document.getElementById('continue-button').disabled=false;
            let feedBack = "<div> You have successfully paid your order. You may press the Continue button</div>"
            modalContainer.innerHTML = feedBack;

        });
    }
}).render('#paypal-button-container');