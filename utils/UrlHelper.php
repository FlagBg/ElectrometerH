<?php

class UrlHelper
{
	public static function redirect( $url )
	{
		header( 'Location: ' . $url );
		exit;
	}
}