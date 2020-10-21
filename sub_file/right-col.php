<div id="right-col-container">
	<div id="message-container">
	
	  <?php require_once("new-message.php");
			$no_message = false ;  
			if(isset($_GET['user'])){
				$_GET['user'] = $_GET['user'] ; 
				
			}else{
					
					$q='SELECT `sender_name`, `receiver_name` FROM ``messages` 
					WHERE `sender_name` = "'.$_SESSION['username'].'" 
					OR `receiver_name` = "'.$_SESSION['username'].'"
					ORDER BY `date_time` DESC LIMIT 1';
						
					$r = mysqli_query($con, $q);
					if($r){
						
						if(mysqli_num_rows($r) > 0){
							
							while($row = mysqli_fetch_assoc($r)){
							
							
								$sender_name = $row['sender_name'] ;
								$receiver_name = $row['receiver_name'] ;
								
								if($_SESSION['username'] == $_sender_name){
									
									$_GET['user'] = $receiver_name ; 
									
								}else{
									
									
									$_GET['user'] = $sender_name ;
									
								}
							
							}
							
						}else{
							
							echo 'no messages from you' ; 
							$no_message = true ; 
							
						}
						
					}else{
						echo $q;
					}
				 }
		if($no_message == false){
				
				
			$q='SELECT * FROM `messages` WHERE `sender_name` = "'.$_SESSION['username'].'" 
			AND `receiver_name` = "'.$_GET['user'].'"
			OR
			`sender_name` = "'.$_GET['user'].'"
			AND `receiver_name` = "'.$_SESSION['username'].'"';
		
			$r = mysqli_query($con, $q);
			if($r){
				while($row = mysqli_fetch_assoc($r)){
					
					 
					$sender_name = $row['sender_name'] ;
					$receiver_name = $row['receiver_name'] ;
					$message = $row['message_text'] ;
					
					if($sender_name == $_SESSION['username']){
						?>
						<div class="grey-message">		
							<a href="#">Me</a>
							<p><?php echo $message; ?></p>
						</div>
								
						<?php		
					}else{
						?>
					    <div class="white-message">
							<a href="#"><?php echo $sender_name;?></a>		
							<p><?php echo $message; ?></p>
						</div>
						<?php
						
					}
					
				}
				
				
				
			}else{
				
				echo $q;
				
			}
	  
	  
		}
	  ?>
	

	</div>
	<form method="post" id="message-form">
	<textarea class="textarea" id="message_text" placeholder="write your message here"></textarea>
	</form>
</div>


<script
  src="sub_file\jquery-3.5.1.min.js" ></script>



<script>

	$("document").ready(function(event){
		
		$("#right-col-container").keypress(function(e){
			
			if(e.keyCode == 13 && !e.shiftKey){
				var message_text = $("#message_text").val() ; 
			$.post("sub_file/sending_process.php?user=<?Php echo $_GET['user'];?>", 
			
			{
				
				text: message_text,
				
			}, 
			
			function(data, status){
				$("#message_text").val(""); 
				document.getElementById("message-container").innerHTML += data ;
			}
			
			);
			}
			
			
		});
		
	});



</script>