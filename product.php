<?php
		
	include 'php/connect.php';
	include 'nav.php';
	include 'productmodal.php';


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Suppliers</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/sr-1.1.1/datatables.min.css"/>
 		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/sr-1.1.1/datatables.min.js"></script>

			<style>
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
		</style>
</head>
<body>

	<main>
		<div class="container-fluid">
		   <h2 class="text-center">Manage Products</h2>
		    <div class="row">
		      <div class="container">
		        <div class="btnAdd">
		       <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addProductModal"   class="btn btn-success btn-sm" >Add Product</a>
		       </div>
		       <div class="row">
		        <div class="col-md-2"></div>
		        <div class="col-md-8">
		         <table id="products" class="table table-striped table-hover">
		          <thead>
		          	<tr class="table table-dark">
		          	<th data-priority = "1">No.</th>
		            <th>Barcode</th>
		            <th>Item Name</th>
		            <th>Decscription</th>
		            <th>Quantity</th>
		            <th>Item Price</th>
		            <th data-prioprity = "2">Action</th>
		          	</tr>
		          </thead>
		          <tfoot>
		          	<tr class="table table-dark">
		          	<th data-priority = "1">No.</th>
		            <th>Barcode</th>
		            <th>Item Name</th>
		            <th>Decscription</th>
		            <th>Quantity</th>
		            <th>Item Price</th>
		            <th data-prioprity = "2">Action</th>
		          	</tr>
		          </tfoot>
		          <tbody>
		          </tbody>
		        </table>
		      </div>
		      <div class="col-md-2"></div>
		    </div>
		  </div>
		</div>	
	</div>
	</main>
		
		<script>
		// fetch
		$(document).ready(function() {
		      $('#products').DataTable({
		        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
		          $(nRow).attr('product_id', aData[0]);
		        },
		        responsive: true,
		        serverSide:true,
		        processing:true,
		        paging:true,
		        order:[],
		        ajax: {
		          url:"fetch_dataproduct.php",
		          type:"post",
		        },
		        columnDefs: [
		        { responsivePriority: 1, targets: 2 },
            { responsivePriority: 2, targets: -1 },
            {
		          target:[6],
		          orderable :false,
		        }]
		      });
		    } );
		// add modal
		$(document).on('submit','#addProduct',function(e){
		      e.preventDefault();
		      var price= $('#addPriceField').val();
		      var qty= $('#addQtyField').val();
		      var desc= $('#addDescField').val();
		      var name= $('#addNameField').val();
		      var barcode= $('#addBarcodeField').val();
		      if(price != '' && qty != '' && desc != '' && name != '' && barcode != '' )
		      {
		       $.ajax({
		         url:"add_product.php",
		         type:"post",
		         data:{price:price,qty:qty,desc:desc,name:name,barcode:barcode},
		         success:function(data)
		         {
		           var json = JSON.parse(data);
		           var status = json.status;
		           if(status=='true')
		           {
		            mytable =$('#products').DataTable();
		            mytable.draw();
		            $('#addProductModal').modal('hide');
		            $('#addProductModal').on('hidden.bs.modal', function(){
								$(this).find('form').trigger('reset');
		            });
		          }
		          else
		          {
		            alert('failed');
		          }
		        }
		      });
		     }
		     else {
		      alert('Fill all the required fields');
		    }
		  });

		// edit
		$(document).on('submit','#update',function(e){
      e.preventDefault();
       var product_price= $('#priceField').val();
       var quantity= $('#qtyField').val();
       var product_desc= $('#descField').val();
       var product_name= $('#nameField').val();
       var product_barcode= $('#barcodeField').val();
       var trid= $('#trid').val();
       var id= $('#id').val();
       if(product_price != '' && quantity != '' && product_desc != '' && product_name != '' && product_barcode != '' )
       {
         $.ajax({
           url:"update_product.php",
           type:"post",
           data:{product_price:product_price,quantity:quantity,product_desc:product_desc,product_name:product_name,product_barcode:product_barcode,id:id},
           success:function(data)
           {
             var json = JSON.parse(data);
             var status = json.status;
             if(status=='true')
             {
              table =$('#products').DataTable();
              table.draw();
              $('#updateProductModal').modal('hide');
              var button =   '<td><a href="javascript:void();" data-id="' +id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' +id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='"+trid+"']");
              row.row("[id='" + trid + "']").data([id,product_barcode,product_name,product_desc,quantity,product_price,button]);
              
            }
            else
            {
              alert('failed');
            }
          }
        });
       }
       else {
        alert('Fill all the required fields');
      }
    });
    $('#products').on('click','.editbtn ',function(event){
      var table = $('#products').DataTable();
      var trid = $(this).closest('tr').attr('id');
     var id = $(this).data('id');
     $('#updateProductModal').modal('show');
 
     $.ajax({
      url:"product_single_data.php",
      data:{product_id:id},
      type:'post',
      success:function(data)
      {
       var json = JSON.parse(data);
       $('#barcodeField').val(json.product_barcode);
       $('#nameField').val(json.product_name);
       $('#descField').val(json.product_desc);
       $('#qtyField').val(json.quantity);
       $('#priceField').val(json.product_price);
       $('#id').val(id);
       $('#trid').val(trid);
     }
   })
   });
	   // delete
	  $(document).on('click','.deleteBtn',function(event){
       var table = $('#products').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if(confirm("Are you sure want to delete this Product? "))
      {
      $.ajax({
        url:"delete_product.php",
        data:{product_id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          status = json.status;
          if(status=='success')
          {
          	 mytable =$('#products').DataTable();
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

</body>
</html>
