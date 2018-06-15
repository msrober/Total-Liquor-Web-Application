<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
//Connect to localhost database. Username root with no password
$link = new PDO(
    'mysql:host=localhost;dbname=total liquor;charset=utf8mb4',
    'root',
    ''
);

if (isset($_POST["liquorID_Input"]) && isset($_POST["po_DateInput"]) && isset($_POST["Quantity_Input"]) && isset($_POST["Total_Input"])) {
    $id = $_POST["liquorID_Input"];
    $po = $_POST["po_DateInput"];
    $qty = $_POST["Quantity_Input"];
    $total = (double) $_POST["Total_Input"];
    $newID = RandomString(); //generate random ID
    //Prepares the SQL statement using placeholders then binds the values from the POST to the statement
    $handle = $link->prepare('INSERT INTO purchase_orders (LiqourID, PO_Number, PurchaseDate, Qty_Purchased, Total_Amount) VALUES (:LID, :PID, :PD, :QTY, :TA)');
    $handle->bindParam(':LID', $id);
    $handle->bindParam(':PID', $newID);
    $handle->bindParam(':PD', $po);
    $handle->bindParam(':QTY', $qty);
    $handle->bindParam(':TA', $total);
    //Execute create and if it suceeds then update inventory table
    if ($handle->execute()) {
        echo 'PO Created'; //Alert the page if success
        $updateInventory = $link->prepare('UPDATE inventory SET Qty_Stock = Qty_Stock + :AddedQTY WHERE LiqourID = :ID');
        $updateInventory->bindParam(':AddedQTY', $qty);
        $updateInventory->bindParam(':ID', $id);
        $updateInventory->execute();
    }
}
else {
    die('false');
}
//Returns a random PO Number
function RandomString() {
    $characters = 'ABCDEFGHIJKLMNOP0123456789';
    $string = '';
    $length = 15;

    for ($i = 0; $i < $length; $i++) {
      $string .= $characters[mt_rand(0, $length)];
    }
    return $string;
   }
?>
