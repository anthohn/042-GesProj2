<?php
    include_path = ".:/home/username/include_directory";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Test query</title>
    </head>
    <body>
    <?php
        $sql = "SELECT * FROM users;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                echo $row['useUid'];
            }
        }
        echo["useUid"];
    ?>
    </body>
</html>