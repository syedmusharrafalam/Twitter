
<?php
require 'dbconfig/configg.php';
$edit_record = $_GET['edit'];
$query="select * from tweet where id='$edit_record'";
$run=mysql_query($query);
while ($row=mysql_fetch_array($run)){
	$edit_id = $row['ID'];
	$first = $row['First_name'];
	$last = $row['Last_name'];
	$tweet = $row['tweet'];
	$date1 = $row['date1'];	
}
?>
<html>
<head>
<title></title>
<style type="text/css">
	.center
	{
		margin: auto;
		width: 450px;
        height: 200px;
        border: 5px double #66CDAA;
		padding: 0px;
	}
	 .twit
        {
        	width: 100px;
        	height: 45px;
        	background-color: #20B2AA;
       
        	font-size: 20px;
        	float: right;
        	font-family: verdana;
        	color: white;
        }
        .box
        {
        	width: 450px;
			height: 110px;
			margin: 26px 0px 0px 35px;
        }
</style>
</head>

<body>
<br><br><br><br><br><br><br>
<form action='edit.php?edit_form=<?php echo $edit_id;?>' method="post">
<div class="center">
<div class="box">
<textarea name="comment"cols="50" width = "250" rows="6">
 <?php echo $tweet ?>
	
</textarea>

	
</div>
<br>
<input type="submit" name="update" value="Edit" class="twit">

	</div>
	
	


</form>
</body>
</html>

<?php




if(isset($_POST['update'])){
	$edit_id1 = $_GET['edit_form'];

	$date=date('Y-m-d H:i:s');
	$tweet = $_POST['comment'];

	
	$query ="update tweet set tweet='$tweet',date1='$date'where id='$edit_id1 '";
	if(mysql_query($query)){
		header("location:myhomepage.php?updated=date has been updated...");
	}
}
?>






