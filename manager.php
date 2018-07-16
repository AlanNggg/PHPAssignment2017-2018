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
    
    <script arc="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function showAll() {
            document.getElementById("tableTitle").innerHTML = "All Order";
            document.getElementById("allTable").style.display = "";
            document.getElementById("approvedTable").style.display = "none";
            document.getElementById("unapprovedTable").style.display = "none";
            orderTable("all");
        }
        function showApproved() {
            document.getElementById("tableTitle").innerHTML = "Approved Order";
            document.getElementById("allTable").style.display = "none";
            document.getElementById("approvedTable").style.display = "";
            document.getElementById("unapprovedTable").style.display = "none";
            orderTable("approved");
        }
        function showUnapproved() {
            document.getElementById("tableTitle").innerHTML = "Unapproved Order";
            document.getElementById("allTable").style.display = "none";
            document.getElementById("approvedTable").style.display = "none";
            document.getElementById("unapprovedTable").style.display = "";
            orderTable("unapproved");
        }
        
        function updateBox(DOM, OrderId) {
            if (DOM.value == 1) {
                DOM.value = 0;                
            } else {
                DOM.value = 1;
            }

            var id = document.getElementById("managerId").value;
            var role = document.getElementById("role").value;
            var approved = DOM.value;

            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
                }
            }
            
            xmlhttp.open("POST", "uploadSQL.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("role=" + role + "&id=" + id + "&approved=" + approved + "&orderId=" + OrderId);
            
            var type;

            if (document.getElementById("allTable").style.display == "") {
                type = "all";
            } else if (document.getElementById("approvedTable").style.display == "") {
                type = "approved";
            } else if (document.getElementById("unapprovedTable").style.display == "") {
                type = "unapproved";
            }
            
            orderTable(type);
        }

        function deleteOrder(data){
            var xmlhttp;    
            // code for IE7+, Firefox, Chrome, Opera, Safari
            if (window.XMLHttpRequest) {
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

            var type;

            if (document.getElementById("allTable").style.display == "") {
                type = "all";
            } else if (document.getElementById("approvedTable").style.display == "") {
                type = "approved";
            } else if (document.getElementById("unapprovedTable").style.display == "") {
                type = "unapproved";
            }

            orderTable(type);
                    
        }

        function orderTable(type){
            var id = document.getElementById("managerId").value;
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
                    if (document.getElementById("allTable").style.display == "") {
                        document.getElementById("allOrderTable").innerHTML=xmlhttp.responseText;

                    } else if (document.getElementById("approvedTable").style.display == "") {
                        document.getElementById("approvedOrderTable").innerHTML=xmlhttp.responseText;

                    } else if (document.getElementById("unapprovedTable").style.display == "") {
                        document.getElementById("unapprovedOrderTable").innerHTML=xmlhttp.responseText;
                    }
                }
            }
            //Use method Post to send the data to php
            xmlhttp.open("POST","reTable.php",true);
            //Use set RequsetHeader when use post
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            //Send the attribute to the php
            xmlhttp.send("role=" + role + "&id=" + id + "&type=" + type);
        }
    </script>
</head>
<body>
    <?php
            
            echo "<input id=\"managerId\" name=\"managerId\" type=\hidden\" value='$username'>";
            echo "<input id=\"role\" type=\"hidden\" value='$role'>";

    ?>

            <!-- set of function button -->
            <button class="circle1" style="top: 40%; left: 30%; height: 200px; width: 200px;" onclick="orderTable('all')" 
            href="#modal-container"uk-toggle>
                <img class="btImage4" style="width: 100px; height: 100px" 
                src="UI/material/content_paste_white_108x108.png"/>
                <h1 class="fTitle1" style="font-size: 30px">Order</h1></button>

            <button class="circle2" style="top: 40%; left: 60%; height: 200px; width: 200px;" 
            href="#modal-container"uk-toggle>
                <img class="btImage4" style="width: 100px; height: 100px" 
                src="UI/material/stock_white_100x100.png"/>
                <h1 class="fTitle1" style="font-size: 30px">Stock</h1></button>
            
            

            <!-- Order function when user click the order button  -->
           <div id="modal-container" class="uk-modal-container" uk-modal>
               
                <div class="uk-modal-dialog uk-modal-body">

                    <button class="uk-modal-close-default" type="button" uk-close></button>

                    <h2 class="uk-modal-title">Order</h2>

                    <button class="uk-button uk-button-default" type="button">Show Order</button>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                            <li><a onclick="showAll()">All Order</a></li>
                            <li><a onclick="showApproved()">Approved Order</a></li>
                            <li><a onclick="showUnapproved()">Unapproved Order</a></li>
                        </ul>
                    </div>

                    <br><br>
                    <span id="tableTitle" class="uk-label" style="font-size: 20px; background-color: black">All Order</span>

