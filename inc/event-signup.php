<?php
$response = array();
$error;

$field_key = 'field_5a1181b250f6d';
$post_ID = $_POST['post_ID'];

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$resume = $_POST['resume'];
$motivation = $_POST['motivation'];
$portfolio = $_POST['portfolio'];

if (empty($phone_number)){
	$error .= 'Phone number field should not be empty';
}

$new_signup_row = array(
	'field_5a1182a650f6e'  => $first_name, //first name
	'field_5a1182d050f6f' => $last_name, //last name
	'field_5a1182e150f70' => $email, //email
	'field_5a11831f50f71' => $phone_number, //phone number
	'field_5a11834e50f72' => $resume, //resume
	'field_5a1183a250f73' => $motivation, //motivation
	'field_5a1183e050f74' => $portfolio //portfolio
);

if (isset($error)) {
	$response['success'] = false;
	$response['message'] = $error;
} else {
	$update = add_row($field_key, $new_signup_row, $post_ID);

	// Check if the update was successful
	if ($update === false) {
		$response['success'] = false;
		$response['message'] = 'Something went wrong. Error: '.$update;
	} else {
		$response['success'] = true;
		$response['message'] = 'Signup received!';
	}
}

wp_send_json($response);

?>
