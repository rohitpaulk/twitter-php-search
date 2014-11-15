$(document).ready(function () {
	$.get('get_tweets.php', function(data) {
		twttr.ready(function(twttr) {
			$.each(data, function(key, value){
				$('#tweetbox').append("<div id='" + key + "'></div>");
				twttr.widgets.createTweet(key, document.getElementById(key), {});
			});
		});
	});
});

