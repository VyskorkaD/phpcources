<html>
    <head>
        <title>Unit 4</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            Please enter text to separate: <input type="text" name="text">
            <input type="submit">
        </form>
        <?php
        if (!empty($_POST['text'])) {
            $data = $_POST['text'];
            $maxRowLength = 40;      //set max row length
            $words = explode(" ", $data);    //create array from words
            $lengthCounter = 0;            //create counter for each row's length
            $wordsNumber = count($words);   //count words
            foreach ($words as $word) {
                $lengthCounter = $lengthCounter + strlen($word) + 1;    //count length of word and space after it
                if ($lengthCounter < $maxRowLength) {            //if there are less than 40 characters in the row, print word
                    echo $word . " ";
                } else {
                    echo "<br>" . $word . " ";                  //if there are more than 40 characters in the row, print new line and word
                    $lengthCounter = strlen($word) + 1;
                }
            }
        }
        ?>
    </body>
</html>


