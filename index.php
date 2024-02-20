<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "Hello mate, we have GET method";
}
    elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST["firstNumber"]) && isset($_POST["secondNumber"])) {
            $firstNumber = $_POST["firstNumber"];
            $secondNumber = $_POST["secondNumber"];
            $sum = $firstNumber + $secondNumber;
            echo "Сума введених чисел:" . $sum;
            echo "<br/>" . "Method Post";
        } else {
            http_response_code(400);
            echo "Number or numbers was not set";
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">
    <p>Перше число: <input type="number" name="firstNumber"/></p>
    <p>Друге число: <input type="number" name="secondNumber"/></p>
    <input type="submit" value="Отправить">
    <br>
</form>
</body>
</html>


