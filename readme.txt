=== Sabines Zoom Gallery ===
Contributors: sabinevi
Tags: image, photo, gallery, inner zoom, captions, javascript, jquery
Requires at least: 3.5.0
Tested up to: 3.5.1
Stable Tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Creates a gallery of all the attached images to a page or post, with an inner zoom to the full image.

== Description ==

Have a nice inner zoom on your gallery images. It shows only the large images, no thumbs, and shows an inner zoom onmouseover.

This is my first plugin, originally build for a customer who couldn't find a gallery plugin that fitted his needs exactly:
no gallery of thumbnails that should be clicked on, this is just a list of the large images that have an inner zoom to the full image.

I used the jQuery plugin Image Zoom by elevate zoom for the inner zoom effect (see http://www.elevateweb.co.uk/image-zoom/examples#inner-zoom) .

In this first version there are no configuration options yet, but I'm willing to add that if anyone is interested, just let me know.

If you want to use this gallery, simply use the [sabineszoom] shortcode in your post or page, or add <?php echo do_shortcode('[sabineszoom]'); ?> within the loop, to your template.

Please let me know if you need help or have a feature request!

== Installation ==
Unzip and activate.

Set the right size for the Large size image on the Settings > Media page BEFORE uploading your images to your post or page.

== Frequently Asked Questions ==

= There's no inner zoom effect on my images =

Check the dimensions of the original image and the dimensions set in Settings > Media > Large size. 
Your original image should be larger than the dimensions set for the large image in the Media settingspage.

= How about captions? =

If you have a text in the captions area of your image in the Media Library, it is shown on the picture. The text disappears on mouseover. If you don't want the captions to be shown but don't want to delete them, use a display: none; in your stylesheet. 
You can change the style of the captions by overriding the css in your own stylesheet.

= How do I use the medium sized image instead of the large image in the gallery view? =

That is not possible yet but let me know if that is a feature you would like me to add.

== Screenshots ==

1. Upload the pictures in which you want the zoom effect when you are editing your page or post. That way they get attached to it. Add the shortcode [sabineszoom] to the text.
2. View the images already uploaded to the current page or post by selecting *'Uploaded to this page'* option from the pulldown menu. Don't insert the images into the textfield.

== Changelog ==

= 0.1 =
* First version April 2013
