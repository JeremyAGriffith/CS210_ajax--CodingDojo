<?php 
require 'note_class.php';

$data = NULL;
if (isset($_POST['note']) && !empty($_POST['note'])){
	// $msg = $db->real_escape_string($_POST['note']);
	// $query = "INSERT INTO posts(description, created_at, updated_at)
	// 	VALUES ('{$note}', NOW(), NOW())";
	// $db->query($query);

	$note = new Note();
	$note->add_note($_POST['note']);

	$data['note'] = $_POST['note'];
}else{
	$data['error'] = "I need some text...";
}

echo json_encode($data);

 ?>