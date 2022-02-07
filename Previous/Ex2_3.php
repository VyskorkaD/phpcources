<html>
<head>
    <title>Unit 2</title>
    <meta charset="UTF-8">
</head>

<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    Please enter your surname, name and father,s name: <input type="text" name="name"><br>
    <input type="submit">
</form>
<?php
if (!empty($_POST['name'])) {
    $string = $_POST['name'];
    $data = trim ($string);
    
    $length = strlen($data);
    $firstSpace = strpos($data, " ");
    $secondSpace = strpos($data, " ", $firstSpace + 1);
    
    $surname = substr($data, 0, $firstSpace);
    $name = substr($data, $firstSpace, $secondSpace - $firstSpace);
    $fatherName = substr($data, $secondSpace, $length);

    echo "Your initials: " . mb_strtoupper(mb_substr($surname, 0, 1)) . ". " . mb_strtoupper(mb_substr($name, 1, 1)) . ". " . mb_strtoupper(mb_substr($fatherName, 1, 1)) . ".";
}
?>
</body>
</html>

