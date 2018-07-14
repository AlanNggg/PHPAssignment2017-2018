<?php
    require_once "Connection.php";

    extract($_POST);

    $sql = "SELECT * FROM `managers`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $table = <<< EOF
                    <table>
                        <tr>
                            <th>ManagerId</th>
                            <th>Name</th>
                            <th>Password</th>
                        </tr>
EOF;
                echo $table;
            } 

    if (isset($_POST["username"], $_POST["password"], $_POST["role"])) {        
        
        switch ($role) {
            case "managers":

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["ManagerId"] == $username && $row["Password"] == $password) {
                    echo "<tr><th>".$row["ManagerId"]."</th>";
                    echo "<th>".$row["Name"]."</th>";
                    echo "<th>".$row["Password"]."</th></tr>";
                }
            }
            break;
        }
    
        
        
    }
   
?>