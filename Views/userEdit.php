<!DOCTYPE HTML>
<html>
	<head>
	<title>UserEdit</title>
	</head>

<body>
<?php echo 'UserID: ' . $_SESSION['user_id']; ?>
	<h3>EditUsername</h3>
	<form action="?controller=userEdit" method="post" onsubmit="return validate();">
		<label for="username">Username:</label><input type="text" name="username" id="username" value="<?= $this->userData['user_username'] ?>"><br>
		<label for="FirstName">FirstName</label><input type="text" name="fname" id="fname" value="<?php echo $this->userData['user_first_name'] ?>"><br>
		<label for="LastName" >LastName</label><input type="text" name="lname" id="lname" value="<?php echo $this->userData['user_last_name'] ?>"><br>
		<label for="Age"     >Age</label><input type ="text" name="age" id="age" value="<?php echo $this->userData['user_age'] ?>"><br>
		<label for="role"	>Role:</label>
			<select name="role_id" id="role_id">
				<option value="0" id="role_id">Choose</option>
				<option value="1" id="role_id" <?php if($this->userData['user_role_id'] == 1){?>selected="selected"<?php }?>>Guest</option>
				<option value="2" id="role_id" <?php if($this->userData['user_role_id'] == 2){?>selected="selected"<?php }?>>Admin</option>
				<option value="3" id="role_id" <?php if($this->userData['user_role_id'] == 3){?>selected="selected"<?php }?>>SuperAdmin</option>
			</select>
		<input type="submit" name="submit" value="Update">
		</form>
		
		<script type="text/javascript">
			function validate()
			{
				select = document.getElementById( 'role_id' );

				if(select.value == '0')
				{
					alert('Choose role, please!!!');
					return false;
					
				}	
				return true;
				
		</script>
		<form action="?controller=userDelete" method="post">
			<input type="submit" name="submit" value="Delete">
		</form>
	<a href="index.php?controller=listUsers">List All Users</a>
	<a href="index.php?controller=logout">Logout</a>
</body>
</html>
