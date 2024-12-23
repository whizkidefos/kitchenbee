<?php get_header(); ?>

<?php get_template_part('/components/inner-page-banner'); ?>

<section class="contact">
    <div class="uk-container">
        <div class="uk-child-width-1-2@m uk-child-width-1-1@s" uk-grid>
            <div>
                <div class="contact-info">
                    <h2>Get in touch</h2>
                    <p>For any inquiries, please call or email us. Alternatively you can fill in the following contact form.</p>
                    <div class="contact-details">
                        <div class="contact-item">
                        <p>
                            <i class="fas fa-map"></i>
                            <?php if ( $address = get_field( 'address' ) ) : ?>
                                <?php echo esc_html( $address ); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <i class="fas fa-phone"></i>
                            <?php if ( $mobile = get_field( 'mobile' ) ) : ?>
                                <?php echo esc_html( $mobile ); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <?php if ( $email = get_field( 'email' ) ) : ?>
                                <?php echo esc_html( $email ); ?>
                            <?php endif; ?>
                        </p>
                    </div>
                        <p>
                            <i class="fas fa-clock"></i>
                            <?php if ( $weekdays_opening_hours = get_field( 'weekdays_opening_hours' ) ) : ?>
                                <?php echo esc_html( $weekdays_opening_hours ); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <i class="fas fa-clock"></i>
                            <?php if ( $weekend_opening_hours = get_field( 'weekend_opening_hours' ) ) : ?>
                                <?php echo esc_html( $weekend_opening_hours ); ?>
                            <?php endif; ?>
                        </p>
                        <p>
                            <i class="fas fa-clock"></i>
                            Bank Holidays:
                            <?php if ( $bank_holidays = get_field( 'bank_holidays' ) ) : ?>
                                <?php echo esc_html( $bank_holidays ); ?>
                            <?php endif; ?>
                        </p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="contact-form">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="uk-container">
        <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4750.605856233913!2d-2.197752328801832!3d53.463046038831585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb166612ef82f%3A0x9a4b8352016aa0af!2sBelle%20Vue%2C%20Manchester!5e0!3m2!1sen!2suk!4v1729237287511!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php get_footer(); ?>