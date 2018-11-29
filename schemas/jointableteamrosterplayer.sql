USE fantasy_rugby;

SELECT team_rosters.TeamPosition, PlayerName, PlayerPosition, Province, Rating
FROM team_rosters JOIN players
ON players.PlayerID = team_rosters.PlayerID
WHERE team_rosters.TeamID=1 AND OnTeam=1
ORDER BY team_rosters.TeamPosition ASC;

SELECT PlayerID,PlayerName, PlayerPosition, Province, Caps, Points, Rating FROM players
WHERE PlayerName="Jeremy Loughman"
ORDER BY Rating DESC;

SELECT * FROM users;

SELECT * FROM teams;

DELETE FROM teams WHERE TeamName='team';

SELECT username, score, t.TeamName 
FROM users JOIN teams t on users.TeamID = t.TeamID;

SELECT l.LeagueID,TeamName, points, wins, losses
FROM teams JOIN league_tables l on teams.TeamID = l.TeamID
WHERE l.LeagueID=1;
