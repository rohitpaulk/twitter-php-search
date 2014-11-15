$(document).ready(function () {

	$.get('get_tweets.php', function(data) {

		twttr.ready(function(twttr) {

			$.each(data, function(key, value){
				$('#tweetbox').append("<div id='" + key + "' class='single-tweet'></div>");
				twttr.widgets.createTweet(key, document.getElementById(key), {
					cards: 'hidden',
					conversation: 'none'
				});
			});

		});

	});

});

