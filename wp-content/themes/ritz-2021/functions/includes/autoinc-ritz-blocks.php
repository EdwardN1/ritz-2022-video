<?php

/*add_filter('block_categories', function ($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'ritzblocks',
                'title' => __('Ritz Blocks', 'ritzblocks'),
            ),
        )
    );
}, 10, 2);*/

add_filter('block_categories', 'reorderBlocks', 99, 2);

function reorderBlocks($categories, $post)
{
    $retCats = array();
    $ritzBlocks = array(
        'slug' => 'ritzblocks',
        'title' => __('Ritz Blocks', 'ritzblocks'),
    );
    $retCats[0] = $ritzBlocks;
    foreach ($categories as $category) {
        $retCats[] = $category;
    }
    return $retCats;
}

add_action('acf/init', 'register_ritz_two_columns_block');
function register_ritz_two_columns_block()
{

    if (function_exists('acf_register_block_type')) {

// Register Two Columns block
        acf_register_block_type(array(
            'name' => 'two-columns',
            'title' => __('Ritz Two Column Block'),
            'description' => __('A Custom Ritz Two Column Block.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('two', 'columns'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
// 'align'				=> 'wide',
            'render_template' => get_template_directory() . '/parts/blocks/BlockRitzTwoColumn.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_two_column_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-block-two-column.png',
                    )
                )
            ),
// 'render_callback'	=> 'two_columns_block_render_callback',
// 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/two-columns/two-columns.css',
// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/two-columns/two-columns.js',
// 'enqueue_assets' 	=> 'two_columns_block_enqueue_assets',
        ));

    }

}

add_action('acf/init', 'register_ritz_four_column_block_block');
function register_ritz_four_column_block_block()
{

    if (function_exists('acf_register_block_type')) {

        // Register Ritz Four Column Block block
        acf_register_block_type(array(
            'name' => 'ritz-four-column-block',
            'title' => __('Ritz Four Column Block'),
            'description' => __('A Custom Ritz Four Column Block.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('ritz', 'four', 'column', 'block'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
            // 'align'				=> 'wide',
            'render_template' => '/parts/blocks/BlockRitzFourColumn.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_four_column_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-block-four-column.png',
                    )
                )
            ),
            // 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
            // 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
        ));

    }

}

add_action('acf/init', 'register_ritz_full_width_text_banner_block');
function register_ritz_full_width_text_banner_block()
{

    if (function_exists('acf_register_block_type')) {

        // Register Ritz Four Column Block block
        acf_register_block_type(array(
            'name' => 'ritz-full-width-text-banner-block',
            'title' => __('Ritz Full Width Text Banner Block'),
            'description' => __('A Custom Ritz Full Width Text Banner Block.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('ritz', 'full', 'width', 'text', 'banner', 'block'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
            // 'align'				=> 'wide',
            'render_template' => '/parts/blocks/BlockRitzFullWidthTextBanner.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_full_width_text_banner_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-full-width-text-banner.png',
                    )
                )
            ),
            // 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
            // 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
        ));

    }

}

add_action('acf/init', 'register_ritz_landing_page_room_block');
function register_ritz_landing_page_room_block()
{

    if (function_exists('acf_register_block_type')) {

        // Register Ritz Four Column Block block
        acf_register_block_type(array(
            'name' => 'ritz-landing-page-room-block',
            'title' => __('Ritz Landing Page Room Block'),
            'description' => __('A Custom Ritz Landing Page Room Block.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('ritz', 'landing', 'Room', 'block'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
            // 'align'				=> 'wide',
            'render_template' => '/parts/blocks/BlockRitzLandingPageRoom.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_landing_page_room_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-landing-page-room.png',
                    )
                )
            ),
            // 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
            // 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
        ));

    }

}

add_action('acf/init', 'register_ritz_page_content_with_sidebar_block');
function register_ritz_page_content_with_sidebar_block()
{

    if (function_exists('acf_register_block_type')) {

        // Register Ritz Four Column Block block
        acf_register_block_type(array(
            'name' => 'ritz-page-content-with-sidebar-block',
            'title' => __('Ritz Page Content with Sidebar'),
            'description' => __('A Custom Ritz Page Content with Sidebar Block.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('ritz', 'landing', 'Room', 'block', 'page', 'content'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
            // 'align'				=> 'wide',
            'render_template' => '/parts/blocks/BlockRitzPageContentWithSidebar.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_page_content_with_sidebar_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-page-content-with-sidebar.png',
                    )
                )
            ),
            // 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
            // 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
        ));

    }

}

add_action('acf/init', 'register_ritz_two_column_experience_block');
function register_ritz_two_column_experience_block()
{

    if (function_exists('acf_register_block_type')) {

        // Register Ritz Four Column Block block
        acf_register_block_type(array(
            'name' => 'ritz-two-column-experience-block',
            'title' => __('Ritz Two Column Experience Block'),
            'description' => __('A Custom Ritz Two Column Experience Block.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('ritz', 'two', 'column', 'block', 'experience', 'content'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
            // 'align'				=> 'wide',
            'render_template' => '/parts/blocks/BlockRitzTwoColumnExperience.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_two_column_experience_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-two-column-experience.png',
                    )
                )
            ),
            'styles'  => [
	            [
		            'name' => 'Default',
		            'label' => __('Default', ''),
		            'isDefault' => true,
	            ],
	            [
		            'name' => 'half-pad',
		            'label' => __('Reduced Vertical Spacing', ''),
	            ]
            ],
            // 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
            // 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
        ));

    }

}

