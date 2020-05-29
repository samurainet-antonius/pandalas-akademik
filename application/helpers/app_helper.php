<?php
if ( ! function_exists('xss_filter'))
{
	/**
	 * - Fungsi untuk memfilter string dari karakter berbahaya.
	 *   Contoh : xss_filter("foo bar bass", 'xss')
	 * 
	 * @param 	string 	$str
	 * @param 	string 	$type  xss|sql
	 * @return 	string 	
	*/
	function xss_filter($str, $type = '')
	{
		switch($type)
		{
			default:
			$str = stripcslashes(htmlspecialchars($str, ENT_QUOTES));
			return $str;
			break;

			case 'sql':
			$x = array('-','/','\\',',','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','%','$','^','&','*','=','?','+');
			$str = str_replace($x, '', $str);
			$str = stripcslashes($str);	
			$str = htmlspecialchars($str);				
			$str = preg_replace('/[^A-Za-z0-9]/','',$str);				
			return intval($str);
			break;

			case 'xss':
			$x = array ('\\','#',';','\'','"','[',']','{','}',')','(','|','`','~','!','%','$','^','*','=','?','+');
			$str = str_replace($x, '', $str);
			$str = stripcslashes($str);	
			$str = htmlspecialchars($str);
			return $str;
			break;
		}
	}
}