<?php

// Replace with your Client ID and Secret
const CLIENT_ID = 'YOUR_CLIENT_ID';
const CLIENT_SECRET = 'YOUR_CLIENT_SECRET';

// $clientId = "AZTgoqj0EfGK89tr88fbxjbuxhfbjGNHVF9qD4jwoVeG8tPDEnMEi54rpT3ia_4J5hKiC-rD_pkh716k";
// $clientSecret = "EEw5Rj6eAuvBuJR64DLUe21dplas74NWFTEYECpb4NBP0HFkN_3DoPyZD7tFaXnS8yCy0nMISSuUgkWM";

//AZTgoqj0EfGK89tr88fbxjbuxhfbjGNHVF9qD4jwoVeG8tPDEnMEi54rpT3ia_4J5hKiC-rD_pkh716k

//EEw5Rj6eAuvBuJR64DLUe21dplas74NWFTEYECpb4NBP0HFkN_3DoPyZD7tFaXnS8yCy0nMISSuUgkWM
// Function to get access token
function getAccessToken() {
  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => 'https://api.sandbox.paypal.com/v1/oauth2/token', // Sandbox endpoint
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
    CURLOPT_USERPWD => CLIENT_ID . ':' . CLIENT_SECRET,
    CURLOPT_HTTPHeader => [
      'Content-Type: application/x-www-form-urlencoded',
      'Authorization: Basic ' . base64_encode(CLIENT_ID . ':' . CLIENT_SECRET),
    ],
  ]);

  $response = curl_exec($curl);
  curl_close($curl);

  return json_decode($response, true)['access_token'];
}

// Function to create payment
function createPayment($intent, $items, $redirectUrls) {
  $accessToken = getAccessToken();

  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => 'https://api.sandbox.paypal.com/v1/payments/payment', // Sandbox endpoint
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode([
      'intent' => $intent,
      'payer' => [
        'payment_method' => 'paypal',
      ],
      'redirect_urls' => $redirectUrls,
      'transactions' => [
        [
          'item_list' => [
            'items' => $items,
          ],
          'amount' => [
            'currency' => 'USD',
            'total' => calculateTotal($items),
          ],
        ],
      ],
    ]),
    CURLOPT_HTTPHEADER => [
      'Authorization: Bearer ' . $accessToken,
      'Content-Type: application/json',
    ],
  ]);

  $response = curl_exec($curl);
  curl_close($curl);

  return json_decode($response, true);
}

// Helper function to calculate total amount
function calculateTotal($items) {
  $total = 0;
  foreach ($items as $item) {
    $total += $item['price'] * $item['quantity'];
  }
  return $total;
}

// Sample usage (replace with your data)
$items = [
  [
    'name' => 'Product 1',
    'price' => 10.00,
    'quantity' => 1,
  ],
  // Add more items as needed
];

$redirectUrls = [
  'return_url' => 'http://your-website.com/success.php',
  'cancel_url' => 'http://your-website.com/cancel.php',
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

