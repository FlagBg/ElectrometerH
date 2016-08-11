<!DOCTYPE HTML>
<html>
	<head>
		<title>My Project Electrometer - User List</title>
	</head>

	<body>
	
	<h1>List of users</h1>
	<div id="userListContainer">
		<?php 
			foreach ( $userList as $array )
			{	
				?>
				<div class="userListItem">
					<div class="userListUsername">
						<?php echo "Username:" . $array['user_username']; ?>
					</div>
					
					<div class="userListName">
						<?php echo "Name:" . $array['user_first_name'] . ' ' . $array['user_last_name']; ?>
					</div>
					
					<div class="userListRole">
						<?php echo "User's role:" . $array['user_role_id']; ?>
					</div>
					
					<div class="userListOptions">
						<a href="/URL?user_id=<?php echo $array['user_role_id']; ?>&option=edit">Edit User</a>
						<a href="/URL?user_id=<?php echo $array['user_role_id']; ?>&option=delete">Delete User</a>
						<a href="index.php?controller=userEdit">Edit Logged User</a>
					</div>
				</div>
				<?php
				
			}
		?>
	</div>
	<div>
		<li><a href="/">Home</a></li>
	</div>
	
	</body>
</html>