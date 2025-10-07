<?php
/**
 * List View Single Event
 * This file contains one event in the list view
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

<div class="tribe-event-list__single">
	<div class="tribe-event-list__left">
		<?php echo tribe_event_featured_image( null, $thumbnail ); ?>
		
		<?php if ( tribe_get_cost() ) : ?>
			<div class="tribe-event-list__cost hidden">
				<span class="ticket-cost"><?php echo tribe_get_cost( null, true ); ?></span>
				<?php do_action( 'tribe_events_inside_cost' ) ?>
			</div>
		<?php endif; ?>	
	</div>

	<div class="tribe-event-list__right">
		<div class="tribe-event-list__content">
			<div class="tribe-event-list__date">
				<span class="icon"><i class="fa-solid fa-calendar-days"></i></span>
				<?php echo tribe_get_start_date(get_the_ID(), false, 'd M, Y'); ?>
			</div>
			<!-- Event Title -->
			<h3 class="tribe-event-list__title">
				<a class="tribe-event-list__url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
					<?php the_title() ?>
				</a>
			</h3>
			<!-- Event Content -->
			<div class="tribe-event-list__desc">
				<?php echo welowe_limit_words($excerpt_words, get_the_excerpt(), get_the_content()); ?>
			</div>
			<!-- Event Meta -->
			<div class="tribe-event-list__meta">
				<div class="tribe-event-list__address <?php echo esc_attr( $has_venue_address ); ?>">
					<?php if ( $venue_details ) : ?>
						<!-- Venue Display Info -->
						<span class="venue-details">
							<span class="icon"><i class="fas fa-map-marker-alt"></i></span>
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
				<div class="tribe-event-list__action">
					<a class="btn-theme" href="<?php echo esc_url( tribe_get_event_link() ); ?>"><span><?php echo esc_html__('Join Event', 'welowe') ?></span></a>
				</div>
			</div>
		</div>
	</div>
</div>