<?php
           
         require_once("Connection.php");
         extract($_POST); 
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
                    echo "Record updated successfully";
                 } else {
                    echo "Error updating record: " . mysqli_error($conn);
                 }

                 mysqli_close($conn);

?>