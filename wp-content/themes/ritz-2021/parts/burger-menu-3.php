<?php
$current_page_id = get_queried_object_id();
global $no_menu_page;
?>
<div class="grid-x show-for-large">
    <div class="cell shrink main-nav">

        <?php
        $numRows = 3;
        $currentpage_set = false;
        if (have_rows('page_links', 'option')) :
            $i = 1;
            $currentpage_index = 1;
            $currentpage = false;
            while (have_rows('page_links', 'option')) : the_row();
                $link_type = get_sub_field('link_type');
                $target = '';
                if (get_sub_field('open_in_new_tab') == 1) :
                    $target = ' target="_blank"';
                endif;
                $link_text = get_sub_field('link_text');
                $href = '';
                if ($link_type == 'Page') {
                    $href = get_sub_field('page');
                }
                if ($link_type == 'Post') {
                    $href = get_sub_field('post');
                }
                if ($link_type == 'External URL') {
                    $href = get_sub_field('external_url');
                }
                if ($link_type == 'Text') {
                    $href = get_sub_field('text_link');
                }
                if ($href != ''):
                    if (!is_front_page()) {
                        $href_postID = url_to_postid($href);
                        if ($href_postID != 0) {
                            if ($href_postID == $current_page_id) {
                                $currentpage = true;
                            } else {
                                if (have_rows('child_pages')) :
                                    while (have_rows('child_pages')) : the_row();
                                        $jxhref = '';
                                        if ($link_type == 'Page') {
                                            $jxhref = get_sub_field('page_link');
                                        }
                                        if ($link_type == 'Post') {
                                            $jxhref = get_sub_field('post_link');
                                        }
                                        if ($link_type == 'External URL') {
                                            $jxhref = get_sub_field('external_url');
                                        }
                                        if ($link_type == 'Text') {
                                            $jxhref = get_sub_field('text_link');
                                        }
                                        if ($jxhref != ''):
                                            $jxhref_postID = url_to_postid($jxhref);
                                            if ($jxhref_postID == $current_page_id) {
                                                $currentpage = true;
                                            }
                                        endif;
                                    endwhile;
                                endif;
                            }
                        }
                    }
                    //if ($currentpage) error_log('Current Page is True');
                    $active_class = '';
                    if (($no_menu_page) && ($i == 1)):
                        $active_class = ' not-active';
                    else:
                        if (($currentpage) && (!$currentpage_set)):
                            $active_class = ' is-active';
                            $currentpage = false;
                            $currentpage_index = $i;
                            $currentpage_set = true;
                        endif;
                    endif;
                    ?>
                    <h3 class="menu-page-link">
                        <a href="<?php echo esc_url($href); ?>"<?php echo $target; ?>
                           class="parent-<?php echo $i . $active_class; ?>"><?php echo esc_html($link_text); ?></a>
                    </h3>
                <?php
                endif;
                $i++;
            endwhile;
            $numRows = $i - 1;
        endif;
        ?>

    </div>
    <div class="cell shrink sub-nav">
        <div class="inner">
            <?php
            if (have_rows('page_links', 'option')) :
                $i = 1;
                while (have_rows('page_links', 'option')) : the_row();
                    $link_type = get_sub_field('link_type');
                    $href = '';
                    $target = '';
                    if (get_sub_field('open_in_new_tab') == 1) :
                        $target = ' target="_blank"';
                    endif;
                    if ($link_type == 'Page') {
                        $href = get_sub_field('page');
                    }
                    if ($link_type == 'Post') {
                        $href = get_sub_field('post');
                    }
                    if ($link_type == 'External URL') {
                        $href = get_sub_field('external_url');
                    }
                    if ($link_type == 'Text') {
                        $href = get_sub_field('text_link');
                    }
                    if ($href != ''):
                        $overview_link = '';
                        ob_start();
                        $overview_class = '';
                        $phref_postID = url_to_postid($href);
                        if ($phref_postID == $current_page_id) {
                            $overview_class = ' is-active';
                        }
                        ?>
                        <h2 class="menu-page-link">
                            <a href="<?php echo esc_url($href); ?>"<?php echo $target; ?>
                               class="<?php echo $overview_class; ?>">Overview</a>
                        </h2>
                        <?php
                        $overview_link = ob_get_clean();
                        if (have_rows('child_pages')) :
                            if (($no_menu_page) && ($i == 1)) {
                                echo '<div class="child-menu child-menu-' . $i . ' animate__animated animate__fadeInDown">';
                            } else {
                                $padTop = ($i - 1) * 57;
                                //error_log('numRows = '.$numRows.' $i = '.$i);
                                if ($i == $numRows) {
                                    $padTop = ($i - 2) * 57;
                                }
                                if ($currentpage_index == $i) {
                                    echo '<div class="child-menu child-menu-' . $i . ' animate__animated animate__fadeInDown" style="padding-top:' . $padTop . 'px">';
                                } else {
                                    echo '<div class="child-menu child-menu-' . $i . ' animate__animated animate__fadeOutUp" style="padding-top:' . $padTop . 'px">';
                                }

                            }
                            echo $overview_link;
                            while (have_rows('child_pages')) : the_row();

                                $link_text = get_sub_field('link_text');
                                $link_type = get_sub_field('link_type');
                                //echo '<h2>'.$link_text.' link: '.get_sub_field('page').'</h2>';
                                $target = '';
                                if (get_sub_field('open_in_new_tab') == 1) :
                                    $target = ' target="_blank"';
                                endif;
                                $jhref = '';
                                if ($link_type == 'Page') {
                                    $jhref = get_sub_field('page_link');
                                }
                                if ($link_type == 'Post') {
                                    $jhref = get_sub_field('post_link');
                                }
                                if ($link_type == 'External URL') {
                                    $jhref = get_sub_field('external_url');
                                }
                                if ($link_type == 'Text') {
                                    $jhref = get_sub_field('text_link');
                                }
                                if ($jhref != ''):
                                    $child_link_class = '';
                                    $jhref_postID = url_to_postid($jhref);
                                    if ($jhref_postID == $current_page_id) {
                                        $child_link_class = ' is-active';
                                    }
                                    ?>
                                    <h2 class="menu-page-link">
                                        <a href="<?php echo esc_url($jhref); ?>"<?php echo $target; ?>
                                           class="<?php echo $child_link_class; ?>"><?php echo esc_html($link_text); ?></a>
                                    </h2>
                                <?php
                                endif;
                            endwhile;
                            echo '</div>';
                        endif;
                    endif;
                    /** if ($href != ''): **/
                    $i++;
                endwhile;
            endif;
            ?>
        </div>
    </div>
    <div class="cell shrink special-offer">
        <div class="inner">
            <?php if (have_rows('special_offer', 'option')) : ?>
                <?php while (have_rows('special_offer', 'option')) : the_row(); ?>
                    <?php $image = get_sub_field('image'); ?>
                    <div class="image"<?php if ($image) : ?>
                        style="background-image: url(<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>);"
                    <?php endif; ?>></div>
                    <h2 class="text-center"><?php the_sub_field('line_1'); ?></h2>
                    <h3 class="text-center"><?php the_sub_field('line_2'); ?></h3>
                    <h2 class="text-center"><?php the_sub_field('line_3'); ?></h2>
                    <div class="grid-x">
                        <div class="cell auto text-center">
                            <a href="<?php echo get_sub_field('page_link'); ?>"
                               class="button-underline"><?php the_sub_field('link_text'); ?></a>
                        </div>

                        <?php $booking_type = get_sub_field('booking_type'); ?>
                        <?php if ($booking_type == 'AZDS'): ?>
                            <?php if (have_rows('accomodation_codes')) :
                                $selector = '?';
                                $query = '';
                                while (have_rows('accomodation_codes')) : the_row();
                                    $key = get_sub_field('key');
                                    $value = get_sub_field('value');
                                    $query .= $selector . $key . '=' . $value;
                                    $selector = '&';
                                endwhile;
                                ?>
                                <div class="cell auto text-center">
                                    <a href="#/booking/step-1<?php echo $query; ?>"
                                       class="button-ritz">BOOK NOW</a>
                                </div>
                            <?php else : ?>
                                <div class="cell auto text-center">
                                    <a href="#/booking/step-1" class="button-white">BOOK
                                        NOW</a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($booking_type == 'Bookatable'): ?>
                            <?php if (have_rows('dining_codes')) :
                                $book_data = '';
                                while (have_rows('dining_codes')) : the_row();
                                    $book_data = ' data-bookatable data-connectionid="' . get_sub_field('connectionid') . '"';
                                    $book_data .= ' data-restaurantid="' . get_sub_field('restaurantid') . '"';
                                    $book_data .= ' data-basecolor="' . get_sub_field('basecolor') . '"';
                                    $book_data .= ' data-promotionid="' . get_sub_field('promotionid') . '"';
                                    $book_data .= ' data-sessionid="' . get_sub_field('sessionid') . '"';
                                    $book_data .= ' data-conversionjs="' . get_sub_field('conversionjs') . '"';
                                    $book_data .= ' data-gaaccountnumber="' . get_sub_field('gaaccountnumber') . '"';
                                endwhile;
                                if ($book_data != '') {
                                    ?>
                                    <div class="cell auto text-center">
                                        <a href="#" <?php echo $book_data; ?>
                                           class="button-ritz">BOOK NOW</a>
                                    </div>
                                    <?php
                                }
                            endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="cell auto">&nbsp;</div>
</div>
