<?php

include_once 'Users.php';

/**
 * 
 * @brief	this class create User. type Member, because we will have two type of people who will add datas;
 *
 */
class Users extends Users
{
	/**
	 * @var string	$type;
	 * 
	 */
	protected $type = 'Member';
	
	
	/**
	 * @brief	creating object Member;
	 * 
	 * @details	The member extends __parent constructor with its characteristics and adding new ones specific for it;
	 * 
	 * @param sring  $type
	 */
	public function __construct( $firstName, $lastName, $age, $type )
	{
		
		parent::__construct( $firstName, $lastName, $age, $type);
		$this->type = $type;
		
	}
	
	/*
	 * @see Users::setType()
	 */
	public function setType()
	{
		$this->type = $type;
	}
	
	/**
	 *
	 * @see Users::getType()
	 */
	public function getType()
	{
		return $this->type;
	}
	
	
	
}