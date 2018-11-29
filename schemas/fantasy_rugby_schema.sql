DROP DATABASE IF EXISTS fantasy_rugby;
CREATE DATABASE fantasy_rugby;

USE fantasy_rugby;

/*USE id7517345_fantasy_rugby;*/
DROP TABLE IF EXISTS players; 
CREATE TABLE players (
	PlayerID INTEGER AUTO_INCREMENT NOT NULL,
    PlayerName VARCHAR(22),
    PlayerPosition VARCHAR(22),
    Province VARCHAR(20),
    Caps INTEGER,
    Points INTEGER,
    Ireland Binary,
    Lions Binary,
    TwitterRatio DOUBLE,
    Rating INTEGER as ((50 + ((Points/Caps)*10) + (Ireland*50) + (Lions * 100))*TwitterRatio),
    ImageFilePath VARCHAR(100),
    PRIMARY KEY (PlayerID)
    );
    
    
DROP TABLE IF EXISTS teams;
CREATE TABLE teams (
	TeamID INTEGER AUTO_INCREMENT NOT NULL,
    TeamName VARCHAR(22),
    PRIMARY KEY (TeamID)
    );

    
DROP TABLE IF EXISTS users;
CREATE TABLE users (
	UserID INTEGER AUTO_INCREMENT NOT NULL,
    username VARCHAR(22),
    pword VARCHAR(30),
    score INTEGER,
    TeamID INTEGER,
    PRIMARY KEY (UserID),
    FOREIGN KEY (TeamID) REFERENCES teams(TeamID)
    );


DROP TABLE IF EXISTS leagues;
CREATE TABLE leagues (
	LeagueID INTEGER AUTO_INCREMENT NOT NULL,
    league_name VARCHAR(25),
    userAdmin INTEGER,
    PRIMARY KEY (LeagueID),
    FOREIGN KEY (userAdmin) REFERENCES users(UserID)
);

DROP TABLE IF EXISTS team_rosters; 
CREATE TABLE team_rosters (
	TeamRosterID INTEGER AUTO_INCREMENT NOT NULL,
    TeamID INTEGER,
    PlayerID INTEGER,
    games INTEGER,
    OnTeam BINARY,
    TeamPosition INTEGER,
    PRIMARY KEY (TeamRosterID),
    FOREIGN KEY (TeamID) REFERENCES teams(TeamID),
    FOREIGN KEY (PlayerID) REFERENCES players(PlayerID)
);

DROP TABLE IF EXISTS league_tables;
CREATE TABLE league_tables (
	LeagueTableID INTEGER AUTO_INCREMENT NOT NULL,
    TeamID INTEGER,
    LeagueID INTEGER,
    points INTEGER,
    games INTEGER,
    wins INTEGER,
    losses INTEGER,
    PRIMARY KEY (LeagueTableID),
    FOREIGN KEY (TeamID) REFERENCES teams(TeamID),
    FOREIGN KEY (LeagueID) REFERENCES leagues(LeagueID)
);

