
<section class="featured-dishes">
    <div class="uk-container">
        <h2 class="uk-heading-line uk-text-center"><span>Featured Dishes</span></h2>

        <div class="uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-1@s uk-grid-match" uk-grid>
            <?php
            // Query for featured posts
            $featured_posts = new WP_Query(array(
                'meta_key'   => '_featured_post',
                'meta_value' => '1',
                'posts_per_page' => 6
            ));

            if ($featured_posts->have_posts()) :
                while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
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
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No featured posts found.</p>
            <?php endif; ?>
        </div>
    </div>

</section>