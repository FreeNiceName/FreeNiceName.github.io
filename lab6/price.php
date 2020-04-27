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
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>
<ul id="price">
    <?php
        require_once __DIR__ . "/vendor/autoload.php";
        $min = $_POST['min'];
        $max = $_POST['max'];
        
        try {
            $collection = (new MongoDB\Client)->itech_var5->shop;
            $rangeQuery = array('price' => array( '$gt' => (int)$min, '$lt' => (int)$max));
            $cursor = $collection->find($rangeQuery);
            foreach ($cursor as $doc) {
                $name = $doc['name'];
                echo "<li>$name</li>";

            }
        } catch (PDOException $e) {
            echo $e;
        }
    ?>
      </ul>
    <script>
        $(document).ready(function() {
            localStorage.price = $('#price').html();
        });
    </script>
</body>

</html>
