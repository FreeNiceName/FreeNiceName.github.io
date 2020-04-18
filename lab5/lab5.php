<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">

    <title>DimaTech</title>
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
    <table width="100%">
        <tr>
            <td>Товары выбранной категории</td>
            <td>Товары в выбранном ценовом диапазоне</td>
            <td>Товары выбранного производителя</td>
        </tr>
        <tr>
            <td>
                <form action="category_5.php" method="POST">
                    <select id="category_id" name="category_id">
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
                            $sql = "SELECT `id`, `name` FROM category";
                            foreach ($dbh->query($sql) as $row) {
                                $id = $row['id'];
                                $name = $row['name'];
                                print "<option value='$id'>$name</option>";
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        ?>
                    </select>
                    <button>Submit</button>
                </form>
            </td>
            <td>
                <form action="price_5.php" method="post">
                    <label for="price_min">Минимальная цена</label>
                    <input type="number" name="price_min" id="price_min"> <br>
                    <label for="price_max">Максимальная цена</label>
                    <input type="number" name="price_max" id="price_max"> <br>
                    <button>Submit</button>
                </form>
            </td>
            <td>
                <form action="vendor_5.php" method="post">
                <select id="vendor_id" name="vendor_id">
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
                            $sql = "SELECT `id`, `name` FROM vendors";
                            foreach ($dbh->query($sql) as $row) {
                                $id = $row['id'];
                                $name = $row['name'];
                                print "<option value='$id'>$name</option>";
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        ?>
                    </select>
                    <button>Submit</button>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>