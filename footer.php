   <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3><?php _e('Popular Posts', 'philosophy'); ?></h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <?php 
                    
                    $args = array(
                        'posts_per_page' => 6,
                        'meta_key' => 'popular',
                        'meta_value' => '1'
                    );

                    $philosophy_popular_posts = new WP_Query($args);
                    while($philosophy_popular_posts->have_posts()){
                        $philosophy_popular_posts->the_post(); ?>

                        <article class="col-block popular__post">
                            <a href="<?php the_permalink(); ?>" class="popular__thumb">
                                <?php the_post_thumbnail(); ?>
                            </a>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <section class="popular__meta">
                                    <span class="popular__author"><span><?php _e('By','philosophy') ?></span> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"> <?php the_author(); ?></a></span>
                                <span class="popular__date"><span><?php _e('on', 'philosophy'); ?></span> <time datetime="2017-12-19"><?php echo get_the_date(); ?></time></span>
                            </section>
                        </article>

                    <?php }

                    wp_reset_postdata(  );
                    
                    ?>     

                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
                <?php 
                
                if(is_active_sidebar('before-footer-right')){
                    dynamic_sidebar( 'before-footer-right' );
                }
                
                ?>

                <ul class="about__social">
                    <?php 
                    
                    $philosophy_footer_social = get_field('social_media','option');
                    foreach($philosophy_footer_social as $social){?>
                        <li>
                            <a href="<?php echo $social['url'] ?>"><i class="<?php echo $social['social_icon_class']; ?>" aria-hidden="true"></i></a>
                        </li>
                    <?php }

                    ?>
                    
                </ul> <!-- end header__social -->
            </div> <!-- end about -->

        </div> <!-- end row -->

        <div class="row bottom tags-wrap">
            <div class="col-full tags">
                <h3><?php _e('Tags', 'philosophy'); ?></h3>
                <?php 
                
                $tags = get_tags(array(
                    'hide_empty' => true
                ));
                echo '<div class="tagcloud">';
                foreach($tags as $tag){?>
                    <a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a>
                <?php }
                echo '</div>';
                
                ?>
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    </section> <!-- end s-extra -->
   
   <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                    <h4><?php _e('Quick Links', 'philosophy'); ?></h4>

                    <?php 
                    
                    wp_nav_menu(array(
                        'theme_location' => 'footer-left',
                        'menu_id' => 'footer-left',
                        'menu_class' => 's-footer__linklist',
                    ));

                    ?>

                </div> <!-- end s-footer__sitelinks -->

                <div class="col-two md-four mob-full s-footer__archives">
                        
                    <h4><?php _e('Archives', 'philosophy'); ?></h4>

                    <?php 
                    
                    wp_nav_menu(array(
                        'theme_location' => 'footer-middle',
                        'menu_id' => 'footer-middle',
                        'menu_class' => 's-footer__linklist',
                    ));

                    ?>

                </div> <!-- end s-footer__archives -->

                <div class="col-two md-four mob-full s-footer__social">
                        
                    <h4><?php _e('Social', 'philosophy'); ?></h4>

                    <?php 
                    
                    wp_nav_menu(array(
                        'theme_location' => 'footer-right',
                        'menu_id' => 'footer-right',
                        'menu_class' => 's-footer__linklist',
                    ));

                    ?>

                </div> <!-- end s-footer__social -->

                <div class="col-five md-full end s-footer__subscribe">
                        
                    <?php 
                    
                    if(is_active_sidebar( 'footer-right-newsletter' )){
                        dynamic_sidebar( 'footer-right-newsletter' );
                    }
                    
                    
                    ?>


                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <?php echo do_shortcode('[mc4wp_form id=147]'); ?>
                
                        </form>
                    </div>
                    

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                        <?php echo get_field('footer_copyright','option'); ?>
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <?php wp_footer(); ?>

</body>

</html>