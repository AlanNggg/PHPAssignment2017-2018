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
        
        if ($role == "restaurants") {
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
        } else if ($role == "managers") {
                switch ($type) {
                    case "all":
                                $sql = "SELECT 
                                Orders.Approved, 
                                Orders.OrderId, 
                                Suppliers.Name as SupplierName, 
                                Stock.Name as StockName, 
                                Orders.Amount, 
                                Orders.PurchaseDate, 
                                Orders.DeliveryDate,
                                Orders.ReceivedDate FROM `Orders`
                                INNER JOIN `Supplierstock` ON Orders.SupplierStockId = Supplierstock.SupplierStockId
                                INNER JOIN `Stock` ON Supplierstock.StockId = Stock.StockId
                                INNER JOIN `Suppliers` ON Supplierstock.SupplierId = Suppliers.SupplierId
                                ORDER BY Orders.OrderId";

                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row["Approved"] == 0) { 
                                            $approved = "Unapproved";
                                        } else {
                                            $approved = "Approved";
                                        } 
                                        $NumOfApproved = $row["Approved"];
                                        $orderID = $row["OrderId"];
                                        $spName = $row["SupplierName"];
                                        $stName = $row["StockName"];
                                        $amount = $row["Amount"];
                                        $pd = $row["PurchaseDate"];
                                        $dd = $row["DeliveryDate"];
                                        $rd = $row["ReceivedDate"];

                                        if ($NumOfApproved == 1) { 
                                            $checkbox = "<input class='uk-checkbox' type='checkbox'
                                            style='width: 20px; height: 20px; margin-right: 15px;' onchange='updateBox(this, $orderID)' value='1' checked>";
                                        } else {
                                            $checkbox = "<input class='uk-checkbox' type='checkbox'
                                            style='width: 20px; height: 20px; margin-right: 15px;' onchange='updateBox(this, $orderID)' value='0'>";
                                        }

                                        $table = <<< HTML
                                        <tr>
                                            <td>$approved</td>
                                            <td>$orderID</td>
                                            <td>$spName</td>
                                            <td>$stName</td>
                                            <td>$amount</td>
                                            <td>$pd</td>
                                            <td>$dd</td>
                                            <td>$rd</td>
                                            <td style="text-align: center;">$checkbox</td>
                                        </tr>
HTML;
                                        echo $table;
                                    }
                                } else {
                                    $noRecord = "No Record";
                                    $table = <<< HTML
                                        <tr>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td style="text-align: center;">
                                            <input class="uk-checkbox" type="checkbox" 
                                            style="width: 20px; height: 20px; margin-right: 15px;"></td>
                                        </tr>
HTML;
                                    echo $table;
                                }
                    break;

                    case "approved":
                                $sql = "SELECT 
                                Orders.Approved, 
                                Orders.OrderId, 
                                Suppliers.Name as SupplierName, 
                                Stock.Name as StockName, 
                                Orders.Amount, 
                                Orders.PurchaseDate, 
                                Orders.DeliveryDate,
                                Orders.ReceivedDate FROM `Orders`
                                INNER JOIN `Supplierstock` ON Orders.SupplierStockId = Supplierstock.SupplierStockId
                                INNER JOIN `Stock` ON Supplierstock.StockId = Stock.StockId
                                INNER JOIN `Suppliers` ON Supplierstock.SupplierId = Suppliers.SupplierId 
                                WHERE Orders.Approved = 1
                                ORDER BY Orders.OrderId";
                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $NumOfApproved = $row["Approved"];
                                        $orderID = $row["OrderId"];
                                        $spName = $row["SupplierName"];
                                        $stName = $row["StockName"];
                                        $amount = $row["Amount"];
                                        $pd = $row["PurchaseDate"];
                                        $dd = $row["DeliveryDate"];
                                        $rd = $row["ReceivedDate"];

                                        if ($NumOfApproved == 1) { 
                                            $checkbox = "<input class='uk-checkbox' type='checkbox'
                                            style='width: 20px; height: 20px; margin-right: 33px;' onchange='updateBox(this, $orderID)' value='1' checked>";
                                        } else {
                                            $checkbox = "<input class='uk-checkbox' type='checkbox'
                                            style='width: 20px; height: 20px; margin-right: 33px;' onchange='updateBox(this, $orderID)' value='0'>";
                                        }
                                        
                                        $table = <<< HTML
                                        <tr>
                                            <td>$orderID</td>
                                            <td>$spName</td>
                                            <td>$stName</td>
                                            <td>$amount</td>
                                            <td>$pd</td>
                                            <td>$dd</td>
                                            <td>$rd</td>
                                            <td style="text-align: center;">$checkbox</td>
                                        </tr>  
                                   
