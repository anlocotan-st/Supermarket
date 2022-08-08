<?php 
include('php/connect.php');
$id = $_POST['transaction_id'];

$sql = "DELETE FROM transaction WHERE transaction_id ='$id' AND status = 'Pending'";
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