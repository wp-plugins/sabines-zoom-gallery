<?php
/*
Plugin Name: Sabines Zoom Gallery
Plugin URI: http://www.sabine.nl/innerzooom-test/
Description: Gallery plugin to make the large pic to zoom into the full version, no thumbnails
Version: 0.1
Author: Sabine Visser
Author URI: http://www.sabine.nl
License: GPL2
*/

/*
Sabines Zoom Gallery (Wordpress Plugin)
Copyright (C) 2013 Sabine Visser
Contact me at http://www.sabine.nl

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

$sabineZoomGallery = new SabinesZoomGallery();

class SabinesZoomGallery {
	
	function __construct() {
    	add_shortcode('sabineszoom', array($this, 'generate_gallery'));
	
		wp_enqueue_script('jquery');
	    wp_register_script('sabineszoomgalleryscript', WP_PLUGIN_URL . '/sabines-zoom-gallery/js/jquery.elevateZoom-2.5.5.min.js', array('jquery'), null, true);
	    wp_enqueue_script('sabineszoomgalleryscript');

		add_action('wp_head', array(&$this,'addJsZoomInit'));

	    wp_register_style('sabineszoomgallerystylesheet', WP_PLUGIN_URL . '/sabines-zoom-gallery/css/sabines-style.css');
	    wp_enqueue_style('sabineszoomgallerystylesheet'); 
    }
	
	
	/**
	* @param $attr array with user input in shortcode - unused for now
	* @return html-string
	**/
	function generate_gallery($attr) {

		global $post;
		$gallery = '';
		
		// get all attachments of the current post
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $post->ID,
			'post_mime_type' => 'image',
			'post_status' => 'inherit'
			);

		$attachments = get_posts( $args );
		if ( $attachments ) {
			
			foreach ( $attachments as $attachment ) {
				$aImgLarge	= wp_get_attachment_image_src( $attachment->ID, 'large' );
				$aImgFull	= wp_get_attachment_image_src( $attachment->ID, 'full' );
				
				$gallery .= '<div class="zoomer-wrapper">'."\n\t";
				$gallery .= '<img class="zoomer" src="'.$aImgLarge[0].'" data-zoom-image="'.$aImgFull[0].'" />'."\n\t";
				if( !empty($attachment->post_excerpt) ) {
					$gallery .= '<span class="zoomer-caption">'.$attachment->post_excerpt.'</span>'."\n";
				}
				$gallery .= '</div>'."\n";
			}

		}
		return $gallery;
	}
	
	/**
	* add initscript to head section
	**/
	function addJsZoomInit() {
		echo '<script>
			jQuery(window).load(function(){
				jQuery(".zoomer").elevateZoom({ zoomType: "inner", cursor: "crosshair"});
			});
			</script>';
	}
}