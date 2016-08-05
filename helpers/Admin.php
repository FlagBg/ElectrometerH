<?php

include_once 'Users.php';

/**
 * 
 * @brief class that create object Admin extended User, because we will have Admin who will edit datas, 
 * /i have know idea still how! hahahaha, but i will sort it out!/
 * 
 * @details	we have the connection and we crade the object
 * 
 * @	
 *
 */
class Admin extends Users
{
	/**
	 * 
	 * @var		string $type;
	 * $var		Int	   $permissionLevel;
	 * 
	 */
	protected $type = 'Admin';
	protected $permissionLevel;
		
	
	/**
	 * 
	 * @param	string $firstName
	 * @param	string $lastName
	 * @param	integer $age
	 * @param	string $type
	 * @param	string $permissionLevel
	 */
	public function __construct( $firstName, $lastName, $age,
			$type, $permissionLevel )
	{

		parent::__construct( $firstName, $lastName,$age );
		
		$this->type = $type;
		$this->permissionLevel = $permissionLevel;
		//$this->age = $age;

	}
	
	/**
	 * 	return string 
	 * 	see Users::setType()
	 */
	public function setType()
	{
		$this->type = $type;
	}
	
	/*
	 * @return string $type;
	 */
	public function getType()
	{
		return $this->type;
	}
	
	
	/**
	 * return 	string;
	 */
	public function setPermissionLevel()
	{
		$this->permissionLevel = $permissionLevel;
	}
	
	/**
	 * return	string;
	 */
	public function getPermissionLevel()
	{
		return $this->permissionLevel;
	}
	
	
	
	
	
	
}