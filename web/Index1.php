<?php

//$controller	 = isset($_GET['controller']) ? $_GET['controller'] : '';
//the code underneath === $controller up.!
//Is Controller is set up and exists, as shows the path and the name of 
//controller that we request;


if(isset($_GET['controller']))
{
	$controller	= $_GET['controller'];
}
//if controller = empty(if not get!)
else
{
	$controller	= '';
}
//if get controller and exists and not empty and equal ot
if ( $controller !== '' )
{	
	//take controller -> 'login' and take it from __DIR__
	if($controller == 'login')
	{
		/**
		 * @brief	login.php is a controller where we have class Login
		 * with object $login( $username, $password, $loggedIn=False and
		 * an $user(var that checked if(loggedIn is true)and print) the form
		 * from the view(Login.html);
		 * 
		 * var	$login as object requesting function renderLoginForm
		 */
		
		include __DIR__ . '/../Controllers/login.php';

		$login	= new Login();
		//var_dump( $login ); die();
		$login->renderLoginForm();
	}
	/**
	 * pokazvame v koi controller getva in!
	 */
	
	elseif($controller == 'loginUser')
	{
		/**
		 * brief	elseif condition if not from the form $_POST is not empty and isset in 'action'
		 * 			trim the text in username and code in password; than create an object $login()
		 * 			and request public function loggedIn() that prints everything for the User!
		 */
		include __DIR__ . '/../Controllers/login.php';
		
		if(! empty( $_POST ) && isset( $_POST['action'] ) && $_POST['action'] == 'login')
		{
			$username	= '';
			if( isset($_POST['username']) )
			{
				$username	= trim($_POST['username']);
			}
			
			$password	= '';
			if( isset($_POST['password']) )
			{
				$password	= trim($_POST['password']);
			}
			
			$login	= new Login();
			$login->login( $username, $password );
			
			$login->isloggedIn();
		}
	}
	
	/**
	 * brief 	if we have controller userEdit.......
	 */
	/////////////////////////////////////////////////// purvo nivo;
	
// 	elseif($controller == 'userEdit')
// 	{
// 		include __DIR__ . '/../Controllers/UserEdit.php';
		
// 		$userEdit	= new UserEdit();
// 		$userEdit->renderForm();
// 	}
// 	elseif($controller == 'userEditPost')
// 	{
// 		include __DIR__ . '/../Controllers/UserEdit.php';
	
// 		$userEdit	= new UserEdit();
		
// 	}
	
	//////////////////////////////////////////////////////
	
	elseif($controller == 'userCreate')
	{
		include __DIR__ . '/../Controllers/UserCreate.php';
	
		$userCreate	= new UserCreate();
		$userCreate->renderForm();
	
	}
	
}






// include_once 'Electromer.php';
// include_once 'InterfaceElectromer.php';
// include_once 'Users.php';
// include_once 'Admin.php';


// $el = new Electromer(33, 22);

// //print "The price for the Day tariff is: " . $el->priceDayRateValue();
// print "The price for the Night tariff is: " .$el->priceNightRateValue();
// //print $el;


// $admin = new Admin('Ivan', 'Ivanov', 22, 'admin', '3');
// print " My first Name is: " . $admin->getFirstName() . " ";
// print "I am  usertype: " . $admin->getType() . " ";
// print "My level of persmission is " . $admin->getPermissionLevel() . " ";
// print "My age is: " . $admin->getAge() . " ";

