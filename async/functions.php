<?php
include('connection.php');

function escapeString($string){
  global $connection;
  
  return $string = mysqli_real_escape_string($connection,$string);
  
  }
  
  function checkQuery($result){
      global $connection;
      if($result){
      
      }else{
          die("Query failed".mysqli_error($connection));
      
      }  
      }

      function successMsg($msg){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      
      //fail msg
      function failMsg($msg){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      

// function getAccessToken() {
//     $curl = curl_init();

//     $client_id = 'AZTgoqj0EfGK89tr88fbxjbuxhfbjGNHVF9qD4jwoVeG8tPDEnMEi54rpT3ia_4J5hKiC-rD_pkh716k';
//     $client_secret = 'EEw5Rj6eAuvBuJR64DLUe21dplas74NWFTEYECpb4NBP0HFkN_3DoPyZD7tFaXnS8yCy0nMISSuUgkWM';
  
//     curl_setopt_array($curl, [
//       CURLOPT_URL => 'https://api.sandbox.paypal.com/v1/oauth2/token', // Sandbox endpoint
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_POST => true,
//       CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
//       CURLOPT_USERPWD => $client_id . ':' . $client_secret,
//       CURLOPT_HTTPHEADER => [
//         'Content-Type: application/x-www-form-urlencoded'
//       ],
//     ]);
  
//     $response = curl_exec($curl);
//     if (curl_errno($curl)) {
//         throw new Exception(curl_error($curl));
//     }
//     curl_close($curl);
  
//     $response_data = json_decode($response, true);
//     if (isset($response_data['access_token'])) {
//         return $response_data['access_token'];
//     } else {
//         throw new Exception('Error retrieving access token: ' . json_encode($response_data));
//     }
// }

// // Function to create payment

// function createPayment($intent, $items, $redirectUrls) {
//     $accessToken = getAccessToken();
  
//     $curl = curl_init();
  
//     curl_setopt_array($curl, [
//       CURLOPT_URL => 'https://api.sandbox.paypal.com/v1/payments/payment', // Sandbox endpoint
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_POST => true,
//       CURLOPT_POSTFIELDS => json_encode([
//         'intent' => $intent,
//         'payer' => [
//           'payment_method' => 'paypal',
//         ],
//         'redirect_urls' => $redirectUrls,
//         'transactions' => [
//           [
//             'item_list' => [
//               'items' => $items,
//             ],
//             'amount' => [
//               'currency' => 'USD',
//               // Replace with your estimated total amount
//               'total' => 0.01, // Sample total
//             ],
//           ],
//         ],
//       ]),
//       CURLOPT_HTTPHEADER => [
//         'Authorization: Bearer ' . $accessToken,
//         'Content-Type: application/json',
//       ],
//     ]);
  
//     $response = curl_exec($curl);
//     curl_close($curl);
  
//     return json_decode($response, true);
//   }
  