<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <?php wp_head(); ?>
</head>

<body>

    <?php
    if (!\Elementor\Plugin::$instance->preview->is_preview_mode()):
        //I'm editing a post, page or custom post type
        ?>
        <!-- perloader -->
        <div class="perloader-wrapper">
            <div class="spinner-grow" style="width: 2rem; height: 2rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    <?php endif; ?>

    <!-- main-header -->
    <header id="fixed-navbar" class="header-meduim shadow-sm pt-3 pb-3 p-lg-0 animated">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-9 col-sm-7 col-lg-2">
                    <a class="nav-brand logo-sm" href="#">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                        $logo = '';
                        if (is_array($image) && count($image) > 0) {

                            $logo = $image[0];
                        }

                        echo get_custom_logo();
                        ?>
                        <!-- <a href="<?php echo home_url() ?>">
                            <img src="<?php echo $logo; ?>" class="img-fluid" alt="<?php bloginfo('name'); ?>">
                        </a> -->
                    </a>
                </div>

                <div class="col-1 col-lg-9 col-xl-8 navbar-mobile p-0 nice-scroll">
                    <span class="close-menu d-flex d-lg-none"><i class="fas fa-times"></i></span>

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="nav main-nav gap-2 justify-content-lg-center %2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new Affsquare\Bootstrap5MenuWalker()
                        )
                    );
                    ?>
                </div>

                <div class="col-3 col-sm-5 col-lg-1 col-xl-2 d-flex gap-md-3 justify-content-end">
                    <a href="#" class="btn btn-sm btn-outline-primary d-none d-md-block">
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="d-none d-xl-inline text-uppercase">Sign in</span>
                    </a>

                    <button class="btn btn-dark toggle-menu d-block d-lg-none">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>