<?php
require 'dbconfig/configg.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	 h1
        {
        	color: #20B2AA;
        	text-transform: capitalize;
        	font-style: italic;
        }
		.cont
		{
           background-color: #66CDAA;
           width: 100%;
           height: 60px;
           margin: 0px 0px 0px 0px;
           padding: 5px;
		}
		li
		{
			display: inline;
			text-decoration: none;
		}
		.cont a
		 {
    text-decoration: none;
 	color: white;
 	margin: 0px 0px 0px 10%;
 	border: 1px solid black;
 	background: #20B2AA;
 	font-size: 20px;
 	padding: 8px;
		}
		.cont input
		{
	text-decoration: none;
 	color: white;
 	margin: 0px 0px 0px 70%;
 	border: 1px solid black;
 	background: #20B2AA;
 	font-size: 20px;
 	padding: 8px;
 	cursor: pointer;
		}
        
	</style>
</head>
<body>
<div class="cont">
<from action="alltweets.php" method="POST">
<ul>
	<li><a href="myhomepage.php">Home</a> </li>
	<input type="hidden" value="submit" name="submit">
	<li><a href="login.php?submit=submit">Logout</a> </li>
	
</ul>
</from>
</div>

<br><br><br>
</body>
</html>
<?php
session_start();
$Email = $_SESSION['Email'];

?>


<?php

$query = "select First_Name , Last_Name from sign_up where Email='$Email'";
$run =mysql_query($query);
	while ($row =mysql_fetch_array($run)){
	$First_Name = $row['First_Name'];
	$Last_Name = $row['Last_Name'];

}?>
 <h1><?php echo "Welcome"." ".$First_Name." ".$Last_Name;
?></h1>


<?php

$query1 = "select * from tweet order by (ID) DESC";

$run = mysql_query($query1);


while($row=mysql_fetch_array($run)){
	
	$id=$row['ID'];
	$Fname=$row['First_name'];
	$LName=$row['Last_name'];
	$tweet=$row['tweet'];
	$date=$row['date1'];
	

?>

<html>
<head></head>
<style type="text/css">
		.box1
		{
			border:  1px solid;
			
			width: 420px;
			height: 80px;
			margin: auto;
			padding: 0px;
			font-family: verdana;


		}
		.box
		{   height: 130px;
			margin: auto;
			width: 440px;
			
			font-family: sans-serif;
			border: 2px dotted ;
			padding: 2px;
		}
		.a
        {
        	background-color: #66CDAA;
        	width: 31%;
        	float: left;
        	height: 130px;
        	border: dotted;
        }
        .b
        {
        	background-color: #66CDAA;
        	width: 31%;
        	float: right;
        	height: 130px;
        	border: dotted;
        	
        	
        }
		
</style>
<body>
<div class="a">
	
</div>
<div class="b">
	
</div>
<div class="box">
 <?php echo $Fname." ".$LName." "."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp  ";?>
	<?php echo  $date;?>
	<br><br>
<div class="box1">
	<?php echo  $tweet."<br>";?>
   

</div>

</div>
<br><br>

</body>
</html>

<?php
}
?>
<?php 

 if(isset($_GET['submit']))
 {
 	session_unset(); 
session_destroy();
echo'<script>
window.location.assign("login.php")
</script>';


  
 }
 ?>
