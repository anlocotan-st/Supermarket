<?php include('php/connect.php');

$id = $_POST['supplier_id'];
$sql = "SELECT * FROM supplier WHERE supplier_id = '$id' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);

?>