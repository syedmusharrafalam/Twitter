
<?php
require 'dbconfig/configg.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.login
		{
      width: 400px;
     padding: 20px  0px 0px 40px;
      padding: auto;

      
		}

		
    .btn
    {
    width: 115%;
      height: 50px;
      background: #20B2AA;
      color: white;
      font-weight: bolder;
      border-radius: 2px;
      cursor: pointer;
      font-family: verdana;
    
    }
    .contain
    {
    	width: 550px;
    	height: 390px;
    	background: white;
    	margin: auto;
    	border: 5px dotted #20B2AA;
      border-radius: 5px;
    }
    .cont
    {
           background-color: #66CDAA;
           width: 100%;
           height: 60px;
           margin: 0px 0px 0px 0px;
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
  margin: 0px 0px 0px 90%;
  border: 1px solid black;
  background: #20B2AA;
  font-size: 30px;
  padding: 0px;
    }
    label
 {
   margin: 0px 0px 0px 0%;
   font-family: verdana;
   font-weight: normal;
 }
 input
 {
  width: 450px;
  height: 24px;
  font-size: 15px;
  margin: 0px 0px 0px 0%;
 }
 h1
 {
  color: #20B2AA;
  margin: 10px 0px 0px 25%;
 }
  
	</style>
</head>
<body>
<div class="cont">
	<ul>
          
        <li><a href="signup.php">Sign Up</a></li>
        
       
      </ul>
</div>
<br><br><br><br><br><br><br>
<div class="contain">

<div class="login">
<h1>Login in to Twitter</h1>
<br><br>
<form action="login.php" method="post">
	
    <label>Email</label>
	<input type="text" name="email" placeholder="Email" required="required"><br><br>
 <label>Password</label>
	<input type="Password" name="password" placeholder="Password" required="required"><br><br><br>
	<input type="submit" name="submit" value="Login" class="btn">
	<br><br><br><br>
	New to Twitter? <a href="signup.php" />Sign up now</a>

</form>
</div>
</div>
</body>
</html>
<?php
session_start();

if(isset($_POST['submit'])){
	$Email = $_POST['email'];
	$Password=$_POST['password'];
	
  
	$query = "select Email,Password from sign_up where Email='$Email' AND Password='$Password'";
	$query_run=mysql_query($query);
	if(mysql_num_rows($query_run)>0){
 		$_SESSION['Email'] = $Email;
 		//$_SESSION['password'] = $Password;
 		header('location:allusertweets.php');

	}
	else{
		echo "invalid";

	
	}
}

	
?>



