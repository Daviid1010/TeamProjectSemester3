<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 25/11/2018
 * Time: 12:49
 */

/*
 *
// id7517345_fantasy_rugby thats the db name on phpmyadmin
// id7517345_daviid1010@2a02:4780:bad:c0de::13 thats the user on phpmyadmin


000webhost:
email: x16440304@student.ncirl.ie
password: sTANNIS123 (i know it looks weird)

phpmyadmin:
username: Daviid1010
password: Stannis123
 *
 *
 *  TODO Create Functions as follows:
 *
 * Make final changes to Database on players, league_tables, team_rosters, leagues
 *
 * Registration:
 * Team is created at when user is created, make it a hard coded team with s fair mix of players, some poor some good
 *
 * SELECT players
 * 2 props
 * 1 hooker
 * 2 locks
 * 3 back rows
 * 1 scrum half 1 fly half
 * 2 centres
 * 2 wingers 1 full back
 *
 *
 * Game:
 * Create function that plays two teams together
 * Allows team to play others on the league
 * Once a team has played all other teams, mark done as true
 * Once all teams are marked done as true, 1st place team gets 1000 points, 2nd place team gets 500, 3rd 250 to be added to user account
 *
 * SQL Methods to be used for this: SELECT, UPDATE, INSERT
 *
 * Create a League with user defined as admin
 *
 * Team Management:
 * Add player to team (from roster)
 * Remove player from team
 * Display List of users to choose to add to League
 *
 * SQL Methods: SELECT, INSERT, UPDATE, DELETE
 *
 * Market:
 * Sell Player to add points to user
 * Buy player to add player to roster and deduct user points
 *
 * SQL Methods: SELECT, INSERT, UPDATE, DELETE
 *
 * Twitter:
 * Newsfeed on homepage
 * function to count positive/negative tweets, create a ratio, then add that to equation which calculates rating
 *
 * AJAX to display player info on hover of card
 *
 * Provide backend to all pages
 *
 *
 *TODO Brian
 * creates a new team with the name entered by the user
INSERT INTO teams(TeamName)
VALUES
("team name entered in register form");

uses that team name to query its generated teamID, which will be used later

SELECT TeamID FROM teams WHERE TeamName="team name registered";

store the id number from this in a php variable
inserts a new user with the username, password typed in, as well as 5000 points and the team created using its teamID

INSERT INTO users (username, pword, score, TeamID)
VALUES
("username variable","password variable",5000,"teamID stored in variable");



- the 5000 in the insert user statement sets a users score to 5000 upon registration

- make sure the teamID is an int dont put it in as a string, the string above is only a placeholder

-in the query below this creates a preselected team for a new registered user just to start with, a full 15 plus 3 subs


inserts players into that users team
INSERT INTO team_rosters (TeamID,PlayerID, games, OnTeam, TeamPosition)
VALUES
("teamID",9,0,1,1), /*James Cronin
("teamID",142,0,1,3), /*Conor Carey
("teamID",27,0,1,2), /* Kevin O'Byrne
("teamID",88,0,1,4), /*Keiran Treadwell
("teamID",21,0,1,5),/* Jean Kleyn
("teamID",166,0,1,6), /*Paul Boyle
("teamID",102,0,1,7), /*Max Deegan
("teamID",7,0,1,8), /* Chris Cleote
("teamID",136,0,1,9), /*Caolin Blade
("teamID",96,0,1,10), /*Ross Byrne
("teamID",46,0,1,11),/* Alex Wooten
("teamID",16,0,1,12), /*JJ Hanrahan
("teamID",65,0,1,13), /* Rob Lyttle
("teamID",58,0,1,14), /*Craig Gilroy
("teamID",15,0,1,15), /*Mike Haley
("teamID",83,0,0,0), /*Henry Speight
("teamID",3,0,0,0),/* Tadg Beirne
("teamID",154,0,0,0); /*Finlay Bealham
 */ ?>