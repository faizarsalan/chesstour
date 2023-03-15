DROP TABLE IF EXISTS Matches;
DROP TABLE IF EXISTS Tournaments;
DROP TABLE IF EXISTS Venues;
DROP TABLE IF EXISTS Time_Controls;
DROP TABLE IF EXISTS Results;
DROP TABLE IF EXISTS Players;
DROP TABLE IF EXISTS Conditions;
DROP TABLE IF EXISTS Organizers;
DROP TABLE IF EXISTS Openings;
DROP TABLE IF EXISTS Countries;
DROP TABLE IF EXISTS Categories;

CREATE TABLE Categories
(
	name varchar (255) NOT NULL,
	id_Category integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Category) 
);

CREATE TABLE Countries
(
	name varchar (255) NOT NULL,
	capital varchar (255) NOT NULL,
	id_Country integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Country)
);

CREATE TABLE Openings
(
	ECO char (3) NOT NULL,
	name varchar (255) NOT NULL,
	variation varchar (255) NOT NULL,
	id_Opening integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Opening) 
);

CREATE TABLE Organizers
(
	name varchar (255) NOT NULL,
	CEO varchar (255) NOT NULL,
	id_Organizer integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Organizer) 
);

CREATE TABLE Conditions
(
	id_Condition integer NOT NULL AUTO_INCREMENT,
	name char (18) NOT NULL,
	PRIMARY KEY(id_Condition) 
);
INSERT INTO Conditions(id_Condition, name) VALUES(1, "Won by Resigned");
INSERT INTO Conditions(id_Condition, name) VALUES(2, "Won by Checkmate");
INSERT INTO Conditions(id_Condition, name) VALUES(3, "Won by Time");
INSERT INTO Conditions(id_Condition, name) VALUES(4, "Draw by Repetition");
INSERT INTO Conditions(id_Condition, name) VALUES(5, "Draw by Agreement");

CREATE TABLE Players
(
	firstname varchar (255) NOT NULL,
	surname varchar (255) NOT NULL,
	elo integer NOT NULL,
	title char (2) NOT NULL,
	dateofbirth date NOT NULL,
	gender char NOT NULL,
	id_Player integer NOT NULL AUTO_INCREMENT,
	fk_Countryid_Country integer NOT NULL,
	PRIMARY KEY(id_Player),
	CONSTRAINT is_from FOREIGN KEY(fk_Countryid_Country) REFERENCES Countries (id_Country) 
	ON DELETE CASCADE
);

CREATE TABLE Results
(
	state integer NOT NULL,
	id_Result integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Result),
	FOREIGN KEY(state) REFERENCES Conditions (id_Condition)
	ON DELETE CASCADE
);

CREATE TABLE Time_Controls
(
	name varchar (255) NOT NULL,
	initialtime integer NOT NULL,
	incrementtime integer NOT NULL,
	id_Time_Control integer NOT NULL AUTO_INCREMENT,
	fk_Categoryid_Category integer NOT NULL,
	PRIMARY KEY(id_Time_Control),
	CONSTRAINT part_of FOREIGN KEY(fk_Categoryid_Category) REFERENCES Categories (id_Category)
	ON DELETE CASCADE
);

CREATE TABLE Venues
(
	name varchar (255) NOT NULL,
	id_Venue integer NOT NULL AUTO_INCREMENT,
	fk_Countryid_Country integer NOT NULL,
	PRIMARY KEY(id_Venue),
	CONSTRAINT held_in FOREIGN KEY(fk_Countryid_Country) REFERENCES Countries (id_Country)
	ON DELETE CASCADE
);

CREATE TABLE Tournaments
(
	name varchar (255) NOT NULL,
	prize integer NOT NULL,
	id_Tournament integer NOT NULL AUTO_INCREMENT,
	fk_Venueid_Venue integer NOT NULL,
	fk_Organizerid_Organizer integer NOT NULL,
	fk_Time_Controlid_Time_Control integer NOT NULL,
	PRIMARY KEY(id_Tournament),
	CONSTRAINT placed_in FOREIGN KEY(fk_Venueid_Venue) REFERENCES Venues (id_Venue) ON DELETE CASCADE,
	CONSTRAINT only_for FOREIGN KEY(fk_Organizerid_Organizer) REFERENCES Organizers (id_Organizer) ON DELETE CASCADE,
	CONSTRAINT has_in FOREIGN KEY(fk_Time_Controlid_Time_Control) REFERENCES Time_Controls (id_Time_Control) ON DELETE CASCADE
);

