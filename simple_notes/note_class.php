<?php 
require_once 'db.php';

class Note
{
	// private $database;

	function __construct()
	{
		// $this->database = new Database();
	}

	public function retrieve_all_notes()
	{
		global $database;
		$query = "SELECT * FROM posts";
		return $database->fetch_all($query);// $this->database->fetch_all($query);
	}

	public function add_note($note)
	{
		global $database;
		$msg = $database->db->real_escape_string($note);// $this->database->db->real_escape_string($note);
		$query = "INSERT INTO posts(description, created_at, updated_at)
			VALUES ('{$note}', NOW(), NOW())";
		$database->db->query($query);// $this->database->db->query($query);
	}
}

?>
