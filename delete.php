<?php
require 'dbconfig/configg.php';
?>
<?php
$delete_id=$_GET['del'];
$query="delete from tweet where ID='$delete_id'";
if(mysql_query($query)){
echo "<script>window.open('myhomepage.php?deleted=data has been deleted...','_self')</script>";
}
?>