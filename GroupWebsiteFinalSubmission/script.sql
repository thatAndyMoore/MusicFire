CREATE DATABASE groupsite;

USE groupsite;

CREATE TABLE customer(
	CustID int(10) AUTO_INCREMENT, 
	first varchar(25), 
	middle varchar(25) NULL, 
	last varchar(35), 
	email varchar(50), 
		PRIMARY KEY(CustID));

CREATE TABLE artists(
	ArtistID int(10) AUTO_INCREMENT,
	artistname varchar(100),
		PRIMARY KEY(ArtistID));

CREATE TABLE accounts(
	UserID int(10) AUTO_INCREMENT, 
	username varchar(30), 
	password varchar(50), 
	CustID int(10),
		PRIMARY KEY(UserID),
		FOREIGN KEY(CustID) REFERENCES customer(CustID));

CREATE TABLE billing(
	BillID int(10) AUTO_INCREMENT, 
	Address1 varchar(50), 
	Address2 varchar(50), 
	City varchar(30), 
	State char(2), 
	Zip char(5), 
	CCName varchar(50), 
	CCNum char(16), 
	CCExp date, 
	CID char(4), 
	CustID int(10),
		PRIMARY KEY(BillID),
		FOREIGN KEY(CustID) REFERENCES customer(CustID));

CREATE TABLE albums(
	AlbumID int(10) AUTO_INCREMENT,
	albumname varchar(100),
	releasedate date,
	ArtistID int(10),
	cover varchar(100),
		PRIMARY KEY(AlbumID),
		FOREIGN KEY(ArtistID) REFERENCES artists(ArtistID));

CREATE TABLE orders(
	OrderID int(10) AUTO_INCREMENT,
	CustID int(10),
	orderdate DATETIME,
		PRIMARY KEY(OrderID),
		FOREIGN KEY(CustID) REFERENCES customer(CustID));

CREATE TABLE songs(
	SongID int(10) AUTO_INCREMENT,
	ArtistID int(10),
	AlbumID int(10),
	songname varchar(50),
	songfile varchar(50),
	songprev varchar(50),
		PRIMARY KEY(SongID),
		FOREIGN KEY(ArtistID) REFERENCES artists(ArtistID),
		FOREIGN KEY(AlbumID) REFERENCES albums(AlbumID));

CREATE TABLE sales(
	OrderID int(10),
	SongID int(10),
		PRIMARY KEY(OrderID, SongID),
		CONSTRAINT fk_sales_orders FOREIGN KEY(OrderID) REFERENCES orders(OrderID),
		CONSTRAINT fk_sales_songs FOREIGN KEY(SongID) REFERENCES songs(SongID));

INSERT INTO artists VALUES("0","Muse");
INSERT INTO artists VALUES("0","Tim Armstrong");
INSERT INTO artists VALUES("0","Guns 'N' Roses");
INSERT INTO artists VALUES("0","Less Than Jake");
INSERT INTO artists VALUES("0","Orgy");
INSERT INTO artists VALUES("0","Queen");
INSERT INTO artists VALUES("0","Dave Matthews Band");
INSERT INTO artists VALUES("0","Daft Punk");
INSERT INTO artists VALUES("0","The Mighty Mighty Bosstones");
INSERT INTO artists VALUES("0","Black Stone Cherry");
INSERT INTO artists VALUES("0","Gorillaz");
INSERT INTO artists VALUES("0","Linkin Park");
INSERT INTO artists VALUES("0","Smashing Pumpkins");
INSERT INTO artists VALUES("0","My Darkest Days");
INSERT INTO artists VALUES("0","Gin Blossoms");
INSERT INTO artists VALUES("0","Radiohead");
INSERT INTO artists VALUES("0","Tom Petty");
INSERT INTO artists VALUES("0","Theory Of A Dead Man");
INSERT INTO artists VALUES("0","Bon Jovi");
INSERT INTO artists VALUES("0","Pearl Jam");
INSERT INTO artists VALUES("0","Papa Roach");
INSERT INTO artists VALUES("0","Disturbed");
INSERT INTO artists VALUES("0","Live");
INSERT INTO artists VALUES("0","The Verve Pipe");
INSERT INTO artists VALUES("0","Hollywood Undead");
INSERT INTO artists VALUES("0","Volbeat");
INSERT INTO artists VALUES("0","Bad Religion");
INSERT INTO artists VALUES("0","Buck Cherry");
INSERT INTO artists VALUES("0","Dido");
INSERT INTO artists VALUES("0","Trapt");


