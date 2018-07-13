<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controls</title>

    <!-- import Library: Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.8/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.8/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.8/js/uikit-icons.min.js"></script>

    <link rel="stylesheet" href="css/font.css">
    
    <link rel="stylesheet" href="css/typing.css">
    <style>
            .background-image{
                position: fixed;
                left: 0;
                right: 0;
                z-index: 0;
                background-image: url("UI/material/background.jpg");
                width: 1920px;
                height: 960px;
                
                -webkit-filter: blur(2px);
                 -moz-filter: blur(2px);
                 -o-filter: blur(2px);
                -ms-filter: blur(2px);
                 filter: blur(3px);
                }
                
    </style>

  
</head>
<body >
        <div id="title" >Order System</div>
        <div id="subtitle">www.orderSystem.com</div>

        <!-- nabBar -->
        <div class="pos-f-t">
                 <nav class="navbar navbar-white bg-dark">
                 <button class="uk-button uk-button-default uk-margin-small-right bg-white" type="button" uk-toggle="target: #offcanvas-nav-primary" uk-icon="icon: table">Menu</button>
                
                        <div id="offcanvas-nav-primary" uk-offcanvas="overlay: true">
                        <div class="uk-offcanvas-bar uk-flex uk-flex-column">

                         <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
                         <input  type="image" src="UI/material/account_circle_white_96x96.png" />
                         <li class="uk-active">Tom Wong</li>
                         <li class="uk-nav-divider"></li>
                                <li class="uk-parent">
                                      <a href="#" > <span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span>Setting</a>
                                      
                                     <ul class="uk-nav-sub">
                                         <li><a href="#">Sub</a></li>
                                         <li><a href="#">Sub</a></li>
                                      </ul>
                                </li>
                                <li class="uk-nav-divider"></li>
                         <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Logout</a></li>
                    </ul>

        </div>
    </div>

     
                  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button> -->
                  
                </nav>

          
    </div>
                <!-- <div class="collapse" id="navbarToggleExternalContent">
                        <div class="bg-dark p-4">
                          <h5 class="text-white h4">Collapsed content</h5>
                          <span class="text-muted">Toggleable via the navbar brand.</span>
                        </div>
                      </div> -->
            </div>
        
            <!-- Background image -->
        <div class="background-image"> </div>

            <!-- Word typing effect -->
            <div class="typing">
                <h1>Nice to meet You!</h1>
            </div>

            <?php
                    $id = "restaurant";
                    // check user from which department and get the suitable function,make website consistency.
                    if($id == "restaurant")
                        require("restaurant.php");
                    else{
                        require("manager.php");
                    }
            ?>
    
</body>
</html>