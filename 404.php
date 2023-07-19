
<?php get_header(); ?>

    <!-- s-content
    ================================================== -->
    <section class="s-content">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <?php do_action('philosophy_before_category_title'); ?>
                <h1><?php _e('404 Page Not Found' ,'philosophy'); ?></h1>

                <p class="lead"><?php _e('The posts/pages you are looking for are not available' ,'philosophy'); ?></p>
                <a href="<?php echo home_url('/'); ?>"><button><?php _e('Return to Home', 'philosophy') ?></button></a>
            </div>
        </div>
        

    </section> <!-- s-content -->


 <?php get_footer(); ?>