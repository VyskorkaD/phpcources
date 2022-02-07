<html>
    <head>
        <title>Unit 3</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            Please enter numbers separated by comma:<input type="text" name="numbers">
        <input type="submit">
        </form>
        <?php 
            if(!empty($_POST['numbers'])) {
                $data = $_POST['numbers'];
                $pattern = '/[^0-9,\s]/';
                if(preg_match($pattern, $data) != 0) {     //check if there are only numbers, commas and spaces
                    exit("Your input is invalid. <b>Only numbers, commas and spaces are allowed.</b> Please try again.");   
                }
                else {
                    $data = trim($data);
                    $length = strlen($data);
                    $numbers = array();
                    $numbers = explode(",", $data);
                    foreach ($numbers as $number) {
                        if($number < 1 || $number > 100 ) {
                            exit("Your input is invalid. <b>The numbers must remain between 1 and 100.</b> Please try again.");
                        }
                    }
                    foreach ($numbers as $number) {
                        $number = (int) $number;
                        for($i = 0; $i < $number; $i++) {
                            echo "<span style=\"background-color:red;color:red;\">a</span>";
                        }
                        echo "<span style=\"margin-left:10px;\">" . $number . "</span><br>";
                    }
                }
            }
            else {
                exit("Invalid input.");
            }
        ?>
    </body>
</html>
