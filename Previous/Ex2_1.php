<html>
<head>
    <title>Unit 2</title>
    <meta charset="UTF-8">
</head>

<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    Please enter names: <input type="text" name="name"><br>
    <input type="submit">
</form>
<?php
if (!empty($_POST['name'])) {
    $name = str_replace(",", ";", $_POST['name']);
    echo "$name";

}
?>
</body>
</html>