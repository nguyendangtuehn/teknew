<?php get_header(); ?>
<div id="main-wrap">
    <div class="container">
        <div class="row">
            <div id="main-content" class="col-md-7 col-lg-8">
                <div class="panel">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                         <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                             <div class='headTitle'>
                                 <h1><?php the_title(); ?></h1>
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

                             <div class="entry">

                                     <?php the_content(); ?>

                                     <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

                                     <?php the_tags( 'Tags: ', ', ', ''); ?>
                             </div>
                             <?php edit_post_link('Edit this entry','','.'); ?>
                         </div>
                 <?php endwhile; endif; ?>

                 <?php comments_template(); ?>
                
            </div><!--end .panel-->	
<?php get_sidebar(); ?>
<?php get_footer(); ?>