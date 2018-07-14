<?
/**
 * Custom Shortcodes
 *
 * This file contains any custom shortcodes 
 *
 * @package      Core_Functionality
 * @since        1.0.0
 * @link         https://github.com/billerickson/Core-Functionality
 * @author       Jason Chafin <Jason@blackbirdconsult.com>
 * @copyright    Copyright (c) 2012, Jason Chafin
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
 
 //Jason's Test Functions

function say_hello() {
echo 'Dickhead';
}
add_shortcode('say-hello', 'say_hello');


function show_current_year(){
	return date('Y');
}
add_shortcode('show_current_year', 'show_current_year');