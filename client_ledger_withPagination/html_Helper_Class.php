<?php 

/**
* HTML output functions
*/
class Html_Helper
{
	// take assoc array & display it in a table format 
	static function tablefy($assoc_arr)
	{
		$html = "<table>";
		if (!empty($assoc_arr)){
			$keys = array_keys($assoc_arr[0]);
			$num_of_keys = count($keys);
			
			// head
			$html .= "<thead><tr>";
			foreach ($keys as $key) {
				$html .= "<th>{$key}</th>";
			}
			$html .= "</tr></thead><tbody>";

			// body
			foreach ($assoc_arr as $record) {
				$html .= "<tr>";
				for ($i=0; $i < $num_of_keys; $i++) { 
					$html .= "<td>".$record[$keys[$i]]."</td>";
				}
				$html .= "</tr>";
			}
		}else{
			$html .= "none";
		}
		$html .= "</tbody></table>";
		return $html;
	}
}

?>

