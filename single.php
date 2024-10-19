<?php get_header(); ?>

<?php get_template_part('/components/inner-page-banner'); ?>

<section class="single">
    <div class="uk-container uk-container-small">
        <article class="single-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if (has_post_thumbnail()) : ?>
                    <figure class="single-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </figure>
                <?php endif; ?>
                <div class="single-text-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
        </article>
    </div>
</section>

<?php get_template_part('/components/order-cta'); ?>
<?php get_footer(); ?>