<article class="masonry__brick entry format-gallery" data-aos="fade-up">

        <?php 
        
        $gallery_post = get_field('gallery_post_type');

        ?>
        
        <?php 
        
        if($gallery_post){?>
            <div class="entry__thumb slider">
                <div class="slider__slides">
                    <?php 

                    foreach($gallery_post as $gallery_photo){?>
                    <div class="slider__slide">
                        <img src="<?php echo esc_url($gallery_photo['sizes']['philosophy-home-square']); ?>" 
                        srcset="<?php echo esc_url($gallery_photo['sizes']['philosophy-home-square']); ?>" alt=""> 
                    </div>
                    <?php }
                    
                    ?>
                </div>
            </div>
        <?php }
        
        ?>
        

        <?php get_template_part('/template-parts/common/post/summary'); ?>

</article> <!-- end article -->