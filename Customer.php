<?php
require_once('connect.php');
$query = "select * from customers";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="customers.css">
</head>
<script>
    function redirect_to_user(x){
        window.location.href = x+".php";
    }
</script>
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
      <th>User id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile Number</th>
      <th>Current Balance</th>
    </tr>

    <?php
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr onclick="redirect_to_user('<?php echo $row['Name']; ?>')">
      <td><?php echo $row['user_id']; ?></td>
      <td><?php echo $row['Name']; ?></td>
      <td><?php echo $row['Email']; ?></td>
      <td><?php echo $row['Mobile Number']; ?></td>
      <td><?php echo $row['Current Balance']; ?></td>
    </tr>
    <?php
  }
  ?>
  </table>

</body>
</html>

