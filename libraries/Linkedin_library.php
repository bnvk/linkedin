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
	function __construct()
	{
		// Global CodeIgniter instance
		$this->ci =& get_instance();

	}
	
	/* Interact with Data_Model */
	function my_custom_method($data_id)
	{
		return $this->ci->linkedin_model->get_data($data_id);
	}

}