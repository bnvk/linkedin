<?php
/**
 * OAuth LinkedIn Provider
 *
 * Documents for implementing LinkedIn OAuth can be found at http://developer.linkedin.com/apis
 *
 * [!!] This class does not implement the LinkedIn API. It is only an
 * implementation of standard OAuth with LinkedIn as the service provider.
 */

class OAuth_Provider_Linkedin extends OAuth_Provider {

	public $name = 'linkedin';

	public function url_request_token()
	{
		//return 'https://api.linkedin.com/uas/oauth/requestToken';
		return 'https://api.linkedin.com/uas/oauth/requestToken?scope=r_fullprofile%20r_emailaddress';
	}

	public function url_authorize()
	{
		return 'https://api.linkedin.com/uas/oauth/authorize';
	}

	public function url_access_token()
	{
		return 'https://api.linkedin.com/uas/oauth/accessToken';
	}
	
	public function get_user_info(OAuth_Consumer $consumer, OAuth_Token $token)
	{
		// Create a new GET request with the required parameters
		$url = 'https://api.linkedin.com/v1/people/~:(id,first-name,last-name,headline,summary,member-url-resources,picture-url,location,public-profile-url,positions)';
		$request = OAuth_Request::forge('resource', 'GET', $url, array(
			'oauth_consumer_key' => $consumer->key,
			'oauth_token' => $token->access_token,
		));

		// Sign the request using the consumer and token
		$request->sign($this->signature, $consumer, $token);

		$user = OAuth_Format::factory($request->execute(), 'xml')->to_array();
		
		// Create a response from the request
		return array(
			'uid' => $user['id'],
			'name' => $user['first-name'].' '.$user['last-name'],
			'nickname' => end(explode('/', $user['public-profile-url'])),
			'description' => $user['headline'],
			'location' => isset($user['location']['name']) ? $user['location']['name'] : null,
			'urls' => array(
			  'Linked In' => $user['public-profile-url'],
			)
		);
	}

	public function get_full_profile(OAuth_Consumer $consumer, OAuth_Token $token, $request_array, $user_id)
	{
		$request = OAuth_Request::forge('resource', 'GET', 'http://api.linkedin.com/v1/people/id='.$user_id.':(first-name,last-name,headline,summary,location,industry,distance,num-recommenders,current-status,current-status-timestamp,connections,positions:(id,title,summary,start-date,end-date,is-current,company:(id,name,size,industry,ticker)),educations,languages,skills,member-url-resources,site-standard-profile-request,public-profile-url,picture-url)', $request_array);
		$request->sign($this->signature, $consumer, $token);

		$full_profile = OAuth_Format::factory($request->execute(), 'xml')->to_array();

		return $full_profile;
	}

} // End Provider_Dropbox