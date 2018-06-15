<!-- This handles the sql to insert and update the tables -->
<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
//Connect to localhost database. Username root with no password
$link = new PDO(
    'mysql:host=localhost;dbname=total liquor;charset=utf8mb4',
    'root',
    ''
);

if (isset($_POST["Customer_Name"]) && isset($_POST["liquorID_SO"]) && isset($_POST["sales_Date"]) && isset($_POST["Sales_Quantity"]) && isset($_POST["SO_Amount"])) {
    $name = $_POST["Customer_Name"];
    $id = $_POST["liquorID_SO"];
    $date = $_POST["sales_Date"];
    $qty = $_POST["Sales_Quantity"];
    $total = (double) $_POST["SO_Amount"];
    $newID = RandomString(); //Get a new SO Number
    $newCID = rand(0,10000); //Get a random new CustomerID

    $handle = $link->prepare('INSERT INTO sales_order (LiqourID, Sales_Number, Sales_Date, CustomerName, CustomerID, 	Qty_Sold, Total_Amount) VALUES (:LID, :SOID, :SD, :CN, :CID, :QTY, :SOT)');
    $handle->bindParam(':LID', $id);
    $handle->bindParam(':SOID', $newID);
    $handle->bindParam(':SD', $date);
    $handle->bindParam(':CN', $name);
    $handle->bindParam(':CID', $newCID);
    $handle->bindParam(':QTY', $qty);
    $handle->bindParam(':SOT', $total);
    //Execute create and if it suceeds then update inventory table
    if ($handle->execute()) {

        $updateInventory = $link->prepare('UPDATE inventory SET Qty_Stock = Qty_Stock - :AddedQTY WHERE LiqourID = :ID');
        $updateInventory->bindParam(':AddedQTY', $qty);
        $updateInventory->bindParam(':ID', $id);
        $updateInventory->execute();
        echo 'Sales Order Created';
    }
}
else {
    die('false');
}
//Returns a random SO Number
function RandomString() {
    $characters = 'ABCDEFGHIJKLMNOP0123456789';
    $string = '';
    $length = 5;

    for ($i = 0; $i < $length; $i++) {
      $string .= $characters[mt_rand(0, $length)];
    }
    return $string;
   }

?>
