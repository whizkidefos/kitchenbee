<section class="homepage-banner">
    <!-- <div class="uk-container">
        <!-- <div class="swiper bannerSwiper">
            <div class="swiper-wrapper bannerSwiper-wrapper">
                <div class="swiper-slide bannerSwiper-slide">Okra Soup</div>
                <div class="swiper-slide bannerSwiper-slide">Delta Banga Soup</div>
                <div class="swiper-slide bannerSwiper-slide">Peppersoup</div>
                <div class="swiper-slide bannerSwiper-slide">Egusi Soup</div>
                <div class="swiper-slide bannerSwiper-slide">Fried Rice</div>
                <div class="swiper-slide bannerSwiper-slide">Smokie Jollof Rice</div>
                <div class="swiper-slide bannerSwiper-slide">Assorted Meat</div>
                <div class="swiper-slide bannerSwiper-slide">Gizzdodo</div>
                <div class="swiper-slide bannerSwiper-slide">MoinMoin</div>
            </div>
        </div> -->

        <!--<div class="swiper bannerSwiper">
            <div class="swiper-wrapper bannerSwiper-wrapper">
                </?php
                // Query for featured posts
                $featured_posts = new WP_Query(array(
                    'meta_key'   => '_featured_post',
                    'meta_value' => '1',
                    'posts_per_page' => 6
                ));
                if ($featured_posts->have_posts()) :
                    while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
                        <div class="swiper-slide bannerSwiper-slide">
                            <a href="</?php the_permalink(); ?>">
                                </?php the_post_thumbnail('full'); ?>
                            </a>
                        </div>
                        </?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No featured posts found.</p>
                </?php endif; ?>
            </div>
        </div>
    </div> -->

    <div class="container">
        <div class="loader">
            <p>0</p>
        </div>

        <div class="gallery"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/Flip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/CustomEase.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            gsap.registerPlugin(CustomEase);
            CustomEase.create("hop", "M0,0 C0.126,0.382 0.214,0.6 0.3,0.7 0.4,0.82 0.6,1 1,1");
            

            const itemsCount = 5;
            const container = document.querySelector(".container");
            const gallery = document.querySelector(".gallery");
            let isCircularLayout = false;

            const createItems = () => {
                for (let i = 1; i <= itemsCount; i++) {
                    const item = document.createElement("div");
                    item.classList.add("item");

                    const img = document.createElement("img");
                    img.src = `<?php echo get_template_directory_uri(); ?>/images/${i}.png`;
                    img.alt = `Image ${i}`;

                    item.appendChild(img);
                    gallery.appendChild(item);
                }
            };
            createItems();
        
        });
    </script>
</section>