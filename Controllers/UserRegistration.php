<?php

include_once '../Models/UsersModel.php';

/**
 * 
 * @brief this class create user! it is using constructor and connection with the database!
 * 
 * @details: it works with inherit singleton database connection; and passing the cription using md5;
 */
class UserRegistration
{	
	/**
	 * @brief	construct the model
	 * 
	 * @return	boolean		
	 */
	public function __construct()
	{
	
	}
	
	/**
	* @brief 	this function create the model, we create the if statement, if!empty array()
	* 
	* @param 	$this->userData;$this
	* 
	* $return	array( $result ) not anymore $user->userData	
	* 
	*/
	public function createUser()
	{
		if( ! empty( $_POST ) )
		{
			$userdata = array(
				'user_username'		=> $_POST['username'],
				'user_password'		=> md5( trim( $_POST['password'] ) ),
				'user_role_id'		=> $_POST['role_id'],
				'user_first_name'	=> $_POST['first_name'],
				'user_last_name'	=> $_POST['last_name'],
				'user_age'			=> $_POST['usr_age']
			); 
		}
		print "get me the datas from controller if post " . var_dump($userdata);
		
		$userModel	= new UsersModel();
	
		$result		= $userModel->registerUser( $userdata );
		
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


