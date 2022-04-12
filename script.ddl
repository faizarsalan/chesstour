#@(#) script.ddl

DROP TABLE IF EXISTS participates;
DROP TABLE IF EXISTS Matches;
DROP TABLE IF EXISTS Region_Country;
DROP TABLE IF EXISTS Players;
DROP TABLE IF EXISTS Countries;
DROP TABLE IF EXISTS part_of;
DROP TABLE IF EXISTS contains;
DROP TABLE IF EXISTS Venue;
DROP TABLE IF EXISTS Results;
DROP TABLE IF EXISTS States;
DROP TABLE IF EXISTS Tournament_Details;
DROP TABLE IF EXISTS Time_Controls;
DROP TABLE IF EXISTS Region;
DROP TABLE IF EXISTS Openings;
DROP TABLE IF EXISTS Categories;

CREATE TABLE Categories
(
	name varchar (255) NOT NULL,
	id_Category integer NOT NULL,
	PRIMARY KEY(id_Category)
);

CREATE TABLE Openings
(
	ECO char NOT NULL,
	name varchar (255) NOT NULL,
	variation varchar (255),
	movelist varchar (255),
	author varchar (255),
	id_Opening integer NOT NULL,
	PRIMARY KEY(id_Opening)
);

CREATE TABLE Region
(
	codeabrv char,
	name varchar (255),
	id_Region integer,
	PRIMARY KEY(id_Region)
);

CREATE TABLE Time_Controls
(
	name varchar (255) NOT NULL,
	initialtime integer NOT NULL,
	increment integer NOT NULL,
	id_Time_Control integer NOT NULL,
	PRIMARY KEY(id_Time_Control)
);

CREATE TABLE Tournament_Details
(
	name varchar (255) NOT NULL,
	price integer,
	organizer varchar (255),
	venue varchar (255),
	rounds integer,
	id_Tournament_Detail integer NOT NULL,
	PRIMARY KEY(id_Tournament_Detail)
);

CREATE TABLE States
(
	id_State integer NOT NULL,
	name char (18) NOT NULL,
	PRIMARY KEY(id_State)
);
INSERT INTO States(id_State, name) VALUES(1, 'Won_by_Resignation');
INSERT INTO States(id_State, name) VALUES(2, 'Won_by_Checkmate');
INSERT INTO States(id_State, name) VALUES(3, 'Draw_by_Repetition');
INSERT INTO States(id_State, name) VALUES(4, 'Draw_by_Agreement');

CREATE TABLE Results
(
	winner varchar (255) NOT NULL,
	loser varchar (255) NOT NULL,
	scoreone integer,
	scoretwo integer,
	state integer NOT NULL,
	id_Result integer NOT NULL,
	PRIMARY KEY(id_Result),
	FOREIGN KEY(state) REFERENCES States (id_State)
);

CREATE TABLE Venue
(
	name varchar (255),
	id_Venue integer,
	fk_Tournament_Detailid_Tournament_Detail integer NOT NULL,
	PRIMARY KEY(id_Venue),
	UNIQUE(fk_Tournament_Detailid_Tournament_Detail),
	FOREIGN KEY(fk_Tournament_Detailid_Tournament_Detail) REFERENCES Tournament_Details (id_Tournament_Detail)
);

CREATE TABLE contains
(
	fk_Time_Controlid_Time_Control integer,
	fk_Tournament_Detailid_Tournament_Detail integer,
	PRIMARY KEY(fk_Time_Controlid_Time_Control, fk_Tournament_Detailid_Tournament_Detail),
	CONSTRAINT has_contains FOREIGN KEY(fk_Time_Controlid_Time_Control) REFERENCES Time_Controls (id_Time_Control)
);

CREATE TABLE part_of
(
	fk_Categoryid_Category integer,
	fk_Tournament_Detailid_Tournament_Detail integer,
	PRIMARY KEY(fk_Categoryid_Category, fk_Tournament_Detailid_Tournament_Detail),
	CONSTRAINT part_of FOREIGN KEY(fk_Categoryid_Category) REFERENCES Categories (id_Category)
);

CREATE TABLE Countries
(
	codeabrv char,
	name varchar (255) NOT NULL,
	region varchar (255),
	capital varchar (255),
	id_Country integer NOT NULL,
	fk_Venueid_Venue integer NOT NULL,
	PRIMARY KEY(id_Country),
	FOREIGN KEY(fk_Venueid_Venue) REFERENCES Venue (id_Venue)
);

CREATE TABLE Players
(
	firstname varchar (255) NOT NULL,
	surname varchar (255) NOT NULL,
	elo integer NOT NULL,
	title varchar (255),
	dateofbirth date NULL,
	age integer,
	gender char NOT NULL,
	id_Player integer NOT NULL,
	fk_Countryid_Country integer NOT NULL,
	PRIMARY KEY(id_Player),
	CONSTRAINT is_from FOREIGN KEY(fk_Countryid_Country) REFERENCES Countries (id_Country)
);

CREATE TABLE Region_Country
(
	fk_Regionid_Region integer,
	fk_Countryid_Country integer,
	PRIMARY KEY(fk_Regionid_Region, fk_Countryid_Country),
	FOREIGN KEY(fk_Regionid_Region) REFERENCES Region (id_Region),
	FOREIGN KEY(fk_Countryid_Country) REFERENCES Countries (id_Country)
);

CREATE TABLE Matches
(
	state integer NOT NULL,
	winner varchar (255) NOT NULL,
	playerone varchar (255) NOT NULL,
	playertwo varchar (255) NOT NULL,
	date date,
	roundnumber integer NOT NULL,
	id_Match integer NOT NULL,
	fk_Openingid_Opening integer NOT NULL,
	fk_Resultid_Result integer NOT NULL,
	fk_Playerid_Player integer NOT NULL,
	fk_Playerid_Player1 integer NOT NULL,
	fk_Tournament_Detailid_Tournament_Detail integer NOT NULL,
	PRIMARY KEY(id_Match),
	UNIQUE(fk_Openingid_Opening),
	UNIQUE(fk_Resultid_Result),
	FOREIGN KEY(state) REFERENCES States (id_State),
	CONSTRAINT plays FOREIGN KEY(fk_Openingid_Opening) REFERENCES Openings (id_Opening),
	CONSTRAINT inside_of FOREIGN KEY(fk_Resultid_Result) REFERENCES Results (id_Result),
	FOREIGN KEY(fk_Playerid_Player) REFERENCES Players (id_Player),
	CONSTRAINT player2 FOREIGN KEY(fk_Playerid_Player1) REFERENCES Players (id_Player),
	CONSTRAINT plays_in FOREIGN KEY(fk_Tournament_Detailid_Tournament_Detail) REFERENCES Tournament_Details (id_Tournament_Detail)
);

CREATE TABLE participates
(
	fk_Tournament_Detailid_Tournament_Detail integer,
	fk_Playerid_Player integer,
	PRIMARY KEY(fk_Tournament_Detailid_Tournament_Detail, fk_Playerid_Player),
	CONSTRAINT participates FOREIGN KEY(fk_Tournament_Detailid_Tournament_Detail) REFERENCES Tournament_Details (id_Tournament_Detail)
);
