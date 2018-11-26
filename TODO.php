<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 25/11/2018
 * Time: 12:49
 */

/*
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
 */