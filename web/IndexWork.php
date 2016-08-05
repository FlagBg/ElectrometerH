<?php


session_start();


include '../utils/UrlHelper.php';
error_reporting( E_ALL);
ini_set('display_startup_errors',1);
ini_set('display_errors', '1' );


//$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
//the code means = controller up! :D :D :D sha hodi toi; if is set up and exists, we request
if( isset($_GET['controller']))
{
	$controller = $_GET['controller'];
}
//
else
{
	$controller = '';
}
error_log(print_r($controller, true),3, 'D:\log.txt');

if( $controller !== '' )
{
	if($controller == 'createElectrometer')
	{
		/**
		 * @brief   createElectromer.php is a controller class CreateElectromer with object 
		 * 			$id,$dayRateValue,$nightRateValue and we request create electromer html;
		 * 
		 * @var		CreateElectromer
		 */
		include __DIR__ . '/../Controllers/ShowElectromer.php';
		
		$createElectrometer = new CreateElectrometer();
		
		UrlHelper::redirect('index.php?controller=showElectrometer.php');	
	}
	else 
	{
		print('here i am '); die();
	}
}
 



//$controller = isset( $_GET['controller']) ? $_GET['controller'] : '';

// if( $isset( $_GET['controller']))
// {
// 	$controller = $_GET['controller'];
// }

// else
// {
// 	$controller = '';
// }

// if ( $controller !== '' )
// {
// 	if($controller == 'login')
// 	{
// 		include __DIR__ . '/..Controllers/login.php';
// 	}
	
// 	$login = new Login();
	
// 	$login->renderLoginForm();
	//metod v login.php(controllers) kydeto suzdavame class Login, syzdavasgt
	//obekt s class(Login $username,$password,$loggedIn=Fasle!$user),
	//izpolzvame constructor po default i sled tova metodi:
	//vseobshto dostupna functiya login( $username, $password) koyato e True ili False
	//i kogato e True ->vzima dannite ot View/Login.html,koeto e formata;

