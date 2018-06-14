<?php

?>
<h1 class="content_header">
  -Purchase Orders-
</h1>
<div class = "PO_content">
  <div class = "sumbit_PO">
    <h1 class = "body_content">
      Submit a PO
    </h1>
    <form>
    <div class="form-group">
      <label for="liquorID_Input">Liquor Identification Number</label>
      <input name = "liquorID_Input" type="text" class="form-control" id="liquorID_Input" placeholder="D356TK1120">
    </div>
    <div class="form-group">
      <label for="po_Date" class = "sub-group">Purchase Date</label>
      <input name = "po_Date" type="date" class="form-control" id="po_Date" value="<?php echo date('Y-m-j'); ?>">
    </div>
    <div class="form-group">
      <label for="Quantity_Input" class = "sub-group">Quantity Purchased</label>
      <input name = "Quantity_Input" type="number" class="form-control" id="Quantity_Input" placeholder="25">
    </div>
    <div class="form-group">
      <label for="Total_Amount" class = "sub-group">Total Amount</label>
      <input name = "Total_Amount" type="number" class="form-control" id="Total_Amount" placeholder="135.35">
    </div>
    <button class="button" style="vertical-align:middle"><span>Submit </span></button>
  </form>
  </div>

  <div class = "view_PO">
    <h1 class = "body_content">
      View a PO
    </h1>
    <select class="form-control form-control-sm">
      <option>D356TK1120</option>
      <option>DFG456HE00</option>
      <option>D35654DGF20</option>
      <option>DFGT453542T</option>
      <option>DF56FLJRSCV2</option>
      <option>D5FJFGH74KG3</option>
    </select>
    <form>
    <div class="form-group">
      <label for="liquorID_Input">Liquor Identification Number</label>
      <input readonly name = "liquorID_Input" type="text" class="form-control" id="liquorID_Input" placeholder="D356TK1120">
    </div>
    <div class="form-group">
      <label for="po_Date" class = "sub-group">Purchase Date</label>
      <input readonly name = "po_Date" type="date" class="form-control" id="po_Date" value="<?php echo date('Y-m-j'); ?>">
    </div>
    <div class="form-group">
      <label for="Quantity_Input" class = "sub-group">Quantity Purchased</label>
      <input readonly name = "Quantity_Input" type="number" class="form-control" id="Quantity_Input" placeholder="25">
    </div>
    <div class="form-group">
      <label for="Total_Amount" class = "sub-group">Total Amount</label>
      <input readonly name = "Total_Amount" type="number" class="form-control" id="Total_Amount" placeholder="135.35">
    </div>
  </form>
  </div>
</div>
