<?php 
include('php/connect.php');
$name = $_POST['name'];
$address = $_POST['address'];
$number = $_POST['number'];

$sql = "INSERT INTO customer (customer_name ,customer_address, customer_number ) values ('$name', '$address', '$number')";
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