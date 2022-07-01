<?php
include_once('ketnoi.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM data WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
header("location: ketqua.php");
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>
