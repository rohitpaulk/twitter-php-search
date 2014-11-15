<html>
	<head>
		<title>Twitter API Client</title>
		<link rel="stylesheet" href="/assets/main.css">
	</head>
	<body>
		<?php
			echo "Greetings, program!";
		?>
		<div id="tweetbox">
		</div>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>window.twttr = (function (d, s, id) {
		  var t, js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src= "https://platform.twitter.com/widgets.js";
		  fjs.parentNode.insertBefore(js, fjs);
		  return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
		}(document, "script", "twitter-wjs"));</script>
		<script src="/assets/main.js"></script>
	</body>
</html>

