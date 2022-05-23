<?php
/**
 * Block template file: /parts/blocks/BlockRitzLandingPageRoom.php
 *
 * Ritz Landing Page Room Block Block Template.
 *
 * @param string $content The block inner HTML (empty).
 * @param   (int|string) $post_id The post ID this block is saved to.
 *
 * @var bool $is_preview True during AJAX preview.
 * @var array $block The block settings and attributes.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ritz-landing-page-room-block-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-ritz-landing-page-room-block';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}
?>

<?php
if ( ( isset( $block['data']['ritz_landing_page_room_block_preview_image_help'] ) ) && ( $is_preview ) ) :    /* rendering in inserter preview  */

	echo '<img src="' . $block['data']['ritz_landing_page_room_block_preview_image_help'] . '" style="width:100%; height:auto;">';

	return;
endif;

?>

<style type="text/css">
    .js .tmce-active .wp-editor-area {
        color: #000000 !important;
    }

    <?php echo '#' . $id; ?>
    {
    /* Add styles that use ACF values here */
    }
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="grid-x">
		<?php
		$image_position = get_field( 'image_position' );
		$img_div        = '';
		$content_div    = '';
		$image          = get_field( 'image' );
		$image_link = '';
		ob_start();
		?>
        <div class="background">
            <div class="v-align">
                <div class="v-content">
                    <div class="title">
                        <h3><?php the_field( 'title' ); ?></h3>
                    </div>
                    <div class="content">
						<?php the_field( 'content' ); ?>
                    </div>
					<?php $price = get_field( 'price' ); ?>
					<?php if ( $price != '' ): ?>
                        <div class="price">
							<?php the_field( 'price' ); ?>
                        </div>
					<?php endif; ?>
                    <div class="links">
                        <div class="grid-x grid-padding-x grid-padding-y">
							<?php
							$link_to         = get_field( 'link_to' );
							$booking_options = get_field( 'booking_options' );
							if ( $link_to != 'None' ) {
								if ( $booking_options == 'None' ) {
									echo '<div class="cell large-12 medium-12 small-12 text-center">';
								} else {
									echo '<div class="cell large-auto medium-12 small-auto text-center">';
								}
								$target    = '';
								$left_link = '';
								if ( get_field( 'open_in_a_new_tab' ) == 1 ) {
									$target = ' target="_blank"';
								}
								$link_title = get_field( 'link_title' );
								$href       = '';
								if ( $link_to == 'Page' ) {
									$href = get_field( 'page' );
								}
								if ( $link_to == 'Post' ) {
									$href = get_field( 'post' );
								}
								if ( $link_to == 'Text' ) {
									$href = get_field( 'text' );
								}
								if ( $link_to == 'URL' ) {
									$href = get_field( 'url' );
								}
								if ( $href != '' ) {

                                    $ytpos = strpos( $href, 'https://youtu.be/' );
                                    if ( $ytpos === 0 ) {
                                        $url_array = parse_url( $href );
                                        $videoID   = '';
                                        if ( is_array( $url_array ) ) {
                                            if ( array_key_exists( 'path', $url_array ) ) {
                                                $videoID  = trim( $url_array['path'], '/' );
                                                $uniqueID = uniqid();
                                                ?>
                                                <?php if ( ! $is_preview ): ?>
                                                    <div id="<?php echo $uniqueID; ?>" class="reveal-modal"
                                                         data-reveal data-id="<?php echo $uniqueID; ?>"
                                                         data-ytvideoid="<?php echo $videoID; ?>">
                                                        <div class="flex-video widescreen">
                                                            <div id="feature-video-<?php echo $uniqueID; ?>">[this
                                                                div will be converted to an iframe]
                                                            </div>
                                                        </div>
                                                        <span class="close-reveal-modal" data-close>&times;</span>
                                                    </div>
                                                <?php endif; ?>
                                                <?php
                                                $left_link = '<a data-open="' . $uniqueID . '" data-ytvideoid="' . $videoID . '" class="link button-underlined long feature-modal-btn show-for-large"' . $target . '>' . $link_title . '</a>';
                                                $left_link .= '<a href="'.$href.'" class="link button-underlined long hide-for-large" target="_blank">' . $link_title . '</a>';
                                                $image_link = '<a data-open="' . $uniqueID . '" data-ytvideoid="' . $videoID . '" class="image-link feature-modal-btn"' . $target . '></a>';
	                                            $image_link .= '<a href="'.$href.'" class="link button-underlined long hide-for-large" target="_blank">' . $link_title . '</a>';
                                            } else {
                                                $left_link = '<a href="' . esc_url( $href ) . '" class="link button-underlined"' . $target . '>' . $link_title . '</a>';
                                                $image_link = '<a href="' . esc_url( $href ) . '" class="image-link"' . $target . '></a>';
                                            }
                                        }
                                    } else {
                                        $left_link = '<a href="' . esc_url( $href ) . '" class="link button-underlined"' . $target . '>' . $link_title . '</a>';
                                        $image_link = '<a href="' . esc_url( $href ) . '" class="image-link"' . $target . '></a>';
                                    }

								}
								echo $left_link . '</div>';
							}
							if ( $booking_options != 'None' ) {
							if ( $link_to == 'None' ) {
								echo '<div class="cell large-12 medium-12 small-12 text-center">';
							} else {
								echo '<div class="cell large-auto medium-12 small-auto text-center">';
							}
							$booking_link_text = get_field( 'booking_link_text' );
							if ( $booking_options == 'AZDS' ) {
								if ( have_rows( 'accomodation_codes' ) ) :
									$selector = '?';
									$query     = '';
									while ( have_rows( 'accomodation_codes' ) ) : the_row();
										$key      = get_sub_field( 'key' );
										$value    = get_sub_field( 'value' );
										$query    .= $selector . $key . '=' . $value;
										$selector = '&';
									endwhile;
									?>
                                    <a href="#/booking/step-1<?php echo $query; ?>"
                                       class="button-ritz"><?php echo $booking_link_text; ?></a>
								<?php
								endif;
							};
							if ( $booking_options == 'Bookatable' ) {
								if ( have_rows( 'dining_codes' ) ) :
									$book_data = '';
									while ( have_rows( 'dining_codes' ) ) : the_row();
										$book_data = ' data-bookatable data-connectionid="' . get_sub_field( 'connectionid' ) . '"';
										$book_data .= ' data-restaurantid="' . get_sub_field( 'restaurantid' ) . '"';
										$book_data .= ' data-basecolor="' . get_sub_field( 'basecolor' ) . '"';
										$book_data .= ' data-promotionid="' . get_sub_field( 'promotionid' ) . '"';
										$book_data .= ' data-sessionid="' . get_sub_field( 'sessionid' ) . '"';
										$book_data .= ' data-conversionjs="' . get_sub_field( 'conversionjs' ) . '"';
										$book_data .= ' data-gaaccountnumber="' . get_sub_field( 'gaaccountnumber' ) . '"';
									endwhile;
									if ( $book_data != '' ) {
										?>
                                        <a href="#" <?php echo $book_data; ?>
                                           class="button-ritz"><?php echo $booking_link_text; ?></a>
										<?php
									}
								endif;
							};
							if ( $booking_options == 'Email' ) {

								if ( have_rows( 'email_options' ) ) :

									while ( have_rows( 'email_options' ) ) : the_row();
										$subject = get_sub_field( 'subject' );
										$body = get_sub_field( 'body' );
										if($subject != '') {
										    $subject = '?subject='.$subject;
										}
										if($body != '') {
										    $body = '&body='.$body;
										}
										?>
                                        <a href="mailto:<?php the_sub_field( 'email_to_address' ); ?><?php echo $subject ?><?php echo $body; ?>"
                                           class="button-ritz"><?php echo $booking_link_text; ?></a>
									<?php
									endwhile;
								endif;
							};
							if ( $booking_options == 'Page' ) {
								$page = get_field( 'page_booking' );
								?>
                                <a href="<?php echo esc_url( $page ); ?>" class="button-ritz"><?php echo $booking_link_text; ?></a>
								<?php
							};
							?>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
	$content_div = ob_get_contents();
	ob_end_clean();
	ob_start();
	?>
    <div class="image" style="background-image: url(<?php echo esc_url( $image['url'] ); ?>)">
        <?php echo $image_link;?>
    </div>
	<?php
	$img_div = ob_get_contents();
	ob_end_clean();
	$leftClass  = 'large-shrink medium-shrink';
	$rightClass = 'large-auto medium-auto';
	$topClass   = 'left';
	if ( $image_position == 'Left' ) {
		$leftClass  = 'large-auto medium-auto';
		$rightClass = 'large-shrink medium-shrink';
		$topClass   = 'right';
	}
	?>
    <div class="cell <?php echo $leftClass; ?> small-12 left show-for-medium">
		<?php
		if ( $image_position == 'Left' ) :
			echo $img_div;
		else:
			echo $content_div;
		endif;
		?>
    </div>
    <div class="cell <?php echo $rightClass; ?> small-12 right show-for-medium">
		<?php
		if ( $image_position == 'Right' ):
			echo $img_div;
		else:
			echo $content_div;
		endif;
		?>
    </div>
    <div class="cell small-12 <?php echo $topClass; ?> hide-for-medium">
		<?php
		echo $content_div;
		?>
    </div>
    <div class="cell small-12 hide-for-medium">
		<?php
		echo $img_div;
		?>
    </div>
</div>

</div>