HTML;
                                        echo $table;
                                    }                                       
                                    
                                } else {                                   
                                    $noRecord = "No Record";
                                    $table = <<< HTML
                                        <tr>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td>$noRecord</td>
                                            <td style="text-align: center;">
                                            <input class="uk-checkbox" type="checkbox" 
                                            style="width: 20px; height: 20px; margin-right: 33px;"></td>
                                        </tr>
HTML;

                                    echo $table;
                                }
                            
                    break;

                    case "unapproved":
                                $sql = "SELECT 
                                Orders.Approved, 
                                Orders.OrderId, 
                                Suppliers.Name as SupplierName, 
                                Stock.Name as StockName, 
                                Orders.Amount, 
                                Orders.PurchaseDate, 
                                Orders.DeliveryDate,
                                Orders.ReceivedDate FROM `Orders`
                                INNER JOIN `Supplierstock` ON Orders.SupplierStockId = Supplierstock.SupplierStockId
                                INNER JOIN `Stock` ON Supplierstock.StockId = Stock.StockId
                                INNER JOIN `Suppliers` ON Supplierstock.SupplierId = Suppliers.SupplierId
                                WHERE Orders.Approved = 0
                                ORDER BY Orders.OrderId";

                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $NumOfApproved = $row["Approved"];
                                        $orderID = $row["OrderId"];
                                        $spName = $row["SupplierName"];
                                        $stName = $row["StockName"];
                                        $amount = $row["Amount"];
                                        $pd = $row["PurchaseDate"];
                                        $dd = $row["DeliveryDate"];
                                        $rd = $row["ReceivedDate"];
                                        
                                        if ($NumOfApproved == 1) { 
                                            $checkbox = "<input class='uk-checkbox' type='checkbox'
                                            style='width: 20px; height: 20px; margin-right: 10px;' onchange='updateBox(this, $orderID)' value='1' checked>";
                                        } else {
                                            $checkbox = "<input class='uk-checkbox' type='checkbox'
                                            style='width: 20px; height: 20px; margin-right: 10px;' onchange='updateBox(this, $orderID)' value='0'>";
                                        }

                                        $table = <<< HTML
                                        <tr>
                                            <td>$orderID</td>
                                            <td>$spName</td>
                                            <td>$stName</td>
                                            <td>$amount</td>
                                            <td>$pd</td>
                                            <td>$dd</td>
                                            <td>$rd</td>
                                            <td style="text-align: center;">$checkbox</td>
                                            <td><button class="uk-button uk-button-danger" type="button" 
                                            style="font-size: 16px;" onclick="deleteOrder($orderID)">Delete</button></td>
                                        </tr>                              
HTML;
                                        echo $table;
                                    }
                                } else {
                                    $noRecord = "No Record";
                                    $table = <<< HTML
                                    <tr>
                                        <td>$noRecord</td>
                                        <td>$noRecord</td>
                                        <td>$noRecord</td>
                                        <td>$noRecord</td>
                                        <td>$noRecord</td>
                                        <td>$noRecord</td>
                                        <td>$noRecord</td>
                                        <td style="text-align: center;">
                                        <input class="uk-checkbox" type="checkbox" 
                                        style="width: 20px; height: 20px; margin-right: 10px;"></td>
                                        <td><button class="uk-button uk-button-danger" type="button" 
                                        style="font-size: 16px;">Delete</button></td>
                                    </tr>
HTML;
                                    echo $table;
                                }
                            
                    
                    break;
                    default:
                    break;
                }
            }

  
?>

</body>
</html>
