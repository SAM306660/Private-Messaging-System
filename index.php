<?php      
require_once("connection.php");
session_start();
if(isset($_SESSION['username'])){
	 
?>
<!doctype html>
<html>
	
<style>
<?php require_once("sub_file/style.php");?>
	
</style>
<body>
	<?php require_once("sub_file/new-message.php");?>
	<div id="container">
	  <div id="menu">
	  <?php  

		echo $_SESSION['username'] ; 
		echo '<a style="float:right;color:white"; href="logout.php">Log out</a><br>' ;
	
	   ?>
	  </div>
	  
	  <div id= "left-col">
		<?php require_once("sub_file/left-col.php");?>
	  </div>
	  
	  <div id="right-col">
		<?php require_once("sub_file/right-col.php");?>
	  </div>
	
	
	</div>
	



<?php
}else{
	
	header("location:login.php") ; 
}?>

</body>
</html>
