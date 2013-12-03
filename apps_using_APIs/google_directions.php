<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax - Maps API</title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('form').on('submit', function(){
				$.get($('form').attr('action'),
					$('form').serialize(),
					function(info){
						console.log(info);
						var html = "";
						if (info.status === "OK"){
							html += "<h3>Directions from "+info.routes[0].legs[0].start_address+" to "+info.routes[0].legs[0].end_address+"</h3>"+"<ol>";
							for (i in info.routes[0].legs[0].steps){
								html += "<li>"+info.routes[0].legs[0].steps[i].html_instructions+"</li>";
							}
							// console.log(html);
							html += "</ol>";
						} else{
							html += "I can't do it Captain!!!"
						}
						$('#directions_results').html(html);
					}, "json");
				return false;
			});
			
		});
	</script>
</head>
<body>
	<form action="http://maps.googleapis.com/maps/api/directions/json?">
		<input type="hidden" name="sensor" value="false">
		<h2>from </h2>
		<input type="text" name="origin" id="from" />
		<h2>-> </h2>
		<input type="text" name="destination" id="to" />
		<input type="submit" value="GO!!!!!" id="go" />
	</form>
	<div id="directions_results">
	</div>
</body>
</html>