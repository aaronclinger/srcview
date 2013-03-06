<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$view_data = array();
		
		$user_agent_id = $this->input->post('user_agent', TRUE);
		
		if ($user_agent_id !== FALSE)
		{
			$url = $this->input->post('url', TRUE);
			
			switch ($user_agent_id)
			{
				case 'desktop' :
					$user_agent_string = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17';
					break;
				case 'iphone' :
					$user_agent_string = 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25';
					break;
				case 'ipad' :
					$user_agent_string = 'Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25';
					break;
				case 'andriod_mobile' :
					$user_agent_string = 'Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19';
					break;
				case 'andriod_tablet' :
					$user_agent_string = 'Mozilla/5.0 (Linux; Android 4.1.1; Nexus 7 Build/JRO03D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Safari/535.19';
					break;
				case 'other' :
					$other_user_agent  = $this->input->post('other_agent', TRUE);
					$user_agent_string = ($other_user_agent !== FALSE) ? $other_user_agent : '';
					break;
				default :
					$user_agent_string = $this->input->user_agent();
			}
			
			$this->load->model('source_model');
			
			$source_data = $this->source_model->get_source($url, $user_agent_string);
			
			if ($source_data['success'])
			{
				$view_data['source'] = $source_data['source'];
			}
			else
			{
				$view_data['error'] = $source_data['error'];
				
				if (isset($source_data['message']))
				{
					$view_data['message'] = $source_data['message'];
				}
			}
		}
		
		$this->load->helper('form');
		$this->load->view('main', $view_data);
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */