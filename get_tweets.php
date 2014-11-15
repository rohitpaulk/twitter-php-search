<?php
	require_once ('lib/twitter-api.php');

	$settings = array(
		'consumer_key' => getenv('TWITTER_CONSUMER_KEY'),
		'consumer_secret' => getenv('TWITTER_CONSUMER_SECRET')
	);

	$twitter = new TwitterClient($settings);
	$search_results = $twitter->searchTweets("#custserv");
	$tweets = [];

	foreach ($search_results as $result){
		if ($result['retweeted_status'] != ''){
			// If the result is a RT, we want to find the original tweet.
			$tweet_id = $result['retweeted_status']['id'];
			$tweets[$tweet_id] = $result['retweeted_status']['retweet_count'];
		}
		elseif ($result['retweet_count'] > 0){
			$tweet_id = $result['id'];
			$tweets[$tweet_id] = $result['retweet_count'];
		}
	}

	arsort($tweets);
	header('Content-Type: application/json');
	echo json_encode($tweets);
?>