add_action('acf/init', 'register_ritz_underlined_title_block');
function register_ritz_underlined_title_block()
{

    if (function_exists('acf_register_block_type')) {

        // Register Ritz Four Column Block block
        acf_register_block_type(array(
            'name' => 'ritz-underlined-title-block',
            'title' => __('Ritz Underlined Title Block'),
            'description' => __('A Custom Ritz Underlined Title Block.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('ritz', 'underlined', 'title', 'block', 'content'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
            // 'align'				=> 'wide',
            'render_template' => '/parts/blocks/BlockRitzUnderlinedTitle.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_ritz_underlined_title_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-underlined-title.png',
                    )
                )
            ),
            // 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
            // 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
        ));

    }

}

add_action('acf/init', 'register_ritz_popup_button_row_block');
function register_ritz_popup_button_row_block()
{

	if (function_exists('acf_register_block_type')) {

		// Register Ritz Four Column Block block
		acf_register_block_type(array(
			'name' => 'ritz-popup_button_row-block',
			'title' => __('Ritz Popup Button Row Block'),
			'description' => __('A Custom Ritz Popup Button Row Block.'),
			'category' => 'ritzblocks',
			'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
			'keywords' => array('ritz', 'underlined', 'popup', 'button', 'content'),
			'post_types' => array('post', 'page'),
			'mode' => 'auto',
			// 'align'				=> 'wide',
			'render_template' => '/parts/blocks/BlockRitzPopupButtonRow.php',
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'ritz_popup_button_row_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-popup_button_row.png',
					)
				)
			),
			// 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
			// 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
			// 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
		));

	}

}

add_action('acf/init', 'register_ritz_page_carousel_block');
function register_ritz_page_carousel_block()
{

    if (function_exists('acf_register_block_type')) {

        // Register Ritz Four Column Block block
        acf_register_block_type(array(
            'name' => 'ritz-page-carousel-block',
            'title' => __('Ritz Page Carousel Block'),
            'description' => __('A Custom Ritz Page Carousel Block.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('ritz', 'page', 'carousel', 'block', 'content'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
            // 'align'				=> 'wide',
            'render_template' => '/parts/blocks/BlockRitzPageCarousel.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_page_carousel_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-page-carousel.png',
                    )
                )
            ),
            // 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
            // 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
        ));

    }
}

add_action('acf/init', 'register_ritz_offers_block');
function register_ritz_offers_block()
{

	if (function_exists('acf_register_block_type')) {

		// Register Ritz Four Column Block block
		acf_register_block_type(array(
			'name' => 'ritz-offers-block',
			'title' => __('Ritz Offers Block'),
			'description' => __('A Custom Ritz Offers Block.'),
			'category' => 'ritzblocks',
			'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
			'keywords' => array('ritz', 'page', 'offers', 'block', 'content'),
			'post_types' => array('post', 'page'),
			'mode' => 'auto',
			// 'align'				=> 'wide',
			'render_template' => '/parts/blocks/BlockRitzOffers.php',
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'ritz_offers_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-offers.png',
					)
				)
			),
			// 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
			// 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
			// 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
			// 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
		));

	}
}

add_action('acf/init', 'register_ritz_image_gallery_block');
function register_ritz_image_gallery_block()
{

    if (function_exists('acf_register_block_type')) {

        // Register Ritz Four Column Block block
        acf_register_block_type(array(
            'name' => 'ritz-image-gallery-block',
            'title' => __('Ritz Image Gallery Block'),
            'description' => __('A Custom Ritz Image Gallery Block.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('ritz', 'page', 'image', 'gallery', 'block', 'content'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
            // 'align'				=> 'wide',
            'render_template' => '/parts/blocks/BlockRitzImageGallery.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_image_gallery_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-image-gallery.png',
                    )
                )
            ),
            // 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
            // 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
        ));

    }
}

add_action('acf/init', 'register_ritz_image_block');
function register_ritz_image_block()
{

    if (function_exists('acf_register_block_type')) {

        // Register Ritz Four Column Block block
        acf_register_block_type(array(
            'name' => 'ritz-image-block',
            'title' => __('Ritz Image Block'),
            'description' => __('A Custom Ritz Image Block for inserting into standard page content.'),
            'category' => 'ritzblocks',
            'icon' => file_get_contents(get_template_directory() . '/assets/images/ritz-icon.svg'),
            'keywords' => array('ritz', 'page', 'image', 'block', 'content'),
            'post_types' => array('post', 'page'),
            'mode' => 'auto',
            // 'align'				=> 'wide',
            'render_template' => '/parts/blocks/BlockRitzImage.php',
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'ritz_image_block_preview_image_help' => get_template_directory_uri() . '/assets/images/ritz-block-image.png',
                    )
                )
            ),
            // 'render_callback'	=> 'ritz_four_column_block_block_render_callback',
            // 'enqueue_style' 		=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.css',
            // 'enqueue_script' 	=> get_template_directory_uri() . '/template-parts/blocks/ritz-four-column-block/ritz-four-column-block.js',
            // 'enqueue_assets' 	=> 'ritz_four_column_block_block_enqueue_assets',
        ));

    }
}