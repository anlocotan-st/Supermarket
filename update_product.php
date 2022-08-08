
<?php 
include('php/connect.php');
$bardcode = $_POST['product_barcode'];
$name= $_POST['product_name'];
$desc = $_POST['product_desc'];
$qty= $_POST['quantity'];
$price = $_POST['product_price'];
$id = $_POST['id'];
 
$sql = "UPDATE products SET product_barcode='$bardcode', product_name='$name',product_desc='$desc',quantity='$qty', product_price= '$price' WHERE product_id='$id' ";
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