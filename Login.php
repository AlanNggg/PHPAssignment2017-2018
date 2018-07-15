<?php
    require_once("Connection.php");

    extract($_POST);

    function goToControl($role, $username, $password, $name) {
        $form = <<< EOF
                    <form method="POST" action="control.php" id="goToControlForm">
                        <input type="hidden" name="role" id="role" value="$role"/>
                        <input type="hidden" name="name" id="name" value="$name"/>
                        <input type="hidden" name="username" id ="username" value="$username"/>
                        <input type="hidden" name="password" id ="password" value="$password"/>
                    </form>
EOF;
        echo $form;
        ?>
        
        <script type="text/javascript">
            document.getElementById("goToControlForm").submit();
        </script>
        
        <?php
    }

    $sql = "SELECT * FROM `$role`";
    $result = mysqli_query($conn, $sql);
    $success = false;

    if (isset($username, $password, $role)) {        
        
        switch ($role) {
            case "managers":
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["ManagerId"] == $username && $row["Password"] == $password) {
                    $name = $row["Name"];
                    $success = true;
                    goToControl($role, $username, $password, $name);
                }
            }
            
            break;

            case "restaurants":
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["RestaurantId"] == $username && $row["Password"] == $password) {
                    $name = $row["Name"];
                    $success = true;
                    goToControl($role, $username, $password, $name);
                }
            }
            
            break;

            default:
            break;
        }          

        if (!$success) {
            header("Location: Login.html");
        }
    }
?>
