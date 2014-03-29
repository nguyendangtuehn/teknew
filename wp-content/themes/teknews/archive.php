<?php get_header(); ?>
<div id="main-wrap">
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-7 col-lg-8">
                <div class="panel">
                    <?php if (have_posts()) : ?>

                        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

                        <?php /* If this is a category archive */ if (is_category()) { ?>
                                <h2 class='arch'></h2>

                        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                                <h2 class='arch'>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

                        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                                <h2 class='arch'>Archive for <?php the_time('F jS, Y'); ?></h2>

                        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                                <h2 class='arch'>Archive for <?php the_time('F, Y'); ?></h2>

                        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                                <h2 class='arch'>Archive for <?php the_time('Y'); ?></h2>

                        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                                <h2 class='arch'></h2>

                        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                                <h2 class='arch'>Blog Archives</h2>

                        <?php } ?>
                
                    <?php while(have_posts()) : the_post(); ?>
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
                                        <a><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' trước'; ?></a><span class="show-time"><?php the_time('H:i | d-m-Y'); ?></span> 
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
                    <?php endwhile; else: ?>
                    <h3>Nothings found!</h3>
		</div>
            <?php endif; ?>
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
        <?php comments_template(); ?>
    </div><!--end .panel-->	
<?php get_sidebar(); ?>
<?php get_footer(); ?>                