<?php

?>
<h1 class="content_header">
  -Customer Order-
</h1>
<div class = "Customer-content">
  <div class = "sumbit_SO">
    <h1 class = "body_content">
      Submit a Sales Order
    </h1>
    <form>
      <div class="form-group">
        <label for="Customer_Name">Customer Name</label>
        <input name = "Customer_Name" type="text" class="form-control" id="Customer_Name" placeholder="John Doe">
      </div>
      <div class="form-group">
        <label for="liquorID_Input">Liquor Identification Number</label>
        <input name = "liquorID_Input" type="text" class="form-control" id="liquorID_Input" placeholder="D356TK1120">
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
        <label for="Total_Amount" class = "sub-group">Total Amount</label>
        <input name = "Total_Amount" type="number" class="form-control" id="Total_Amount" placeholder="135.35">
      </div>
      <button class="button" style="vertical-align:middle"><span>Submit </span></button>
  </form>
  </div>
</div>
