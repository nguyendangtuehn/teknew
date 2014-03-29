<?php get_header(); ?>

<div id="main-wrap">
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-7 col-lg-8">
                <div class="panel">
                    <?php if (have_posts()) : ?>
                    <?php   
                        while(have_posts()) : the_post();
                    ?>
                    <div class='post'>
                        <div class='headTitle'>
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <ul class='postDetail'>
                                    <li>
                                        <?php the_author_posts_link(); ?> 
                                    </li> |
                                    <li>
                                        <?php the_category(); ?> 
                                    </li> |
                                    <li>
                                        <a><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' trước'; ?></a>
                                    </li>
                                </ul>
                        </div><!--end .headTitle-->
                        <div class="imgThumb">
                            <?php if(get_first_image()){ ?> 
                                <a href='<?php the_permalink(); ?>'><img class="aligncenter" src="<?php echo get_first_image(); ?>" alt="<?php the_title(); ?>" /></a>
                            <?php } ?>
                        </div>
                        <p>
                            <?php the_excerpt(); ?>
                        </p>
                   </div><!--end .post-->
                <?php // endforeach;    wp_reset_postdata(); ?>
                <?php endwhile; ?>

                <div class="wp-pagenavi">
                    <?php
                       global $wp_query;
                       $big = 999999999; // need an unlikely integer
                       echo paginate_links( array(
                               'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                               'format' => '?paged=%#%',
                               'current' => max( 1, get_query_var('paged') ),
                               'total' => $wp_query->max_num_pages,
                               'prev_text' => '«',
                               'next_text' => '»'
                       ) );
                   ?>
                     <?php echo paginate_links( $args ); ?>
               </div><!--end .wp-pagenavi-->
            </div><!--end .panel-->
    <?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>