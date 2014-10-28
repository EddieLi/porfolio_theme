<?php 
require_once get_template_directory().'/modules/unirest-php/lib/Unirest.php';

function load_theme_script()
{
	//load javascript this way
	wp_enqueue_script( 'theme-general-script', get_template_directory_uri() . '/js/general.js', array( 'jquery' ), '', true );


}
add_action( 'wp_enqueue_scripts', 'load_theme_script' );

function load_tweenmax_script()
{
	wp_enqueue_script( 'theme-tweenmax-script', get_template_directory_uri() . '/js/TweenMax.min.js',array( 'jquery' ), '', true );
	wp_enqueue_script( 'theme-superscrollorama-script', get_template_directory_uri() . '/js/jquery.superscrollorama.js',array( 'jquery' ), '', true );
	wp_enqueue_script( 'theme-timeline-script', get_template_directory_uri() . '/js/TimelineLite.min.js',array( 'jquery' ), '', true );

}
add_action( 'wp_enqueue_scripts', 'load_tweenmax_script' );


function add_quote(){
	//https://www.mashape.com/andruxnet/random-famous-quotes
	//from mashape
	//generate random quotes from using the api

$response = Unirest::post("https://andruxnet-random-famous-quotes.p.mashape.com/cat=science",
  array(
    "X-Mashape-Key" => "dsp4teAl6KmshK4WFsVL97G6skdsp1bWL1YjsnhPBvuuoumdzS",
    "Content-Type" => "application/x-www-form-urlencoded"
  )
);
	return $response;
}

function generate_quote(){
	wp_enqueue_script( 'add_quote', get_template_directory_uri().'/js/functions.js',  array( 'jquery' ),'',  true);
	wp_localize_script( 'add_quote', 'my_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}
add_action('template_redirect', 'generate_quote');

add_action("wp_ajax_nopriv_add_quote", "add_quote");
add_action("wp_ajax_add_quote", "add_quote");


/**
* Define a constant path to our single template folder
*/
define(SINGLE_PATH, TEMPLATEPATH . '/single');

/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');

/**
* Single template function which will choose our template
*/
function my_single_template($single) {
	global $wp_query, $post;

	/**
	* Checks for single template by category
	* Check by category slug and ID
	*/
	foreach((array)get_the_category() as $cat) :

	if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
	return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';

	elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
	return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';
	else
	return SINGLE_PATH . '/single.php';

	endforeach;
}
//wordpress 3 theme support add menu
add_theme_support( 'menus' );

add_theme_support( 'post-thumbnails' ); 

/**
*Side bar function
*/

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	'name' => 'Homepage Sidebar',
	'id' => 'homepage-sidebar',
	'description' => 'Appears as the sidebar on the custom homepage',
	'before_widget' => '<div></div><li id="%1$s" class="widget %2$s ">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widgettitle"><span class="glyphicon glyphicon-list"></span>',
	'after_title' => '</h3>',
	));
}

/**
*Custom pagination function
**/

/*
Plugin Name: Category pagination fix
Plugin URI: http://www.htmlremix.com/projects/category-pagination-wordpress-plugin
Description: Fixes 404 page error in pagination of category page while using custom permalink
Version: 2.0
Author: Remiz Rahnas
Author URI: http://www.htmlremix.com

Copyright 2009 Creative common (email: mail@htmlremix.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You are allowed to use, change and redistibute without any legal issues. I am not responsible for any damage caused by this program. Use at your own risk
Tested with WordPress 2.7, 2.8.4 only. Works with wp-pagenavi
*/

/**
* This plugin will fix the problem where next/previous of page number buttons are broken on list
* of posts in a category when the custom permalink string is:
* /%category%/%postname%/
* The problem is that with a url like this:
* /categoryname/page/2
* the 'page' looks like a post name, not the keyword "page"
*/
function remove_page_from_query_string($query_string)
{
if ($query_string['name'] == 'page' && isset($query_string['page'])) {
unset($query_string['name']);
// 'page' in the query_string looks like '/2', so i'm spliting it out
list($delim, $page_index) = split('/', $query_string['page']);
$query_string['paged'] = $page_index;
}
return $query_string;
}
// I will kill you if you remove this. I died two days for this line
add_filter('request', 'remove_page_from_query_string');

//pagination cutomization
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

?>