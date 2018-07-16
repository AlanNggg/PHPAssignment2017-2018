
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
    <script src="js/modifyDesc.js"></script>
    <script src="js/jquery-3.3.1.js"></script>

    <link rel="stylesheet" href="css/circle.css">
    <link rel="stylesheet" href="css/functionTitle.css">

   <script type="text/javascript">
        $(document).ready(function(){
                     // if Description button click 
                $("#submitDesc").click(function(){
                        
                        // $.post("sendPwd.php",{QQnum:$("#QQnum").val(),psw:$("#psw").val()},function(data){
                        // $("#aaa").html(data);
                        // },"html");

                        // Set all hint text is null text first 
                        document.getElementById("txtHintName").innerHTML="";
                        document.getElementById("txtHintDesc").innerHTML="";
                        document.getElementById("txtHint").innerHTML="";

                        //Get the value form form attribute
                        var id = document.getElementById("restId").getAttribute('data-value');
                        var name = document.getElementById("username").value;
                        var desc = document.getElementById("restDesc").value;
                        
                        var xmlhttp;    
                        //if name is no input
                        if (name=="")
                        {
                            document.getElementById("txtHintName").innerHTML="Please Input the Restaurant Name";
                            return;
                        //if Description is no input
                        }else if(desc==""){
                            document.getElementById("txtHintDesc").innerHTML="Please Input the Restaurant Description";
                            return;
                        }
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            if (window.XMLHttpRequest)
                            {
                                xmlhttp=new XMLHttpRequest();
                            }
                            // code for IE6, IE5
                            else
                            {
                                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                            }
                        //if the xmlhttp is change the status 
                        xmlhttp.onreadystatechange=function()
                        {
                            //Return the Connect Succese Message
                            if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                {
                                    //set the html code to tetHint div box
                                    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
                                }
                        }
                        //Use method Post to send the data to php
                        xmlhttp.open("POST","uploadSQL.php",true);
                        //Use set RequsetHeader when use post
                        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                        //Send the attribute to the php
                        xmlhttp.send("id="+id + "&name="+name + "&desc=" + desc);
                    });
        });

        function loadXMLDoc()
        {
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","/ajax/demo_post2.asp",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("fname=Bill&lname=Gates");
        }
</script>
    
<style>
    div.red
    {   
        color: red;
    }
    div.green
    {   
        color: green;
    }
</style>
   
</head>
<body>
    <?php
            
           
            $id = 1;
            
            

            echo "<div id=\"restId\" name=\"restId\" data-value='$id'></div>";

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
                     require_once("Connection.php");
                    $id = 1;
                    $sql = "SELECT * FROM restaurants WHERE RestaurantId= $id ";
                    $result = mysqli_query($conn, $sql)
                        or die(mysqli_error($conn));
                    $re = mysqli_fetch_assoc($result);
                    $rname = $re["Name"];
                    $desc = $re["Descriptions"];
                           $input = <<<HTM

                                <input id="username" name="username"class="uk-input" type="text" value="$rname">



                           
                            <div id="txtHintName" class="red"></div>
                        </div>
                        
                        
                        

                        <div class="uk-margin">
                            Description:
                            <textarea id="restDesc" name="restDesc" class="uk-textarea" rows="5" >$desc</textarea>
                            <div id="txtHintDesc" class="red"></div>
                        </div>
                        
                        
                        
                    
                            <input id="submitDesc" name="submitDesc" class="uk-input uk-button uk-button-primary uk-width-1-2" type="button" value="Submit"/>
HTM;
                            echo $input;
                    ?>
                    
                            </fieldset>

                </form>
                <div id="txtHint" class="green"></div>
             
               </div>
            </div>
                        

</body>
</html>
