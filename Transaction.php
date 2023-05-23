<?php
require_once('connect.php');
$query = "select * from transactions";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="transaction.css">
</head>
<body>

    <header>
        <div class="abtme">
            <div><img src="bank.png" alt="" id="bank"></div>
        </div>

        <div class="navbar">
            <div><a href="Home.php">Home</a></div>
            <div><a href="Customer.php">Customers</a></div>
            <div><a href="Transaction.php">Transactions</a></div>
        </div>
    </header>

    <h2>Customer List</h2>

  <table border="1">
    <tr>
      <th>Transaction id</th>
      <th>Sender</th>
      <th>Receiver</th>
      <th>Amount</th>
    </tr>

    <tr>
      <?php 
        
        while($row = mysqli_fetch_assoc($result)){
      ?>
        <td><?php echo $row['transaction_id']; ?></td>
        <td><?php echo $row['sender']; ?></td>
        <td><?php echo $row['receiver']; ?></td>
        <td><?php echo $row['amountn']; ?></td>
    </tr>
    <?php  
        }
      
      ?>
    </tr>
  </table>

</body>
</html>