CREATE TABLE Matches
(
	date date NOT NULL,
	roundnumber integer NOT NULL,
	id_Match integer NOT NULL AUTO_INCREMENT,
	fk_Openingid_Opening integer NOT NULL,
	fk_Playerid_Player integer NOT NULL,
	fk_Resultid_Result integer NOT NULL,
	fk_Playerid_Player1 integer NOT NULL,
	fk_Tournamentid_Tournament integer NOT NULL,
	PRIMARY KEY(id_Match),
	CONSTRAINT plays_in FOREIGN KEY(fk_Openingid_Opening) REFERENCES Openings (id_Opening) ON DELETE CASCADE,
	CONSTRAINT playertwo FOREIGN KEY(fk_Playerid_Player) REFERENCES Players (id_Player) ON DELETE CASCADE,
	CONSTRAINT includes FOREIGN KEY(fk_Resultid_Result) REFERENCES Results (id_Result) ON DELETE CASCADE,
	CONSTRAINT playerone FOREIGN KEY(fk_Playerid_Player1) REFERENCES Players (id_Player) ON DELETE CASCADE,
	CONSTRAINT is_in FOREIGN KEY(fk_Tournamentid_Tournament) REFERENCES Tournaments (id_Tournament) ON DELETE CASCADE
);

INSERT INTO `categories`(`name`, `id_Category`) VALUES ('Bullet', 1), ('Rapid', 2), ('Blitz',3), ('Classical',4);


insert into countries (name, capital, id_Country) values ('Fiji', 'Suva', 1);
insert into countries (name, capital, id_Country) values ('Finland', 'Helsinki', 2);
insert into countries (name, capital, id_Country) values ('France', 'Paris', 3);
insert into countries (name, capital, id_Country) values ('Gabon', 'Libreville', 4);
insert into countries (name, capital, id_Country) values ('Gambia', 'Banjul', 5);
insert into countries (name, capital, id_Country) values ('Georgia', 'Tbilisi', 6);
insert into countries (name, capital, id_Country) values ('Germany', 'Berlin', 7);
insert into countries (name, capital, id_Country) values ('Ghana', 'Accra', 8);
insert into countries (name, capital, id_Country) values ('Greece', 'Athens', 9);
insert into countries (name, capital, id_Country) values ('Guinea', 'Conakry', 10);
insert into countries (name, capital, id_Country) values ('Guinea-Bissau', 'Bissau', 11);
insert into countries (name, capital, id_Country) values ('Guyana', 'Georgetown', 12);
insert into countries (name, capital, id_Country) values ('Honduras', 'Tegucigalpa', 13);
insert into countries (name, capital, id_Country) values ('Hungary', 'Budapest', 14);
insert into countries (name, capital, id_Country) values ('Iceland', 'Reykjavik', 15);
insert into countries (name, capital, id_Country) values ('Indonesia', 'Jakarta', 16);
insert into countries (name, capital, id_Country) values ('Iran', 'Tehran', 17);
insert into countries (name, capital, id_Country) values ('Iraq', 'Baghdad', 18);
insert into countries (name, capital, id_Country) values ('Armenia', 'Yerevan', 19);
insert into countries (name, capital, id_Country) values ('Australia', 'Canberra', 20);
insert into countries (name, capital, id_Country) values ('Austria', 'Vienna', 21);
insert into countries (name, capital, id_Country) values ('Azerbaijan', 'Baku', 22);
insert into countries (name, capital, id_Country) values ('Bahamas', 'Nassau', 23);
insert into countries (name, capital, id_Country) values ('Bahrain', 'Manama', 24);
insert into countries (name, capital, id_Country) values ('Norway', 'Oslo', 25);
insert into countries (name, capital, id_Country) values ('Latvia', 'Riga', 26);
insert into countries (name, capital, id_Country) values ('Lithuania', 'Vilnius', 27);
insert into countries (name, capital, id_Country) values ('Estonia', 'Talinn', 28);
insert into countries (name, capital, id_Country) values ('Nepal', 'Kathmandu', 29);
insert into countries (name, capital, id_Country) values ('Netherlands', 'Amsterdam', 30);


