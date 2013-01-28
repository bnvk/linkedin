<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* LinkedIn Library
*
* @package		Social Igniter
* @subpackage	LinkedIn Library
* @author		Localhost
*
* Contains methods for LinkedIn App
*/

class Linkedin_library
{
	protected $ci;
	protected $consumer;
	protected $linkedin;
	protected $tokens;

	function __construct($config)
	{
		// Global CodeIgniter instance
		$this->ci =& get_instance();

		// Load Library
		$this->ci->load->library('oauth');
		$this->ci->load->library('curl');

        // Create Consumer
        $this->consumer = $this->ci->oauth->consumer(array(
            'key' 	 	=> config_item('linkedin_consumer_key'),
            'secret' 	=> config_item('linkedin_consumer_secret')
        ));

        // Load Provider
        $this->linkedin = $this->ci->oauth->provider('linkedin');

        // Create Tokens
		$this->tokens = OAuth_Token::forge('request', array(
			'access_token' 	=> $config->auth_one,
			'secret' 		=> $config->auth_two
		));

		// Merge Object Tokens & Data
		$this->request_array = array_merge(array(
			'oauth_consumer_key' 	=> $this->consumer->key,
			'oauth_token' 			=> $config->auth_one
		));	
	}
	
	/* Interact with Data_Model */
	function get_full_profile($user_id)
	{
		return $this->linkedin->get_full_profile($this->consumer, $this->tokens, $this->request_array, $user_id);	
	}

}