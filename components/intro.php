<section class="intro">
    <div class="uk-container">
        <div class="intro-grid">
            <figure class="intro-image-container">
                <?php
                $intro_image = get_field( 'intro_image', 'options' );
                if ( $intro_image ) : ?>
                    <img src="<?php echo esc_url( $intro_image['url'] ); ?>" alt="<?php echo esc_attr( $intro_image['alt'] ); ?>" />
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/chef.jpg" alt="Mrs Beno Durojaiye" />
                <?php endif; ?>
            </figure>
            <article>
                <h5>Mrs Beno Durojaiye</h5>
                <h3>Award Winning Chef</h3>
                <?php if ( $intro_text = get_field( 'intro_text', 'options' ) ) : ?>
                    <?php echo $intro_text; ?>
                <?php endif; ?>
                <a href="/about" class="kitchenbee-btn">Learn More</a>
            </article>
        </div>
    </div>
</section>