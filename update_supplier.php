<?php 
include('php/connect.php');
$code = $_POST['code'];
$name = $_POST['name'];
$number = $_POST['number'];
$address = $_POST['address'];
$id = $_POST['id'];
 
$sql = "UPDATE `supplier` SET  `supplier_code`='$code' , `supplier_companyName`= '$name', `supplier_contactNumber`='$number',  `supplier_address`='$address' WHERE supplier_id='$id'";
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