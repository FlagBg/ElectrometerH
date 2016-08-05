<!DOCTYPE HTML>
<html>
	<head>
	<title>My Project - User List</title>
	</head>

	<body>
	
	<h1>List of users</h1>
	<div id="userListContainer">
		<?php 
		
			
		
			foreach ($userList as $array)
			{	
				?>
				<div class="userListItem">
					<div class="userListUsername">
						<?php echo $array['username']; ?>
					</div>
					
					<div class="userListName">
						<?php echo $array['fname'] . ' ' . $array['lname']; ?>
					</div>
					
					<div class="userListRole">
						<?php echo $array['role']; ?>
					</div>
					
					<div class="userListOptions">
						<a href="/URL?user_id=<?php echo $array['id']; ?>&option=edit">Edit User</a>
						<a href="/URL?user_id=<?php echo $array['id']; ?>&option=delete">Delete User</a>
					</div>
				</div>
				<?php
				
			}
		?>
	</div>
	
	</body>
</html>