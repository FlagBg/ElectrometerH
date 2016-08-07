<?php

include_once 'Database.php';
include_once '../helpers/User.php';

/**
 * 
 * @brief 	class usermodel is representing the model of the nvc
 * 			takes the values in the database and create it as an object
 * 			
 * 			
 * @param	boolean $db
 *
 */
class UsersModel {
	
	/**
	 * 
	 * @var boolean $db;
	 */
	protected $db;
	
	/**
	 * @brief	default_role_id is not need anymore as const, because is a selector
	 */
	//const DEFAULT_ROLE_ID = 1;
	
	/**
	*@brief	create object 
	* 
	*@param	string $this->db;
	*
	*/
	public function __construct()
	{
		$this->db = Database::getInstance();
	}
	
	/**
	* @brief 		function createUser that insert datas in the db, it works with sql query and assiciative array;
	*
	* @details		when is called it takes the params from the db it is doing the query INSERT
	*
	* @param 		array $userData
	*
	* @return 		void
	*
	*/
	public function registerUser( $userData )
	{//$userData['role_id'] = self::DEFAULT_ROLE_ID; 
	 //just in case removing the javascript and put default role!
		$sql = 'INSERT INTO tbluser (
				user_username,
				user_password,
				user_role_id,
				user_first_name,
				user_last_name,
				user_age )
			VALUES (?, ?, ?, ?, ?, ?)';
	
		$userData = array(
				$userData['user_username'],
				$userData['user_password'],
				$userData['user_role_id'],
				$userData['user_first_name'],
				$userData['user_last_name'],
				$userData['user_age']
		);
	
		$stmt	=  $this->db->prepare( $sql );
		
		$result	= $stmt->execute( $userData );
	
