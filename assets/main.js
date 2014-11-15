$(document).ready(function () {
	$.get('get_tweets.php', function(data) {
		console.log(data);

		html = "";
		var keys = [];

		$.each(data, function(key, value){
			$.get("https://api.twitter.com/1/statuses/oembed.json?id=" + key, function (data) {
				$('#tweetbox').append(data.html);
			});
			html+= key + " " + value + "<br>";
		});



		//$('#tweetbox').html(html);
	});
	console.log(twttr);
	//twttr.widgets.createTweet();
});