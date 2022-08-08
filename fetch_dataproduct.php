<?php include('php/connect.php');
 
$output= array();
$sql = "SELECT * FROM products";
 
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);
 
if(isset($_POST['search']['value']))
{
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE product_barcode like '%".$search_value."%'";
    $sql .= " OR product_name like '%".$search_value."%'";
    $sql .= " OR product_desc like '%".$search_value."%'";
    $sql .= " OR quantity like '%".$search_value."%'";
    $sql .= " OR product_price like '%".$search_value."%'";
}
 
if(isset($_POST['order']))
{
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY ".$column_name." ".$order."";
}
else
{
    $sql .= " ORDER BY product_id desc";
}
 
if($_POST['length'] != -1)
{
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT  ".$start.", ".$length;
}   
 
$query = mysqli_query($conn,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
    $sub_array = array();
    $sub_array[] = $row['product_id'];
    $sub_array[] = $row['product_barcode'];
    $sub_array[] = $row['product_name'];
    $sub_array[] = $row['product_desc'];
    $sub_array[] = $row['quantity'];
    $sub_array[] = $row['product_price'];
    $sub_array[] = '<a href="javascript:void();" data-id="'.$row['product_id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['product_id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
    $data[] = $sub_array;
}
 
$output = array(
    'draw'=> intval($_POST['draw']),
    'recordsTotal' =>$count_rows ,
    'recordsFiltered'=>   $total_all_rows,
    'data'=>$data,
);
echo  json_encode($output);

?>