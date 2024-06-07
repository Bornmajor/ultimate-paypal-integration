<?php include('includes/header.php') ?>

<div class="container">

<a class="btn btn-warning mt-3" href="?page=transactions">View donations</a>

<div class="donation-container">
<h4> <img src="assets/images/logo.png" width="100px" alt=""> Majasociet donation welfare</h4>
<p class="donation-quotes">
Even a small donation can make a big difference in someone's life. Give today
</p>

<p class="warning-msg">Only for demo purpose: the app will intiate a fake $0.01 transaction.</p>
<!-- #render paypal button by js-->


 <div class="feedback"></div>

<div id="paypal-button-container"></div>     
</div>
 


</div>

<?php include('includes/footer.php') ?>