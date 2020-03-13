<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>DimaTech</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="lab7.js" type="text/javascript"></script>
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
            <td>товары выбранной категории</td>
            <td>статистика работы в сети за указанный промежуток времени</td>
            <td>товары в выбранном ценовом диапазоне</td>
        </tr>
        <tr>
            <td>
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
                <button id="category_7">Submit</button>
            </td>
            <td>
                <label for="price_min">Минимальная цена</label>
                <input type="number" name="price_min" id="price_min"> <br>
                <label for="price_max">Максимальная цена</label>
                <input type="number" name="price_max" id="price_max"> <br>
                <button id="price_7">Submit</button>
            </td>
            <td>
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
                <button id="vendor_7">Submit</button>
            </td>
        <tr>
            <td><label for="xml">XML</label><br><textarea id="xml" cols="30" rows="10"></textarea></td>
            <td><label for="html">HTML</label><br><textarea id="html" cols="30" rows="10"></textarea></td>
            <td><label for="json">JSON</label><br><textarea id="json" cols="30" rows="10"></textarea></td>
        </tr>
        </tr>
    </table>
</body>

</html>