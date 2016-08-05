<?php

/*
 * Include Database.
 */
include PROJPATH . '\Models\Database.php';

/**
 * 
 * @brief	class that is the base entry point for the web;
 * 
 * @details it works as requested from the index.php;
 *
 */

class Home
{	
	
	protected $db;
	
	public function __construct()
	{
		// Add database to the class...sometimes I am a complete idiot.
		$this->db = Database::getInstance();
	}
	
	public function loadPage()
	{
		$varArray = array();
		
		$sql = "SELECT * FROM content, views WHERE (views.view_id=1 OR views.view_id = 0) AND views.view_status=1 AND content.content_status=1 AND views.view_id=content.content_viewId ORDER BY content.content_key ASC;";	
	
		
		$smst = $this->db->query($sql);
		$result = $smst->fetchAll();
		
		
		
		$i = 0;
		$t = count($result);
		
		while ($i != $t)
		{
			$key = $result[$i]['content_key'];
			$value = $result[$i]['content_value'];
			
			$varArray[] = array('[' . $key . ']', $value);
			$i++;
		}
		
		//print_r($varArray);
		
		$this->renderView($varArray);
	}
	
	private function renderView($variables)
	{
		$header = file_get_contents(PROJPATH . '/Views/header.html');
		$footer = file_get_contents(PROJPATH . '/Views/footer.html');
		
		
		
		
		$form	= file_get_contents( __DIR__ . '/../Views/Home.html' );
		
		$content = $header . $form . $footer;
		
		if (is_array($variables))
		{
			
			$i = 0;
			$t = count($variables);
			
			while ($i != $t)
			{
				//print_r($variables[$i]);
				
				$key = $variables[$i][0];
				
				$value = $variables[$i][1];
				
				$content = str_replace( $key, $value, $content);
				
				$i++;
			}
		
		}
		
		print( $content );
	}
}
