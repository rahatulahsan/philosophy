<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

    <!--- basic page needs
    ================================================== -->
    <meta <?php bloginfo( 'charset'); ?>>

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php wp_head(); ?>

</head>

<body id="top" <?php body_class( ); ?>>

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader <?php if(is_home()) echo "s-pageheader--home"; ?>">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <?php 

                    if(has_custom_logo()){
                        the_custom_logo();
                    }else{
                        echo '<h1><a href='.home_url("/").'>'.get_bloginfo('name'). '</a></h1>';
                    }
                    
                    ?>
                </div> <!-- end header__logo -->

                <ul class="header__social">
                    <?php 
                    
                    $philosophy_header_social = get_field('header_social','option');
                    foreach($philosophy_header_social as $social){?>
                        <li>
                            <a href="<?php echo $social['icon_url'] ?>"><i class="<?php echo $social['icon_class']; ?>" aria-hidden="true"></i></a>
                        </li>
                    <?php }

                    ?>
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <?php get_search_form(); ?>
        
                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div>  <!-- end header__search -->

                <?php get_template_part('/template-parts/common/navigation'); ?>

            </div> <!-- header-content -->
        </header> <!-- header -->

        <?php 
            if(is_home(  )){
                get_template_part( '/template-parts/blog-home/featured' ); 
            }
            
        ?>

    </section> <!-- end s-pageheader -->