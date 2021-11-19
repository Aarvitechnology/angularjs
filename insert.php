<?php

//insert.php

include('database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = array();
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
		$output['gender'] = $row['gender'];
		$output['dob'] = $row['dob'];
		$output['course'] = $row['course'];
		$output['hobbies'] = $row['hobbies'];
		$output['photo'] = $row['photo'];
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

	if(empty($form_data->gender))
	{
		$error[] = 'gender is Required';
	}
	else
	{
		$gender = $form_data->gender;
	}

	if(empty($form_data->dob))
	{
		$error[] = 'dob is Required';
	}
	else
	{
		$dob = $form_data->dob;
	}

	if(empty($form_data->course))
	{
		$error[] = 'course is Required';
	}
	else
	{
		$course = $form_data->course;
	}

	if(empty($form_data->hobbies))
	{
		$error[] = 'hobbies is Required';
	}
	else
	{
		$hobbies = $form_data->hobbies;
	}

	if(empty($form_data->photo))
	{
		$error[] = 'photo is Required';
	}
	else
	{
		$filename = date("YmdHis"); 
		$base64DataString = $form_data->photo;

		list($dataType, $imageData) = explode(';', $base64DataString);
		$imageExtension = explode('/', $dataType)[1];
		$filename = $filename.'.'.$imageExtension;
		list(, $encodedImageData) = explode(',', $imageData);
		$decodedImageData = base64_decode($encodedImageData);
		// save image data as file
		file_put_contents("images/{$filename}", $decodedImageData);
		$photo = "http://localhost/angularjs-1/images/{$filename}";
	}


	if(empty($error))
	{
		if($form_data->action == 'Insert')
		{
			$data = array(
				':first_name'		=>	$first_name,
				':last_name'		=>	$last_name,
				':email'		=>	$email,
				':mobile'		=>	$mobile,
				':gender'		=>	$gender,
				':dob'		=>	$dob,
				':course'		=>	$course,
				':hobbies'		=>	$hobbies,
				':photo'		=>	$photo,
			);
			$query = "
			INSERT INTO tbl_sample 
				(first_name, last_name,email,mobile,gender,dob,course,hobbies,photo) VALUES 
				(:first_name, :last_name, :email, :mobile, :gender, :dob, :course, :hobbies, :photo)
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
				':gender'	=>	$gender,
				':dob'	=>	$dob,
				':course'	=>	$course,
				':hobbies'	=>	$hobbies,
				':photo'	=>	$photo,
				':id'			=>	$form_data->id
			);
			$query = "
			UPDATE tbl_sample 
			SET first_name = :first_name, last_name = :last_name, email = :email, mobile = :mobile, gender = :gender, dob = :dob, course = :course, hobbies = :hobbies, photo = :photo
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