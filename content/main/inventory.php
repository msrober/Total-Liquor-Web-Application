<!-- This handles the invetory page on the website -->
<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
//Connect to localhost database. Username root with no password
$link = new PDO(
    'mysql:host=localhost;dbname=total liquor;charset=utf8mb4',
    'root',
    ''
);

$handle = $link->prepare('select * from inventory');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
?>
<h1 class="content_header">
  -Inventory-
</h1>
<!-- Create a table -->
<table class="table table-striped table-dark">
    <thead>
    <tr>
        <th>
            Liquor ID
        </th>
        <th>
            Liquor Brand
        </th>
        <th>
            Liquor Type
        </th>
        <th>
            Liquor Name
        </th>
        <th>
            Quantity in Stock
        </th>
    </tr>
    </thead>
    <tbody>
      <!-- Inject the data from the database into the table-->
      <?php
        foreach($result as $row){
          echo '<tr>';
            echo '<td>' . $row->LiqourID . '</td>';
            echo '<td>' . $row->Brand . '</td>';
            echo '<td>' . $row->Liquor_Type . '</td>';
            echo '<td>' . $row->Name . '</td>';
            echo '<td>' . $row->Qty_Stock . '</td>';
          echo '</tr>';
        }
    ?>
    </tbody>
</table>
