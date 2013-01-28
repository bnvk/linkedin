<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : LinkedIn : Controller
* Author: 		Brennan Novak
* 		  		hi@brennannovak.com
* 
* Project:		http://social-igniter.com
* 
* Description: This file is for the public LinkedIn Controller class
*/
class Linkedin extends Site_Controller
{
    function __construct()
    {
        parent::__construct();
        
		$this->load->config('linkedin');

		$this->data['page_title'] = 'LinkedIn';

		$this->check_connection = $this->social_auth->check_connection_user(config_item('linkedin_profile_user_id'), 'linkedin', 'primary');

		if (!$this->check_connection)
		{
			$this->session->set_flashdata('message', 'There is no user defined with a connected LinkedIn account');			
			redirect('/settings/connections');
		}

		$this->load->library('linkedin_library', $this->check_connection);
	}
	
	function index()
	{
		$user	 = $this->social_auth->get_user('user_id', config_item('superadmin_user_id')); 
		$profile = $this->linkedin_library->get_full_profile($this->check_connection->connection_user_id);

		$this->data['user']		= $user;
		$this->data['profile']	= $profile;

		$this->render();
	}

	function test()
	{
		$profile = $this->linkedin_library->get_full_profile($this->check_connection->connection_user_id);

		echo '<pre>';
		print_r($profile);
	}

}
