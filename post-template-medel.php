<?php
/*
 * Template Name: Medel Post Template
 * Template Post Type: post
 */

?>

<html <?php language_attributes(); ?> >
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php $options = get_nectar_theme_options(); ?>

<?php if(!empty($options['responsive']) && $options['responsive'] == 1) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

<?php } else { ?>
	<meta name="viewport" content="width=1200" />
<?php } ?>	

<!--Shortcut icon-->
<?php if(!empty($options['favicon']) && !empty($options['favicon']['url'])) { ?>
	<link rel="shortcut icon" href="<?php echo nectar_options_img($options['favicon']); ?>" />
<?php } ?>

<?php wp_head(); ?>

<?php if(!empty($options['google-analytics'])) echo $options['google-analytics']; ?> 

</head>

<?php
global $post; 

?>

<body id="<?php if ( is_front_page()){

    echo "home";

} else {

    echo "sub";

} ?>">

<div class="top-bar">

   <div class="mob-nav">
    <div class="lang">
        <div class="dropdown">
          <span class="orange">select language<i class="far fa-angle-down"></i> </span>
          <div class="dropdown-content">
            <?php do_action('wpml_add_language_selector'); ?>
          </div>
         </div><!-- dropdown -->
        </div><!-- lang -->
        <div class="mobile-menu">         
            <nav role="navigation">
                  <div id="menuToggle">
                    
                    <input type="checkbox" />

                    <span></span>
                    <span></span>
                    <span></span>

                    
                    <ul id="menu">
                      <?php wp_nav_menu( array('theme_location' => 'top_nav', 'items_wrap' => '%3$s' ) );  ?>
                      <?php wp_nav_menu( array( 'theme_location' => 'top-bar', 'items_wrap' => '%3$s' ) ); ?>
                    </ul>
                  </div>
            </nav>
        </div><!-- mobile-menu -->     
    </div><!-- mob-nav -->
    
    <div class="container">
        <div class="desk-nav">
       <div class="lang">
        <div class="dropdown">
          <span class="orange">select language<i class="far fa-angle-down"></i> </span>
          <div class="dropdown-content">
            <?php do_action('wpml_add_language_selector'); ?>
          </div>
         </div><!-- dropdown -->
        </div><!-- lang -->
         
        <?php wp_nav_menu( array( 'theme_location' => 'top-bar' ) ); ?>           

<!--
        <form action="/" method="get" class="searchbar">
                    <input class="searchfield" type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="ZOEKTERM" />
        </form>
-->
        </div>  <!-- desk-nav -->
        
    </div><!-- container -->
</div><!-- top-bar -->

<div class="container">

<?php if ( is_front_page() ) { ?>
    <div class="orange-big"></div>
<?php } else { ?>
    <div class="orange-small"></div>
<?php } ?>

</div><!-- container -->
<div class="logo clearfix">
   <div class="container">
    <a href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/logo.svg'; ?>" alt="Bedrijvenpark Medel logo" width="400" height="139"></a>
    </div><!-- container -->
</div><!-- logo -->

<div class="header-image">
  
   <?php echo get_the_post_thumbnail( $page->ID, 'full' ); ?>   
    
    <?php if(get_field('quote')) {
       echo '<div class="container"><div class="quote"><h2>' . get_field('quote') . '</h2></div></div>' ; 
}  ?>
</div>

<div class="bottom-nav">
   <?php wp_nav_menu( array('theme_location' => 'top_nav' ) );  ?>
</div>				
<script>
  var scrollpos = window.scrollY;
  var header = document.getElementById("default");
  function add_class_on_scroll() {
      header.classList.add("fixed");
  }
  function remove_class_on_scroll() {
      header.classList.remove("fixed");
  }
  window.addEventListener('scroll', function(){ 
      scrollpos = window.scrollY;
      if(scrollpos > 639){
          add_class_on_scroll();
      }
      else {
          remove_class_on_scroll();
      }
        });
</script>

<!--
<div id="ajax-loading-screen" data-disable-fade-on-click="<?php echo (!empty($options['disable-transition-fade-on-click'])) ? $options['disable-transition-fade-on-click'] : '0' ; ?>" data-effect="<?php echo $page_transition_effect; ?>" data-method="<?php echo (!empty($options['transition-method'])) ? $options['transition-method'] : 'ajax' ; ?>">
	
	<?php if($page_transition_effect == 'horizontal_swipe') { ?>
		<div class="reveal-1"></div>
		<div class="reveal-2"></div>
	<?php } else if($page_transition_effect == 'center_mask_reveal') { ?>
		<span class="mask-top"></span>
		<span class="mask-right"></span>
		<span class="mask-bottom"></span>
		<span class="mask-left"></span>
	<?php } else { ?>
		<div class="loading-icon <?php echo (!empty($options['loading-image-animation']) && !empty($options['loading-image'])) ? $options['loading-image-animation'] : null; ?>"> 
			<?php 
			$loading_icon = (isset($options['loading-icon'])) ? $options['loading-icon'] : 'default';
			$loading_img = (isset($options['loading-image'])) ? nectar_options_img($options['loading-image']) : null;
			if(empty($loading_img)) { 
				if($loading_icon == 'material') {
					echo '<div class="material-icon">
							<div class="spinner">
								<div class="right-side"><div class="bar"></div></div>
								<div class="left-side"><div class="bar"></div></div>
							</div>
							<div class="spinner color-2">
								<div class="right-side"><div class="bar"></div></div>
								<div class="left-side"><div class="bar"></div></div>
							</div>
						</div>';
				} else {
					if(!empty($options['theme-skin']) && $options['theme-skin'] == 'ascend') { 
						echo '<span class="default-loading-icon spin"></span>'; 
					} else { 
						echo '<span class="default-skin-loading-icon"></span>'; 
					} 
				}
			} 
			 ?> 
		</div>
	<?php } ?>
</div>

<div id="ajax-content-wrap">
-->

<div class="container-wrap <?php echo ($fullscreen_header == true) ? 'fullscreen-blog-header': null; ?> <?php if($blog_type == 'std-blog-fullwidth' || $hide_sidebar == '1') echo 'no-sidebar'; ?>">

	<div class="container main-content">
		
		<div class="row">
			
			<?php 

			global $options;

//			$blog_standard_type = (!empty($options['blog_standard_type'])) ? $options['blog_standard_type'] : 'classic';
//
//			if($blog_standard_type == 'minimal')
//				$std_minimal_class = 'standard-minimal';
//			else
//				$std_minimal_class = '';
//
//			if($blog_type == 'std-blog-fullwidth' || $hide_sidebar == '1'){
//				echo '<div id="post-area" class="col '.$std_minimal_class.' span_12 col_last">';
//			} else {
//				echo '<div id="post-area" class="col '.$std_minimal_class.' span_9">';
//			}
//			
				 if(have_posts()) : while(have_posts()) : the_post(); 
					
		
					if ( floatval(get_bloginfo('version')) < "3.6" ) {
						//old post formats before they got built into the core
						 get_template_part( 'includes/post-templates-pre-3-6/entry', get_post_format() ); 
					} else {
						//WP 3.6+ post formats
						 get_template_part( 'includes/post-templates/entry', get_post_format() ); 
					} 
	
				 endwhile; endif; 
				
				?>	
        </div><!-- /row-->			    
		
	</div><!--/container-->

</div><!--/container-wrap-->
	
<?php get_footer(); ?>