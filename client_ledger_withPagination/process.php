<?php 
require_once 'db.php';
require_once 'html_Helper_Class.php';

if (isset($_POST) && !empty($_POST)) {
	$query = "SELECT * FROM leads
		WHERE (first_name LIKE '{$_POST['name']}%' OR last_name LIKE '{$_POST['name']}%')";
	// FROM date
	if(!empty($_POST['from']))
		$query .= " AND DATE(registered_datetime) >= '{$_POST['from']}'";
	// TO date
	if(!empty($_POST['to']))
		$query .= " AND DATE(registered_datetime) <= '{$_POST['to']}'";
	// PAGINATION
	$num_of_results = count($database->fetch_all($query));
	$results_per_page = 18;
	$starting_entry = ($_POST['page'] - 1) * $results_per_page;
	$query .= " LIMIT {$starting_entry}, {$results_per_page}";

	$results = $database->fetch_all($query);

	$data['html'] = Html_Helper::tablefy($results);
	// $data['name'] = "name: ".$_POST['name'];
	// foreach ($variable as $key => $value) {
	// 	# code...
	// }
	// echo $html;
	// $query = "SELECT COUNT(*) FROM leads";
	// $num_of_results = $database->fetch_record($query);
	$times = ceil($num_of_results / $results_per_page);
	$data['pagination'] = "";
	for ($i=1; $i <= $times; $i++) { 
		if ($i == $_POST['page']) {
			$data['pagination'] .= "<li><a href='#' id='{$i}' class='curr_page'>{$i}</a></li>";
		}else{
			$data['pagination'] .= "<li><a href='#' id='{$i}'>{$i}</a></li>";
		}
	}

	echo json_encode($data);
} else {
	header("Location: index.php");
}

?>