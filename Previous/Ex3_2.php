<html>
    <head>
        <title>Unit 3</title>
    </head>
    <body>
        <h2>FIFA World Cup years from 2000 to 2100</h2>
        <?php 
            $year = 2002;
            while($year < 2100) {
                echo $year . "<br>";
                $year += 4;
            }
        ?>
    </body>
</html>