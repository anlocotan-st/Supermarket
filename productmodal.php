
<!-- Add -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addProduct" action="">
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Barcode</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addBarcodeField" name="product_barcode" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Item Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="addNameField" name="product_name" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Description</label>
            <div class="col-md-9">
              <!-- <input type="text" class="form-control" id="addDescField" name="product_desc"> -->
              <textarea class="form-control" id="addDescField" name="product_desc"> </textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Quantity</label>
            <div class="col-md-9">
              <input type="number" class="form-control" min="0" max="100" id="addQtyField" name="qty" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Item Price</label>
            <div class="col-md-9">
              <input type="number" class="form-control" min="0.00" max="100000.00" id="addPriceField" name="product_price" required>
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
 <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateProduct" action="">
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Barcode</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="barcodeField" name="product_barcode" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Item Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nameField" name="product_name" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Description</label>
            <div class="col-md-9">
              <!-- <input type="text" class="form-control" id="DescField" name="product_desc"> -->
              <textarea class="form-control" id="descField" name="product_desc"> </textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Quantity</label>
            <div class="col-md-9">
              <input type="number" class="form-control" min="0" max="100" id="qtyField" name="qty" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-3 form-label">Item Price</label>
            <div class="col-md-9">
              <input type="number" class="form-control" min="0.00" max="100000.00" id="priceField" name="product_price" required>
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
