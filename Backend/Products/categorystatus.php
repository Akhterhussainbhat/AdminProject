<?php 
include("../includes/connection.php");
extract($_POST);
$user_id=$db->real_escape_string($id);
$status=$db->real_escape_string($status);
$sql=$db->query("UPDATE formtable SET status='$status' WHERE id='$id'");
echo 1;
?>