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

       <script>
            function checkData(){
                alert("YO");
            }
       </script>
</head>
<body>
<?php
            require_once("Connection.php");
            extract($_POST);

            $sql = "SELECT *
            FROM restaurants
            WHERE RestaurantId = '$id'";
            
    $result = mysqli_query($conn, $sql)
        or die(mysqli_error($conn));
    $re = mysqli_fetch_assoc($result);
    $restName = $re["Name"];


    $sql = "SELECT COUNT(OrderId) AS num
            FROM orders";
            
    $result = mysqli_query($conn, $sql)
        or die(mysqli_error($conn));
    $re = mysqli_fetch_assoc($result);
    $num = $re["num"];
    $num++;

    $html =<<<HTML
   <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle uk-margin-small-bottom" uk-grid>
                                                    <div class="uk-width-1-2">
                                                        Order ID:
                                                        <input id="fOrderID" class="uk-input uk-form-width-medium" type="text" value="$num">
                                                    </div>
                                                    
                                             </div>

                                              <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle uk-margin-small-bottom" uk-grid>
                                                    <div class="uk-width-1-2">
                                                        Restaurant ID:
                                                        <input id="fRestID"class="uk-input uk-form-width-medium" type="text" value="$id" readonly="readonly"/>
                                                    </div>
                                                    <div class="uk-width-1-2">
                                                         Restaurant Name:
                                                        <input  class="uk-input uk-form-width-medium" type="text" value="$restName" readonly="readonly"/>
                                                    </div>

                                             </div>

                                             <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle uk-margin-small-bottom" uk-grid>
                                                    <div class="uk-width-1-2">
                                                        PurchaseDate:
                                                        <input id="fDate"id="orderDate" class="uk-input uk-form-width-medium" type="date">
                                                    </div>
                                                    
                                             </div>

                                       
                                            <div uk-overflow-auto>

                                            <table class="uk-table uk-table-hover uk-table-divider">
                                                <thead>
                                                    <tr>
                                                        <th>Supplier Stock ID</th>
                                                        <th>Stock Name</th>
                                                        <th>Amount</th>
                                                        <th>Select</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
HTML;
echo $html;
?>                                                 
                                                <?php
                        
                                                        $sql = "SELECT supplierStock.StockId,
                                                                supplierStock.SupplierStockId,
                                                                stock.Name AS stName,
                                                                supplierStock.Amount
                                                                FROM stock,supplierStock
                                                                WHERE supplierStock.StockID = stock.StockID";
                                                                
                                                        $result = mysqli_query($conn, $sql)
                                                            or die(mysqli_error($conn));
                                                    
                                                      
                                                    
                                                        while($re = mysqli_fetch_assoc($result)){
                                                            $stockID = $re["SupplierStockId"];
                                                            $sname = $re["stName"];
                                                            $amount =  $re["Amount"];
                                                            
                                                            $table = <<<HTML
                                                                <tr>
                                                                    <td>$stockID</td>
                                                                    <td>$sname</td>
                                                                    <td>$amount</td> 
                                                                    <td>
                                                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                                                    <label><input class="uk-radio" type="radio" id="fItem "name="fItem" value="$stockID"></label>
                                                                    </div></td>
                                                                    
                                                                </tr>

                                                            
HTML;
                                                        echo $table;
                                                        }


                                                        mysqli_free_result($result);
                                                    ?>
<?php   
    $input = <<<HTML
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-margin-top" uk-gri>
                                                                    Amount:
                                                                    <input class="uk-input" id="fAmount"type="number" id="orderAmount"name="orderAmount" value=0 >
                                         </div>
                                        <input id="" name="" onclick="checkData()" class="uk-input uk-button uk-button-primary uk-width-1-2" type="button" value="Submit"/>
HTML;
echo $input;
?>
</body>
</html>
<?php




?>