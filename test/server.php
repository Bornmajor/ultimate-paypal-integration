<?php include('async/functions.php')  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

    </form>
     <?php 
     
     // Sample usage (replace with your data)
$items = [
    [
      'name' => 'Product 1',
      'price' => 10.00,
      'quantity' => 1,
    ],
    // Add more items as needed
  ];
  //http://localhost/apps/ultimate-paypal-integration/
  $baseUrl = 'http://localhost/apps/ultimate-paypal-integration/pages';
  $redirectUrls = [
    'return_url' => $baseUrl.'success.php',
    'cancel_url' => $baseUrl.'cancel.php',
  ];
  
  $payment = createPayment('sale', $items, $redirectUrls);
  
  if (isset($payment['error'])) {
    // Handle error
    echo 'Error creating payment: ' . $payment['error']['message'];
  } else {
    // Redirect user to approval URL
    $approvalUrl = $payment['links'][0]['href'];
    header('Location: ' . $approvalUrl);
  }
  
     ?>
</body>
</html>