INSERT INTO albums VALUES("0","Absolution","2003-09-15","1","Absolution.jpg");
INSERT INTO albums VALUES("0","A Poets Life","2007-05-22","2","APoetsLife.jpg");
INSERT INTO albums VALUES("0","Appetite For Destruction","1987-10-27","3","AppetiteForDestruction.jpg");
INSERT INTO albums VALUES("0","Borders And Boundaries","2000-10-24","4","BordersAndBoundaries.jpg");
INSERT INTO albums VALUES("0","Candyass","1998-08-18","5","Candyass.jpg");
INSERT INTO albums VALUES("0","Classic Queen","1992-03-03","6","ClassicQueen.jpg");
INSERT INTO albums VALUES("0","Crash","1996-04-03","7","Crash.jpg");
INSERT INTO albums VALUES("0","Discovery","2001-02-26","8","Discovery.jpg");
INSERT INTO albums VALUES("0","Dont Know How To Party","1993-05-18","9","DontKnowHowToParty.jpg");
INSERT INTO albums VALUES("0","Folklore And Superstition","2008-08-19","10","FolkloreAndSuperstition.jpg");
INSERT INTO albums VALUES("0","Gorillaz","2001-06-19","11","Gorillaz.jpg");
INSERT INTO albums VALUES("0","Notes From The Underground","2013-01-08","25","NotesFromTheUnderground.jpg");
INSERT INTO albums VALUES("0","Outlaw Gentlemen And Shady Ladies","2013-04-09","26","OutlawGentlemenAndShadyLadies.jpg");
INSERT INTO albums VALUES("0","True North","2013-01-22","27","TrueNorth.jpg");
INSERT INTO albums VALUES("0","Confessions","2013-02-19","28","Confessions.jpg");
INSERT INTO albums VALUES("0","Girl Who Got Away","2013-03-04","29","GirlWhoGotAway.jpg");
INSERT INTO albums VALUES("0","Reborn","2013-01-22","30","Reborn.jpg");
INSERT INTO albums VALUES("0","Hybrid Theory","2000-10-24","12","HybridTheory.jpg");
INSERT INTO albums VALUES("0","Mellon Collie And The Infinite Sadness","1995-10-23","13","MellonCollieAndTheInfiniteSadness.jpg");
INSERT INTO albums VALUES("0","My Darkest Days","2010-09-21","14","MyDarkestDays.jpg");
INSERT INTO albums VALUES("0","New Miserables Experience","1992-08-04","15","NewMiserableExperience.jpg");
INSERT INTO albums VALUES("0","OK Computer","1997-05-01","16","OKComputer.jpg");
INSERT INTO albums VALUES("0","Playback","1995-11-20","17","Playback.jpg");
INSERT INTO albums VALUES("0","Scars And Souvenirs","2008-04-01","18","ScarsAndSouvenirs.jpg");
INSERT INTO albums VALUES("0","Slippery When Wet","1986-08-18","19","SlipperyWhenWet.jpg");
INSERT INTO albums VALUES("0","Ten","1991-08-27","20","Ten.jpg");
INSERT INTO albums VALUES("0","The Paramour Sessions","2006-09-11","21","TheParamourSessions.jpg");
INSERT INTO albums VALUES("0","The Sickness","2000-03-07","22","TheSickness.jpg");
INSERT INTO albums VALUES("0","Throwing Copper","1994-04-19","23","ThrowingCopper.jpg");
INSERT INTO albums VALUES("0","Villains","1996-03-26","24","Villains.jpg");

INSERT INTO songs VALUES("0","8","8","Crescendolls","Crescendolls.mp3","Crescendolls.ogg");
INSERT INTO songs VALUES("0","8","8","Face To Face","FaceToFace.mp3","FaceToFace.ogg");
INSERT INTO songs VALUES("0","8","8","One More Time","OneMoreTime.mp3","OneMoreTime.ogg");
INSERT INTO songs VALUES("0","8","8","Too Long","TooLong.mp3","TooLong.ogg");
INSERT INTO songs VALUES("0","9","9","Dont Know How To Party","DontKnowHowToParty.mp3","DontKnowHowToParty.ogg");
INSERT INTO songs VALUES("0","9","9","Last Dead Mouse","LastDeadMouse.mp3","LastDeadMouse.ogg");
INSERT INTO songs VALUES("0","2","2","Hold On","HoldOn.mp3","HoldOn.ogg");
INSERT INTO songs VALUES("0","2","2","Into Action","IntoAction.mp3","IntoAction.ogg");
INSERT INTO songs VALUES("0","2","2","Wake Up","WakeUp.mp3","WakeUp.ogg");
