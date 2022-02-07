<html>
    <head>
        <title>Unit 5</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
            First number: <input type="number" name="firstNumber" step="0.0001">
            Operator:
            <select name="operators">
                <option value="add">+</option>
                <option value="substract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            Second number: <input type="number" name="secondNumber" step="0.0001">
            <input type="submit">
        </form>

        <?php
            if(!empty($_POST['firstNumber']) && !empty($_POST['secondNumber'])) {
                class Calculator {

                    private $result;

                    public function add(float $first, float $second): float {
                         $this->result = $first + $second;
                         return $this->result;
                    }

                    public function substract(float $first, float $second): float {
                        $this->result = $first - $second;
                        return $this->result;
                    }

                    public function multiply(float $first, float $second): float {
                        $this->result = $first * $second;
                        return $this->result;
                    }

                    public function divide(float $first, float $second): float {
                            $this->result = $first / $second;
                            return $this->result;
                        }
                    }



                $calc = new Calculator ();
                $operator = $_POST['operators'];

                $firstNumber = (float)$_POST['firstNumber'];
                $secondNumber = (float)$_POST['secondNumber'];


                if($operator === "add") {
                    echo "Result: " . $calc->add($firstNumber, $secondNumber);
                }
                elseif($operator === "substract") {
                    echo "Result: " . $calc->substract($firstNumber, $secondNumber);
                }
                elseif($operator === "multiply") {
                    echo "Result: " . $calc->multiply($firstNumber, $secondNumber);
                }
                elseif($operator === "divide" && $secondNumber != 0) {
                    echo "Result: " . $calc->divide($firstNumber, $secondNumber);
                }
                else {
                    echo "Invalid input. Please try again.";
                }
            }
        ?>
    </body>
</html>
