<?php
include('functions.php');

$order_id = escapeString($_POST['order_id']);
$amount = escapeString($_POST['amount']);
$payer_email = escapeString($_POST['payer_email']);
$payer_name = escapeString($_POST['payer_name']);
$currency = escapeString($_POST['currency']);
$status = escapeString($_POST['status']);

$query = "INSERT INTO payments(payment_id,amount,payer_email,payer_name,currency,status)VALUES('$order_id','$amount','$payer_email','$payer_name','$currency','$status')";
$add_payment = mysqli_query($connection,$query);
checkQuery($add_payment);
if($add_payment){
    successMsg('Thank you for your support');
}
