     </div><!--end #main-content-->
<div id="sidebar" class="col-md-5 col-lg-4">
     <div class="panel"> 
        <div id="video">
            <h3>Video nổi bật</h3>
            <ul id='list-video'>
                <?php
                    global $post;
                    $args = array('numberposts'=>3, 'category'=>7, 'orderby'=>'comment_count');
                    $video_post = get_posts($args);
                    foreach ($video_post as $post) : setup_postdata($post);
                ?>
                <li>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <a href='<?php the_permalink(); ?>'><img class="aligncenter" src="<?php echo get_first_image(); ?>" alt="<?php the_title(); ?>" /></a>
                </li>
                <?php endforeach; wp_reset_postdata(); ?>
            </ul>
        </div><!--end #video-->
        <div id="popular">
            <h3>Bài viết nổi bật</h3>
            <ul id='list-popular'>
                <?php
                    global $post;
                    $args = array('numberposts'=>5,'orderby'=>'comment_count');
                    $popular_post = get_posts($args);
                    foreach($popular_post as $post) : setup_postdata($post);
                ?>
                <li>
                    <a href='<?php the_permalink(); ?>'><img class="aligncenter" src="<?php echo get_first_image(); ?>" alt="<?php the_title(); ?>" /></a>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <h2>Nguồn: <a href="#">Tinh Tế</a> | <?php the_date(); ?></h2>
                </li>
                <?php endforeach;  wp_reset_postdata(); ?>
            </ul>
        </div><!--end #popular-->
        
     </div><!--end .panel-->
    </div><!--end #sidebar-->
    </div>
     </div>
</div><!--end #main-wrap-->
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>

    <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
<?php endif; ?>