insert into openings (ECO, name, variation, id_Opening) values ('A45', 'Queen''s Pawn Game', 'Trompowsky Attack', 1);
insert into openings (ECO, name, variation, id_Opening) values ('A46', 'Queen''s Pawn Game', 'Torre Attack', 2);
insert into openings (ECO, name, variation, id_Opening) values ('A47', 'Queen''s Indian Defence', '-', 3);
insert into openings (ECO, name, variation, id_Opening) values ('A48', 'King''s Indian', 'East Indian Defence', 4);
insert into openings (ECO, name, variation, id_Opening) values ('A51', 'Budapest Gambit', 'declined', 5);
insert into openings (ECO, name, variation, id_Opening) values ('A52', 'Budapest Gambit', '-', 6);
insert into openings (ECO, name, variation, id_Opening) values ('A53', 'Old Indian Defence', '-', 7);
insert into openings (ECO, name, variation, id_Opening) values ('A54', 'Old Indian', 'Ukrainian Variation', 8);
insert into openings (ECO, name, variation, id_Opening) values ('A55', 'Old Indian', 'Main line', 9);
insert into openings (ECO, name, variation, id_Opening) values ('B04', 'Alekhine''s Defence', 'Modern Variation', 10);
insert into openings (ECO, name, variation, id_Opening) values ('B10', 'Caro-Kann Defence', '-', 11);
insert into openings (ECO, name, variation, id_Opening) values ('B16', 'Caro–Kann', 'Bronstein-Larsen Variation', 12);
insert into openings (ECO, name, variation, id_Opening) values ('B21', 'Sicilian', 'Grand Prix Attack', 13);
insert into openings (ECO, name, variation, id_Opening) values ('B22', 'Sicilian', 'Alapin Variation', 14);
insert into openings (ECO, name, variation, id_Opening) values ('B90', 'Sicilian', 'Najdorf', 15);
insert into openings (ECO, name, variation, id_Opening) values ('C00', 'French Defence', '-', 16);
insert into openings (ECO, name, variation, id_Opening) values ('C01', 'French', 'Exchange Variation', 17);
insert into openings (ECO, name, variation, id_Opening) values ('C02', 'French', 'Advance Variation', 18);
insert into openings (ECO, name, variation, id_Opening) values ('C03', 'French', 'Tarrasch', 19);
insert into openings (ECO, name, variation, id_Opening) values ('C25', 'Vienna Game', '-', 20);
insert into openings (ECO, name, variation, id_Opening) values ('C26', 'Vienna Game', 'Falkbeer Variation', 21);
insert into openings (ECO, name, variation, id_Opening) values ('C27', 'Vienna Game', 'Frankenstein-Drakula Variation', 22);
insert into openings (ECO, name, variation, id_Opening) values ('C41', 'Philidor Defence', '-', 23);
insert into openings (ECO, name, variation, id_Opening) values ('C47', 'Four Knights Game', '-', 24);
insert into openings (ECO, name, variation, id_Opening) values ('C48', 'Four Knights Game', 'Spanish Variation', 25);
insert into openings (ECO, name, variation, id_Opening) values ('C49', 'Four Knights Game', 'Double Ruy Lopez', 26);
insert into openings (ECO, name, variation, id_Opening) values ('C51', 'Evans Gambit', '-', 27);
insert into openings (ECO, name, variation, id_Opening) values ('C88', 'Ruy Lopez', 'Closed', 28);
insert into openings (ECO, name, variation, id_Opening) values ('C89', 'Ruy Lopez', 'Marshall Counterattack', 29);
insert into openings (ECO, name, variation, id_Opening) values ('C77', 'Ruy Lopez', 'Morphy Defense', 30);


