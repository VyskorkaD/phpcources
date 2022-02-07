<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Email validation</title>
    </head>
    <body>
        <div style="margin: auto; padding: 10px; border: 1px solid black;">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <label for="name">Name: </label>
                <input type="text" name="name">
                <br>
                <label for="surname">Surname: </label>
                <input type="text" name="surname">
                <br>
                <label for="fatherName">Father's name: </label>
                <input type="text" name="fatherName">
                <br>
                <input type="submit" name="" value="Send">
            </form>
            <br>
            <p>Output:
            <?php
                $pattern = '/^[A-Z][a-z]+$/';       //check if first letter is upper and there are some letters after it
                $patternSurname = '/^[A-Z][a-z]+([\-][A-Z][a-z]+)?$/';     //check if first letter is upper, there are some letters after it and if there is the second surname. If there is "-" but no word after -> error
                if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['fatherName'])) {
                    if(preg_match($pattern, $_POST['name']) === 0 || preg_match($patternSurname, $_POST['surname']) === 0 || preg_match($pattern, $_POST['fatherName']) === 0) {
                        echo "Error: invalid input.";
                    }
                    else {
                        echo "Congratulations! Inputs are valide.";
                    }
                }
                else {
                    echo "Error: empty input.";
                }
            ?>
            </p>
    </body>
</html>