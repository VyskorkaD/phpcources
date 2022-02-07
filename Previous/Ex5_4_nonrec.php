<html>
    <head>
        <title>Unit 5</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            Please enter n: <input type="text" name="number">
            <input type="submit">
        </form>
        <?php
        if (!empty($_POST['number']) && $_POST['number'] >= 0) {
            $n = $_POST['number'];
            function fib($n) {
                $sum = 0;
                $prev1 = 0;
                $prev2 = 1;
                if ($n == 0) {
                    return 0;
                } elseif ($n == 1 || $n == 2) {
                    return 1;
                } elseif ($n > 2) {
                    $sum = $prev1 + $prev2;
                    for ($i = 2; $i < $n; $i++) {
                        $prev1 = $prev2;
                        $prev2 = $sum;
                        $sum = $prev1 + $prev2;
                    }
                    return $sum;
                }
            }

            echo fib($n);
        } else {
            echo "Invalid input. Please try again.";
        }
        ?>
    </body>
</html>

