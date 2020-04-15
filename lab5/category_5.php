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
    $database = "itech_var5";
    $username = "root";
    $password = "";
    $dsn = "mysql:host=127.0.0.1;port=3306;dbname=$database;charset=utf8";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    try {
        $dbh = new PDO($dsn, $username, $password, $options);
        $category_id = $_POST['category_id'];
        $sql = $dbh->prepare('SELECT * FROM items WHERE category_id=:category_id');
		$sql->bindParam(':category_id', $category_id);
		$sql->execute();
        while ($row = $sql->fetch()) {
            print_r($row);
            print '<br><br>';
        }
    } catch (PDOException $e) {
        echo $e;
    }
    ?>
</body>

</html>