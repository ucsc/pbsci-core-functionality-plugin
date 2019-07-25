<?php
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

/**
 *
 * Show current year
 * use: [show_current_year]
 *
 **/
function show_current_year(){
	return date('Y');
}
add_shortcode('show_current_year', 'show_current_year');

/**
 *
 * List all departments (used in footer)
 * use: [footer-dept-loop]
 *
 **/
function footer_dept_loop() {
	$output = '<ul class="footer-departments-list">';
	// Call Departments post
	$args = array (
		'post_type' => 'department',
		'orderby' => 'title',
		'order' => 'ASC',
		);
	$department_query = new WP_Query ($args);
	if($department_query->have_posts()): while ($department_query->have_posts()):$department_query->the_post();
	//Set up the parts
	$department_title = get_the_title();
	$department_url = get_field('department_website');
	//Construct the parts
	if ($department_title !=""){
		$output .= '<li><a class="chevron-right-white-small" href="'.esc_url($department_url).'">'.$department_title.'</a></li>';
	}
	wp_reset_postdata();
endwhile; endif;
$output .= '</ul>';
return $output;
	}
add_shortcode('footer-dept-loop', 'footer_dept_loop');

/**
 *
 * Footer Social
 * adds social icons and links (intended for footer widget)
 * Social icons and links are entered into Theme Settings
 * Requires Advanced Custom Fields
 *
 * use: [footer-social]
 *
 **/
function footer_social(){
	if (class_exists('acf')){
	$rows = get_field('social_media_property','option');
	if ($rows){
		$social = '<ul class="footer-social flex-wrap">';
		foreach ($rows as $row) {
			if ($row['social_media_site'] == 'Facebook') :
				$iconClass = "fa-facebook-f";
			elseif ($row['social_media_site'] == 'Twitter') :
					$iconClass = "fa-twitter";
			elseif ($row['social_media_site'] == 'Instagram') :
					$iconClass = "fa-instagram";
			elseif ($row['social_media_site'] == 'Pinterest') :
					$iconClass = "fa-pinterest-p";
			elseif ($row['social_media_site'] == 'LinkedIn') :
					$iconClass = "fa-linkedin-in";
			elseif ($row['social_media_site'] == 'YouTube') :
					$iconClass = "fa-youtube";
			elseif ($row['social_media_site'] == 'Vimeo') :
					$iconClass = "fa-vimeo";
			elseif ($row['social_media_site'] == 'Flickr') :
					$iconClass = "fa-flickr";
			elseif ($row['social_media_site'] == 'Medium') :
					$iconClass = "fa-medium";
			elseif ($row['social_media_site'] == 'Tumblr') :
					$iconClass = "fa-tumblr";
			elseif ($row['social_media_site'] == 'Snapchat') :
					$iconClass = "fa-snapchat-ghost";
			elseif ($row['social_media_site'] == 'Google+') :
					$iconClass = "fa-google-plus";
			elseif ($row['social_media_site'] == 'Choose one') :
					$iconClass = "";
			endif;
				$social .= '<li><a href="'.$row['social_media_link'].'" title="'.$row['social_media_site'].'"><i class="fab '.$iconClass.'" aria-hidden="true"></i></a></li>';
			}
		$social .= '</ul>';
		}
	}
	return $social;
}
add_shortcode('footer-social', 'footer_social');

/**
 *
 * Footer logo
 * adds logo with CTA text (intended for footer widget)
 *
 * use: [footer-logo]
 *
 **/
function footer_logo(){
	$logo = '<img src="'.IMAGES.'/science-logo.svg" alt=""/>';
	$logo .= '<p class="newsletter-cta">Get our monthly <span class="impact">Impact</span><span class="report">Report</span> for new world changing discoveries, interesting events, awards, unique opportunities, &amp; much more!</p>';
	return $logo;
}
add_shortcode('footer-logo','footer_logo');

/**
 *
 * Impact Report
 * stylized title of the Impact Report
 *
 * use: [impact-report]
 *
 **/
function impact_report(){

	$impactReport = '<span class="impact">Impact</span><span class="report">Report</span>';
	return $impactReport;
}
add_shortcode('impact-report','impact_report');

/**
 *
 * Resources Links
 * returns list of resource links
 * Links are added in Theme Settings
 * Requires Advanced Custom Fields
 *
 * use: [resources-shortcode]
 *
 **/
function resources_shortcode(){
	if (class_exists('acf')){
		if (have_rows('resource_links','option')):
			$resourceList = '<ul class="footer-resources-list">';
			while (have_rows('resource_links','option')): the_row();
				$resources = get_sub_field('resources');
					if ($resources) {
						$resourceUrl = $resources['url'];
						$resourceTitle = $resources['title'];
						$resourceTarget = $resources['target'] ? $resources['target'] : '_self';
					}
				$resourceList .= '<li><a class="chevron-right-yellow-small" href="'.esc_url($resourceUrl).'" target"'.esc_attr($resourceTarget).'">'.esc_html($resourceTitle).'</a></li>';
			endwhile;
		endif;
		$resourceList .= '</ul>';
		return $resourceList;
	}
}
add_shortcode('resources-shortcode','resources_shortcode');