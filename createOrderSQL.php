
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.8/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.8/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.8/js/uikit-icons.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
    require_once("Connection.php");
    extract($_POST);
    $sql = "SELECT Amount
            FROM supplierstock
            WHERE supplierstock.SupplierStockId = '$stockID'";

            if (!mysqli_query($conn, $sql)) {
                echo "Error updating record: " . mysqli_error($conn);
            }

        $result = mysqli_query($conn, $sql);
        $re = mysqli_fetch_assoc($result);
        // if order is approved
        if(intval($amount) <=s intval($re["Amount"]) ){

            $sql = "INSERT INTO orders (OrderId, RestaurantId, SupplierStockId,Amount,Approved,PurchaseDate)
                    VALUES ('$orderID', '$restID', '$stockID','$amount','0','$pDate')";

            $result = mysqli_query($conn, $sql)
                        or die(mysqli_error($conn));
                

            $input = <<< HTML
                    <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>Order Sent</p>
                    </div>
HTML;
         echo $input;

        }else{
                

            $input = <<< HTML
                    <div class="uk-alert-danger" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>The Amount is not correct</p>
                    </div>
HTML;
         echo $input;
        }
?>