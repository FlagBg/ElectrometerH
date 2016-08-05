

	user 			= root;
	password 		= '';
	driver			= mysql;
	
	[dsn]
	host = localhost;
	port='';
	dbname = localhost;
	
	[db_option]
	
	<?php 
	
	class Database
	{
		private static $link = null;
		
		private static function getLink()
		{
			if ( self:: $link )
			{
				return self::$link;
			}
			
		$ini = _BASE_DIR . "config.ini";
		$parse = parse_ini_file( $ini, true );
		
		$driver = $parse [ "db_driver"];
		$dsn = "${driver}:";
		$user = $parse [ "db_user" ];
		$password = $parse [ "db_password"];
		$option = $parse [ "db_options"];
		$attributes = $parse [ "db_attributes"];
		
		foreach ( $parse [ "dns" ] as $k => $v)
		{
			$dsn .= "${k}=${v};" ;
		}
		
// 		self:$link = new PDO $dsn, $user,$password, $option );
			
// 			foreach ( $attributes as $k => $v )
// 			{
// 				self::$link -> setAttribute ( constant ( "PDO::{$k}")"
// 				, constant ( "PDO::{$v}"));
// 			}
			
			
		}
	}
	
	
	
	
	
	
	?>