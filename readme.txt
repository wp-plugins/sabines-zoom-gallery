=== Sabines Zoom Gallery ===
Contributors: sabinevi
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SGZZFEAK5YSEE
Tags: image, photo, gallery, inner zoom, captions, javascript, jquery
Requires at least: 3.5.0
Tested up to: 4.1
Stable Tag: 0.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Creates a gallery of all the attached images to a page or post, with an inner zoom to the full image.

== Description ==

Have a nice inner zoom on your gallery images. It shows only the images, no clickable thumbs, and shows an inner zoom onmouseover. The zoom effect depends heavily on the resolution of the image you have uploaded; a bigger original gives a better zoom effect.

There are two configuration options to add to the shortcode: 
1. the parameter 'showsize' and the desired size (thumbnail, medium or large): `[sabineszoom showsize=medium]`
2. the parameter 'thickbox' with the value 1: `[sabineszoom thickbox=1]`
or both: `[sabineszoom showsize=medium thickbox=1]`

If you want to use this gallery, simply use the [sabineszoom] shortcode in your post or page, or add `<?php echo do_shortcode('[sabineszoom]'); ?>` within the loop, to your template.
By default the 'large' image is used, if you want the 'medium' or 'thumbnail' to show, add the parameter 'showsize' like so: `[sabineszoom showsize=medium]`. Valid options are **thumbnail**, **medium** and **large**.

This is my first plugin, originally build for a customer who couldn't find a gallery plugin that fitted his needs exactly:
no gallery of thumbnails that should be clicked on, this is just a list of the images attached to a post or page that have an inner zoom to the full image.

I used the jQuery plugin Image Zoom by elevate zoom for the inner zoom effect (see http://www.elevateweb.co.uk/image-zoom/examples#inner-zoom) .

Please let me know if you need help or have a feature request.

== Installation ==

1. Unzip and activate
2. Set the desired size for your images on the Settings > Media page **BEFORE** uploading your images to your post or page
3. Open the editor of the post or page where you want the gallery to appear
4. Upload your picture(s) by clicking the **Add media**-button just above the buttonbar. **DON'T USE** the **Insert into post** button, the images are automatically connected to the post. The zoom effect depends heavily on the resolution of the image you upload; a bigger original gives a better zoom effect.
5. Add the shortcode `[sabineszoom]` to your post or page content
6. By default the large image is used, use `[sabineszoom showsize=medium]` if you want the **medium** size or `[sabineszoom showsize=thumbnail]` for the **thumbnail** 
7. Publish the post or page.

== Frequently Asked Questions ==

= There's no or minor inner zoom effect on my images =
Check the dimensions of the original image and the dimensions set in Settings > Media. Your original image should be larger than the dimensions set for the large (or your preferred size) image in the Media settingspage.

= How about captions? =
If you have a text in the captions area of your image in the Media Library, it is shown on the picture. The text disappears on mouseover. If you don't want the captions to be shown but don't want to delete them, use a display: none; in your stylesheet. 
You can change the style of the captions by overriding the css in your own stylesheet.

= How do I use the medium or thumbnail size image instead of the large image in the gallery view? =
Use `[sabineszoom showsize=medium]` if you want the **medium** size or `[sabineszoom showsize=thumbnail]` for the **thumbnail**

== Screenshots ==

1. Upload the pictures in which you want the zoom effect when you are editing your page or post. That way they get attached to the post or page. Add the shortcode [sabineszoom] to the text.
2. View the images already uploaded to the current page or post by selecting **Uploaded to this page** option from the pulldown menu. **Don't insert the images into the textfield.**
3. By default the large image is shown
4. The caption disappears onmousever

== Changelog ==

= 0.3.1 =
* WP version update February 2015

= 0.3 =
* Added Thickbox option

= 0.2.1 =
* Renamed functions by adding a prefix to prevent confusion

= 0.2 =
* Added 'showsize' attribute to shortcode
* Enhanced script- and style enqueing

= 0.1 =
* First version April 2013

== Upgrade Notice ==

N.a.  