<div class="event--micro">
	<?php
		$start = new DateTime(get_field('start_datetime'));
		$start->setTimezone( new DateTimeZone('Europe/Amsterdam') );
		$end = new DateTime(get_field('end_datetime'));
		$end->setTimezone( new DateTimeZone('Europe/Amsterdam') );
		$start_month = $start->format('F');
		$start_day   = $start->format('jS');
		$start_time = $start->format('H:i');
		$end_time   = $end->format('H:i');
	?>

	<?php
		if( $current_date != $start->format('d-m-Y') ){?>
			<h4><?= $start->format('l, F jS');?></h4>
			<?php $current_date = $start->format('d-m-Y'); ?>
			<?php } ?>

	<h5><?= $start_time . " - " . $end_time;?> <a href="<?= the_permalink();?>"><?= the_title(); ?></a></h5>

</div>
