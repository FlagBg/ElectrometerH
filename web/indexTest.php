<?php

/**
 * 
 * @brief	here i will test some functions from the documentation regarding SESSIONS
 * 
 * @details	
 * 
 * @param	SessionHandler
 *
 */

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

session_start();

if (!isset( $_SESSION['timeout_idle']))
{
$_SESSION['timeout_idle']= time() + MAX_IDLE_TIME; 
}	else
	{
		if( $_SESSION['timeout_idle'] < time())
		{
			//destroy
		}
	else 
	{
		$$_SESSION['timeout_idle'] = time() + MAX_IDLE_TIME; 
	}	
}


//$newSessId = somerandomnumberfunction();
//$sessionId ($newSessId);

//var_dump($sessionId);

	/*
	session_start();
	
	
	$_SESSION['user_id']   = $this-user->getID();
	
 	
 	print_r( $_SESSION);
 	
 	session.use_strict_mode
 	session_regererate_id()
 	
 	
	
	session_start();
	if (!isset($_SESSION['op'])) {
		$_SESSION['op'] = 0;
	} else {
		$_SESSION['op']++;
	}
	
	var_dump( $_SESSION['count'] );
	var_dump( $_SESSION[ 'op'] );
	
	if( !$_SESSION['count'])
	//unset($_SESSION['op']);
		exit;
	
*/



?>
