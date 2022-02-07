<html>
    <head>
        <title>Unit 5</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
            Please enter names separated by commas: <input type="text" name="names">
            <input type="submit">
        </form>


        <?php
        $names = preg_split("/[\s,]+/", $_POST['names']);
        function sortUkr($a, $b) {
            $a = mb_strtoupper($a, 'UTF-8');
            $b = mb_strtoupper($b, 'UTF-8');
            $alphabet = array(
                'А' => 1, 'Б' => 2, 'В' => 3, 'Г' => 4, 'Д' => 5, 'Е' => 6, 'Є' => 7, 'Ж' => 8, 'З' => 9, 'И' => 10, 'І' => 11,
                'Ї' => 12, 'Й' => 13, 'К' => 14, 'Л' => 15, 'М' => 16, 'Н' => 17, 'О' => 18, 'П' => 19, 'Р' => 20, 'С' => 21, 'Т' => 22,
                'У' => 23, 'Ф' => 24, 'Х' => 25, 'Ц' => 26, 'Ч' => 27, 'Ш' => 28, 'Щ' => 29, 'Ь' => 30, 'Ю' => 31, 'Я' => 32
            );
            $lengthA = mb_strlen($a, 'UTF-8');
            $lengthB = mb_strlen($b, 'UTF-8');
            for ($i = 0; $i < ( $lengthA > $lengthB ? $lengthB : $lengthA ); $i++) {
                if ($alphabet[mb_substr($a, $i, 1, 'UTF-8')] < $alphabet[mb_substr($b, $i, 1, 'UTF-8')]) {
                    $status = -1;
                    break;
                } elseif ($alphabet[mb_substr($a, $i, 1, 'UTF-8')] > $alphabet[mb_substr($b, $i, 1, 'UTF-8')]) {
                    $status = 1;
                    break;
                } else {
                    $status = 0;
                }
            }
            return $status;
        }
        usort($names, "sortUkr");
        foreach($names as $name) {
            echo $name . "<br>";
        }
        ?>
    </body>
</html>
