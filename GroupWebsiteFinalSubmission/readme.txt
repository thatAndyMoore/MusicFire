Copy the folder called "Website" into htdocs.

All thats needed for the database is in script.sql
	import that into sql and the database will be ready.

Copy paste this to the browser to access the main site:

	localhost/Website/index.php
	
Site works best in Chrome and Firefox
	Most aspects work in IE (the audio samples are not configured to work in IE to reduce the overall size of the website) but if possible please use one of the afformentioned browsers.


NOTE: The banner of our website is a link to the index.php page, so any time you wish to return there click the banner.
NOTE: The browse buttons all work, but there is a limited number of albums available, so if some letters show a blank page that is to be expected, the letters which have albums are as follows:
	B
	D
	G
	H
	L
	M
	O
	P
	Q
	R
	S
	T
	V

By default, there will be no users, so you will need to register (there are no required entry types to make this easy, but the fields marked required do need to have some sort of input)

Upon registering the "Albums you bought from" field and the library page will be empty. (these populate as 'purchases' are made)

Here is a list of albums which actually have songs loaded(the other albums will still populate what they can on the albums.php page but will have no songs):

	Daft Punk - Discover
	The Mighty Mighty Bosstones - Don't Know How To Party (under the T link for The)
	Tim Armstrong - A Poet's Life

NOTE: the "$.99" buttons will only show if you are logged in to an account, if you are not logged in you will be able to preview and see the songs, but not "buy".

Upon buying at least one song the library and "Albums you bought from"(on the index) fields will begin to populate, the library will list all the songs you've ever purchased, and the Albums you bought from fields will list the 6 most recent albums you bought from.