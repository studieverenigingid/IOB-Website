<div class="event--small"
	<?php if (isset($order_override))
	 	echo $order_override; ?>>
		
	<a href="<?= the_permalink();?>">
		<?= the_post_thumbnail('medium'); ?>
	</a>
	<a href="<?= the_permalink();?>">
		<h3><?= the_title(); ?></h3>
	</a>
	<?php
		$start = new DateTime(get_field('start_datetime'));
		$start->setTimezone( new DateTimeZone('Europe/Amsterdam') );
		$end = new DateTime(get_field('end_datetime'));
		$end->setTimezone( new DateTimeZone('Europe/Amsterdam') );
		$start_month = $start->format('F');
		$start_day   = $start->format('jS');
		$end_month = $end->format('F');
		$end_day   = $end->format('jS');
		$start_time = $start->format('H:i');
		$end_time   = $end->format('H:i');
		$location_name = get_field('location_name');
	?>

	<?php
			echo $start_month . ' ' . $start_day . ', '. $start_time . ' – ';
			if ($start_day != $end_day){
				echo $end_month . ' ' . $end_day . ', ' . $end_time;
			} else {
				echo $end_time;
			}
			echo ($location_name) ? ' @ ' . $location_name : '';
		?>
</div>
