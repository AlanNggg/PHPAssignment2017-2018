
<?php
     require_once("Connection.php");
     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
     extract($_REQUEST);

     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

     <!-- UIkit CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.8/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.8/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.8/js/uikit-icons.min.js"></script>


    <link rel="stylesheet" href="css/circle.css">
    <link rel="stylesheet" href="css/functionTitle.css">

   <?php
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET["act"])){
                $rname = $_GET['rname'];
                $rmid = $_GET['rmid'];
                $sql = "UPDATE restaurants SET Name = `$rname` WHERE RestaurantId=$rmid";

                if ($conn->query($sql) === TRUE) {
                    $script = <<< JS
                    <script>
                    alert("Record updated successfully");
                    </script>
JS;
                echo $script;
                   
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                    
           
              
           }
            
        }
   
   
   ?>
      
            <script>
                function updateDate(){
                
                    var name = document.getElementById("username").value;
                    
                    var desc = document.getElementById("restDesc").value;
                    alert(name + desc);

                    if(name == "" || desc == ""){
                        alert("Please Input the information");
                        return;
                    }else{

                        <?php
                               $id = 1;
                                $sql = "UPDATE restaurants SET ='Doe' WHERE id = $id";
                                if ($conn->query($sql) === TRUE) {
                                    echo "Record updated successfully";
                                } else {
                                    echo "Error updating record: " . $conn->error;
                                }
                        ?>
                    }
                
                }

            </script>
    


   
</head>
<body>
    <?php
            
           
            $id = 1;
            $sql = "SELECT * FROM restaurants WHERE RestaurantId= $id ";
            $result = mysqli_query($conn, $sql)
                or die(mysqli_error($conn));
            $re = mysqli_fetch_assoc($result);
            $rname = $re["Name"];
            $desc = $re["Descriptions"];
            mysqli_free_result($result);

    ?>
            <!-- set of function button -->
            <button class="circle1" href="#modal-container"uk-toggle>
                <img class="btImage4" src="UI/material/content_paste_white_108x108.png"/><h1 class="fTitle1">Order</h1></button>

            <button class="circle2" href="#modal-WareHouse"uk-toggle>
                <img class="btImage4" src="UI/material/home_white_108x108.png"/><h1 class="fTitle1">WareHouse</h1></button>  

            <button class="circle3" href="#modal-Description"uk-toggle>
                <img class="btImage4" src="UI/material/store_white_108x108.png"/><h1 class="fTitle1">Restaurant</h1></button>  
    
            <!-- function name -->


            <!-- function image -->

            

            <!-- Order function when user click the order button  -->
           <div id="modal-container" class="uk-modal-container" uk-modal>
               
                <div class="uk-modal-dialog uk-modal-body">

                    <button class="uk-modal-close-default" type="button" uk-close></button>

                    <h2 class="uk-modal-title">Order</h2>

                    <a id="js-modal-prompt" class="uk-button uk-button-default" href="#modal-createOrder" uk-toggle>Create Order</a>
                   

                    <!-- Show the  order table -->
                    <table class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>OrderId</th>
                                <th>Supplier Name</th>
                                <th>Stock Name</th>
                                <th>Order Amount</th>
                                <th>Purchase Date</th>
                                <th>Delivery Date</th>
                                <th>Received Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        $sql = "SELECT orders.OrderId,
                                suppliers.Name AS SpName,
                                stock.Name AS StName,
                                orders.Amount,
                                orders.PurchaseDate,
                                orders.DeliveryDate,
                                orders.ReceivedDate
                                FROM orders,stock,suppliers,supplierStock
                                WHERE orders.RestaurantId = $id
                                && orders.SupplierStockId = supplierStock.SupplierStockId
                                && supplierStock.SupplierId = suppliers.SupplierId
                                && supplierStock.StockID = stock.StockID ";
                                
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
                                    <td><button class="uk-button uk-button-danger" type="button">Delete</button></td>
                                </tr>

                        
