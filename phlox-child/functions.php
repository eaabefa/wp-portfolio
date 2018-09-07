<?php
/**
 *  Functions and definitions for auxin framework
 *
 * 
 * @package    Auxin
 * @author     averta (c) 2014-2018
 * @link       http://averta.net
 */

/*-----------------------------------------------------------------------------------*/
/*  Add your custom functions here -  We recommend you to use "code-snippets" plugin instead
/*  https://wordpress.org/plugins/code-snippets/
/*-----------------------------------------------------------------------------------*/


// your code here


/*-----------------------------------------------------------------------------------*/
/*  Init theme framework
/*-----------------------------------------------------------------------------------*/
require( 'auxin/auxin-include/auxin.php' );
/*-----------------------------------------------------------------------------------*/


#Fortæller at den skal lave en action - altså at loade funktionen "my-theme-enqueue_styles" som står på linje 29
#Parameter et er hvad hvilken action den skal gøre og parameter to er navnet på den function den skal gøre noget ved
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; 
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
       
        #get_stylesheet_directory_uri henter stien til mit child theme
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function load_scripts() {

    #Her enqueuer jeg fontawesome
    #Første parameter er navnet på den style jeg gerne vil enqueue - dette er et unikt navn, og andet parameter er stien til filen som i dette tilfælde er en webadresse.
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

}

add_action('wp_enqueue_scripts','load_scripts');

?>