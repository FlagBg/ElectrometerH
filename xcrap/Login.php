<?php

include_once 'Database.php';


$hash	= 'test';

if ( ! empty( $_POST ) && isset( $_POST['action'] ) && $_POST['action'] == 'login' )
{

	$username	= trim( $_POST['user'] );
	//$password   = trim( $_POST['pass']);	
	$password	= md5( trim( $_POST['pass'] ) . $hash );
	
	
	//print( $password); die();
	//user angel = password(pass) 2f3bc18c0d3e6b1b8a445075535d26e9
								//  2f3bc18c0d3e6b1b8a445075535d26e9
	//user peter = password(gogogo) b96a8bdc65218ff43a8e83aa4628854f
	//$password = 'pass';
	
	$dbh		= Database::getInstance();

	$sql	= '
		SELECT * FROM users
		WHERE username = ? AND password = ? 
	';
	
	$stmt	= $dbh->prepare( $sql );
	
	$result	= $stmt->execute( array( $username, $password ) );
	
	if ( $result )
	{
		if( $stmt->rowCount() > 0 )
		{
			$rows	= $stmt->fetchAll(PDO::FETCH_ASSOC); 
			$user	= array_pop( $rows );
			print_r($user);
		
			print_r( 'User is logged' );//die();
		
		}
		else
		{
			print_r( 'User is not logged' );die();
		}
	}
	else
	{
		print_r( 'Database error' );die();
	}
////////////////////////////////////////////////////////////////////////////
	
	
	
	
	$electrometer = '
			SELECT * FROM electrometer
			';
	
	$printElectrometer = $dbh->prepare( $electrometer );
	
	$result1 = $electrometer->execute( array( $dayValue, $nightValue ) );
	
	if ( $result1 )
	{
		if ($electrometer->rowCount() > 0 )
		{
			$rows = $printElectrometer->fetchAll( PDO::FETCH_ASSOC);
			$user = array_pop( $rows );
			print_r( $electrometer);
		}
		
	}
	
	
	
}

















