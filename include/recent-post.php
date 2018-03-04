<?php

function recentPost() { ?>

<?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>    
         
<?php if ($the_query -> have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post(); ?> 

<div class="latest-post boxed-content">

<?php echo get_the_post_thumbnail( $page->ID, 'medium' ); ?> 
<div class="text-in-box">
<h3><?php the_title(); ?></h3>
 
<?php the_excerpt(); ?>
</div>
<div class="btm-btn">
<a class="btn-triangle" href="<?php the_permalink() ?>">Lees Meer</a>
</div>
<?php endwhile; ?>
</div>
<?php else : ?>
<div class="noblog"></div>
<?php endif; 
wp_reset_postdata();
}      


