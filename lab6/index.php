<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">

    <title>Itech</title>
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
            <td>перечень производителей, с которыми работает магазин</td>
            <td>товары, отсутствующие на складе (т.е. вообще они есть, но сейчас количество 0)</td>
            <td>товары в выбранном ценовом диапазоне</td>
        </tr>
        <tr>
            <td>
                <textarea cols="40" rows="10">
                    <?php
                        require_once __DIR__ . "/vendor/autoload.php";

                        try {
                            $collection = (new MongoDB\Client)->itech_var5->shop;
                            $cursor = $collection->distinct("manufacturer");
                            foreach ($cursor as $doc) {
                                echo $doc . "\n";
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        ?>
                    </textarea>
            </td>
            <td>
                <textarea cols="40" rows="10">
                    <?php
                        require_once __DIR__ . "/vendor/autoload.php";
                        try {
                            $collection = (new MongoDB\Client)->itech_var5->shop;
                            $cursor = $collection->aggregate(array(
                                array(
                                    '$match' => array(
                                        'amount' => array(
                                            '$eq' => 0
                                        )
                                    )
                                )
                            ));
                            foreach ($cursor as $doc) {
                                echo $doc['name'] . "\n";
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        ?>
                    </textarea>
            </td>
            <td>
                <form action="price.php" method="post">
                    <label for="min">Min</label>
                    <input type="number" name="min" id="min"><br>
                    <label for="max">Max</label>
                    <input type="number" name="max" id="max"> <br>
                    <button type="submit">Submit</button>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>
