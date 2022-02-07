<html>
    <head>
        <title>Unit 3</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        Please choose car type: 
        <select name="cars">
            <option value="gasoline">gasoline
            <option value="diesel">diesel
        </select>
        <br>
        Engine capacity: <input type="text" name="capacity"><br>
        Production year: <input type="text" name="year"><br>
        Car price: <input type="text" name="price">
        <input type="submit">
        </form>
        
        <?php 
        if(!empty($_POST['cars']) && !empty($_POST['capacity']) && !empty($_POST['year']) && !empty($_POST['price'])) {
            $engineTax = 0;
            if($_POST['cars'] == 'gasoline') {
                $engineTax = 50;
            }
            else {
                $engineTax = 75;
            }
            if($_POST['capacity'] <= 0) {          //is capacity correct
                exit("Invalid <b>engine capacity</b> input.");
            }
            else {
                $kEngine = $_POST['capacity'] / 1000;
                $kAge = 0;
                $age = $_POST['year'];
                if($age < 1970 || $age > date('Y')) {    //is age correct
                    exit("Invalid <b>production year</b> input.");
                    }
                    else {
                        if($age == date('Y') || $age == date('Y') - 1) {     //if car is new or was produced last year
                        $kAge = 1;
                        }
                        else {
                        $kAge = date('Y') - $age;
                        }
                        if($_POST['price'] > 0) {
                            $exciseTax = $engineTax * $kEngine * $kAge;       // compute excise tax
                            $fullPrice = $_POST['price'] + $exciseTax;        //compute car price with excise tax
                            echo "Excise tax: " . $exciseTax . "<br>";
                            echo "Car price: " . $_POST['price'] . "<br>";
                            echo "Car price with excise tax: " . $fullPrice . "<br>";
                        }
                        else {
                            exit("Invalid <b>car price</b> input.");
                        }
                    }
                }    
            }
        else {
            exit("Invalid input.");
        }
        ?>
    </body>
</html>


