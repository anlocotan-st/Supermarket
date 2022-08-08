<?php include('php/connect.php');

$id = $_POST['product_id'];
$sql = "SELECT * FROM products WHERE product_id = '$id' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);

?>