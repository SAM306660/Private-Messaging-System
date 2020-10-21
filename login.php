<?php
	require_once("connection.php");
	session_start() ; 
?>
<!doctype html>
<html>
<style>
*{margin:0px ; padding:10px;}
#container{overflow:auto; height:auto; width:300px; margin:0px auto;}
.input{width:92%;padding:20%;}
</style>
<body>
<h2 align="center"> Login Form </h2>
<div id="container">
		<form id="form "method="post">
			User Name:<br>
			<input type="text" name="user_name" placeholder="user_name" required/>
			<br><br>
			Password:<br>
			<input type="password" name="password" placeholder="password" required/>
			<br><br>
			<input type="submit" name="login" value="login" />
			<a href= "registration.php"> Create an account </a>
		</form>

<?php   	
		if(Isset($_POST['login'])){
		$user_name=$_POST['user_name'] ;
		$password=$_POST['password'] ;	
		$q='SELECT * FROM `user` where `user_name`="'.$user_name.'" and `password`="'.$password.'"' ; 
		 $r= mysqli_query($con, $q) ; 
		 if($r){
		 if(mysqli_num_rows($r) > 0){
		 	
			$_SESSION['username'] = $user_name ;
		 	header("location:index.php?user=" . $user_name) ; 
		 	
		 }else{
					
					echo 'your password and username incorrect' ; 
			 }
		 }else{
			 
			 echo $q; 
		 }
}		
?>
</div>
</body>
</html>