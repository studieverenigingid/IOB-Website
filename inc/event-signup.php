<?php
$response = array();
$errors = array();

$field_key = 'field_5a1181b250f6d';
$post_ID = $_POST['post_ID'];
$event_title = get_the_title($post_ID);
$unique_ID = bin2hex(random_bytes(8));
$category = $_POST['category'];

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$resume = $_POST['resume'];
$motivation = $_POST['motivation'];
$portfolio = $_POST['portfolio'];

if (empty($first_name)) {
	$errors[] = 'Your first name field can not be empty';
}
if (empty($last_name)){
	$errors[] = 'Your last name field can not be empty';
}
if (empty($email)){
	$errors[] = 'Your email field can not be empty';
}
if (empty($phone_number)){
	$errors[] = 'Your phone number field can not be empty';
}
if ($category == 'speeddates' || $category == 'case') {
	if (empty($motivation)) {
		$errors[] = 'Your motivation is mandatory';
	}
	if (empty($resume)) {
		$errors[] = 'Your resume is mandatory';
	}
}

$new_signup_row = array(
	'field_5a1182a650f6e'  => $first_name, //first name
	'field_5a1182d050f6f' => $last_name, //last name
	'field_5a1182e150f70' => $email, //email
	'field_5a11831f50f71' => $phone_number, //phone number
	'field_5a11834e50f72' => $resume, //resume
	'field_5a1183a250f73' => $motivation, //motivation
	'field_5a1183e050f74' => $portfolio, //portfolio
	'field_5a1d7c37cfcc0' => $unique_ID //unique identifier to allow sign-up deletion
);

if (!empty($errors)) {
	$response['success'] = false;
	$response['messages'] = $errors;
} else {
	$update = add_row($field_key, $new_signup_row, $post_ID);
	$unsub_link = home_url()."/unsubscribe/?action=delete&post_ID=".$post_ID."&unique_ID=".$unique_ID;

	error_log($unsub_link);

	// the message
	$msg = "<html><body>";
	$msg .= "Hi ".$first_name.", <br><br>";
	$msg .= "You were subscribed to ".$event_title."<br>";
	$msg .= "If you wish to unsubscribe, click <a href='$unsub_link'>here</a>. <br><br>";
	$msg .= "Kind regards, <br>IDE Business Fair";
	$msg .= "</body></html>";

	// Content-type header must be set to send HTML email
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'From: IDE Business Fair <iob-svid@tudelft.nl>' . "\r\n";
	// subject
	$subject = "Signed up for: ".$event_title;

	// put msg inside wordwrap
	$msg = wordwrap($msg,70);

	// send email
	mail($email,$subject,$msg,$headers);

	// Check if the update was successful
	if ($update === false) {
		$response['success'] = false;
		$response['messages'] = 'Something went wrong. Error: '.$update;
	} else {
		$response['success'] = true;
		$response['messages'] = 'Signup received! with unique ID: '.$unique_ID;
	}
}

wp_send_json($response);

?>
