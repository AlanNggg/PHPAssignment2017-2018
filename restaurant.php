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
    
</head>
<body>
            <!-- set of function button -->
            <button class="circle1" href="#modal-container"uk-toggle></button>
            <span class="circle2"></span>
            <span class="circle3"></span>
            <!-- function name -->
            <h1 class="fTitle1">Order</h1>
            <h1 class="fTitle2">WareHouse</h1>
            <h1 class="fTitle3">Restaurant</h1>

            <!-- function image -->
            <img class="btImage1" src="UI/material/content_paste_white_108x108.png"/ >
            <img class="btImage2" type="image" src="UI/material/home_white_108x108.png" />
            <img class="btImage3" type="image" src="UI/material/store_white_108x108.png" />
            

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
                            <tr>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td><button class="uk-button uk-button-danger" type="button">Delete</button></td>
                            </tr>
                            
                           
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
                                <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid> 

                                <!-- The header text of modal -->
                                    <div class="uk-modal-header">
                                        <h2 class="uk-modal-title">Create Order</h2>
                                    
                                    <!-- Set the padding with all under element uk-padding is defualt padding in UIkit  -->
                                     <div class="uk-padding">

                                         <!-- Form -->
                                     <form class="uk-form-stacked">
                                        <!-- Restaurant ID info -->
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text">Restaurant Id</label>
                                            <div class="uk-form-controls">
                                                <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
                                            </div>
                                        </div>
                                        <!-- Supplier Stock ID -->
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text">SupplierStock Id</label>
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
                                 
                                    <!-- The button set of the modal page -->
                                     <div class="uk-modal-footer uk-text-right">
                                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                        <button class="uk-button uk-button-primary" type="button">Save</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        

</body>
</html>