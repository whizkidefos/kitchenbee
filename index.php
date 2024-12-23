<?php get_header(); ?>

<header class="inner-page-banner">
    <div class="inner-page-banner-content">
        <h1>Our Menu</h1>
    </div>
</header>

<section class="dishes">
    <div class="uk-container uk-margin-large-top">
        <h2 class="uk-heading-line uk-text-center"><span>Browse our menu</span></h2>

        <div class="uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-1@s uk-grid-match" uk-grid>
            <?php
            // Custom query to show 8 posts per page
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'posts_per_page' => 6,
                'paged' => $paged
            );
            $custom_query = new WP_Query($args);

            if ($custom_query->have_posts()) :
                while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                   <div>
                        <div class="custom-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="custom-card-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('full'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="custom-card-content">
                                <h3 class="">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <a href="<?php the_permalink(); ?>" class="kitchenbee-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination uk-margin-large-top">
                <?php
                    echo paginate_links(array(
                        'total' => $custom_query->max_num_pages,
                        'prev_text' => __('« Previous'),
                        'next_text' => __('Next »'),
                        'type' => 'list'
                    ));
                ?>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html_e('Sorry, no posts were found.'); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- </?php get_template_part('/components/homepage-banner'); ?>
</?php get_template_part('/components/featured-dishes'); ?> -->

<?php get_footer(); ?>