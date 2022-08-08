<?php 
include('php/connect.php');
$code = $_POST['code'];
$name = $_POST['name'];
$number = $_POST['number'];
$address = $_POST['address'];
 
$sql = "INSERT INTO supplier (supplier_code,supplier_companyName,supplier_contactNumber,supplier_address) values ('$code', '$name', '$number', '$address' )";

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