<!-- This handles the purchase order page on the website -->
<?php
  mb_internal_encoding('UTF-8');
  mb_http_output('UTF-8');
  $link = new PDO(
      'mysql:host=localhost;dbname=total liquor;charset=utf8mb4',
      'root',
      ''
  );

  $handle = $link->prepare('select * from purchase_orders');
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);

  $handle2 = $link->prepare('select * from inventory');
  $handle2->execute();
  $result2 = $handle2->fetchAll(\PDO::FETCH_OBJ);
?>

<h1 class="content_header">
  -Purchase Orders-
</h1>
<div class = "PO_content">
  <div class = "sumbit_PO">
    <h1 class = "body_content">
      Submit a PO
    </h1>
    <form id="firstForm" action="./content/main/insert_data.php" method="POST">
    <div class="form-group">
      <label for="liquorID_Input">Liquor Identification Number</label>
      <select name = "liquorID_SO" type="text" class="form-control" style="margin:0;" id="liquorID_SO">
        <option value="">--Select--</option>
        <!-- This injects all of the liquor names and brand but the actual value being used is the liquor ID -->
        <?php
          foreach($result2 as $item) {
            echo '<option value="'.$item->LiqourID.'"> '.$item->Brand.': '.$item->Name.'</option>';
          }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="po_DateInput" class = "sub-group">Purchase Date</label>
      <input name = "po_DateInput" type="date" class="form-control" id="po_DateInput" value="<?php echo date('Y-m-j'); ?>">
    </div>
    <div class="form-group">
      <label for="Quantity_Input" class = "sub-group">Quantity Purchased</label>
      <input name = "Quantity_Input" type="number" class="form-control" id="Quantity_Input" placeholder="25">
    </div>
    <div class="form-group">
      <label for="Total_Input" class = "sub-group">Total Amount</label>
      <input name = "Total_Input" type="text" class="form-control" id="Total_Input" placeholder="135.35">
    </div>
    <button class="button" style="vertical-align:middle"><span>Submit </span></button>
  </form>
  </div>

  <div class = "view_PO">
    <h1 class = "body_content">
      View a PO
    </h1>
    <select class="form-control form-control-sm" id="selectdropdown">
      <?php
        foreach($result as $row){
            echo '<option>' . $row->PO_Number . '</option>';
        }
        ?>
    </select>
    <form>
    <div class="form-group">
      <label for="liquorID_Output">Liquor Identification Number</label>
      <input readonly name = "liquorID_Output" type="text" class="form-control" id="liquorID_Output" placeholder="D356TK1120">
    </div>
    <div class="form-group">
      <label for="po_Date" class = "sub-group">Purchase Date</label>
      <input readonly name = "po_Date" type="date" class="form-control" id="po_Date" value="<?php echo date('Y-m-j'); ?>">
    </div>
    <div class="form-group">
      <label for="Quantity_Output" class = "sub-group">Quantity Purchased</label>
      <input readonly name = "Quantity_Output" type="number" class="form-control" id="Quantity_Output" placeholder="25">
    </div>
    <div class="form-group">
      <label for="Total_Amount" class = "sub-group">Total Amount</label>
      <input readonly name = "Total_Amount" type="number" class="form-control" id="Total_Amount" placeholder="135.35">
    </div>
  </form>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
<script>
$(document).ready(function() {
  //Used to update all the form information when the employee selects a certain liquor ID to be viewed
  $('select#selectdropdown').on('change', function() {
      var value = $('select#selectdropdown').val();
      $.ajax({
          method: "POST",
          url: "./content/main/process_data.php",
          data: {
             'value': value,
        }
       }).done(function(msg) {
            var data = JSON.parse(msg);
            $('input#liquorID_Output').val(data.LiqourID);
            $('input#po_Date').val(data.PurchaseDate);
            $('input#Quantity_Output').val(data.Qty_Purchased);
            $('input#Total_Amount').val(data.Total_Amount);
       });
  });
  //Post data to the insert_data.php file for processing using ajax
  $('form#firstForm').submit(function (e) {
        e.preventDefault();
    $.ajax({
        method: 'POST',
        url: './content/main/insert_data.php',
        data: {
          'liquorID_Input': $('#liquorID_Input').val(),
          'po_DateInput': $('#po_DateInput').val(),
          'Quantity_Input': $('#Quantity_Input').val(),
          'Total_Input': $('#Total_Input').val()
        }
      }).done(function (data) {
            alert(data);
        });


    });

});
</script>
