<?php
require_once('connect.php');
$query_cust = "select * from customers";
$query_trans = "select * from transactions";
$result_cust = mysqli_query($conn, $query_cust);
$result_trans = mysqli_query($conn, $query_trans);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="home.css">
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

    <div class = "wlcm">
    <h1>Welcome to Bank Name</h1>
    <p>Providing reliable banking services since 20XX</p>
    <a href="about.html" class="cta-button">Learn More</a>
    </div>

    <div class = "options_div">
        <div class = "customer_tab">
            <h3>Recently Added Customers</h3>
            <table border="1">
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                </tr>
                <tr>
                <?php
                $count = 0;
                while ($row = mysqli_fetch_assoc($result_cust)) {
                    if ($count < 5) { // Display only 5 records
                      $count++; // Increment the count
                      ?>
                      <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                      </tr>
                      <?php
                    } else {
                      break; // Exit the loop once 5 records have been displayed
                    }
                }
            ?>
                </tr>
            </table>
        </div>
        <div class = "transactions_tab">
        <h3>Recent Transactions</h3>
            <table border = "1">
                <tr>
                    <th>S.no</th>
                    <th>Sender</th>
                </tr>

                <tr>
                <?php    
                $count = 0;
                while ($row = mysqli_fetch_assoc($result_trans)) {
                    if ($count < 5) { // Display only 5 records
                      $count++; // Increment the count
                      ?>
                      <tr>
                        <td><?php echo $row['transaction_id']; ?></td>
                        <td><?php echo $row['sender']; ?></td>
                      </tr>
                      <?php
                    } else {
                      break; // Exit the loop once 5 records have been displayed
                    }
                }
                ?>
                </tr>
            </table>
        </div>
    </div>
    



</body>
</html>

