<?php 
include('php/connect.php');
$id = $_POST['supplier_id'];
$sql = "DELETE FROM supplier WHERE supplier_id='$id'";
$delQuery =mysqli_query($conn,$sql);
if($delQuery==true)
{
     $data = array(
        'status'=>'success',
    );
    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
    );
    echo json_encode($data);
} 
?>