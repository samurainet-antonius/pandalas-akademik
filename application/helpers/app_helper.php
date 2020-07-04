<?php
if ( ! function_exists('xss_filter'))
{
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

if ( ! function_exists('json_output'))
{
	function json_output($parm, $header=200)
	{
		$CI =& get_instance();
		$CI->output
		->set_status_header($header)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($parm, JSON_HEX_APOS | JSON_HEX_QUOT))
		->_display();
		exit();
	}
}

if ( ! function_exists('encrypt'))
{
	/**
	 * - Fungsi untuk encrypt string.
	 * 
	 * @param 	string 	$str
	 * @return 	string	
	*/
	function encrypt($str = '')
	{
		$CI =& get_instance();
		$CI->load->library('encryption');
		$result = $CI->encryption->encrypt($str);
		return $result;
	}
}