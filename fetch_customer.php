<?php include('php/connect.php');
 
$output= array();
$sql = "SELECT * FROM customer";
 
$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);
 
if(isset($_POST['search']['value']))
{
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE customer_name like '%".$search_value."%'";
    $sql .= " OR customer_address like '%".$search_value."%'";
    $sql .= " OR customer_number like '%".$search_value."%'";
}
 
if(isset($_POST['order']))
{
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY ".$column_name." ".$order."";
}
else
{
    $sql .= " ORDER BY customer_id desc";
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
    $sub_array[] = $row['customer_id'];
    $sub_array[] = $row['customer_name'];
    $sub_array[] = $row['customer_address'];
    $sub_array[] = $row['customer_number'];
    $sub_array[] = '<a href="javascript:void();" data-id="'.$row['customer_id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['customer_id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
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