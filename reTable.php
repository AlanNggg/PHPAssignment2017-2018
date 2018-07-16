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
    

<?php
        require_once("Connection.php");
        extract($_POST);
        $sql = "SELECT  orders.OrderId,
                suppliers.Name AS SpName,
                stock.Name AS StName,
                orders.Amount,
                orders.PurchaseDate,
                orders.DeliveryDate,
                orders.ReceivedDate
                FROM orders,stock,suppliers,supplierStock
                WHERE orders.RestaurantId = $id
                AND orders.SupplierStockId=supplierStock.SupplierStockId 
                AND supplierStock.SupplierId=suppliers.SupplierId
                AND supplierStock.StockID=stock.StockID";
                
        $result = mysqli_query($conn, $sql)
            or die(mysqli_error($conn));
    
      

        while($re = mysqli_fetch_assoc($result)){
            $orderID = $re["OrderId"];
            $spName = $re["SpName"];
            $stName = $re["StName"];
            $amount = $re["Amount"];
            $pd = $re["PurchaseDate"];
            $dd = $re["DeliveryDate"];
            $rd = $re["ReceivedDate"];
            
            $table = <<<HTML
                <tr>
                    <td>$orderID</td>
                    <td>$spName</td>
                    <td>$stName</td>
                    <td>$amount</td>
                    <td>$pd</td>
                    <td>$dd</td>
                    <td>$rd</td>
                    <td><button onclick="deleteOrder($orderID)" class="uk-button uk-button-danger" type="button">Delete</button></td>
                </tr>

        
HTML;
        echo $table;
        }

  
?>

</body>
</html>