		return $result;
	
	}
	
	/**
	*@brief	create object login() that takes all the values from 
	*			the database and return it as statement	
	* 
	*@param 	string	$username
	*@param		string	$password
	*@param 	string	sql;
	*@param		string	stm;
	*@param		string 	$result as array();
	*/
	public function login( $username, $password )
	{//malka prerabotka
		/*
		public function login ( $login )
		{
			$login = array( $login['username'], $login['$password'] );
		 	$sql   = 'SELECT * FROM users WHERE username = ? AND password = ?';
 			$stmt = $this->db->prepare( $sql );
 				
		 	$result = $stmt->execute( array( $login ) 
			if ( $result ) 
			{ 
				$rows = stmt->fetchAll(PDO::FETCH_ASSOC);
		 * 		{ $user	= array_pop( $rows );
		 */
		$sql	= '
			SELECT * FROM tbluser
			WHERE user_username = ? AND user_password = ?
		';
		
		$stmt	= $this->db->prepare( $sql );
		
		$result	= $stmt->execute( array( $username, $password ) );
		
		if ( $result )
		{
			if( $stmt->rowCount() > 0 )
			{
				$rows		= $stmt->fetchAll(PDO::FETCH_ASSOC);
				$user		= array_pop( $rows ); 
			
				return new User( 
						$user['user_id'], 
						$user['user_first_name'],
						$user['user_last_name'], 
						$user['age']
				);
				
				
				die('here');//$user['username'], $user['user_id'] ); 
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * @brief	Amend the datas and put it into the database;
	 * 
	 * @param 	int $userId
	 * @param 	array $userData
	 * 
	 * @return	boolean
	 */
 	public function userEdit( $userId, $userData)
 	{

 		$userId	= (int) $userId;
 		
 		$sql	= '
				UPDATE tbluser
 				SET user_username=?,
					user_role_id=?,
 					user_first_name=?,
 					user_last_name=?,
 					user_age=?
 				WHERE user_id = ' . $userId;
 		
 		$stmt 	= $this->db->prepare( $sql );
 		
 		$result = $stmt->execute( $userData);
 	
 		return $result;
 		
 		
	}
	
	
	/**
	 * @brief	deleteUser function get the sql query and the array;
	 * 
	 * @details		when is called takes the param from the db and do select;
	 * 
	 * @param array $result( $userId )
	 */
	public function userDelete( $userId )//this is clear that means - i undestand it!
	{
		//print('hi'); //vlizam tuk
		// Check to make sure the user cannot delete himself. As that would be stupid.
		if ($userId == $_SESSION['user_id'])
		{
			// Return generic error message.
			echo 'You cannot delete yourself.';
			//i know what u mean :D:D:D:D:D, but still don't have skills to do it with admin panel....
			// lets do it together now then. 
			// Lets build a chart which will show all of the users and allow you to edit and delete them. It'll take about 25 minutes.ok... thank you
			//as today all the collegues are somewhere in a conference and i am alone... just i am going to grab a cup of coffee for two mins
			// no problem. Let me know when you're back. 
		}
		
		// Otherwise return the user. it doesn't delete... Yes it does. You tried to delete yourself.
		else
		{
			$userId = (int) $userId;
		
			
			$sql = 'DELETE FROM tbluser WHERE user_id = ' . $userId;
			//var_dump( $userId); die();
			
			$result = $this->db->query( $sql );
			
			
			return $result;
		}
		
	}
	
	/**
	 * @brief List all users once user has logged in
	 * 
	 * @return array with all users data.
	 */
	public function listAllUsers()
	{
		// which view are you trying to load. Each view should have it's own space on a controller. 

		$userid = (int)$_SESSION['user_id'];
		
		$sql = "SELECT * FROM tbluser, tblrole WHERE tbluser.user_id = " . 
		$userid . " AND (tblrole.rol_name='admin' OR tblrole.rol_name='super_admin') 
				AND tblrole.rol_id=tbluser.user_role_id LIMIT 1;";
		//SELECT * FROM tbluser, tblrole WHERE tbluser.user_id AND tblrole.rol_name='admin' OR
		//tblrole.rol_name='super_admin' AND tblrole.rol_id = tbluser.user_role_id LIMIT 1
		//that is a placeholder for so it replaces :userid with the $_SESSION['user_id'] variable
		// This but all works fine. You want to finish off i can i saw the mistake!!! :)))
		// whoops....in the table roles are int 1,2,3, not string .....yeah we're searching the strin
		echo $sql;
		
		$smst = $this->db->prepare( $sql );
		
		$result = $smst->execute();
		
		$result = $smst->fetchAll();
		
		if (count($result) == 0)
		{
			echo 'This user is not an admin....oops.';
		}
		else
		{
		//okay that is all the SQL query needed to have... yo link the two tables by joining them with the role_id field and the id field
		//okay. So now it's just a case of running the query and returning the array as normal. You've done that before. Just in one book that
			 
			$sql = 'SELECT * FROM tbluser, tblrole WHERE tbluser.user_role_id=tblrole.rol_id ORDER BY user_username ASC';
			//in the listAllUsers - there is no define function CREATE, it is for other controller.
			try 
			{
				$smst = $this->db->query( $sql );
				
				$result = $smst->fetchAll();
				
				return $result;
			}
			catch (PDOException $e)
			{
				echo 'An error has occurred whilst performing this query against the database. Please run with your tail between your legs.. ';
			}
			
			
		}
	}
	
	
	/**
	 * @brief	Get user data
	 * 
	 * @return	array $userData
	 */
	public function getUserData( $userId )
	{
		$sql	= 'SELECT * FROM tbluser WHERE user_id = ' . $userId;

		
		$result = $this->db->query( $sql );
		
		$userData	= array(); 
		//array( $userData['userName'],$userData['']
		if( $result )
		{
			$userData	= $result->fetch(PDO::FETCH_ASSOC);
		}
		
		return $userData;
	}
	
	
	/*
	public function deleteUser( $deleteUser )
	{
		print "delete";
		
		$sql = '
				DELETE FROM users WHERE id=?
				';
		
				$stmt = $this->db->prepare( $sql );
				
				$result = $stmt->execute( $userData);
		*/
		//shte si vikna dannite ot UserEdit i tam edin button delete!
}
	

