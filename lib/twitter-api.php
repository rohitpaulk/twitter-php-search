<?php

require_once('vendor/Requests.php');
Requests::register_autoloader();

class TwitterClient
{
    private $oauth_access_token;
    private $consumer_key;
    private $consumer_secret;

    /**
     * Create the API access object and request an OAuth Token.
     * Requires an array of settings: consumer key, consumer secret
     * These are all available by creating your own application on dev.twitter.com
     *
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        if (!isset($settings['consumer_key']) || !isset($settings['consumer_secret']))
        {
            throw new Exception('Make sure you are passing in the correct parameters');
        }

        $this->consumer_key = $settings['consumer_key'];
        $this->consumer_secret = $settings['consumer_secret'];
        $this->getOAuthToken();
    }

    /**
     * Get an access token using consumer_key and consumer_secret.
     * https://dev.twitter.com/oauth/reference/post/oauth2/token
     *
     */
    public function getOAuthToken()
    {
        $consumer_key = $this->consumer_key;
        $consumer_secret = $this->consumer_secret;

        $composite_key = rawurlencode($consumer_key) . ':' . rawurlencode($consumer_secret);
        $auth_header = "Basic ". base64_encode($composite_key);
        $headers = array('Authorization' => $auth_header);
        $data = array('grant_type' => 'client_credentials');

        $request = Requests::post('https://api.twitter.com/oauth2/token', $headers, $data);
        if ($request->status_code != 200){
        	throw new Exception('Twitter authorization failed, check your credentials');
        }

        $json = $request->body;
        $access_token = json_decode($json, true)['access_token'];
        $this->oauth_access_token = $access_token;
    }

    /**
     * Perform the actual data retrieval from the API
     *
     * @param string $keyword
     *
     */
    public function searchTweets($keyword)
    {
    	$access_token = $this->oauth_access_token;
    	$headers = array('AUTHORIZATION' => 'Bearer ' . $access_token);
    	$query_string = '?q=' . urlencode($keyword);
    	$query_string .= '&count=100';
    	$url = 'https://api.twitter.com/1.1/search/tweets.json' . $query_string;
    	$request = Requests::get($url, $headers, $data);
    	$json = $request->body;
    	return json_decode($json, true)['statuses'];
    }
}