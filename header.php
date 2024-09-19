<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . "/images/kitchenbee.png" ?>" type="image/x-icon">
</head>
<?php wp_head(); ?>
<body>

    <header class="main-header">
            
        <div class="logo-wrapper">
            <a href="/" class="nav-logo"><img src="<?php echo get_template_directory_uri() . "/images/kitchenbee.png" ?>" alt="kitchenbee logo"></a>
        </div>
        
        <div class="site-navigation">
            <?php
                $args = array(
                    'theme_location' => 'main-menu',
                    'container'      => 'nav',
                    'container_class'=> 'main-menu'
                );
                wp_nav_menu( $args );
            ?>
        </div>

        <div class="site-cta">
            <a href="/place-order" class="kitchenbee-btn">Place Order</a>
            <i class="fa-solid fa-bars"></i>
        </div>
        
    </header>