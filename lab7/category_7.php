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

        $sql = "SELECT * FROM items WHERE category_id=$category_id";
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;
    
        $root = $dom->createElement('Items');
        foreach ($dbh->query($sql) as $row) {
            $item_node = $dom->createElement('item');
            $item_node->setAttributeNode(new DOMAttr('id', $row['id']));
            $item_node->appendChild($dom->createElement('name', $row['name']));
            $item_node->appendChild($dom->createElement('price', $row['price']));
            $item_node->appendChild($dom->createElement('quantity', $row['quantity']));
            $item_node->appendChild($dom->createElement('vendor', $row['vendor_id']));
            $item_node->appendChild($dom->createElement('category', $row['category_id']));
            $root->appendChild($item_node);
        }
        $dom->appendChild($root);
        echo $dom->saveXML();
    } catch (PDOException $e) {
        echo $e;
    }
    ?>