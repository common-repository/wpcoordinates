<?php
/*  Copyright 2008 Felix Triller  (email : info@felixtriller.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


	Plugin Name: wpCoodinates
	Plugin URI: http://felixtriller.de/projekte/wpcoordinates/
	Description: Replaces longitudes and latitudes with a link to Google Maps
	Version: 1.0
	Author: Felix Triller
	Author URI: http://felixtriller.de/
	
	Usage:
	[coord]xx.xxxx,yy.yyyy[/coord]
	
	Changelog:
		2008-05-18: 1.0
			initial release
*/

function wpCoordinates($text) {

	/* config */
	$zoom = 15;
	$type = 'h'; // m -> map, k -> satellite, h -> hybride, p -> terrain
	$url = 'http://maps.google.de/maps?ll=%LAT%,%LONG%&q=%LAT%,%LONG%8&t='.$type.'&z='.$zoom;
	
	$pattern = '@(\[coord\](.*?)\[/coord\])@';
	
	// replace every [coord]xx.xxxxx,yy.yyyyy[/coord] tags
	if (preg_match_all($pattern, $text, $match)) {
	
		for ($i = 0; $i < count($match[0]); $i++) {
			$coords = explode(',', $match[2][$i]);
			$link	= $url;
			
			if (count($coords) == 2) {
				$x = trim($coords[0]);
				$y = trim($coords[1]);
				
				$link = str_replace('%LAT%', $x, $link);
				$link = str_replace('%LONG%', $y, $link);
				
				$html = '(<a href="'.$link.'" title="Google Maps">'.substr($x, 0, 7).', '.substr($y, 0, 7).'</a>)'.PHP_EOL;
			
				$text = str_replace($match[0][$i], $html, $text);
			}
		}
		
	}
	
	return $text;
}

add_filter('the_content', 'wpCoordinates');
add_filter('the_excerpt', 'wpCoordinates');
?>
