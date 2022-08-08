<?php
include 'php/connect.php';
include 'nav.php';

if (isset($_POST['add'])) {
	
	
	$total = "";
	$totalPrice ="";
	$item_code = $_POST['item_code'];
	$qty = $_POST['qty'];
	$count =+ $qty+1;

	$data = "SELECT * FROM products WHERE product_barcode = '$item_code'";
	$output = mysqli_query($conn, $data);
	// $array = mysqli_fetch_array($output);

	// $price = $array['product_price'];
	// $total = $qty * $price;
	// $totalPrice =+ $total;
	
	if ($output -> num_rows > 0) {
			
			$verify = mysqli_query($conn,"SELECT * FROM transaction WHERE item_barcode = '$item_code'");
			
		if ($verify -> num_rows == 0) {
			
			$query = "INSERT INTO transaction (item_barcode, item_name, item_price, status) SELECT DISTINCT product_barcode,product_name, product_price, status FROM products WHERE product_barcode = '$item_code'";
			$addQry = mysqli_query($conn, $query);
				
			
		}
		else{
			$update = "UPDATE transaction SET qty = '$count' WHERE item_barcode = '$item_code' AND status = 'Pending'";
			$updateQry = mysqli_query($conn, $update);
		}		
	}
	else{
		
	echo '<script>alert("No product found")</script>';
	}

}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaction</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/sr-1.1.1/datatables.min.css"/>
 	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/sr-1.1.1/datatables.min.js"></script>
</head>
<style type="text/css">
	.column{
		float: left;
  		width: 50%;
  		padding: 10px;
  		height: 300px;
	}
	.row:after{
		content: "";
  		display: table;
  		clear: both;
	}
</style>
<body>
	<main>
		<div class="container-fluid">
			<div class="row">
				<div class="column">
					<form class="row g-3" method="POST" action="">
						<h2 class="text-center">Transanction</h2>
					  <div class="col-12">
					  	<hr class="border border-dark border-1 opacity-20">
					  </div>
					  <div class="col-md-6">
					    <label class="form-label">Item Barcode</label>
					    <input class="form-control" type="text" id="item_code" name="item_code" list="datalistOption">
					    <datalist id="datalistOption">
					    	<?php 
					    	$fetch = "SELECT * FROM products";

							$result = mysqli_query($conn, $fetch);
					    	foreach ($result as $key => $code){ ?>
					    		<option value="<?=$code['product_barcode'];?>"><?=$code['product_barcode'];?></option>
					    	<?php }
					    	?>
					    </datalist>
					  </div>
		<!-- 			  <div class="col-md-6"> -->
					  <!--   <label class="form-label">Item Name</label>
					    <input type="text" class="form-control" id="item_name" name="item_name" readonly>
					  </div>
					  <div class="col-md-6">
					    <label class="form-label">Item Price</label>
					    <input type="number" class="form-control" id="item_price" name="item_price" readonly>
					  </div> -->
					  <div class="col-md-6">
					    <label class="form-label">Qty.</label>
					    <input type="number" class="form-control" min="0" max="10" id="qty" name="qty" value="1">
					  </div>
					  <div class="col-12">
					  	<hr class="border border-dark border-1 opacity-20">
					  </div>
					  <div class="col-md-4">
					    <button type="submit" class="btn btn-success" name="add">Add Item</button>
					  </div>
					  <div class="col-md-4">
					    <button type="submit" class="btn btn-primary" name="pay">Pay</button>
					  </div>
					  <div class="col-md-4">
					    <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
					  </div>
					</form>
				</div>
				<div class="column">
					<div class="table-responsive">
						<table id="transaction"class="table">
							<thead>
								<tr class="table table-dark">
									<th>No.</th>
									<th>Item Barcode</th>
									<th>Item Name</th>
									<th>Price</th>
									<th>Qty.</th>
									<th>Total Price</th>
									<th>Action</th>
								</tr>
							</thead>
							
							<tfoot>
								<tr class="table table-dark">
									<th>No.</th>
									<th>Item Barcode</th>
									<th>Item Name</th>
									<th>Price</th>
									<th>Qty.</th>
									<th>Total Price</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
<script>
	//fecth
	$(document).ready(function() {
		      $('#transaction').DataTable({
		        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
		          $(nRow).attr('transaction_id', aData[0]);
		        },
		        responsive: true,
		        serverSide:true,
		        processing:true,
		        paging:true,
		        order:[],
		        ajax: {
		          url:"fetch_transaction.php",
		          type:"post",
		        },
		        columnDefs: [
		        { responsivePriority: 1, targets: 2 },
            { responsivePriority: 2, targets: -1 },
            {
		          target:[5],
		          orderable :false,
		        }]
		      });
		    } );
	$(document).on('click','.deleteBtn',function(event){
       var table = $('#transaction').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if(confirm("Are you sure want to delete this Item? "))
      {
      $.ajax({
        url:"delete_transaction.php",
        data:{transaction_id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          status = json.status;
          if(status=='success')
          {
          	 mytable =$('#transaction').DataTable();
		     mytable.draw();
             $("#"+id).closest('tr').remove();
          }
          else
          {
            alert('Failed');
            return;
          }
        }
      });
      }
      else
      {
        return null;
      }
    })
</script>
</html>