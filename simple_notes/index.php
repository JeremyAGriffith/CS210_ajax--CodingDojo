<?php require 'note_class.php'; ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seattle - Ajax Basic</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="css.css" />

	<!-- js -->
	<!-- external -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<!-- internal -->
	<script type="text/javascript">
		$('document').ready(function(){
			$('form').on('submit', function(){
				$.post($(this).attr('action'), $(this).serialize(), function(data){
					if (data.error){
						$('form').next().html(data.error).show().fadeOut(1000);
					}else{
						$('#notes').append("<li>"+data.note+"</li>");
						$('#note_msg').val("");
					}
				}, "json");
				return false;
			});
		});
	</script>
</head>
<body>
	<h1>My Posts:</h1>
	<ul id="notes">
<?php 
	$note = new Note();
	$notes = $note->retrieve_all_notes();
	foreach ($notes as $note): ?>
		<li><?= $note['description'] ?></li>
<?php endforeach; ?>
	</ul>
	<form action="process.php" method="post">
		Add a note:<br />
		<textarea name="note" id="note_msg"></textarea>
		<button type="submit">Post It!</button>
	</form>
	<p id="errors"></p>
</body>
</html>