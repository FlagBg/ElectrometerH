<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

session_start();

define ('PROJPATH', realpath($_SERVER['DOCUMENT_ROOT'] . '/../'));

include '../utils/UrlHelper.php';

if( isset( $_GET['controller'] ) )
{
	$controller	= $_GET['controller'];
}
else
{
	$controller	= '';//http://www.electromer.com/?controller=login
}
error_log(print_r( $controller, true ), 3, 'D:\log.txt');

if ( $controller != '' )
{	
	if( $controller == 'login' )
	{
		/**
		 * @brief	login.php is a controller where we have class Login
		 * with object $login( $username, $password, $loggedIn=False and
		 * an $user(var that checked if(loggedIn is true)and print) the form
		 * from the view(Login.html);
		 * 
		 * var	$login as object requesting function renderLoginForm
		 */
		
		include __DIR__ . '/../Controllers/Login.php';

		$login	= new Login();
		
		if ( $login->isLoggedIn() )
		{ 
			exit();		
			
			UrlHelper::redirect( '/home' );
		}
		else
		{
			$login->renderLoginForm();
		}
	}
	elseif ( $controller == 'home' )
	{ 
		if (isset( $_SESSION['user_id']) && isset( $_SESSION['user_key'] ) )
		{
			include_once (PROJPATH . '/Controllers/Home_loggedin.php');
			
			$homeController	= new Home();
			$homeController->loadPage();
			
		}
		else
		{
			include_once (PROJPATH . '/Controllers/Home.php');
			
			$homeController	= new Home();
			$homeController->loadPage();
			
		}
	}
	
	elseif( $controller == 'logout' )
	{
		include __DIR__ . '/../Controllers/Login.php';
		
		$login	= new Login();
		$login->logout();
		
		UrlHelper::redirect( 'index.php?controller=login' );
	}
	
	elseif ( $controller == 'users' )
	{
		include __DIR__ . '/../Controllers/ListAllUsers.php';
		
		$var = new Users();;
		$var->loadContent();
	}
	//it works up to here......... right.... there is described controller electrometers. 
	elseif ( $controller == 'my-profile' )
	{
		include __DIR__ . '/../Controllers/Users.php';
		
		$var = new Users();
		$var->loadPage('my-profile'); //thishasn't been coded at all. FOI: Need to code this whole class.
	}
	
	// Electrometers Controller
	
	elseif ( $controller == 'electrometer' )
	{

		include __DIR__ . '/../Controllers/Electrometers.php';
		
		$var = new Electrometers();
		$var->loadContent(); // this doesn't exist. 
	}
	
	elseif ($controller == 'my-electrometers')
	{
		//include __DIR__ . '/../Controllers/Electrometers.php';
		include __DIR__ . '/../Controllers/Electrometers.php';
		
		$var = new Eletrometers();
		$var->loadPage('my-electrometers');
	}
	
	elseif( $controller == 'listUsers' )
	{
		
		include __DIR__ . '/../Controllers/ListAllUsers.php';
		
		$var = new ShowAllUsers();;
		$var->listAllUsers();
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
		include __DIR__ . '/../Controllers/Login.php';
		
		if(! empty( $_POST ) && isset( $_POST['action'] ) && $_POST['action'] == 'login')
		{//tova tuk otkade go vze????
			$username	= '';
			if( isset($_POST['user_username']) )
			{
				$username	= trim($_POST['user_username']);
			}
			
			$password	= '';
			if( isset($_POST['user_password']) )
			{
				$password	= trim($_POST['user_password']);
			}
			
			$login	= new Login();
			$login->login( $username, $password );
			//print "hi"; die();
			
			echo 'got here';
			if( $login->isloggedIn() )
			{ 
				//header( 'Location: index.php?controller=userEdit' );
				//exit();
				
				UrlHelper::redirect( '/home' );
				//die('logged in');

			}
			else
			{
				print_r( 'Error on login' );
				//print('hi'); die();
				$login->renderLoginForm();
				//UrlHelper::redirect('index.php?controller=Login.php');
				
				$homeController->renderView();
				//var_dump( $homeController); die();
				exit;
			}
		}
	}
	elseif($controller == 'userEdit')
	{
		include __DIR__ . '/../Controllers/UserEdit.php';
		
		$userEdit	= new UserEdit();
		
		if( ! empty( $_POST ) )
		{
			$userEdit->userEdit();
		}
		
		$userEdit->renderForm();
		
		
		
	}
	elseif($controller =='userDelete')//elseif($controller == 'userDelete')
	{
		include __DIR__ . '/../Controllers/UserEdit.php';
		
		$userDelete	= new UserEdit();
		
		if( ! empty( $_POST ) )
		{	
			var_dump($userDelete);
			$userDelete->userDelete();
			//print('asdfdasfasfas'); die();
		}
		
		//$userDelete->renderForm();
		// promenih $userEdit na 4userDelete
	}
	elseif($controller == 'userCreate')
	{
		include __DIR__ . '/../Controllers/UserCreate.php';
	
		$userCreate	= new UserCreate();
		$userCreate->renderForm();
		
		if ( $_POST )
		{
			//var_dump( $userCreate->create() ); die();
			$result	= $userCreate->create();//ei tuk dava greshkata!!!
			
			if ( $result )
			{
				UrlHelper::redirect( '/login' );
			}
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	elseif( $controller == 'register' )
	{
		include __DIR__ . '/../Controllers/UserRegistration.php';
	
		$userCreate	= new UserRegistration();
		
		$userCreate->renderForm();
		
		if ( $_POST )
		{//var_dump( $userCreate->createUser() ); die('index');
			$result	= $userCreate->createUser();
			
			if ( $result )
			{
				print "the login was successful" .
				UrlHelper::redirect( '/login' );
			}
		}
	}
	elseif($controller == 'not-found')
	{
		include __DIR__ . '/../Controllers/ErrorPage.php';
	
		$userCreate	= new ErrorPage();
		$userCreate->loadPage('not-found');
	}
	else
	{
		//die('fff');
		UrlHelper::redirect( '/not-found' );
		//TOVA AKO NAPISHA: UrlHelper::redirect( 'index.php?conctroller=Home';
	}
	
/* 	elseif($controller== 'dropUser')
	{
		include__DIR__ . '/../Controllers/UserDrop.php';
		
		$userDrop = new UserDrop();
		$userDrop->renderForm();
		
		
	} */
}
else
{
	UrlHelper::redirect( '/home' );
}



/*
 * //$user_ip = $_SERVER['REMOTE_ADDR'];

//$string = 'my ip is:' . $user_ip;

function echo_ip()
{
	$user_ip = $_SERVER['REMOTE_ADDR'];
	//global $user_ip;
	$string = 'my ip is:' . $user_ip;
	echo $string;
}

echo_ip();
*/

