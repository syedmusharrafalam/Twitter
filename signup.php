
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		 #h{
      width: 500px;
      margin: auto;
      border: 5px dotted #20B2AA;
      height: 520px;
      border-radius: 10px;
      
        }
   
    .btn
    {
    	width: 90%;
    	height: 50px;
    	background: #20B2AA;
    	color: white;
    	font-weight: bolder;
    	border-radius: 2px;
    	cursor: pointer;
      font-family: verdana;
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
   margin: 0px 0px 0px 6%;
   font-family: verdana;
   font-weight: normal;
 }
 input
 {
  width: 450px;
  height: 24px;
  font-size: 15px;
  margin: 0px 0px 0px 6%;
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
          
        <li><a href="http://localhost/twitter/login.php/">Login</a></li>
       
       
      </ul>
</div>

<br><br><br><br><br><br>

<div id="h">

	<form action="signup.php" method="Post">
	
		<h1>Join Twitter Today.</h1><br><br>
    <label>First Name</label><br>
		 <input type="text" name="fname" required="required" placeholder="First Name"><br>
		  <br><label>Last Name</label>	<br><input type="text" name="lname" required="required" placeholder="Last Name"><br><br><label>Email</label>  <br><input type="text" name="email" required="required" placeholder="Email"><br><br>	<label>Password</label> <br><input type="Password" name="password" required="required" placeholder="Password"><br><br><label>Conform Password</label> <br>	<input type="Password" name="cpassword" required="required" placeholder="Conform Password"><br>
     
		 <br><br>
		<input type="submit" name="submit" value="Sign up" class="btn"  >

		
	

<?php
session_start();
require 'dbconfig/configg.php';

if(isset($_POST['submit'])){
	$First_Name=$_POST['fname'];
	$Last_Name=$_POST['lname'];
	$Email=$_POST['email'];
	$Password=$_POST['password'];
	$CPassword=$_POST['cpassword'];

$pattern ="/^[a-z]+(_|\.)?[a-z0-9_]*@[a-z0-9_]+\.(com|org|co.uk|pk)$/i";
  $string = $Email;
  $matched=preg_match($pattern, $string);
  if($matched){
    
 
 


	if($Password==$CPassword)
	{
		$query = "select * from sign_up where Email ='$Email'";
		$query_run = mysql_query($query);
		if(mysql_num_rows($query_run)>0)
		{
			echo '<script>alert("email already exists")</script>';
		}
	
	else{
     $query="INSERT INTO sign_up(First_Name,Last_Name,Email,Password)
	              VALUES('$First_Name','$Last_Name','$Email','$Password')";

	 $query_run=mysql_query($query);
	 if($query_run){
    $_SESSION['Email'] = $Email;
    $_SESSION['password'] = $Password;
    header('location:allusertweets.php');
	 //	echo "data inserted";
	 }
	 else{
	 	echo "error";
	 }
	}
}
   else{
   	echo '<script>alert("password not match")</script> ';
   }
    }
  else{
    echo '<script>alert("not matched email pattern please enter email like.<br>.yousuf@gmail.com.<br>.yousuf_ch@gmail.com.<br>.yousuf444@gmail.com")</script>';
  }

}
	


?>
</form>
</div>
</body>

</html>
