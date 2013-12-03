<?php require_once 'db.php'; ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seattle - Ajax Intermediate</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<style type="text/css">
		#container {
			width: 600px;
		}
		ul{
			float: right;
		}
		.curr_page{
			background-color: #3879D9;
			color: white;
		}
		li{
			list-style: none;
			display: inline;
			border-right: 1px solid black;
		}
		li:last-child{
			border: none;
		}
		a{
			text-decoration: none;
			padding: 0 5px;
		}
		table{
			clear: both;
		}
	</style>

	<!-- js -->
	<!-- external -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.datepicker').datepicker({dateFormat: "yy-mm-dd"});

			$('input').on('keyup', function(){
				$('#page').val("1");
				$('form').submit();
			});
			$('.datepicker').on('change', function(){
				$('#page').val("1");
				$('form').submit();
			});

			$('form').on("submit", function(){
				$.post($(this).attr('action'), $(this).serialize(), function(data){
					$('#results').html(data.html);
					$('#pagination').html(data.pagination);
					$('#pagination a').on('click', function(){
						$('#page').val($(this).attr('id'));
						$('form').submit();
					});
				}, "json");
				return false;
			});

			$('form').submit();
		});
	</script>
</head>
<body>
	<div id="container">
		<form action="process.php" method="post">
			<input type="hidden" name="page" value="1" id="page">
			Name: <input type="text" name="name" id="name">
			From: <input type="text" name="from" class="datepicker" id="from">
			To: <input type="text" name="to" class="datepicker" id="to">
			<ul id="pagination"></ul>
			<!-- <button type="submit">search</button> -->
		</form>
		<div id="results">
		</div>
	</div>
</body>
</html>