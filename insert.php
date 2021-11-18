<?php

//insert.php

include('database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$first_name = '';
$last_name = '';

if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM tbl_sample WHERE id='".$form_data->id."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['first_name'] = $row['first_name'];
		$output['last_name'] = $row['last_name'];
		$output['email'] = $row['email'];
		$output['mobile'] = $row['mobile'];
	}
}
else if($form_data->action == "Delete")
{
	$query = "
	DELETE FROM tbl_sample WHERE id='".$form_data->id."'
	";
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Data Deleted';
	}
}
else
{
	if(empty($form_data->first_name))
	{
		$error[] = 'First Name is Required';
	}
	else
	{
		$first_name = $form_data->first_name;
	}

	if(empty($form_data->last_name))
	{
		$error[] = 'Last Name is Required';
	}
	else
	{
		$last_name = $form_data->last_name;
	}

	if(empty($form_data->email))
	{
		$error[] = 'email is Required';
	}
	else
	{
		$email = $form_data->email;
	}

	if(empty($form_data->mobile))
	{
		$error[] = 'mobile is Required';
	}
	else
	{
		$mobile = $form_data->mobile;
	}

	if(empty($error))
	{
		if($form_data->action == 'Insert')
		{
			$data = array(
				':first_name'		=>	$first_name,
				':last_name'		=>	$last_name,
				':email'		=>	$email,
				':mobile'		=>	$mobile
			);
			$query = "
			INSERT INTO tbl_sample 
				(first_name, last_name,email,mobile) VALUES 
				(:first_name, :last_name, :email, :mobile)
			";
			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Data Inserted';
			}
		}
		if($form_data->action == 'Edit')
		{
			$data = array(
				':first_name'	=>	$first_name,
				':last_name'	=>	$last_name,
				':email'	=>	$email,
				':mobile'	=>	$mobile,
				':id'			=>	$form_data->id
			);
			$query = "
			UPDATE tbl_sample 
			SET first_name = :first_name, last_name = :last_name, email = :email, mobile = :mobile
			WHERE id = :id
			";

			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Data Edited';
			}
		}
	}
	else
	{
		$validation_error = implode(", ", $error);
	}

	$output = array(
		'error'		=>	$validation_error,
		'message'	=>	$message
	);

}



echo json_encode($output);

?>