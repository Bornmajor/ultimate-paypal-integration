<script src="assets/js/all.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script>

paypal.Buttons({
    createOrder: function(data, actions) {
        // Replace with your actual product details
        let cart = [
            {
                name: "Donation", // Replace with actual product name
                sku: "1",
                quantity: 1, // Ensure quantity is a number
                amount: 0.01 // Ensure amount is a number
            }
        ];

        return fetch("async/capture_order.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ cart })
        })
        .then((response) => response.json())
        .then((order) => order.id);
    },
    onApprove: function(data, actions) {
        // Capture the payment when the payer approves
        return actions.order.capture().then(function(details) {
            // Order captured successfully, handle completion
                 // Check if the transaction was successful
            if (details.status === "COMPLETED") {

            console.log("success");
            // Perform any actions like updating UI, showing success message, etc.

            //get data
          
            let payer_email = details.payer.email_address;
            let order_id = details.id;
            let amount = details.purchase_units[0].amount.value;
            let currency = details.purchase_units[0].amount.currency_code;
            let payer_name = `${details.payer.name.given_name} ${details.payer.name.surname}`;
            let status = details.status; 
          


            $.post("async/record_transaction.php",{status:status,order_id:order_id,amount:amount,payer_email:payer_email,payer_name:payer_name,currency:currency},function(data){
                $(".feedback").html(data);
            })
            } else {
                console.log("Transaction not completed. Status:", details.status);
                // Handle non-completed transaction scenarios
            }
            console.log("Payment details:", details);

            // Perform any actions like updating UI, showing success message, etc.
        }).catch(function(error) {
            // Handle capture error
            console.error("Capture error:", error);
            // Perform actions like showing error message, retrying capture, etc.
        });
    },
    onCancel: function(data) {
        // Handle payment cancellation
        console.log('Order cancelled');
        $(".feedback").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>Transaction canceled</div>');
        // You can show a cancel page, return to cart, or perform other actions here
    },
    style: {
        layout: 'vertical',
        color: 'blue',
        shape: 'rect',
        label: 'paypal'
    },
}).render('#paypal-button-container');
</script>
</body>
</html>