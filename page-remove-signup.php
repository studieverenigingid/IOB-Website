<?php
	/**
	* Template Name: Remove sing-up page
	*/

	get_header();
?>

<main>
	<?php
		$action = $_GET['action'];
		$post_ID = $_GET['post_ID'];
		$unique_ID = $_GET['unique_ID'];
		if ($action == "delete") {
			echo "Should ".$action." row ".$unique_ID." from post ID ".$post_ID;
		}
	?>
</main>

<?php
	get_footer();
?>
