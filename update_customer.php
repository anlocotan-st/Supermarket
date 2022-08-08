<?php 
include('php/connect.php');
$name = $_POST['name'];
$address = $_POST['address'];
$number = $_POST['number'];
$id = $_POST['id'];
 
$sql = "UPDATE customer SET  customer_name= '$name',customer_address ='$address',customer_number ='$number'  WHERE customer_id='$id'";
$query= mysqli_query($conn,$sql);
$lastId = mysqli_insert_id($conn);
if($query ==true)
{
    
    $data = array(
        'status'=>'true',
    );
 
    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
    );
    echo json_encode($data);
} 
?>