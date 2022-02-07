<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Email validation</title>
    </head>
    <body>
        <div style="margin: auto; padding: 10px; border: 1px solid black;">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <label for="email">Input: </label>
                <input type="text" name="email">
                <input type="submit" name="" value="Send">
            </form>
            <br>
            <p>Output:
            <?php
                if(!empty($_POST['email'])) {
                    if (preg_match('/^[a-z0-9._-]+@[a-z]{2,5}[.]\bcom\b/i', $_POST['email']) === 1) {
                        echo "Congratulations! This e-mail is valid.";
                    }
                    else {
                        echo "Error: invalid e-mail.";
                    }
                }
                else {
                    echo "Error: empty input.";
                }
            ?>
            </p>
    </body>
</html>

