<?php 
include('php/connect.php');
$barcode = $_POST['barcode'];
$item_name = $_POST['name'];
$desc = $_POST['desc'];
$quantity= $_POST['qty'];
$price= $_POST['price'];

$sql = "INSERT INTO products ( product_barcode , product_name, product_desc , quantity, product_price, status) values ('$barcode', '$item_name', '$desc', '$quantity', '$price', 'Pending')";
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