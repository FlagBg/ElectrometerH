<?php

include_once '../Models/UsersModel.php';

class MyProfile
{
	protected $userId;
	
	protected $userData;
	
	protected $myProfile;
	
	
	public function __construct()
	{//object done!
		$this->myProfile = new UsersModel();
		
		$this->userId = $_SESSION['user_id'];
		
	}
	public function hi()
	{
	 	die('here');
	}
	
}

