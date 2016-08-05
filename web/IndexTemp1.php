<?php


//$controller = isset( $_GET['controller']) ? $_GET['controller'] : '';

if( $isset( $_GET['controller']))
{
	$controller = $_GET['controller'];
}

else
{
	$controller = '';
}

if ( $controller !== '' )
{
	if($controller == 'login')
	{
		include __DIR__ . '/..Controllers/login.php';
	}
	
	$login = new Login();
	
	$login->renderLoginForm();
	//metod v login.php(controllers) kydeto suzdavame class Login, syzdavasgt
	//obekt s class(Login $username,$password,$loggedIn=Fasle!$user),
	//izpolzvame constructor po default i sled tova metodi:
	//vseobshto dostupna functiya login( $username, $password) koyato e True ili False
	//i kogato e True ->vzima dannite ot View/Login.html,koeto e formata;
}

