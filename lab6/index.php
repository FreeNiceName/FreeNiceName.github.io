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
        a {
            color: white;
        } 
        .hiden {
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
                    <a id="last" style="display: none" href="#">Show last</a>
                    <ul id="price">
                    </ul>
                </form>
            </td>
        </tr>
    </table>
    
    <script>
        $(document).ready(function() {
            if(localStorage.getItem('price') !== null) {
                $('#last').css('display', 'block');
            }

            $('#last').click(function() {
                let price = $('#price');
                if(!price.children().length) {
                    price.html(localStorage.getItem('price'));
                    $(this).html('Hide');
                } else if(price.hasClass('hiden')) {
                    price.removeClass('hiden');
                    $(this).html('Hide');
                } else {
                    price.addClass('hiden');
                    $(this).html('Show last');
                }
            });
        });
    </script>
</body>

</html>
