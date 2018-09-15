<?php
require 'dbconfig/configg.php';
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST">
<div class="cont">
    <ul>
    <li><a href ="allusertweets.php">Main</a></li>
	<li><input type="submit" name="submit" value="Logout" class="con"></li>
	

</ul>
</div>
<br>


</form>

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
 <h1><?php echo "Wellcome"." ".$First_Name." ".$Last_Name;
?></h1>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.box
		{
			/*border: solid;*/
			
			width: 450px;
			height: 110px;
			margin: -14px auto;

		}
		.box1
		{
			border:  1px solid;
			
			width: 450px;
			height: 100px;
			margin: auto;
			padding: 0px;
			font-family: verdana;
		}
		.box2
		{
			
			border: 2px dotted ;
			width: 480px;
			height: 155px;
			margin: auto;
			padding: 0px;
			font-family: verdana;
			border-radius: 5px;
		}
		.cont
    {
           background-color: #66CDAA;
           width: 100%;
           height: 60px;
           margin: 0px 10px 0px 0px;
           padding: 3px;
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
  margin: 0px 0px 0px 6%;
  border: 1px solid black;
  background: #20B2AA;
  font-size: 20px;
  padding: 8px;

    }
    
		.con
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

	.con1
		{
	text-decoration: none;
 	color: white;
 	margin: 0px 0px 0px 0%;
 	border: 1px solid black;
 	background: #20B2AA;
 	font-size: 20px;
 	padding: 8px;
 	cursor: pointer;
		}
		.a
        {
        	background-color: #66CDAA;
        	width: 30%;
        	float: left;
        	height: 150px;
        	border: dotted;
        	border-radius: 5px;
        }
        .b
        {
        	background-color: #66CDAA;
        	width: 30%;
        	float: right;
        	height: 150px;
        	border: dotted;
        	border-radius: 5px;
        }
        .main
        {
        	margin: auto;
        /*	background: green;*/
        	width: 515px;
        	height: 200px;
        	border: 5px double #66CDAA;
        }
        .twit
        {
        	width: 100px;
        	height: 45px;
        	background-color: #20B2AA;
        	font-weight: bolder;
        	font-size: 20px;
        	float: right;
        	font-family: verdana;
        	color: white;
        }
        h1
        {
        	color: #20B2AA;
        	text-transform: capitalize;
        	font-style: italic;
        }
	</style>
</head>
<body>

<form action="myhomepage.php" method="post">





<div class="main"> 
<br><br>
<div class="box">
<textarea name="comment" cols="61" width = "250" rows="7" required="required">
	
</textarea>

	
</div>
<br><br>
<input type="submit" name="twitter" class="twit" value="Tweet"><br>
</div>
<br><br>
<?php
$query = "select First_Name,Last_Name,Email from sign_up where Email='$Email'";
$run =mysql_query($query);
	while ($row =mysql_fetch_array($run)){
	$First_Name =$_SESSION['firstname'] = $row['First_Name'];
	$Last_Name = $row['Last_Name'];
	$email = $row['Email'];
	$date=date('Y-m-d H:i:s');
}

if(isset($_POST['twitter'])){
	$Tweet=$_POST['comment'];
	if($Tweet!=null)
	{
$query="INSERT INTO tweet(First_Name,Last_Name,tweet,date1,Email)
	VALUES('$First_Name','$Last_Name','$Tweet','$date','$email')";
	if(mysql_query($query)){
		echo "<script>window.open('myhomepage.php?inserted=data has been inserted...','_self')</script>";
	}
}
else
{
	echo '<script>alert("Please Enter tweet ")</script>';
}
}
$query1 = "select * from tweet where Email='$email' order by (ID) DESC";

$run = mysql_query($query1);


while($row=mysql_fetch_array($run)){
	
	$id=$row['ID'];
	$First_name=$row['First_name'];
	$Last_Name=$row['Last_name'];
	$tweet=$row['tweet'];
	$date=$row['date1'];
	

?>

 
	
	<br>
<div class="a">
	
</div>
<div class="b">
	
</div>
<div class = "box2">
<?php echo $First_Name." ".$Last_Name." "."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp";?>
<?php echo  $date;?>
<br><br>
<div class="box1">

	<?php echo  $tweet."<br><br><br><br>";?>
	

	<a href ="delete.php?del=<?php echo $id;?>">REMOVE</a>
	<a href ="edit.php?edit=<?php echo $id;?>">EDIT</a>
	
</div>
<br>
</div>
<br>
<?php
}?>


</form>
<form action="home.php" method="post">

<br>
</form>






</body>
</html>
<?php 
 if(isset($_POST['submit'])){
  session_destroy();
  header('location:login.php');
 }
 ?>










