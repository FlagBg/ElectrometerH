<?php

//include_once '../Models/UsersModel.php';



/**
 * @brief	class that deleteUser that is logged;
 * 			N.B - I DO NOT USE THIS CONTROLLER;
 * 
 * 
 * @details inherit the DB, extract the datas and put it the html, than according to the id
 * 			delete;
 *
 */
class DeleteUser
{
	
	/**
	 * 
	 * @var int $userId;
	 */
	protected $userId;
	
	/**
	 * @var array $userData;
	 */
	protected $userData;
	
	/**
	 *
	 * @var \UsersModel
	 */
	protected $deleteUserModel;
	

	
	public function __construct()
	{
		$this->deleteUserModel = new DeleteUser();
		
		$this->userID = $_SESSION['user_id'];
		
	}
	
	/**
	 * @brief class that create model from the post and Overwrite it
	 * 
	 * @param	$this->userData
	 * 
	 * @return $this->user-userData;`
	 * 
	 */
	
	public function DeleteUser()
	{
		$this->deleteUserModel->deleteUser( $this->deleteUser );
	}
	
	/**
	 * @brief function that is getting the values same as editDatas
	 * 
	 * @details	get the form
	 * 
	 * @return boolean true/false
	 * 
	 */
	
	public function renderForm()
	{
		$this->getUserData();
		
		$form = include (__DIR__ . '/../Views/userEdit.php' );
		
		print ( $form );
	}
	
	/**
	 * @brief	function that is putting the values into the form according to userId
	 * 
	 * @param	int userId;
	 */
	protected  function getUserData()
	{
		$this->deleteUser = $this->deleteUserModel()->getUserData( $this->userId);
	}
}

	$deleteUser = new DeleteUser();




// 	protected $userData;
	
// 	public function __construct()
// 	{
// 		//print "hi"; die();	
// 		if( !empty( $_POST ) )
// 		{
// 			$this->userdata = array(
// 					'username' => $_POST['username'],
// 					'password' => md5(trim($_POST['password'])),
// 					'role_id' => $_POST['role_id'],
// 					'fname' => $_POST['fname'],
// 					'lname' => $_POST['lname'],
// 					'age' => $_POST['age'],
// 			);
// 		}
// 	}
	
// 	public function create(){
// 		$userModel = new UsersModel();
	
// 		$userModel->dropUser( $this->userData );
// 	}
	
// 	/**
// 	 * @brief again we taking the datas from the html form and create the user;
// 	 * 
// 	 * @details this time redirecting into userEdit.html form
// 	 * 
// 	 * @return boolean true/false; 
// 	 */
	
// 	public function renderForm()
// 	{
// 		$form = file_get_contents(__DIR__. '/../Views/userEdit.html');
		
// 		print ( $form );
		

// 	}
// }	print_r( $this->userData);
