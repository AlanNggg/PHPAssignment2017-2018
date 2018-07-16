
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
        function deleteOrder(data){
                        var xmlhttp;    
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
                                    document.getElementById("alertBox").innerHTML=xmlhttp.responseText;
                                    //set the html code to tetHint div box
                                    //alert("Delete Succerss");
                                }
                        }
                        //Use method Post to send the data to php
                        xmlhttp.open("POST","deleteOrder.php",true);
                        //Use set RequsetHeader when use post
                        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                        //Send the attribute to the php
                        xmlhttp.send("id="+data);

                        orderTable();
                    
        }

        function orderTable(){
                        
                        var id = document.getElementById("restId").getAttribute('data-value');
                        var role = document.getElementById("role").value;
                        var xmlhttp;    
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
                                    document.getElementById("orderTable").innerHTML=xmlhttp.responseText;
                                }
                        }
                        //Use method Post to send the data to php
                        xmlhttp.open("POST","reTable.php",true);
                        //Use set RequsetHeader when use post
                        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                        //Send the attribute to the php
                        xmlhttp.send("id="+id+"&role="+role);
        }

        function createOrder(){
            alert("HI");
            var id = document.getElementById("restId").getAttribute('data-value');
                       
                       var xmlhttp;    
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
                                   document.getElementById("createOrderForm").innerHTML=xmlhttp.responseText;
                               }
                       }
                       //Use method Post to send the data to php
                       xmlhttp.open("POST","createOrder.php",true);
                       //Use set RequsetHeader when use post
                       xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                       //Send the attribute to the php
                       xmlhttp.send("id="+id);
        }
        function checkData(){
                var orderID = document.getElementById("fOrderID").value;
                var restID = document.getElementById("fRestID").value;
                var pDate = document.getElementById("fDate").value;
                var stockID = document.querySelector('input[name="fItem"]:checked').value;
                var amount = document.getElementById("fAmount").value;

                if(orderID =="" || restID =="" || pDate =="" || amount==""){

                    alert("Please input All information ");
                    return;
                }
                var xmlhttp;    
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
                                    document.getElementById("createTable-alert").innerHTML=xmlhttp.responseText;
                                }
                        }
                        //Use method Post to send the data to php
                        xmlhttp.open("POST","createOrderSQL.php",true);
                        //Use set RequsetHeader when use post
                        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                        //Send the attribute to the php
                        xmlhttp.send("orderID="+orderID +"&restID="+restID +"&pDate="+pDate
                                        +"&stockID="+stockID +"&amount="+amount );
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

            echo "<div id=\"restId\" name=\"restId\" data-value='$username'></div>";
            echo "<input id=\"role\" type=\"hidden\" value='$role'>";

    ?>
            
            <!-- set of function button -->
            <button id="order"class="circle1" onclick="orderTable()" href="#modal-container"uk-toggle >
                <img class="btImage4" src="UI/material/content_paste_white_108x108.png"/><h1 class="fTitle1">Order</h1></button>

            <button class="circle2" href="#modal-WareHouse"uk-toggle>
                <img class="btImage4" src="UI/material/home_white_108x108.png"/><h1 class="fTitle1">WareHouse</h1></button>  

            <button class="circle3"  href="#modal-Description"uk-toggle>
                <img class="btImage4" src="UI/material/store_white_108x108.png"/><h1 class="fTitle1">Restaurant</h1></button>  
    
            <!-- function name -->


            <!-- function image -->

            

            <!-- Order function -->
           <div id="modal-container" class="uk-modal-container" uk-modal>
               <div id="alertBox"></div>
                <div class="uk-modal-dialog uk-modal-body">

                    <button class="uk-modal-close-default" type="button" uk-close></button>

                    <h2 class="uk-modal-title">Order</h2>

                    <button id="js-modal-prompt" onClick="createOrder()" class="uk-button uk-button-default" href="#createTable" uk-toggle>Create Order</button>
                   

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

                        <tbody id="orderTable"></tbody>

                    </table>
                 </div>
            </div>

                        <!-- Create Order Table -->
                        <div id="createTable" class="uk-modal-container" uk-modal>
                            
                    <!-- use dialog way -->
                            <div class="uk-modal-dialog">

                                <!-- Close button to close the modal -->
                                <button class="uk-modal-close-default" type="button" uk-close></button>

                                <!-- set grid and width about the modal uk-child-width-1-2 is mean it moke to class in half  -->
                                
                                
                                <!-- The header text of modal -->
                                <div class="uk-modal-header">
                                        <h2 class="uk-modal-title">Create Order</h2>
                                </div>
                                <div id="createTable-alert"></div>
                                    <!-- Set the padding with all under element uk-padding is defualt padding in UIkit  -->
                                    <div class="uk-padding">

                                        <form id="createOrderForm"></form>

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

             <!-- Restaurant Description-->
            <div id="modal-Description" uk-modal>
                <div id="txtHint" class="green"></div>
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
