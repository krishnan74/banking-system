<?php
require_once('connect.php');
$query = "select photo from customers where Name = 'Krish'";
$query2 = "select * from customers where Name = 'Krish'";
$querytrans = "select * from customers where Name = 'Krish'";
$query3 = "select * from customers where Name != 'Krish'";

$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$resulttrans = mysqli_query($conn, $querytrans);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="customer_page.css">
  <script>
    function createTable() {

      var customer_table = document.getElementById('customer_table');
      var cust_heading = document.createElement("h2");
      cust_heading.textContent = "List of Customers";
      customer_table.appendChild(cust_heading);
        
      var table = document.createElement("table");
      var thead =document.createElement("thead");
      var tbody = document.createElement("tbody");

      var headers = ["User ID", "Name", "Email", "Mobile Number", "Current Balance", "Transfer"];
      var trhead = document.createElement("tr");
      headers.forEach(function(headerText) {
        var th = document.createElement("th");
        th.appendChild(document.createTextNode(headerText));
        trhead.appendChild(th);
      });
      thead.appendChild(trhead);
      table.appendChild(thead);


      <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
        var tr = document.createElement("tr");

        var td1 = document.createElement("td");
        td1.appendChild(document.createTextNode('<?php echo $row['user_id']; ?>'));
        tr.appendChild(td1);

        var td2 = document.createElement("td");
        td2.appendChild(document.createTextNode('<?php echo $row['Name']; ?>'));
        tr.appendChild(td2);

        var td3 = document.createElement("td");
        td3.appendChild(document.createTextNode('<?php echo $row['Email']; ?>'));
        tr.appendChild(td3);

        var td4 = document.createElement("td");
        td4.appendChild(document.createTextNode('<?php echo $row['Mobile Number']; ?>'));
        tr.appendChild(td4);

        var td5 = document.createElement("td");
        td5.appendChild(document.createTextNode('<?php echo $row['Current Balance']; ?>'));
        tr.appendChild(td5);

        /*var td6 = document.createElement("td");
        var formElement = document.createElement("form");
        var amountInput = document.createElement("input");
        amountInput.id = "amount_input";
        amountInput.type = "number";
        formElement.appendChild(amountInput);
        td6.appendChild(formElement);
        tr.appendChild(td6);*/

        var td7 = document.createElement("td");
        var button = document.createElement("button");
        button.textContent = "Send Money";

        button.addEventListener("click", function() {
          transfer_money('<?php echo $row['Name'];?>', '<?php echo $row['Current Balance'];?>');
        });

        td7.appendChild(button);
        tr.appendChild(td7);

        tbody.appendChild(tr);

      <?php } ?>

      table.appendChild(tbody);
      customer_table.appendChild(table);
    
    }


    




    function transfer_money(clickedName, bal) {
      <?php
      $row = mysqli_fetch_assoc($resulttrans);
      ?>

      var amount_div = document.createElement("div");

      var amount_div_text = document.createElement("p");
      amount_div_text.id = "amount_text";
      amount_div_text.style.fontSize = "medium";
      amount_div_text.textContent = "Enter the amount to be transferred";
      amount_div_text.style.color = "black";

      var amountInput = document.createElement("input");
      amountInput.type = "number";
      
      amount_div.appendChild(amount_div_text);
      amount_div.appendChild(amountInput);

      var curr_balance =document.createElement("div");
      
      var curr_balance_text =document.createElement("p");
      curr_balance_text.textContent = "Your Current Balance: "+'<?php echo $row['Current Balance'];?>';
      curr_balance_text.style.fontSize = "medium";
      curr_balance_text.style.color = "black";

      curr_balance.appendChild(curr_balance_text);

      var sendMoneyButton = document.createElement("button");
      sendMoneyButton.textContent = "Send Money";
      
      sendMoneyButton.addEventListener("click", function() {
        var amount = amountInput.value;
        alert("Money sent successfully!"+amount);
      });

      var divElement = document.getElementById("divElement");
      divElement.appendChild(amount_div);
      divElement.appendChild(curr_balance);
      divElement.appendChild(sendMoneyButton);
      divElement.style.display = "flex";
      divElement.style.flexDirection = "column";
      divElement.style.justifyContent = "space-evenly";
      divElement.style.padding = "20px";
      divElement.style.position = "fixed";
      divElement.style.height = "300px";
      divElement.style.backgroundColor = "white";
      divElement.style.border = "1px solid black";
      divElement.style.borderRadius = "25px";
      divElement.style.width = "500px";
      divElement.style.top = "50%";
      divElement.style.left = "50%";
      divElement.style.transform = "translate(-50%, -50%)";
      divElement.style.zIndex = "10";
    }


  </script>
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

    <div class = "user_profile">
        <div class = "userpic_div">
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $photoData = $row['photo'];
          
            // Convert binary data to base64
            $base64Photo = base64_encode($photoData);
          
            // Display the photo
            
            echo '<img class = "customer_photo" src="data:image/jpeg;base64,' . $base64Photo . '" alt="Krish Photo">';
          } else {
            echo "Photo not found.";
          }
        ?>
        </div>
        <div class = "user_details_div">
            <?php
            $row = mysqli_fetch_assoc($result2);
            echo '<h3 style="display: inline;">Name :</h3> <p style="display: inline;">'.$row['Name'].'</p><br>';
            echo '<h3 style="display: inline;">Email :</h3> <p style="display: inline;">'.$row['Email'].'</p><br>';
            echo '<h3 style="display: inline;">Mobile Number :</h3> <p style="display: inline;">'.$row['Mobile Number'].'</p><br>';
            echo '<h3 style="display: inline;">Current Balance :</h3> <p style="display: inline;">'.$row['Current Balance'].'</p><br>';
            echo '<button id = "trans_button" onclick = "createTable()"> Transfer Money </button>'
            ?>
        </div>

        
    </div>
    <div id = "customer_table"></div>
    <div id = "divElement"></div>




</body>
</html>