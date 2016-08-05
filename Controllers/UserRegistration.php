<?php

include_once '../Models/UsersModel.php';

/**
 * 
 * @brief this class create user! it is using constructor and connection with the database!
 * 
 * @details: it works with inherit singleton database connection; and passing the cription using md5;
 */
class UserCreate
{	
	/**
	 * @brief	construct the model
	 * 
	 * @return	boolean		
	 */
	public function __construct()
	{
	/* if( ! empty( $_POST ) )
		{
			$userdata = array(
				'username'	=> $_POST['username'],
				'password'	=> md5( trim( $_POST['password'] ) ),
				'fname' 	=> $_POST['fname'],
				'lname'		=> $_POST['lname'],
				'age'		=> $_POST['age']
			);  I DON'T NEED IT HERE, I NEED IT BELOW, because it is creating by default an object;
		}*/
	}
	
	/**
	* @brief 	this function create the model, we create the if statement, if!empty array()
	* 
	* @param 	$this->userData;$this
	* 
	* $return	array( $result ) not anymore $user->userData	
	* 
	*/
	public function create()
	{
		if( ! empty( $_POST ) )
		{
			$userdata = array(
				'user_username'		=> $_POST['user_username'],
				'user_password'		=> md5( trim( $_POST['user_password'] ) ),
				'user_role_id'		=> $_POST['user_role_id'],
				'user_first_name'	=> $_POST['user_first_name'],
				'user_last_name'	=> $_POST['user_last_name'],
				'age'				=> $_POST['user_age']
			); 
		}
		var_dump($userdata);die('inReg controller');
		
		$userModel	= new UsersModel();
	
		$result		= $userModel->createUser( $userdata );
		
		return $result;
		
		
	}
	
	/**
	 * @brief	class that is colling the html form that creating the user;
	 * 
	 * @details	it has an address that shows the html path we are calling it;
	 * 
	 * @return	boolean true/false;$this
	 * 
	 */
	public function renderForm()
	{
		$form	= file_get_contents( __DIR__ . '/../Views/createUser.html' );
	
		print( $form );
	}
	
}


