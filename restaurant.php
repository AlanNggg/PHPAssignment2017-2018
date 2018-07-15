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
                           <tr>
                               <td>Table Data</td>
                               <td>Table Data</td>
                               <td>Table Data</td>
                               
                           </tr>
                           
                          
                       </tbody>
                    </table>
                    </div>
                 </div>

                 <div id="modal-Description" uk-modal>
               
               <div class="uk-modal-dialog uk-modal-body">

              <button class="uk-modal-close-default" type="button" uk-close></button>

              <h2 class="uk-modal-title">Restaurant Description</h2>
             
              <form>
                    <fieldset class="uk-fieldset">

                        <div class="uk-margin">
                             Restaurant Name:
                            <input class="uk-input" type="text" placeholder="Input">
                        </div>

                        

                        <div class="uk-margin">
                            Description:
                            <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                        </div>

                        <input class="uk-input uk-button uk-button-primary uk-width-1-2" type="submit" placeholder="Input">

                        

                    </fieldset>
                </form>

             
               </div>
            </div>
                        

</body>
</html>
