<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<style>
.hentry
{
	border-radius:20px;
	margin: 0 0px; 
	float:left; 
	padding:20px;


	background-color:#000;
	background-image:none;
	filter:alpha(opacity=80);opacity:.8;
	background-position:center
	background-size:auto;
	width:710px;
	height:auto;
}
.hentry .entry-summary p:nth-child(even)
{
	background:#FF6;
	display:block;
	text-align:left;
	border-radius:10px;
	padding:10px;
	font-size:16px;
	width:500px;
	
}
.hentry .entry-summary p:nth-child(odd)
{
	background:#6CF;
	display:block;
	text-align:right;
	margin-left:170px;
	border-radius:10px;
	padding:10px;
	font-size:16px;
	width:500px;
}
.hentry .entry-title
{
	color:#fff;
	font-size: 25px;
	font-weight: bold;
	line-height: 1.3em;
	margin-top: 30px;
	/*padding-right:10px;*/
	margin-right:20px;
	overflow:hidden;
	
}

.hentry .entry-content p:not:first-child{
margin-top:500px;


}
.hentry .entry-content{
	margin-right:30px;
	color:#FFF;
	font:Verdana, Geneva, sans-serif;
	font-size:14px;
	
	
}

.hentry .entry-utility
{
	margin-top:80px;
	clear: both;
	color: #888;
	font-size: 12px;
	line-height: 18px;
	margin-right:20px;
}

.hentry .entry-content img{
	width:auto;
	height:auto;
	padding-bottom: inherit;
	margin-left:25px;
	margin-top:10px;
	max-width:800px;
	max-height:600px;
	
}
</style>
</head>

<body <?php body_class(); ?> <?php do_action('wp_menubar','menu'); ?>>
    		<!-- swena -->
<div id="wrapper" class="hfeed">
	<div id="header">
  
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
<!-- Swena -->						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" ><img class="logo" src="<?php bloginfo('template_directory'); ?>/images/s1.png" alt="<?php bloginfo('name'); ?>" /></a>
					</span>
      
				</<?php echo $heading_tag; ?>>
                              <div id="login" align="right">
<?php wp_loginout();?>
<?php wp_register();?>
</div>
                <div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>
            </ul>
            
           <!-- </div>
				<?php
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						// We need to figure out what the minimum width should be for our featured image.
						// This result would be the suggested width if the theme were to implement flexible widths.
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					} else {
						$header_image_width = HEADER_IMAGE_WIDTH;
					}

					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= $header_image_width ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID );
					elseif ( get_header_image() ) :
						// Compatibility with versions of WordPress prior to 3.4.
						if ( function_exists( 'get_custom_header' ) ) {
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height;
						} else {
							$header_image_width  = HEADER_IMAGE_WIDTH;
							$header_image_height = HEADER_IMAGE_HEIGHT;
						}
					?>
						<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
					<?php endif; ?>-->
			</div><!-- #branding -->
			<div id="access" role="navigation">
			  <?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
		</div><!-- #masthead -->
	</div><!-- #header -->

	<div id="main">