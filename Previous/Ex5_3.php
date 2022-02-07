<html>
    <head>
        <title>Unit 5</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            Please enter numbers separated by comma and space: <input type="text" name="numbers">
            <input type="submit">
        </form>
        <?php
        if (!empty($_POST['numbers'])) {
            $numbers = explode(", ", $_POST['numbers']);
            $size = count($numbers);
            $sum = 0;
            $evenNumber = 0;
            $oddNumbers = array();
            for ($i = 0; $i < $size; $i++) {
                $sum += $numbers[$i];
                if ($numbers[$i] % 2 == 0) {
                    $evenNumber++;
                } else {
                    array_push($oddNumbers, $numbers[$i]);
                }
            }
        }
        echo "<b>Усі числа:</b><br>";
        foreach ($numbers as $number) {
            echo $number . "   ";
        }
        echo "<br>";
        echo "<b>Сума:</b> " . $sum . "<br>";
        echo "<b>Середнє значення:</b> " . $sum / $size . "<br>";
        echo "<b>Кількість парних чисел:</b> " . $evenNumber . "<br><br>";
        echo "<b>Непарні числа:</b><br>";
        foreach ($oddNumbers as $number) {
            echo $number . "   ";
        }
        ?>
    </body>
</html>
