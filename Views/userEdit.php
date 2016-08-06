<!DOCTYPE HTML>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	
		<title>Edit User's data</title>
	</head>

	<body>
	
	<script type="text/javascript">
			function validate(){
					select = document.getElementById( 'role_id' );
	
					if(select.value == '0')
					{
						alert('Choose role, please!!!');
						return false;
					}	
					return true;
					
	</script>
	
	<?php echo 'session UserID: ' . $_SESSION['user_id']; ?>
	
	<section class = "edit_user_data">
		<h3>Edit credentials</h3>
		
		<form action="?controller=userEdit" method="post" onsubmit="return validate();">
		
		<div id="form_container">
			<div class="username">
				<div id="username_container">
					<div id="username_label_container">
						<div><label for="username">Username:</label></div>
						<div>
							<input type="text" name="username" id="username" value="<?= $this->userData['user_username'] ?>">
						</div>
					</div>
				</div>
			</div>	
			<div class="forename">
				<div id="forename_container">
					<div id="forename_label_container">
						<div><label for="first_name">User's First Name</label></div>
						<div>
							<input type="text" name="first_name" id="first_name" value="<?php echo $this->userData['user_first_name'] ?>">
						</div>
					</div>	
				</div>
			</div>
			<div class="last_name">
				<div id="last_name_container">
					<div id="last_name_label_container">
						<div><label for="last_name">User's Surname</label></div>
						<div>
							<input type="text" name="last_name" id="last_name" value="<?php echo $this->userData['user_last_name'] ?>">
						</div>
					</div>	
				</div>
			</div>
			<div class="user_age">
				<div id="user_age_container">
					<div id="user_age_label_container">
						<div>
							<label for="user_age">User's Age</label>
						</div>
						<input type="text" name="age" id="age" value="<?php echo $this->userData['user_age'] ?>">
					</div>	
				</div>
			</div>
			<div class="user_roles">
				<div id="user_roles_container">
					<div id="user_roles_label_container">
						<div><label for="user_role">Role</label></div>
						<div>
						<select name="user_role_id" id="user_role_id">
							<option value="0" id="role_id">Choose</option>
							<option value="1" id="role_id" <?php if($this->userData['user_role_id'] == 1){?>selected="selected"<?php }?>>Guest</option>
							<option value="2" id="role_id" <?php if($this->userData['user_role_id'] == 2){?>selected="selected"<?php }?>>Admin</option>
							<option value="3" id="role_id" <?php if($this->userData['user_role_id'] == 3){?>selected="selected"<?php }?>>SuperAdmin</option>
						</select>
						</div>
					</div>	
				</div>
			</div>
			<div class="submit_container">
				<input type="submit" name="submit" value="Update">
			</div>
			<div>
				<a href="index.php?controller=listUsers">List All Users</a>
				<a href="index.php?controller=logout">Logout</a>
			</div>
			
		</div><!-- close the container div -->
			
	</form><!-- close the form -->
			
	<div>
		<form action="?controller=userDelete" method="post">
			<input type="submit" name="submit" value="Delete">
		</form>	
	</div>		
				
	</section>
		
	</body>

</html>
