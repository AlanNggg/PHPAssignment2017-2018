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
    
    <script>
        function showAll() {
            document.getElementById("tableTitle").innerHTML = "All Order";
            document.getElementById("allTable").style.display = "";
            document.getElementById("approvedTable").style.display = "none";
            document.getElementById("unapprovedTable").style.display = "none";
        }
        function showApproved() {
            document.getElementById("tableTitle").innerHTML = "Approved Order";
            document.getElementById("allTable").style.display = "none";
            document.getElementById("approvedTable").style.display = "";
            document.getElementById("unapprovedTable").style.display = "none";
        }
        function showUnapproved() {
            document.getElementById("tableTitle").innerHTML = "Unapproved Order";
            document.getElementById("allTable").style.display = "none";
            document.getElementById("approvedTable").style.display = "none";
            document.getElementById("unapprovedTable").style.display = "";
        }
    </script>
</head>
<body>
            <!-- set of function button -->
            <button class="circle1" style="top: 40%; left: 30%; height: 200px; width: 200px;" href="#modal-container"uk-toggle>
                <img class="btImage4" style="width: 100px; height: 100px" 
                src="UI/material/content_paste_white_108x108.png"/>
                <h1 class="fTitle1" style="font-size: 30px">Order</h1></button>

            <button class="circle2" style="top: 40%; left: 60%; height: 200px; width: 200px;" >
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
                    <!-- Show the  order table -->
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
                        <tbody>
                            <tr>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td style="text-align: center;"><input id="approve" class="uk-checkbox" type="checkbox" style="width: 20px; height: 20px; margin-right: 15px;"></td>
                            </tr>
                            
                           
                        </tbody>
                    </table>

                    <!-- Show the  Approved  order table -->
                    <table id="approvedTable" style="display: none;" class="uk-table uk-table-hover uk-table-divider">
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
                        <tbody>
                            <tr>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td style="text-align: center;"><input id="approve" class="uk-checkbox" type="checkbox" style="width: 20px; height: 20px; margin-right: 33px;"></td>
                            </tr>                           
                        </tbody>
                    </table>

                    <!-- Show the  Unapproved  order table -->
                    <table id="unapprovedTable" style="display: none;" class="uk-table uk-table-hover uk-table-divider">
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
                        <tbody>
                            <tr>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td style="text-align: center;"><input id="approve" class="uk-checkbox" type="checkbox" style="width: 20px; height: 20px; margin-right: 10px;"></td>
                                <td><button class="uk-button uk-button-danger" type="button" style="font-size: 16px;">Delete</button></td>
                            </tr>
                            
                           
                        </tbody>
                    </table>
                            </div>
                    </div>

                        <!-- Create Order Table -->
                        <div id="modal-createOrder" class="uk-modal-full" uk-modal>
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
