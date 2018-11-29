<?php include 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Irish Fantasy Rugby</title>
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap-grid.css"/>
    <link rel="stylesheet" href="css/bootstrap-reboot.css"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
  <a class="navbar-brand" href="#">
      <img id="brand-image" src="images/rugbylogo.png" alt="Italian Trulli">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Market</a>
      </li>
     
    </ul>
  </div>
</nav>

<br>

    <div class="row">
        <div class="col-lg-2 col-md-12  third" id="account">
            <div id="accountinfo"  align="center">
                <img src="images/davy.jpg" class="img-fluid rounded-circle">
                <h2>Daviid1010</h2>
                <br>
                <h2>Wins</h2>
                <h3>20</h3>
                <br>
                <h2>Losses</h2>
                <h3>4</h3>
                <br>
                <h2>Points</h2>
                <h3>615</h3>

                <div id="play">
                    Play Now
                </div>
            </div>

        </div>
        <div class="col-lg-5 col-md-12 players third" id="forwards">

            <div class="playerRow">
                <!--Front Row -->
                <div class="playerBox full threeFull">
                    <div id="player1" class="playerImage"></div>
                    <div class="playerUnder">1. <span>Prop</span></div>
                </div>
                <div class="playerBox empty threeEmpty"></div>
                <div class="playerBox full threeFull">
                    <div id="player2" class="playerImage"></div>
                    <div class="playerUnder">2. <span>Hooker</span></div>
                </div>
                <div class="playerBox empty threeEmpty"></div>
                <div class="playerBox full threeFull">
                    <div id="player3" class="playerImage"></div>
                    <div class="playerUnder">3. <span>Prop</span></div>
                </div>
            </div>

            <div class="playerRow">
                <div class="playerBox empty twoEmpty"></div>
                <div class="playerBox full twoFull">
                    <div id="player4" class="playerImage"></div>
                    <div class="playerUnder">4. <span>Lock</span></div>
                </div>
                <div class="playerBox empty twoEmpty"></div>
                <div class="playerBox full">
                    <div id="player5" class="playerImage"></div>
                    <div class="playerUnder">5. <span>Lock</span></div>
                </div>
                <div class="playerBox empty twoEmpty"></div>
            </div>
            <div class="playerRow">
                <div class="playerBox full threeFull">
                    <div id="player6" class="playerImage"></div>
                    <div class="playerUnder">6. <span>Flanker</span></div>
                </div>
                <div class="playerBox empty threeEmpty"></div>
                <div class="playerBox full threeFull">
                    <div id="player8" class="playerImage"></div>
                    <div class="playerUnder">8. <span>No. 8</span></div>
                </div>
                <div class="playerBox empty threeEmpty"></div>
                <div class="playerBox full threeFull">
                    <div id="player7" class="playerImage"></div>
                    <div class="playerUnder">7. <span>Flanker</span></div>
                </div>
            </div>
            <div class="playerRow">
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div id="player9" class="playerImage"></div>
                    <div class="playerUnder">9. <span>Scrum Half</span></div>
                </div>
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div id="player10" class="playerImage"></div>
                    <div class="playerUnder">10. <span>Fly Half</span></div>
                </div>
                <div class="playerBox empty"></div>
            </div>
            <div class="playerRow">
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div id="player12" class="playerImage"></div>
                    <div class="playerUnder">12. <span>Centre</span></div>
                </div>
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div id="player13" class="playerImage"></div>
                    <div class="playerUnder">13. <span>Centre</span></div>
                </div>
                <div class="playerBox empty"></div>
            </div>
            <div class="playerRow">
                <div class="playerBox full">
                    <div id="player11" class="playerImage"></div>
                    <div class="playerUnder">11. <span>Winger</span></div>
                </div>
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div id="player15" class="playerImage"></div>
                    <div class="playerUnder">15. <span>Full Back</span></div>
                </div>
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div id="player14" class="playerImage"></div>
                    <div class="playerUnder">14. <span>Winger</span></div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-12 players third" id="backs"><?php include 'Playersteam.php'?></div>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>