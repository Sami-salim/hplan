
<?php

//data.php

$connect = new PDO("mysql:host=sql311.infinityfree.com;dbname=if0_37546690_Planning_systema", "if0_37546690", "cGiaMR70u4E9");

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$data = array(
			':language'		=>	$_POST["language"]
		);

		$query = "
		INSERT INTO survey_table 
		(language) VALUES (:language)
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		echo 'done';
	}

	if($_POST["action"] == 'fetch')
	{
		$query = "
		SELECT language, COUNT(survey_id) AS Total 
		FROM survey_table 
		GROUP BY language
		";

		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'language'		=>	$row["language"],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data);
	}
}


?>