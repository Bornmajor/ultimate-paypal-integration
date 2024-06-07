<?php include('includes/header.php') ?>

<div class="container">

<table class="table table-striped table-hover my-5">

  <tbody>
    <?php
    $query = "SELECT * FROM payments";
    $select_payments = mysqli_query($connection,$query);
    checkQuery($select_payments);
    if(mysqli_num_rows($select_payments) !== 0){
        ?>
        <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Payer name</th>
      <th scope="col">Email</th>
      <th scope="col">Amount</th>
      <th scope="col">Currency</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
        <?php
        while($row = mysqli_fetch_assoc($select_payments)){
        $payment_id =  $row['payment_id'];
        $amount = $row['amount'];
        $payer_email = $row['payer_email'];
        $payer_name = $row['payer_name'];
        $currency = $row['currency']; 
        $status = $row['status'];
        ?>
       <tr>
      <th scope="row"><?php echo $payment_id;  ?></th>
      <td><?php echo $payer_name ?></td>
      <td><?php echo $payer_email ?></td>
      <td><?php echo $amount; ?></td>
      <td><?php echo $currency; ?></td>
      <td><?php echo $status; ?></td>
      </tr>

        <?php
        }

    }else{
        ?>
        <div class="no_messages">
            <img src="assets/images/charity.png" alt="No data">
            <h4 class="mb-2">No transactions</h4>
            <br><br>
            <a class="btn btn-primary mt-2" href="?page=home">Make a donations</a>
        </div>
        <?php
    }
    ?>
 

 
  </tbody>
</table>


<div class="right-btn">
    <a href="?page=home" class="btn btn-primary">Make a donation</a>
</div>

</div>


  

<?php include('includes/footer.php') ?>