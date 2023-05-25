<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();




if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    
    if (get_the_post_thumbnail_url()){ 
        ?><div class="d-flex container-fluid" style="height:50vh;background:url(<?php echo get_the_post_thumbnail_url(); ?>)  center / cover no-repeat;"></div>
    <?php } else {
        ?><div class="d-flex container-fluid" style="height:20vh;"></div>
    <?php } ?>
    
    <div class="container p-5 bg-light" style="margin-top:-100px">
        <div class="row text-center">
            
            <div class="col-md-12">
                <?php 
                //CATS
                // Get the IDs of child categories if any
                $categories = get_the_category();
                foreach( $categories as $category ) {
                    if ( $category->parent > 0 ) { 
                        $child_cat_ID[] =  $category->term_id; 
                    }
                } 
 
                // If there are no child categories then display categories
                if ( empty($child_cat_ID)) { 
                echo get_the_category_list( ' , ', '' );
 
                // display child categories only
                } else { 
     
                $child_cat_IDs = implode(', ', $child_cat_ID);
                echo '<div class="post-categories">Filed under: ';
                wp_list_categories( array(
                    'separator' => ' ',
                    'style'     => '',   
                    'include' =>  $child_cat_IDs 
                ) );
                echo '</div>';
                } 
                ?>

                <h1 class="display-4"><?php the_title(); ?></h1>
                
                <?php if (!get_theme_mod("singlepost_disable_date") OR !get_theme_mod("singlepost_disable_author")  ): ?>
                    <div class="post-meta" id="single-post-meta">
                        <p class="lead text-secondary">
                            
                            <?php if (!get_theme_mod("singlepost_disable_date") ): ?>
                                <span class="post-date"><?php the_date(); ?> </span>
                            <?php endif; ?>

                            <?php if (!get_theme_mod("singlepost_disable_author") ): ?>
                                <span class="text-secondary post-author"> <?php _e( 'by', 'picostrap' ) ?> <?php the_author(); ?></span>
                            <?php endif; ?>
                        </p>
                    </div> 
                <?php endif; ?>

            </div><!-- /col -->
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php 
                
                the_content();
                
                if( get_theme_mod("enable_sharing_buttons")) picostrap_the_sharing_buttons();
                
                edit_post_link( __( 'Edit this post', 'picostrap' ), '<p class="text-end">', '</p>' );
                
                // If comments are open or we have at least one comment, load up the comment template.
                if (!get_theme_mod("singlepost_disable_comments")) if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                
                ?>

            </div><!-- /col -->
        </div>
    </div>

<?php
    endwhile;
 else :
     _e( 'Sorry, no posts matched your criteria.', 'picostrap' );
 endif;
 ?>


 

<?php get_footer();