insert into organizers (name, CEO, id_Organizer) values ('Mayer, Dickinson and Goyette', 'Abie Leversuch', 1);
insert into organizers (name, CEO, id_Organizer) values ('Nikolaus Inc', 'Ermina Tudbald', 2);
insert into organizers (name, CEO, id_Organizer) values ('Blick and Sons', 'Hendrick Hendrikse', 3);
insert into organizers (name, CEO, id_Organizer) values ('Mraz, Kling and Pacocha', 'Budd Droogan', 4);
insert into organizers (name, CEO, id_Organizer) values ('Bahringer-Dibbert', 'Hannie Ubsdell', 5);
insert into organizers (name, CEO, id_Organizer) values ('Hackett-Stroman', 'Roselle Seabourne', 6);
insert into organizers (name, CEO, id_Organizer) values ('Schultz, Schmidt and Schuppe', 'Pia Coade', 7);
insert into organizers (name, CEO, id_Organizer) values ('Zieme-Ondricka', 'Constanta Wickerson', 8);
insert into organizers (name, CEO, id_Organizer) values ('Langosh and Sons', 'Cosimo Oxenham', 9);
insert into organizers (name, CEO, id_Organizer) values ('Larson-Rohan', 'Iris Tibbs', 10);
insert into organizers (name, CEO, id_Organizer) values ('Stehr LLC', 'Hayley Bedham', 11);
insert into organizers (name, CEO, id_Organizer) values ('Rolfson Inc', 'Uta Vedikhov', 12);
insert into organizers (name, CEO, id_Organizer) values ('Powlowski Inc', 'Chlo Thairs', 13);
insert into organizers (name, CEO, id_Organizer) values ('Russel-Klocko', 'Melloney Ronchetti', 14);
insert into organizers (name, CEO, id_Organizer) values ('Morar-Murazik', 'Jaquelin Ewbank', 15);
insert into organizers (name, CEO, id_Organizer) values ('Brekke Inc', 'Bobbi Ripsher', 16);
insert into organizers (name, CEO, id_Organizer) values ('Kirlin-Shields', 'Archy Molden', 17);
insert into organizers (name, CEO, id_Organizer) values ('Stiedemann-Prohaska', 'Lynea Le Provost', 18);
insert into organizers (name, CEO, id_Organizer) values ('Veum, Raynor and Dooley', 'Teador Island', 19);
insert into organizers (name, CEO, id_Organizer) values ('Walter, Veum and Prohaska', 'Rayshell Faier', 20);
insert into organizers (name, CEO, id_Organizer) values ('Dickens Group', 'Kira Franzel', 21);
insert into organizers (name, CEO, id_Organizer) values ('Zieme and Sons', 'Birgit Holbury', 22);
insert into organizers (name, CEO, id_Organizer) values ('Fadel, Brown and Bahringer', 'Farlie Lyon', 23);
insert into organizers (name, CEO, id_Organizer) values ('Weber LLC', 'Jerry Tonsley', 24);
insert into organizers (name, CEO, id_Organizer) values ('Cummerata-O''Kon', 'Barbee Priestman', 25);
insert into organizers (name, CEO, id_Organizer) values ('Parisian, Upton and Satterfield', 'Moina Francesch', 26);
insert into organizers (name, CEO, id_Organizer) values ('Lynch, Franecki and Keeling', 'Rita Orthmann', 27);
insert into organizers (name, CEO, id_Organizer) values ('Conroy-Prosacco', 'Fania Rhoades', 28);
insert into organizers (name, CEO, id_Organizer) values ('Effertz, Kozey and Steuber', 'Giusto Applegarth', 29);
insert into organizers (name, CEO, id_Organizer) values ('Abbott, Waters and Prosacco', 'Woodie Sommersett', 30);


insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Lebsack-Braun', 'Allis Rennard', 2548, 'CM', '1977-12-04', 'M', 1, 29);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Reinger Inc', 'Damian MacNeillie', 1970, 'FM', '1982-06-21', 'M', 2, 22);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Bailey-Waelchi', 'Winston Branchet', 2800, 'CM', '1977-12-08', 'F', 3, 25);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Nikolaus, Stokes and Borer', 'Alecia Brenneke', 2006, 'CM', '2001-11-04', 'M', 4, 14);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Heller Inc', 'Dusty O''Doherty', 2417, 'IM', '1957-12-19', 'M', 5, 15);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Tremblay Inc', 'Maggie Rens', 2123, 'CM', '1994-01-12', 'M', 6, 6);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Walter, Jacobi and Durgan', 'Felice Royston', 2498, 'CM', '1975-11-01', 'M', 7, 29);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Kunde, Kozey and Purdy', 'Gabbi Stonham', 2738, 'IM', '1971-11-25', 'F', 8, 9);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Beatty-Gusikowski', 'Marlena Deevey', 2859, 'CM', '1998-02-24', 'F', 9, 7);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Mueller LLC', 'Karleen Alderwick', 2738, 'FM', '1957-11-29', 'M', 10, 26);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Jones, Leffler and Bartoletti', 'Levey Eakly', 2082, 'GM', '1998-07-14', 'M', 11, 11);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Tremblay Group', 'Dave Bartens', 2083, 'IM', '1992-09-11', 'F', 12, 12);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Kihn-Rogahn', 'Rhetta Witherby', 2052, 'IM', '1995-01-25', 'M', 13, 18);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('McDermott-Carroll', 'Nell Mowle', 2878, 'CM', '1993-02-01', 'F', 14, 29);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Stark Group', 'Deeyn Cran', 2613, 'GM', '1993-04-21', 'M', 15, 1);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Larkin-Farrell', 'Silvie Minero', 2188, 'GM', '2007-09-20', 'M', 16, 5);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Corwin-Fadel', 'Junia Matijevic', 2512, 'CM', '2002-03-28', 'F', 17, 6);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Schamberger-Carroll', 'Olivie Longfellow', 2039, 'CM', '1992-10-23', 'F', 18, 30);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Roob, Price and Halvorson', 'Dedra Brock', 2387, 'FM', '1989-06-02', 'M', 19, 15);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Zboncak Inc', 'Blanch Hadley', 2233, 'FM', '1976-01-29', 'M', 20, 12);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Simonis Inc', 'Brynna Pudner', 2528, 'GM', '1964-06-22', 'F', 21, 23);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Harvey LLC', 'Aundrea Speeks', 2565, 'FM', '1997-03-25', 'M', 22, 21);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Kuvalis, Swift and Cartwright', 'Halie Carlin', 2606, 'GM', '1975-08-07', 'F', 23, 16);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Towne, Anderson and White', 'Denna Chansonnau', 2683, 'GM', '1958-05-14', 'M', 24, 18);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Simonis, Hilll and Cole', 'Correy Sole', 2333, 'IM', '1984-10-12', 'F', 25, 10);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Nikolaus Group', 'Jenelle Edgington', 2310, 'IM', '1980-06-13', 'M', 26, 28);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Frami Inc', 'Dominga McBean', 2833, 'IM', '1997-02-04', 'M', 27, 9);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Marquardt-Kemmer', 'Jessey Charpling', 1962, 'IM', '1975-03-27', 'M', 28, 18);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Wilkinson-Oberbrunner', 'Hube Petric', 2264, 'FM', '1958-09-01', 'F', 29, 20);
insert into players (firstname, surname, elo, title, dateofbirth, gender, id_Player, fk_Countryid_Country) values ('Schneider LLC', 'Danni Revie', 2185, 'FM', '1991-05-15', 'F', 30, 25);


insert into venues (name, id_Venue, fk_Countryid_Country) values ('Bamity', 1, 13);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Tres-Zap', 2, 2);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Konklux', 3, 24);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Zoolab', 4, 23);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Tresom', 5, 3);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Aerified', 6, 6);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Daltfresh', 7, 10);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Solarbreeze', 8, 9);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Sub-Ex', 9, 16);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Zamit', 10, 4);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Voyatouch', 11, 25);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Andalax', 12, 30);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Lotlux', 13, 4);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Gembucket', 14, 22);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Lotlux', 15, 6);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Stronghold', 16, 10);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Cardify', 17, 26);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Quo Lux', 18, 15);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Gembucket', 19, 16);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Daltfresh', 20, 12);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Voyatouch', 21, 9);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Quo Lux', 22, 13);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Otcom', 23, 2);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Bitwolf', 24, 18);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Redhold', 25, 26);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Viva', 26, 20);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Cardify', 27, 26);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Regrant', 28, 6);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Trippledex', 29, 12);
insert into venues (name, id_Venue, fk_Countryid_Country) values ('Rank', 30, 17);


