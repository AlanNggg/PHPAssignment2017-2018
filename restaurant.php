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

                    <a id="js-modal-prompt" class="uk-button uk-button-default" href="#">Prompt</a>
                    <script>

                        UIkit.util.on('#js-modal-prompt', 'click', function (e) {
                            e.preventDefault();
                            e.target.blur();
                            UIkit.modal.prompt('Name:', 'Your name').then(function (name) {
                                console.log('Prompted:', name)
                            });
                        });

                    </script>

                    <table class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>Table Heading</th>
                                <th>Table Heading</th>
                                <th>Table Heading</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                            </tr>
                            <tr>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                            </tr>
                            <tr>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                            </tr>
                           
                        </tbody>
                    </table>
                            </div>
                    </div>

</body>
</html>