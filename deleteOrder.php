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

    $sql = "SELECT Approved
            FROM orders
            WHERE orderId = '$id'";

            if (!mysqli_query($conn, $sql)) {
                echo "Error updating record: " . mysqli_error($conn);
            }

        $result = mysqli_query($conn, $sql);
        $re = mysqli_fetch_assoc($result);
        // if order is approved
        if($re["Approved"] == 1){

                $sql = "DELETE FROM orders
                        WHERE orderId = '$id'";

            $result = mysqli_query($conn, $sql)
                    or die(mysqli_error($conn));

                $input = <<< HTML
                <div class="uk-alert-success" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>Delete Order success.</p>
                 </div>
HTML;
         echo $input;

        }else{
            $input = <<< HTML
            <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>Can't no delete this order because this order is already approved.</p>
             </div>
HTML;
     echo $input;
        }




  
?>