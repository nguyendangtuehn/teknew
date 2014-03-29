<?php get_header(); ?>
    <div id="main-wrap">
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-7 col-lg-8">
                <div class="panel">
                    <?php if (have_posts()) : ?>

                    <h2 class="arch">Kết quả tìm kiếm</h2>

                        <?php while(have_posts()) : the_post(); ?>
                            <div class='post'  <?php post_class() ?> id="post-<?php the_ID(); ?>">
                                <div class='headTitle'>
                                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                    <ul class='postDetail'>
                                        <li class="source">
                                            Nguồn: <a href="#">Tinh Tế</a>
                                        </li>
                                        <li class="cat">
                                            Chuyên mục: <a href=""><?php the_category(); ?></a>
                                        </li>
                                        <li class="comt">
                                            Bình luận: <?php comments_popup_link('0 comment', '1 comment', '% comments','comment-link'); ?>
                                        </li>
                                    </ul>
                                </div><!--end .headTitle-->
                                <div class="imgThumb">
                                    <a href='<?php the_permalink(); ?>'><?php the_post_thumbnail(); ?></a>
                                </div>
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                             </div><!--end .post-->
                        <?php endwhile; else: ?>
                        <div class="notfound">
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

                  