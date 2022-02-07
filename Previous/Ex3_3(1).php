<html>
    <head>
        <title>Unit 3</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            Pyramid height: <input type="text" name="height">
        <input type="submit">
        </form>
        <div>
            <?php
            if(!empty($_POST['height']) && $_POST['height'] > 0 && $_POST['height'] <= 15) {
                $height = $_POST['height'];
                for($i = $height; $i > 0; $i--) {
                    for($j = 14; $j > 15 - $i; $j--) {
                        echo "<span style=\"color:white\">#</span>";
                    }
                    for($k = 0; $k <= 15 - $i; $k++) {
                        echo "<span style=\"color:black\">#</span>";
                    }
                    echo "<br>";
                }
            }
            else {
                exit("Invalid input.");
            }
            ?>
            
        </div>
    </body>
</html>
