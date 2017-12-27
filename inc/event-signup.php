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

/* upload to wordpress media */
$upload_overrides = array( 'test_form' => false );

foreach ($_FILES as $filedescr => $file) {
	$filename = wp_handle_upload( $file, $upload_overrides )['file'];
	if ( $filename && ! isset( $filename['error'] ) ) {
		$filetype = wp_check_filetype( basename( $filename ), null );
		$wp_upload_dir = wp_upload_dir();
		$attachment = array(
			'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
			'post_mime_type' => $filetype['type'],
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);

		$files[$filedescr] = wp_insert_attachment( $attachment, $filename, $post_ID );

		if($files[$filedescr] == 0) {
			$errors[] = "There was an error moving your file, please send us an e-mail.";
		}

	} else {
	    $errors[] = $filename['error'];
	}
}

$resume = $files['resume'];
$motivation = $files['motivation'];
$portfolio = $files['portfolio'];


// array that states whether fields are optional or required

$fields = array(
	'first_name' => array(
		'pretty_name' => 'First Name',
		'value' => $first_name,
		'required' => 'Required'
	),
	'last_name' => array(
		'pretty_name' => 'Last Name',
		'value' => $last_name,
		'required' => 'Required'
	),
	'email' => array(
		'pretty_name' => 'Email',
		'value' => $email,
		'required' => 'Required'
	),
	'phone_number' => array(
		'pretty_name' => 'Phone Number',
		'value' => $phone_number,
		'required' => 'Required'
	),
	'resume' => array(
		'pretty_name' => 'Resumé',
		'value' => $resume,
		'required' =>  get_field('resume', $post_ID)
	),
	'motivation' => array(
		'pretty_name' => 'Motivation',
		'value' => $motivation,
		'required' =>  get_field('motivation', $post_ID)
	),
	'portfolio' => array(
		'pretty_name' => 'Portfolio',
		'value' => $portfolio,
		'required' =>  get_field('portfolio', $post_ID)
	),
);

foreach ($fields as $field => $value) {
	if ($value['required'] == 'Required' && empty($value['value'])) {
		$errors[] = 'Your '.$value['pretty_name'].' field can not be empty';
	}
}

$new_signup_row = array(
	'field_5a1182a650f6e' => $first_name, //first name
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

	// the message
	$msg = "<html><body>";
	$msg .= "Hi ".$first_name.", <br><br>";
	$msg .= "You were subscribed to ".$event_title."<br>";
	$msg .= "If you no longer wish to attend this event, click <a href='$unsub_link'>here</a>. <br><br>";
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
		$response['messages'] = 'Signup received successfully!';
	}
}

wp_send_json($response);

?>
