<?php

	session_start() ; 
	require_once("../connection.php");
	if(isset($_SESSION['username']) and isset($_GET['user'])){
		
		if(isset($_POST['text'])){
			
			if($_POST['text'] !=''){
				
						
				$sender_name = $_SESSION['username'] ; 
				$receiver_name = $_GET['user'] ;
				$message = $_POST['text'] ;
				$date = date('Y-m-d H:i:s') ;
				$q = 'INSERT INTO `messages`
				(`id`, `sender_name`, `receiver_name`, `message_text`, `date_time`)
				VALUES("", "'.$sender_name.'", "'.$receiver_name.'", "'.$message.'", "'.$date.'")';
				$r = mysqli_query($con, $q) ; 
			
				if($r){
				
					?>
						<div class="grey-message">		
							<a href="#">Me</a>
							<p><?php echo $message; ?></p>
						</div>
									
					<?php
				
				}else{
				
					echo $q;
				
				}

				
			}else{
				
				echo 'please write something first' ;
				
				
			}
			
			
		}else{
			
			echo 'problem with text' ; 
			
		}
		
	}else{
		
		
		echo 'please login or select a user to send a message' ; 
		
	}





?>