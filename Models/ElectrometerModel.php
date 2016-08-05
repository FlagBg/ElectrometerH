<?php

include_once 'Database.php';
include_once '../helpers/Electrometer.php';

/**
 * @brief	Model for the electrometer with all the CRUD functionality and principles of MVC;
 * @author FlagBg
 * 
 * @param	boolean $db
 *
 */
Class ElectrometerModel
{
	/**
	 * @var boolean $db
	 */
	protected $db;
	
	
	
	/**
	 * @brief	create object
	 * 
	 * @param	string $this->db
	 */
	public function __construct()
	{
		$this->db = Database::getInstance();
	}
	
	
	public function showElectromer( $id, $dayRateValue, $nightRateValue, $timestamp )
	{
		$sql	= ' SELECT * FROM tblelectrometer ';
		
		$stmt	=	$this->db->prepare( $sql );
		
		$result = $stmt->execute( array( $id, $timestamp ) );
		
		
		if ( $result )
		{
			if ( $stmt->rowCount() > 0 )
			{
				$rows = $stmt->fetchAll( PDO::FETCH_ASSOC);
				$electrometer = array_pop( $rows );
				
				return new Electrometer( $electrometer['ele_id'], 
										 $electrometer['ele_name'], 
										 $electrometer['ele_status'],
										 $electrometer['ele_date_added'] );
			}
			else 
			{
				return false;
			}
		}
			return false;
			print ("die in electromerModelshowElectromer" );
	}
	//da pravi zayavka v bazata danni, kakto i da insertva kum neya, a v drugoto
	//samo da podavam i promenyam. now is fine. :)
	
	public function registerElectrometer( $electrometerData )
	{
		$sql = 'INSERT INTO tblelectrometer ( ele_name, ele_date_added ) VALUES ( ?, ? )';
		
		$electrometerData = array(
				$electrometerData['ele_name'],
				$electrometerData['ele_date_added']
		);
		
		$stmt	= $this->db->prepare( $sql );
		
		$result = $stmt->execute( $electrometerData );
		
		return $result;
		
	}
	
	public function deleteElectrometer()
	{
		
	}
	
	
}