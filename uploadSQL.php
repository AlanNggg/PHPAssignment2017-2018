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
</head>
<body>
    
</body>
</html>
<?php
           
         require_once("Connection.php");
         extract($_POST); 
         //echo $name;
                        
         $sql = "UPDATE restaurants
                 SET Name = '$name'
                 WHERE restaurants.RestaurantId = '$id'";

                 if (!mysqli_query($conn, $sql)) {
                echo "Error updating record: " . mysqli_error($conn);
                 }
         $sql = "UPDATE restaurants
                 SET Descriptions = '$desc'
                 WHERE restaurants.RestaurantId = '$id'";

                 if (mysqli_query($conn, $sql)) {
                    $input = <<< HTML
                    <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>Update Success.</p>
                     </div>
HTML;
             echo $input;
                 } else {
                    $input = <<< HTML
                    <div class="uk-alert-danger" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>"Error updating record: " . mysqli_error($conn);</p>
                     </div>
HTML;
             echo $input;
                   
                 }

                 mysqli_close($conn);

?>

</body>
</html>