<!-- Show the All order table -->              
                    <br><br>
                    <div id="txtHint" class="green"></div>
                    <div id="alertBox"></div>
                    <table id="allTable" class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>Approve</th>
                                <th>OrderId</th>
                                <th>Supplier Name</th>
                                <th>Stock Name</th>
                                <th>Order Amount</th>
                                <th>Purchase Date</th>
                                <th>Delivery Date</th>
                                <th>Received Date</th>
                                <th><span class="uk-label">Update Approve</span></th>
                            </tr>
                        </thead>

                        <tbody id="allOrderTable">
                        </tbody>
                    </table>
                    </form>
                    
<!-- Show the  Approved  order table -->

                    <table id="approvedTable" class="uk-table uk-table-hover uk-table-divider" style="display: none;">
                        <thead>
                            <tr>
                                <th>OrderId</th>
                                <th>Supplier Name</th>
                                <th>Stock Name</th>
                                <th>Order Amount</th>
                                <th>Purchase Date</th>
                                <th>Delivery Date</th>
                                <th>Received Date</th>
                                <th><span class="uk-label">Update Approve</span></th>
                            </tr>
                        </thead>

                        <tbody id="approvedOrderTable">                                                         
                        </tbody>
                    </table>

<!-- Show the  Unapproved  order table -->

                    <table id="unapprovedTable" class="uk-table uk-table-hover uk-table-divider" style="display: none;">
                        <thead>
                            <tr>
                                <th>OrderId</th>
                                <th>Supplier Name</th>
                                <th>Stock Name</th>
                                <th>Order Amount</th>
                                <th>Purchase Date</th>
                                <th>Delivery Date</th>
                                <th>Received Date</th>
                                <th><span class="uk-label">Update Approve</span></th>
                                <th><span class="uk-label uk-label-danger">Delete Order</span></th>
                            </tr>
                        </thead>

                        <tbody id="unapprovedOrderTable">                                                                          
                        </tbody>
                    </table>
                    </form>
                            </div>
                    </div>

                        <!-- Create Order Table -->
                        <div id="modal-addStock" class="uk-modal-full" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                <div class="uk-modal-header">
                                    <h2 class="uk-modal-title">Create Order</h2>
                                </div>
                                <div class="uk-padding">
                                <form class="uk-form-stacked">

                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text">Text</label>
                                            <div class="uk-form-controls">
                                                <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-select">Select</label>
                                            <div class="uk-form-controls">
                                                <select class="uk-select" id="form-stacked-select">
                                                    <option>Option 01</option>
                                                    <option>Option 02</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="uk-margin">
                                            <div class="uk-form-label">Radio</div>
                                            <div class="uk-form-controls">
                                                <label><input class="uk-radio" type="radio" name="radio1"> Option 01</label><br>
                                                <label><input class="uk-radio" type="radio" name="radio1"> Option 02</label>
                                            </div>
                                        </div>

                                </form>
                                 </div>
                                <div class="uk-modal-footer uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                    <button class="uk-button uk-button-primary" type="button">Save</button>
                                </div>
                            </div>
                        </div>

</body>
</html>
