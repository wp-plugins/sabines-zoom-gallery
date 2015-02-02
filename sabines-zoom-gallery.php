<?php
/*
Plugin Name: Sabines Zoom Gallery
Plugin URI: http://www.sabine.nl/innerzooom-test/
Description: Gallery plugin to make the large pic to zoom into the full version, no thumbnails
Version: 0.3.1
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
    
    protected $showLightBox;
    
    /**
     * register shortcode
     * load zoom javasscript
     * load zoom stylesheet 
     */
    function __construct() {
		
        // setup the gallery, this might update the value of $this->showLightBox;
        add_shortcode('sabineszoom', array($this, 'sv_generate_gallery'));

        // @TODO move this somewhere else where it's not loaded if there's no gallery
        add_action('wp_head', array(&$this,'sv_add_js_zoom_init'));

        add_action( 'wp_enqueue_scripts', array(&$this,'sv_add_styles_and_scripts') );
    }


    /**
    * @param $attr array with user input in shortcode
    * @return html-string
    **/
    function sv_generate_gallery($attr) {

        global $post;
        $gallery        = '';
        $sizeToShow     = 'large'; // defaults to the large image
        $aPossibleSizes = array('thumbnail','medium','large');
        $this->showLightBox = false;
        
        // extract attributes if any
        if(isset($attr['showsize']) && in_array($attr['showsize'],$aPossibleSizes,true)) {
            $sizeToShow = $attr['showsize'];
        }
        if(isset($attr['thickbox'])) {
            $this->showLightBox = true;
        }

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
                $aImgLarge	= wp_get_attachment_image_src( $attachment->ID, $sizeToShow );
                $aImgFull	= wp_get_attachment_image_src( $attachment->ID, 'full' );

                $gallery .= '<div class="zoomer-wrapper">'."\n\t";
                // check for lightbox
                if( $this->showLightBox ) {
                    $gallery .= '<a href="'.$aImgFull[0].'" rel="tb-gallery" class="thickbox"><img class="zoomer" src="'.$aImgLarge[0].'" data-zoom-image="'.$aImgFull[0].'" /></a>'."\n\t";
                } 
                else {
                    $gallery .= '<img class="zoomer" src="'.$aImgLarge[0].'" data-zoom-image="'.$aImgFull[0].'" />'."\n\t";
                }
				// caption
                if( !empty($attachment->post_excerpt) ) {
                    $gallery .= '<span class="zoomer-caption">'.$attachment->post_excerpt.'</span>'."\n";
                }
                $gallery .= '</div>'."\n";
                
            }
            
        }
        return $gallery;
    }
    
    
    /**
     * new way to add javascripts and stylesheets to the queue
     */
    function sv_add_styles_and_scripts() {

        wp_enqueue_style('sabineszoomgallerystylesheet', WP_PLUGIN_URL . '/sabines-zoom-gallery/css/sabines-style.css',false); 

        wp_enqueue_script('jquery');

        wp_enqueue_script('sabineszoomgalleryscript', WP_PLUGIN_URL . '/sabines-zoom-gallery/js/jquery.elevateZoom-2.5.5.min.js', false);
		
		// @TODO find a way to not add these two if thickbox is not desired
		wp_enqueue_script('thickbox', null,  array('jquery'));
		
		wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
		
    }

	   
    /**
    * add initscript to head section
    **/
    function sv_add_js_zoom_init() {
		
        echo '<script>
                jQuery(window).load(function(){
                    jQuery(".zoomer").elevateZoom({ zoomType: "inner", cursor: "crosshair"});
                });
            </script>';
		echo '<style>#TB_window { z-index: 999; }</style>';
    }
}

