<!doctype html>
<html>



<style>
*{margin:0px; paddnng:0px;}
#main{width:200px; margin:24px auto;}
.input{width:92%;padding:2%;}
</style>
<body>
	<h2 align="center">Registration</h2>
	<div id="main">
	
		<form method="post">
		First Name:<br>
		<input type="text" name="first_name" placeholder="first name" /><br><br>
		Last Name:<br>
		<input type="text" name="last_name" placeholder="last name" /><br><br>
		User Name:<br>
		<input type="text" name="user_name" id="user_name" onkeyup="check_user()" placeholder="user name" />
			   <div id="checking"></div><br><br>
		Password:<br>
		<input type="password" name="password" placeholder="password" /><br><br>
		<input type="submit" id="register" name="register" value="register" />
		<a href="login.php"> Login Here</a>
		</form>
	</div>
	<?php
		   require_once("connection.php") ; 
		   
			
			
		if(isset($_POST['register'])){
	
		      $first_name=$_POST["first_name"] ;
		      $last_name=$_POST["last_name"] ;
			  $user_name=$_POST["user_name"] ;
			  $password=$_POST["password"] ;
	   

		if($first_name != "" and $last_name != "" and $user_name != "" and $password != ""){
		   
		   $q="INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `password`)
		       VALUES('', '".$first_name."', '".$last_name."', '".$user_name."', '".$password."' )
		   " ; 
		   if(mysqli_query($con, $q)){
			  header("location:login.php");
			   
		   }else{
			   
			   echo $q ; 
		   }
		   
	   }else{
		   echo "please fill all the boxes" ;
	   }
	   }
?>

<script
  src="sub_file\jquery-3.5.1.min.js" ></script>

<script>
	document.getElementById("register").disabled = true ;
	function check_user(){
		
		var user_name = document.getElementById("user_name").value ; 
		$.post("sub_file/user_check.php", 
		{
			user: user_name
			
		},
		
		function(data, status){
			if(data == '<p style="color:red">User already registered</p>'){
				
				document.getElementById("register").disabled = true ; 
				
			}else{
				
				document.getElementById("register").disabled = false; 
				
			}
			document.getElementById("checking").innerHTML = data ; 
			
		}
		
		);
	}


</script>
</body>





</html>