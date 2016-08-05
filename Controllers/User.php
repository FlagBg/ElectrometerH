<?php

// have a look... my controller needs to include the modell.... 
include_once '../Model/UserModel.php';

class User
{
	/**
	 * @var	int $userId
	 */
	protected $userId;
	
	/**
	 * @var	array $userData
	 */
	protected $userData;
	
	/**
	 * @var	\UsersModel
	 */
	protected $userEditModel;
	
	/**
	 * @brief get the object from the form if not empty
	 */
	public function __construct()
	{
		$this->userEditModel = new UsersModel();
	
		$this->userId	= $_SESSION['user_id'];
	}
	
	/**
	 * @brief create model from the post and overwrite it
	 *
	 * @param	$this->userData
	 *
	 * @return 	$this->user->userData;
	 */
	public function userEdit()
	{
		//$this->userEditModel->editUser( $this->userData );
		$userData = array(
				$_POST['user_username'],
				$_POST['user_role_id'],
				$_POST['user_first_name'],
				$_POST['user_last_name'],
				$_POST['user_age']
		);
	
		$this->userEditModel->userEdit( $this->userId, $userData );
	}
	
	/**
	 * @brief	class that is doing the delete option;
	 *
	 * @it takes the object from $this->userEditModel and do function userDelete();
	 *
	 * @param	array	$this->userId;
	 *
	 */
	public function userDelete()
	{
		var_dump( $this->userId );
	
		$this->userEditModel->userDelete( $this->userId);
	
		if( isset( $_SESSION['user_id'] ) )
		{
			unset( $_SESSION['user_id'] );
				
			include __DIR__ . '/../Controllers/Home.php';
				
			$homeController	= new Home();
			$homeController->renderView();
				
		}
	
			
	}
	
	/**
	 * @brief	function that is getting the html values;
	 *
	 * @details	get the form
	 *
	 * @return boolean true/false
	 */
	public function renderForm()
	{
		$this->getUserData();
	
		include ( __DIR__ . '/../Views/userEdit.php' );
		//var_dump($this->getUserData());die();
		//print( $form );
	
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * @brief	function that is putting the values into the form according to userId'
	 *
	 * @param	int 	userId
	 */
	protected function getUserData()
	{
		$this->userData	= $this->userEditModel->getUserData( $this->userId );
	
	
	
	}
}

