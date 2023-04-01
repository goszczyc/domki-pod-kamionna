<?php
if ($reservation_bar = get_field('reservation_bar', 'options')) :
	$house_heading = $reservation_bar['house_heading'];
	$date_heading = $reservation_bar['date_heading'];
	$guests_heading = $reservation_bar['guests_heading'];
	// isset($_GET['id']) && !empty($_GET['id']) ? $selected = true : $selected = false;

?>
	<div class="reservation-bar">
		<div class="reservation-bar__group">
			<h3 class="reservation-bar__heading">
				<?= $house_heading; ?>
			</h3>
			<div class="reservation-bar__text">
					<span id="house-selected" data-house-id="<?= get_the_ID(); ?>"><?= get_the_title(); ?></span>
			</div>
		</div>
		<div class="reservation-bar__group">
			<h3 class="reservation-bar__heading">
				<?= $date_heading; ?>
			</h3>
			<input type="text" class="reservation-bar__text reservation-bar__text--date" id="reservation-bar-callendar" value="Wybierz datę">
		</div>
		<div class="reservation-bar__group">
			<h3 class="reservation-bar__heading">
				<?= $guests_heading; ?>
			</h3>
			<div class="reservation-bar__text reservation-bar__guests">
				<button data-subtract class="reservation-bar__guests-btn reservation-bar__guests-btn--sub">-</button>
				<input type="number" class="reservation-bar__guests-number" value="1">
				<button data-add class="reservation-bar__guests-btn  reservation-bar__guests-btn--add">+</button>
			</div>
		</div>
		<div class="reservation-bar__group">
			<a id="bar-booking" class="btn btn--primary" href="<?php echo get_permalink(497); ?>">Zarezerwuj teraz</a>
		</div>
	</div>


<?php endif; ?>