<?php 
include('php/connect.php');
$id = $_POST['product_id'];
$sql = "DELETE FROM products WHERE product_id='$id'";
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