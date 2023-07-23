<?php 
/**
 * Template Name: Shortcode Example
 */
the_post();
get_header(); 
?>


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php echo __('ShortCode Example', 'philosophy'); ?>
                </h1>
                
            </div> <!-- end s-content__header -->

            <div class="col-full s-content__main">
                <?php the_content(); ?>
            </div>
        </article>

       
    </section> <!-- s-content -->


    <?php get_footer(); ?>