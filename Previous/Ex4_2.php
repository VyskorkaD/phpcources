<html>
    <head>
        <title>Unit 4</title>
    </head>
    <body>
        <table style="border:1px solid black;border-collapse: collapse;">
            <?php
            define("m", 10);
            define("n", 10);
            define("randMin", 0);
            define("randMax", 20);

            $testArray = array();
            for ($i = 0; $i < m; $i++) {
                for ($j = 0; $j < n; $j++) {
                    $testArray[$i][$j] = rand(randMin, randMax);
                }
            }

            for ($i = 0; $i < m; $i++) {
                echo "<tr>";
                for ($j = 0; $j < n; $j++) {
                    echo "<td style=\"padding:5px;border: 1px solid black; border-collapse: collapse;\">" . $testArray[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>


