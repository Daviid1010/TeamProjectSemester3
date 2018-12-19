USE fantasy_rugby;

SELECT team_rosters.TeamPosition, team_rosters.PlayerID, PlayerName, PlayerPosition, Province, Rating
FROM team_rosters JOIN players
ON players.PlayerID = team_rosters.PlayerID
WHERE team_rosters.TeamID=1 AND OnTeam=1
ORDER BY team_rosters.TeamPosition ASC;

SELECT team_rosters.TeamPosition, team_rosters.PlayerID, PlayerName, PlayerPosition, Province, Rating
FROM team_rosters JOIN players
ON players.PlayerID = team_rosters.PlayerID
WHERE team_rosters.TeamID=1 AND OnTeam=0;


SELECT PlayerName, team_rosters.PlayerID
FROM team_rosters JOIN players
ON players.PlayerID = team_rosters.PlayerID
WHERE team_rosters.TeamID=1 AND players.PlayerName="Andrew Conway";

SELECT PlayerID,PlayerName FROM players WHERE PlayerName="Keith Earls";

SELECT PlayerID FROM players WHERE PlayerName="Ronan O'Mahony";

SELECT * FROM teams;

SELECT PlayerID,PlayerName, PlayerPosition, Province, Caps, Points, Rating, ImageFilePath FROM players
WHERE PlayerName="Brian Scott"
ORDER BY Rating DESC;

SELECT * FROM users;

SELECT * FROM teams;

SELECT TeamID FROM users WHERE Username='jack';


SELECT  teams.teamName, points, wins, losses 
FROM league_tables JOIN teams
ON teams.TeamID =  league_tables.TeamID
WHERE LeagueID = 1
ORDER BY league_tables.points DESC;

DELETE FROM teams WHERE TeamName='Dummys';

SELECT username, score, t.TeamName 
FROM users JOIN teams t on users.TeamID = t.TeamID;

SELECT l.LeagueID,TeamName, points, wins, losses
FROM teams JOIN league_tables l on teams.TeamID = l.TeamID
WHERE l.LeagueID=1;

UPDATE team_rosters SET TeamPosition = NULL AND OnTeam=0   WHERE TeamPosition=15;

UPDATE team_rosters SET OnTeam=1 AND TeamPosition=11 WHERE TeamID=1 AND PlayerID=53;
UPDATE team_rosters SET OnTeam=1 AND TeamPosition=14 WHERE TeamID=1 AND PlayerID=11;

INSERT INTO team_rosters (TeamID,PlayerID, games, OnTeam, TeamPosition)
VALUES
(1,47,0,0,null),
(1,102,0,0,null),
(1,53,0,0,null);
