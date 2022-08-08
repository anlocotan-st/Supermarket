<?php
		
	include 'php/connect.php';
	include 'nav.php';
	include 'customermodal.php';


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customers</title>

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
		   <h2 class="text-center">Manage Customers</h2>
		    <div class="row">
		      <div class="container">
		        <div class="btnAdd">
		       <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addCustomerModal"   class="btn btn-success btn-sm" >Add Supplier</a>
		       </div>
		       <div class="row">
		        <div class="col-md-2"></div>
		        <div class="col-md-8">
		         <table id="customer" class="table table-striped table-hover">
		          <thead>
		          	<tr class="table table-dark">
		          	<th data-priority = "1">No.</th>
		            <th>Customer Name</th>
		            <th>Customer Address</th>
		            <th>Contact Number</th>
		            <th data-prioprity = "2">Action</th>
		          	</tr>
		          </thead>
		          <tfoot>
		          	<tr class="table table-dark">
		          	<th data-priority = "1">No.</th>
		            <th>Customer Name</th>
		            <th>Customer Address</th>
		            <th>Contact Number</th>
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
		      $('#customer').DataTable({
		        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
		          $(nRow).attr('customer_id', aData[0]);
		        },
		        responsive: true,
		        serverSide:true,
		        processing:true,
		        paging:true,
		        order:[],
		        ajax: {
		          url:"fetch_customer.php",
		          type:"post",
		        },
		        columnDefs: [
		        { responsivePriority: 1, targets: 2 },
            { responsivePriority: 2, targets: -1 },
            {
		          target:[4],
		          orderable :false,
		        }]
		      });
		    });
		// add modal
		$(document).on('submit','#addCustomer',function(e){
		      e.preventDefault();
		      var number= $('#addNumberField').val();
		      var address= $('#addLocField').val();
		      var name= $('#addLocField').val();
		      if(number != '' && address != '' && name != '' )
		      {
		       $.ajax({
		         url:"add_customer.php",
		         type:"post",
		         data:{number:number,address:address,name:name},
		         success:function(data)
		         {
		           var json = JSON.parse(data);
		           var status = json.status;
		           if(status=='true')
		           {
		            mytable =$('#customer').DataTable();
		            mytable.draw();
		            $('#addCustomerModal').modal('hide');
		            $('#addCustomerModal').on('hidden.bs.modal', function(){
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
		// // edit
		$(document).on('submit','#updateCustomer',function(e){
	      e.preventDefault();
	       var number= $('#numberField').val();
	       var address= $('#locField').val();
	       var name= $('#nameField').val();
	       var trid= $('#trid').val();
	       var id= $('#id').val();
	       if(number != '' && address != '' && name != '')
	       {
	         $.ajax({
	           url:"update_customer.php",
	           type:"post",
	           data:{number:number,address:address,name:name,id:id},
	           success:function(data)
	           {
	             var json = JSON.parse(data);
	             var status = json.status;
	             if(status=='true')
	             {
	              table = $('#customer').DataTable();
	              table.draw();
	              $('#updateCustomerModal').modal('hide');
	              var button =   '<td><a href="javascript:void();" data-id="' +id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
	              var row = table.row("[id='"+trid+"']");
	              row.row("[id='" + trid + "']").data([id,name,address,number,button]);
	              
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
	    $(document).on('click','.editbtn ',function(event){
	      var table = $('#customer').DataTable();
	      var trid = $(this).closest('tr').attr('id');
	      var id = $(this).data('id');
	     $('#updateCustomerModal').modal('show');
	 
	     $.ajax({
	      url:"customer_single_data.php",
	      data:{customer_id:id},
	      type:'post',
	      success:function(data)
	      {
	       var json = JSON.parse(data);
	       $('#nameField').val(json.customer_name);
	       $('#locField').val(json.customer_address);
	       $('#numberField').val(json.customer_number);
	       $('#id').val(id);
	       $('#trid').val(trid);
	     }
	   })
	   });
	   // delete
	  $(document).on('click','.deleteBtn',function(event){
       var table = $('#customer').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if(confirm("Are you sure want to delete this Customer? "))
      {
      $.ajax({
        url:"delete_customer.php",
        data:{customer_id:id},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          status = json.status;
          if(status=='success')
          {
          	 mytable =$('#customer').DataTable();
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
