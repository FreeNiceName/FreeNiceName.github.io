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
        $price_min = $_POST['price_min'];
        $price_max = $_POST['price_max'];
        $array  = "<div>$price_min - $price_max<br><br>";

        $sql = "SELECT * FROM items WHERE price between $price_min and $price_max";
        foreach ($dbh->query($sql) as $row) {
            $str = implode(', ', array_map(
                function ($v, $k) {
                    return sprintf("%s='%s'", $k, $v);
                },
                $row,
                array_keys($row)
            ));

            $array .= "<p>$str</p><br><br>";
        }
        $array .= '</div>';

        echo $array;
    } catch (PDOException $e) {
        echo $e;
    }

?>