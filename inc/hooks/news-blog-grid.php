<?php
if (!function_exists('seek_grid_block_args')) :
    /**
     * Banner grid Details
     *
     * @since Seek 1.0.0
     *
     * @return array $qargs grid details.
     */
    function seek_grid_block_args()
    {
        $seek_grid_block_number = absint(seek_get_option('number_of_home_grid'));
        $seek_grid_block_category = esc_attr(seek_get_option('select_category_for_grid'));
        $qargs = array(
            'posts_per_page' => esc_attr($seek_grid_block_number),
            'post_type' => 'post',
            'cat' => $seek_grid_block_category,
        );
        return $qargs;
        ?>
        <?php
    }
endif;


if (!function_exists('seek_grid_block_custom')) :
    /**
     * Banner grid
     *
     * @since Seek 1.0.0
     *
     */
    function seek_grid_block_custom()
    {
        $seek_grid_block_title_text = esc_html(seek_get_option('heading_text_on_grid'));

        if (1 != seek_get_option('show_grid_section')) {
            return null;
        }
        $seek_grid_block_args = seek_grid_block_args();
        $seek_grid_block_query = new WP_Query($seek_grid_block_args); ?>
        <div class="twp-latest-post-section twp-overlay data-bg" data-background="<?php echo esc_url(seek_get_option('grid_section_background_image')); ?>">
            <div class="container">
                <?php if (!empty($seek_grid_block_title_text)) { ?>
                        <h2 class="twp-section-title twp-title-with-dashed">
                            <?php echo esc_html($seek_grid_block_title_text); ?>
                        </h2>
                <?php } ?>
                <div class="twp-latest-post-list twp-row comix-">
                    <div class="comix-videotheque-video">
                        <iframe width="400" height="325" src="https://www.youtube.com/embed/3lKye7KcGkM" title="JARED LETO, UN MAUVAIS JOKER ?" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="comix-videotheque-video">
                        <iframe width="400" height="325" src="https://www.youtube.com/embed/AuvRFh0gyp0" title="BATMAN EST-IL UN TUEUR ?" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="comix-videotheque-post">
                        <span class="comix-videotheque-post__text">
                            Vous voulez en voir plus ?
                        </span>
                        <a class="comix-videotheque-post__btn" href="/index.php/la-video-theque/" target="_blank" style="text-transform: uppercase;">Découvrir la vidéo-thèque</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
endif;
add_action('seek_action_grid_post_custom', 'seek_grid_block_custom', 10);