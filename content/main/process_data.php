<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
//Connect to localhost database. Username root with no password
$link = new PDO(
    'mysql:host=localhost;dbname=total liquor;charset=utf8mb4',
    'root',
    ''
);

if (isset($_POST["value"]) ) {
    $id = $_POST["value"];
    //Select all the values associated with the selected PO
    $stmt = $link->prepare('SELECT * FROM purchase_orders WHERE PO_number = :PO');
    $stmt->bindParam(':PO', $id);
    if ($stmt->execute()) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result); //encode to json so the js can understand the data
    }
}
else {
    die('false');
}
?>
