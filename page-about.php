<?php get_header(); ?>

<?php get_template_part('/components/inner-page-banner'); ?>

<!-- </?php get_template_part('/components/intro'); ?> -->

<section class="intro">
    <div class="uk-container">
        <div class="intro-grid">
            <figure>
                <?php the_post_thumbnail(); ?>
                <?php if ( $videos = get_field( 'videos' ) ) : ?>
                    <?php echo $videos; ?>
                <?php endif; ?>
            </figure>
            <article>
                <h5>Mrs Beno Durojaiye</h5>
                <h3>Award Winning Chef</h3>
                <?php if ( $description = get_field( 'description' ) ) : ?>
                    <?php echo $description; ?>
                <?php endif; ?>
            </article>
        </div>
    </div>
</section>

<?php get_footer(); ?>