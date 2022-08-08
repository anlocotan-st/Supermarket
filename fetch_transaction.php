<?php include('php/connect.php');
 
$output= array();
$sql = "SELECT * FROM transaction";
 
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);
 
if(isset($_POST['search']['value']))
{
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE item_barcode like '%".$search_value."%'";
    $sql .= " OR item_name like '%".$search_value."%'";
    $sql .= " OR item_price like '%".$search_value."%'";
    $sql .= " OR qty like '%".$search_value."%'";
    $sql .= " OR total_price like '%".$search_value."%'";
}
 
if(isset($_POST['order']))
{
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY ".$column_name." ".$order."";
}
else
{
    $sql .= " ORDER BY transaction_id desc";
}
 
if($_POST['length'] != -1)
{
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT  ".$start.", ".$length;
}   

$sql1 = "SELECT * FROM transaction WHERE status = 'Pending'";
$query = mysqli_query($conn,$sql1);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
    $sub_array = array();
    $sub_array[] = $row['transaction_id'];
    $sub_array[] = $row['item_barcode'];
    $sub_array[] = $row['item_name'];
    $sub_array[] = $row['item_price'];
    $sub_array[] = $row['qty'];
    $sub_array[] = $row['total_price'];
    $sub_array[] = '<a href="javascript:void();" data-id="'.$row['transaction_id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
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