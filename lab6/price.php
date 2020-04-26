<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            background: #282828;
            color: white;
        }

        input {
            margin: 5px;
        }
    </style>
</head>

<body>
<?php
    require_once __DIR__ . "/vendor/autoload.php";
    $min = $_POST['min'];
    $max = $_POST['max'];
    echo $min . ' - ' . $max . '<br>';
    
    try {
        $collection = (new MongoDB\Client)->itech_var5->shop;
        $rangeQuery = array('price' => array( '$gt' => (int)$min, '$lt' => (int)$max));
        $cursor = $collection->find($rangeQuery);
        foreach ($cursor as $doc) {
            echo $doc['name'] . "<br>";
        }
    } catch (PDOException $e) {
        echo $e;
    }
    ?>
</body>

</html>
