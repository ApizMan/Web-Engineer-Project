<?php
//fetch.php

if(isset($_POST['action']))
{
	include('dbase.php');

	$output = '';

	if($_POST["action"] == 'name')
	{
		$query = "
		SELECT name FROM student 
		WHERE faculty = :faculty 
		GROUP BY name
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':faculty'		=>	$_POST["query"]
			)
		);
		$result = $statement->fetchAll();
		$output .= '<option value="" hidden>-Select Faculty-</option>';
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["state"].'">'.$row["state"].'</option>';
		}
	}
	if($_POST["action"] == 'state')
	{
		$query = "
		SELECT city FROM country_state_city 
		WHERE state = :state
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':state'		=>	$_POST["query"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["city"].'">'.$row["city"].'</option>';
		}


	}
	echo $output;
}

?>