=== wpCoordinates ===
Contributors: flix
Donate link: http://felixtriller.de/projekte/donate/
Tags: post, googlemaps, maps, links
Requires at least: 2.0
Tested up to: 2.5.1
Stable tag: 1.0	

wpCoordinates replaces coordinates between a [coord] tag with a link to Google Maps.

== Description ==
This plugin replaces coordinates, i.e. latitudes and longitues, between a [coord]-Tag with a link to Google's map service.

Example:

[coord]49.579276566362985,10.9292078018188488[/coord] comes up as [(49.5792, 10.9292)](http://maps.google.de/maps?ll=49.579276566362985,10.929207801818848&q=49.579276566362985,10.9292078018188488&t=kbd&z=15 "Google Maps")

== Installation ==

1. Download the package
1. Decompress the archive, if wished, customize the **wpCoordinates.php** and upload the wpcoordinates folder to /wp-content/plugins/ on your webspace
1. Activate **wpCoordinates** through the 'Plugins' menu in your WordPress

== Other Notes ==

To adjust the link layout of transformed links open **wpCoordinates.php** in your favorite editor and adjust the following variables: 

* `$zoom`: the zoom level, default is 15. Try some values between 1 and 17 (I guess)
* `$type`: map type, i.e. **m** for  map, **k** for a satellite image, **h** for hybride (satellite image with street names, etc.), **p** for terrain
* `$url`: URL scheme, replace **.de** with **.com** for an english version of Google Maps. DON'T forget %LAT% and %LONG%

== Screenshots ==
No screenshots, so far.

== Frequently Asked Questions ==
Ask me something.
