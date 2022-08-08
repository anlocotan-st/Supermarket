
<!-- Add -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addCustomer" action="">
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Customer Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addNameField" name="name" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Address</label>
            <div class="col-md-9">
              <textarea class="form-control" id="addLocField" name="address"> </textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Contact Number</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addNumberField" name="number">
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
 <div class="modal fade" id="updateCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateCustomer" action="">
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
         <div class="mb-3 row">
            <label class="col-md-3 form-label">Customer Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nameField" name="name" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Address</label>
            <div class="col-md-9">
              <textarea class="form-control" id="locField" name="address"> </textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Contact Number</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="numberField" name="number">
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