HTML;
                        echo $table;
                        }


                     mysqli_free_result($result);
                    ?>
                            
                           
                        </tbody>
                    </table>
                 </div>
            </div>

                        <!-- Create Order Table -->
                        <div id="modal-createOrder" class="uk-modal-full" uk-modal>
                            <!-- use dialog way -->
                            <div class="uk-modal-dialog">

                                <!-- Close button to close the modal -->
                                <button class="uk-modal-close-default" type="button" uk-close></button>

                                <!-- set grid and width about the modal uk-child-width-1-2 is mean it moke to class in half  -->
                                

                                <!-- The header text of modal -->
                                    <div class="uk-modal-header">
                                        <h2 class="uk-modal-title">Create Order</h2>
                                    </div>
                                    <!-- Set the padding with all under element uk-padding is defualt padding in UIkit  -->
                                    <div class="uk-padding">
                                        <form class="uk-grid-small" uk-grid>

                                            <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                                                    <div class="uk-width-1-2">
                                                        Order ID:
                                                        <input class="uk-input uk-form-width-medium" type="text" placeholder="100">
                                                    </div>
                                                    <div class="uk-width-1-2">
                                                         Order ID:
                                                        <input class="uk-input uk-form-width-medium" type="text" placeholder="100">
                                                    </div>

                                             </div>

                                            <div class="uk-width-1-1">
                                                Order ID:
                                                <input class="uk-input uk-form-width-medium" type="text" placeholder="100">
                                            </div>
                                       
                                            <div uk-overflow-auto>

                                            <table class="uk-table uk-table-hover uk-table-divider">
                                                <thead>
                                                    <tr>
                                                        <th>Stock ID</th>
                                                        <th>Stock Name</th>
                                                        <th>Amount</th>
                                                        <th>Select</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 
                                                <?php
                        
                                                        $sql = "SELECT supplierStock.StockID,
                                                                stock.Name AS stName,
                                                                supplierStock.Amount
                                                                FROM stock,supplierStock
                                                                WHERE supplierStock.StockID = stock.StockID";
                                                                
                                                        $result = mysqli_query($conn, $sql)
                                                            or die(mysqli_error($conn));
                                                    
                                                      
                                                    
                                                        while($re = mysqli_fetch_assoc($result)){
                                                            $stockID = $re["StockID"];
                                                            $sname = $re["stName"];
                                                            $amount =  $re["Amount"];
                                                            
                                                            $table = <<<HTML
                                                                <tr>
                                                                    <td>$stockID</td>
                                                                    <td>$sname</td>
                                                                    <td>$amount</td> 
                                                                    <td>
                                                                    <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                                                    <label><input class="uk-radio" type="radio" name="radio2" ></label>
                                                                    </div></td>
                                                                </tr>

                                                            
HTML;
                                                        echo $table;
                                                        }


                                                        mysqli_free_result($result);
                                                    ?>
                                                    
                                                </tbody>
                                            </table>
                                                    </div>
                                        </form>
                                     </div>   
                             </div>
                        </div>


                <!-- Function of wareHouse -->
                <div id="modal-WareHouse" class="uk-modal-container" uk-modal>
               
                    <div class="uk-modal-dialog uk-modal-body">

                   <button class="uk-modal-close-default" type="button" uk-close></button>

                   <h2 class="uk-modal-title">WareHouse</h2>

                   <!-- Show the  Item table -->
                   <table class="uk-table uk-table-hover uk-table-divider">
                       <thead>
                           <tr>
                               <th>Stock ID</th>
                               <th>Stock Name</th>
                               <th>Amount</th>
                               
                           </tr>
                       </thead>
                       <tbody>

                       <?php
                        
                            $sql = "SELECT stock.StockId,stock.Name,warehousestock.Amount FROM stock INNER JOIN warehousestock ON stock.Stockid = warehousestock.StockId ";
                            $result = mysqli_query($conn, $sql)
                                or die(mysqli_error($conn));
                           
                        
                           
                            while($re = mysqli_fetch_assoc($result)){
                                 $name = $re["Name"];
                                 $id = $re["StockId"];
                                 $amount = $re["Amount"];
                            echo "
                                    <tr>
                                        <td>$id</td>
                                        <td>$name</td>
                                        <td>$amount</td>
                                     </tr>
                                ";
                            }
                            mysqli_free_result($result);
                        ?>
                        
                           
                           
                          
                       </tbody>
                    </table>
                    </div>
                 </div>

                 <div id="modal-Description" uk-modal>
               
               <div class="uk-modal-dialog uk-modal-body">

              <button class="uk-modal-close-default" type="button" uk-close></button>

              <h2 class="uk-modal-title">Restaurant Description</h2>
             
              <form id="descForm" name="descForm"action="control.php?act=list">
                    <fieldset class="uk-fieldset">

                        <div class="uk-margin">
                             Restaurant Name:
                             <?php
                                    $input = <<< HTML

                                <input id="username" name="username"class="uk-input" type="text" value="$rname">

HTML;

                            echo $input;
                             ?>
                            
                        </div>

                        

                        <div class="uk-margin">
                            Description:
                            <textarea id="restDesc" name="restDesc" class="uk-textarea" rows="5" > <?php echo $desc;?></textarea>
                        </div>

                        
                 <?php          
                    $input = <<< HTML
                            <input class="uk-input uk-button uk-button-primary uk-width-1-2" type="button" 
                             onclick="location.href='restaurant.php?rmid=$id&act=desc&rname='+document.descForm.username.value + '&restDesc=' + document.descForm.restDesc.value" >
HTML;
                            echo $input;
                    ?>
                            </fieldset>

                </form>
                
             
               </div>
            </div>
                        

</body>
</html>
