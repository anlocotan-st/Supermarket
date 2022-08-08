<?php

$code=10;
function getName($code) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $code; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}
?>

<!-- Add -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addSupplier" action="">
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Code</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addCodeField" name="supplier_code" value="<?php echo getName($code)?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Company Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addNameField" name="supplier_companyName" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Contact Number</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addNumberField" name="supplier_contactNumber" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="addCityField" class="col-md-3 form-label">Address</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addAddressField" name="supplier_address" required>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="updateSupplierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="update" action="">
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
          <div class="mb-3 row">
            <label for="nameField" class="col-md-3 form-label">Code</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="codeField" name="code" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="emailField" class="col-md-3 form-label">Company Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nameField" name="name">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="mobileField" class="col-md-3 form-label">Contact Number</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="numberField" name="number">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="cityField" class="col-md-3 form-label">Address</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addressField" name="address">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
