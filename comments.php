 <!-- comments
        ================================================== -->
        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">
                        <?php 
                        
                        $philosophy_cn = get_comments_number();
                        if($philosophy_cn <= 1){
                            echo esc_html($philosophy_cn) . " " . __('Comment', 'philosophy');
                        }else{
                            echo esc_html($philosophy_cn) . " " . __('Comments', 'philosophy');
                        }
                        
                        ?>
                    </h3>

                    <!-- commentlist -->
                    <ol class="commentlist">

                        <?php wp_list_comments(); ?>

                    </ol> <!-- end commentlist -->

                    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

                    <nav class="navigation comment-navigation" role="navigation">

                        <h3 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'philosophy' ); ?></h3>
                        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'philosophy' ) ); ?></div>
                        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'philosophy' ) ); ?></div>

                    </nav><!-- .comment-navigation -->

                    <?php endif; // Check for comment navigation ?>


                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2"><?php _e('Add Comment', 'philosophy'); ?></h3>

                        <?php comment_form(); ?>

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->
