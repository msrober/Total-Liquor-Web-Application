<!-- This handles the sales order page on the website -->
<?php
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
  -Customer Order-
</h1>
<div class = "Customer-content">
  <div class = "sumbit_SO">
    <h1 class = "body_content">
      Submit a Sales Order
    </h1>
    <form id="secondForm" action="./content/main/insert_SO_data.php" method="POST">
      <div class="form-group">
        <label for="Customer_Name">Customer Name</label>
        <input name = "Customer_Name" type="text" class="form-control" id="Customer_Name" placeholder="John Doe">
      </div>
      <div class="form-group">
        <label for="liquorID_SO">Liquor Identification Number</label>
        <select name = "liquorID_SO" type="text" class="form-control" style="margin:0;" id="liquorID_SO">
          <!-- This injects all of the liquor names and brand but the actual value being used is the liquor ID -->
          <option value="">--Select--</option>
          <?php
            foreach($result as $item) {
              echo '<option value="'.$item->LiqourID.'"> '.$item->Brand.': '.$item->Name.'</option>';
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="sales_Date" class = "sub-group">Sales Date</label>
        <input name = "sales_Date" type="date" class="form-control" id="sales_Date" value="<?php echo date('Y-m-j'); ?>">
      </div>
      <div class="form-group">
        <label for="Sales_Quantity" class = "sub-group">Sales Quantity</label>
        <input name = "Sales_Quantity" type="number" class="form-control" id="Sales_Quantity" placeholder="25">
      </div>
      <div class="form-group">
        <label for="SO_Amount" class = "sub-group">Total Amount</label>
        <input name = "SO_Amount" type="text" class="form-control" id="SO_Amount" placeholder="135.35">
      </div>
      <button class="button" style="vertical-align:middle"><span>Submit </span></button>
  </form>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>

<script>
// run function after html has been loaded
$(document).ready(function() {
  //Post data to the insert_SO_data.php file for processing using ajax
  $('form#secondForm').submit(function (e) {
        e.preventDefault();
    $.ajax({
        method: 'POST',
        url: './content/main/insert_SO_data.php',
        data: {
          'Customer_Name': $('#Customer_Name').val(),
          'liquorID_SO': $('#liquorID_SO').val(),
          'sales_Date': $('#sales_Date').val(),
          'Sales_Quantity': $('#Sales_Quantity').val(),
          'SO_Amount': $('#SO_Amount').val()
        }
      }).done(function (data) {
            alert(data);
        });


    });

  });
</script>
