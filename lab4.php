<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ответ</title>
</head>

<body>
    <a href="lab4.html">Назад к калькулятору</a>
    <p>Ответ:
        <?php
        if (isset($_POST['operation'])) {
            $first = $_POST['first'] + 0;
            $second = $_POST['second'] + 0;
            $operation = $_POST['operation'];
            
            if ($operation  == '+') {
                $result = $first + $second;
            } else if ($operation  == '-') {
                $result = $first - $second;
            } else if ($operation  == '*') {
                $result = $first * $second;
            } else if ($operation  == '/') {
                if ($second) {
                    $result = $first / $second;
                } else {
                    $result = "Деление на 0 не возможно!";
                }
            }
            echo "$first $operation $second = $result";
        }
        else {
            echo 'Одно или несколько значений не задано!';
        }
        ?>
    </p>
</body>

</html>