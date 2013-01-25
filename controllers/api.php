<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : LinkedIn : API Controller
* Author: 		Localhost
* 		  		hi@brennannovak.com
* 
* Project:		http://social-igniter.com
* 
* Description: This file is for the LinkedIn API Controller class
*/
class Api extends Oauth_Controller
{
    function __construct()
    {
        parent::__construct();
	}

    /* Install App */
	function install_get()
	{
		// Load
		$this->load->library('installer');
		$this->load->config('install');

		// Settings & Create Folders
		$settings = $this->installer->install_settings('linkedin', config_item('linkedin_settings'));
	
		// Site
		$site = $this->installer->install_sites(config_item('linkedin_sites'));

		if ($settings == TRUE)
		{
            $message = array('status' => 'success', 'message' => 'Yay, the LinkedIn App was installed');
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Dang LinkedIn App could not be installed');
        }		
		
		$this->response($message, 200);
	} 

}