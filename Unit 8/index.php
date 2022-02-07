<html>
<head>
    <title>Задача 3</title>
    <meta charset="UTF-8">
</head>
<body>

<?php
error_reporting(E_ALL);
require('Ex8_4.php');
$employee = new Employee();
$employee->setName("Dmytro");
$employee->setAge(23);
$employee->setGender("male");
$employee->setSalary(20000);

echo "Name: " . $employee->getName() . "<br>";
echo "Age: " . $employee->getAge() . "<br>";
echo "Gender: " . $employee->getGender() . "<br>";
echo "Salary: " . $employee->getSalary() . "<br>";
?>

</body>
</html>
