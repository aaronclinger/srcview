<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Source_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function get_source($url, $user_agent)
	{
		$url_parts = parse_url($url);
		
		$response            = array();
		$response['success'] = FALSE;
		
		if ( ! isset($url_parts['scheme']) && ! isset($url_parts['host']))
		{
			$response['error']   = 400;
			$response['message'] = 'Invalid URL provided.';
			
			return $response;
		}
		
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
		
		$content   = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		curl_close($ch);
		
		if ($http_code !== 200)
		{
			$response['error'] = $http_code;
			
			return $response;
		}
		
		//$session = array('url' => $url, );
		
		/*$cookie = array(
			'name'   => 'data',
			'value'  => 'The Value',
			'expire' => '432000', // 5 Days
		);
		
		$this->input->set_cookie($cookie);*/
		
		$response['success'] = TRUE;
		$response['source']  = $content;
		
		return $response;
	}
}

/* End of file source_model.php */
/* Location: ./application/models/source_model.php */