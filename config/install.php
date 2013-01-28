<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : LinkedIn : Install
* Author: 		Localhost
* 		  		hi@brennannovak.com
*          
* Project:		http://social-igniter.com/
*
* Description: 	Installer values for LinkedIn for Social Igniter 
*/

/* Settings */
$config['linkedin_settings']['widgets']					= 'FALSE';
$config['linkedin_settings']['enabled']					= 'TRUE';
$config['linkedin_settings']['consumer_key']	 		= '';
$config['linkedin_settings']['consumer_secret'] 		= '';
$config['linkedin_settings']['social_login'] 			= 'TRUE';
$config['linkedin_settings']['login_redirect']			= 'home/';
$config['linkedin_settings']['social_connection'] 		= 'TRUE';
$config['linkedin_settings']['connections_redirect']	= 'settings/connections/';
$config['linkedin_settings']['profile_user_id']			= 1;

/* Sites */
$config['linkedin_sites'][] = array(
	'url'		=> 'https://linkedin.com/', 
	'module'	=> 'linkedin',
	'type' 		=> 'remote', 
	'title'		=> 'LinkedIn', 
	'favicon'	=> 'https://linkedin.com/favicon.ico'
);

