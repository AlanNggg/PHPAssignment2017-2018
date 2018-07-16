<?php
           
         require_once("Connection.php");
         extract($_POST); 
         if ($role == "restaurants") {
            echo $name;
                        
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
                 
         } else if ($role == "managers") {
             $sql = "UPDATE `Orders`
                    SET Approved = '$approved',
                        ManagerId = '$id'
                    WHERE Orders.OrderId = '$orderId'";
            $result = mysqli_query($conn, $sql);

            if (!mysqli_query($conn, $sql)) {
                echo "Error updating record: " . mysqli_error($conn);
            } else {
                $input = <<< HTML
                    <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>Update Success.</p>
                     </div>
HTML;
             echo $input;
            }
         }
         

?>
