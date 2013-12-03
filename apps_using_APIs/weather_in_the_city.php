<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax - Weather API</title>

	<style>
		img{
			float: left;
		}
		ul{
			float: left;
		}	
	</style>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		// console.log($('#city').val());
		$('#city').on('change', function() {
			$.get("http://api.worldweatheronline.com/free/v1/weather.ashx?callback=?",
				{key: "jtpc4myth9fwxjgwz9fh5fw5", q: $('#city').val(), format: "json", num_of_days: "1"},
				function(info) {
					$('#weather_info').html("<h2>Weather for: "+info.data.request[0].query+"</h2>"+
						"<img src='"+info.data.current_condition[0].weatherIconUrl[0].value+"' />"+
						"<ul><li>Current temp(F): "+info.data.current_condition[0].temp_F+" degrees</li>"+
						"<li>Current temp(F): "+info.data.current_condition[0].temp_C+" degrees</li>"+
						"<li>Current Windspeed: "+info.data.current_condition[0].windspeedMiles+" Mph</li>"+
						"<li>Waether Description: "+info.data.current_condition[0].weatherDesc[0].value+"</li></ul>"
					);
				}, "json");
		});
	});
	</script>
</head>
<body>
	<h1>The Coding Dojo weather report</h1>
	<select name="city" id="city">
		<option>Detroit</option>
		<option>Mountain View</option>
		<option>Seattle</option>
		<option>LA</option>
	</select>
	<!-- <input type="submit" value="Get Weather!" id="weather_submit"> -->
	<div id="weather_info">
	</div>
</body>
</html>