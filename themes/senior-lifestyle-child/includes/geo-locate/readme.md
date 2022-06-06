- Create folder "inc" in child theme folder
- Move/Copy geo-locate.php

- Add to top of header.php
	include("inc/geo-locate.php");

Get API code at, http://geoip-db.com/signup "a must have"

Using the search from https://epi.widelyhosted.com/locations/?place=phoenix
http://your_url.com/geo-test?place=Tucson

shortcode for testing... [cookie-test]

If cookies are set SL-State || SL-City no json request is made to geoip-db.com

Logic
-----
The user's IP location should only be pinged if
	1) the user does not have a cookie set
	2) the page is not a location page
	3) the page is not "find-community"

The user's cookie should be updated when either
	1) the user lands on a location page
	2) the user searches for a different locale on the "find-community" page

