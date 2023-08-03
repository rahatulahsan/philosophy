<?php 
/**
 * Template Name: Ajax
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
                    <?php the_title(); ?>
                </h1>
            </div> <!-- end s-content__header -->
    
            

            <div class="col-full s-content__main">

                <?php the_content(); ?>

                <form action="<?php echo home_url('/') ?>" method="post">
                    <label for="info">Valuable Information</label>
                    <input type="text" id="info" name="info" />
                    <input id="ajaxsubmit" type="submit" value="Submit by Ajax"/>
                    <?php wp_nonce_field('ajaxtest'); ?>
                </form>


            </div> <!-- end s-content__main -->

        </article>
       
    </section> <!-- s-content -->


    <?php get_footer(); ?>