<?php
		require_once("../connection.php");
		if(isset($_POST['user'])){
			
			$q = 'SELECT * FROM `user` WHERE `user_name`="'.$_POST['user'].'"';
			$r = mysqli_query($con, $q) ;
			if($r){
				if(mysqli_num_rows($r) > 0 ){
					
					echo '<p style="color:red">User already registered</p>' ; 
				}else{
					
					echo '<p style="color:green">you can take this username</p>' ;  
					
				}
				
				
			}else{
				
				echo $q;
				
			}


			
		}



?>