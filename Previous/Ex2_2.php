<html>
<head>
    <title>Unit 2</title>
    <meta charset="UTF-8">
</head>

<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    Please enter email: <input type="text" name="email"><br>
    <input type="submit">
</form>
<?php
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $atPos = strpos($email, '@');
    $dotPos = strpos($email, '.', $atPos);
    $length = strlen($email);
    if( $atPos && $dotPos && $atPos < $dotPos && $dotPos != $length - 1) {
        echo "Your email is correct.";
    }
    else {
        echo "Your email is not correct.";
    }
}
?>
</body>
</html>