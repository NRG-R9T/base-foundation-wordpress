<?php
ob_start();
/*
This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/*********************
INCLUDE NEEDED FILES
*********************/

/*
1. library/joints.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/joints.php'); // if you remove this, Joints will break
/*
2. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
3. library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

/*********************
THUMNAIL SIZE OPTIONS
*********************/

// Thumbnail sizes
add_image_size( 'joints-thumb-600', 600, 150, true );
add_image_size( 'joints-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'joints-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'joints-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like.
*/


/*********************
MENUS & NAVIGATION
*********************/
// registering wp3+ menus
register_nav_menus(
	array(
    'main-nav'     => __( 'The Main Menu' ), // main nav in header
    'footer-links' => __( 'Footer Links' ) // secondary nav in footer
	)
);

// the main menu
function joints_main_nav() {
	// display the wp3 menu if available
  wp_nav_menu(array(
    'container'       => false,                    // remove nav container
    'container_class' => '',           // class of container (should you choose to use it)
    'menu'            => __( 'The Main Menu', 'jointstheme' ),  // nav name
    'menu_class'      => '',         // adding custom nav class
    'theme_location'  => 'main-nav',                 // where it's located in the theme
    'before'          => '',                                 // before the menu
    'after'           => '',                                  // after the menu
    'link_before'     => '',                            // before each link
    'link_after'      => '',                             // after each link
    'fallback_cb'     => 'joints_main_nav_fallback'      // fallback function
	));
} /* end joints main nav */

// the footer menu (should you choose to use one)
function joints_footer_links() {
	// display the wp3 menu if available
  wp_nav_menu(array(
    'container'       => '',                              // remove nav container
    'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    'menu'            => __( 'Footer Links', 'jointstheme' ),   // nav name
    'menu_class'      => 'nav footer-nav clearfix',      // adding custom nav class
    'theme_location'  => 'footer-links',             // where it's located in the theme
    'before'          => '',                                 // before the menu
    'after'           => '',                                  // after the menu
    'link_before'     => '',                            // before each link
    'link_after'      => '',                             // after each link
    'depth'           => 0,                                   // limit the depth of the nav
    'fallback_cb'     => 'joints_footer_links_fallback'  // fallback function
  ));
} /* end joints footer link */

// this is the fallback for header menu
function joints_main_nav_fallback() {
	wp_page_menu( array(
    'show_home'   => true,
    'menu_class'  => 'top-bar top-bar-section',      // adding custom nav class
    'include'     => '',
    'exclude'     => '',
    'echo'        => true,
    'link_before' => '',                            // before each link
    'link_after'  => ''                             // after each link
	) );
}

// this is the fallback for footer menu
function joints_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
SIDEBARS
*********************/

// Sidebars & Widgetizes Areas
function joints_register_sidebars() {
	register_sidebar(array(
    'id'            => 'sidebar1',
    'name'          => __('Sidebar 1', 'jointstheme'),
    'description'   => __('The first (primary) sidebar.', 'jointstheme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widgettitle">',
    'after_title'   => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'jointstheme'),
		'description' => __('The second (secondary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

?>