INSERT INTO `time_controls`(`name`, `initialtime`, `incrementtime`, `id_Time_Control`, `fk_Categoryid_Category`) VALUES 
('World Championship Classical','120','30',1,4),
('Club Classical','40','2',2,4),
('30 Rapid','30','0',3,2),
('15 Rapid','15','10',4,2),
('3 Blitz','3','2',5,3),
('5 Blitz','5','5',6,3),
('2 Bullet','2','1',7,1),
('1 Bullet','1','0',8,1);


insert into results (state, id_Result) values (3, 1);
insert into results (state, id_Result) values (1, 2);
insert into results (state, id_Result) values (5, 3);
insert into results (state, id_Result) values (5, 4);
insert into results (state, id_Result) values (3, 5);
insert into results (state, id_Result) values (4, 6);
insert into results (state, id_Result) values (3, 7);
insert into results (state, id_Result) values (5, 8);
insert into results (state, id_Result) values (2, 9);
insert into results (state, id_Result) values (5, 10);
insert into results (state, id_Result) values (3, 11);
insert into results (state, id_Result) values (2, 12);
insert into results (state, id_Result) values (1, 13);
insert into results (state, id_Result) values (5, 14);
insert into results (state, id_Result) values (4, 15);
insert into results (state, id_Result) values (3, 16);
insert into results (state, id_Result) values (3, 17);
insert into results (state, id_Result) values (3, 18);
insert into results (state, id_Result) values (4, 19);
insert into results (state, id_Result) values (1, 20);
insert into results (state, id_Result) values (4, 21);
insert into results (state, id_Result) values (4, 22);
insert into results (state, id_Result) values (5, 23);
insert into results (state, id_Result) values (4, 24);
insert into results (state, id_Result) values (2, 25);
insert into results (state, id_Result) values (3, 26);
insert into results (state, id_Result) values (5, 27);
insert into results (state, id_Result) values (1, 28);
insert into results (state, id_Result) values (2, 29);
insert into results (state, id_Result) values (2, 30);


insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Topiczoom', 15601, 1, 18, 24, 1);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Cogibox', 17467, 2, 30, 11, 2);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Jaxworks', 30301, 3, 30, 28, 2);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Meevee', 33688, 4, 16, 1, 2);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Npath', 97234, 5, 17, 23, 3);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Chatterpoint', 48765, 6, 6, 2, 5);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Vinder', 54884, 7, 11, 3, 5);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Bubblebox', 92021, 8, 1, 8, 2);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Zoomdog', 75452, 9, 29, 27, 4);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Tagtune', 33684, 10, 3, 18, 8);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Photolist', 19751, 11, 3, 8, 8);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Livetube', 377, 12, 29, 9, 4);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Zoomzone', 17305, 13, 14, 20, 1);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Agimba', 85417, 14, 30, 4, 7);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Thoughtworks', 8369, 15, 5, 23, 4);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Eadel', 23465, 16, 22, 22, 4);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Janyx', 58422, 17, 7, 22, 8);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Thoughtsphere', 43846, 18, 2, 19, 2);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Yotz', 15279, 19, 9, 11, 2);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Edgepulse', 58757, 20, 18, 5, 5);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Realmix', 40986, 21, 8, 25, 6);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Plajo', 25409, 22, 25, 20, 4);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Gevee', 67428, 23, 25, 30, 5);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Pixonyx', 26275, 24, 21, 8, 5);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Yoveo', 19159, 25, 22, 28, 6);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Livetube', 37106, 26, 23, 20, 6);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Topicshots', 84086, 27, 24, 9, 8);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Thoughtstorm', 20296, 28, 8, 10, 6);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Meedoo', 31694, 29, 20, 12, 4);
insert into tournaments (name, prize, id_Tournament, fk_Venueid_Venue, fk_Organizerid_Organizer, fk_Time_Controlid_Time_Control) values ('Shuffletag', 68818, 30, 12, 25, 1);

