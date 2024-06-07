
<?php
if(isset($_GET['page'])){
   $source = $_GET['page'];

}else{
    $source = '';
}


switch($source){
case 'home';
include('pages/home.php');
break;
case 'transactions';
include('pages/transactions.php');
break;
default:
include('pages/home.php');
}




