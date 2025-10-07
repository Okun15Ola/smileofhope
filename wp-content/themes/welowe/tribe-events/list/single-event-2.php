<?php
/**
 * List View Single Event
 * This file contains two event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @version 4.6.19
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$excerpt_words = 20;

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

$thumbnail = (isset($thumbnail_size) && $thumbnail_size) ? $thumbnail_size : 'post-thumbnail';

?>

<div class="event-block-two__single clearfix"> 
	<div class="event-block-two__wrap">
		<div class="event-block-two__image">
			<?php echo tribe_event_featured_image( null, $thumbnail ); ?>
		</div>
		<div class="event-block-two__content">
			<div class="event-block-two__start-date">
				<span class="icon"><i class="wicon-calendar"></i></span>
				<?php echo tribe_get_start_date(get_the_ID(), false, 'd M, Y'); ?>
			</div>
			<h3 class="event-block-two__title event-title">
				<?php the_title() ?>
			</h3>
			<div class="event-block-two__address <?php echo esc_attr( $has_venue_address ); ?>">
				<?php if ( $venue_details ) : ?>
					<span class="icon"><i class="fas fa-map-marker-alt"></i></span>
					<span class="venue-details">
						<?php
							$address_delimiter = empty( $venue_address ) ? ' ' : ', ';

							// These details are already escaped in various ways earlier in the process.
							echo wp_kses( $venue_details['address'], false);

							if ( tribe_show_google_map_link() ) {
								echo tribe_get_map_link_html();
							}
						?>
					</span>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<a class="event-block-two__overlay" href="<?php echo esc_url( tribe_get_event_link() ); ?>"></a>

</div>