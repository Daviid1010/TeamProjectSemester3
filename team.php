<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 18/12/2018
 * Time: 11:48
 */
include 'connection.php';
session_start();
include 'Tests/imagestest.php';
?>
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
      <li class="nav-item a">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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
        <div class="col-lg-3 col-md-12  third" id="account"  >
            <h2>Squad</h2>
            <?php include "Roster.php"?>
            </div>


        <div class="col-lg-5 col-md-12 players third" id="forwards">

            <div class="playerRow">
                <!--Front Row -->
                <div class="playerBox full threeFull">
                    <div  class="playerImage" style="background-image: url('images/<?php echo $filepathArr[0]?>')"></div>
                    <div class="playerUnder">1. <span>Prop</span></div>
                </div>
                <div class="playerBox empty threeEmpty"></div>
                <div class="playerBox full threeFull">
                    <div class="playerImage" style="background-image: url('images/<?php echo $filepathArr[1]?>')"></div>
                    <div class="playerUnder">2. <span>Hooker</span></div>
                </div>
                <div class="playerBox empty threeEmpty"></div>
                <div class="playerBox full threeFull">
                    <div class="playerImage" style="background-image: url('images/<?php echo $filepathArr[2]?>')"></div>
                    <div class="playerUnder">3. <span>Prop</span></div>
                </div>
            </div>

            <div class="playerRow">
                <div class="playerBox empty twoEmpty"></div>
                <div class="playerBox full twoFull">
                    <div class="playerImage" style="background-image: url('images/<?php echo $filepathArr[3]?>')"></div>
                    <div class="playerUnder">4. <span>Lock</span></div>
                </div>
                <div class="playerBox empty twoEmpty"></div>
                <div class="playerBox full">
                    <div class="playerImage" style="background-image: url('images/<?php echo $filepathArr[4]?>')"></div>
                    <div class="playerUnder">5. <span>Lock</span></div>
                </div>
                <div class="playerBox empty twoEmpty"></div>
            </div>
            <div class="playerRow">
                <div class="playerBox full threeFull">
                    <div class="playerImage" style="background-image: url('images/<?php echo $filepathArr[5]?>')"></div>
                    <div class="playerUnder">6. <span>Flanker</span></div>
                </div>
                <div class="playerBox empty threeEmpty"></div>
                <div class="playerBox full threeFull">
                    <div  class="playerImage" style="background-image: url('images/<?php echo $filepathArr[7]?>')"></div>
                    <div class="playerUnder">8. <span>No. 8</span></div>
                </div>
                <div class="playerBox empty threeEmpty"></div>
                <div class="playerBox full threeFull">
                    <div class="playerImage" style="background-image: url('images/<?php echo $filepathArr[6]?>')"></div>
                    <div class="playerUnder">7. <span>Flanker</span></div>
                </div>
            </div>
            <div class="playerRow">
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div style="background-image: url('images/<?php echo $filepathArr[8]?>')" class="playerImage"></div>
                    <div class="playerUnder">9. <span>Scrum Half</span></div>
                </div>
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div style="background-image: url('images/<?php echo $filepathArr[9]?>')" class="playerImage"></div>
                    <div class="playerUnder">10. <span>Fly Half</span></div>
                </div>
                <div class="playerBox empty"></div>
            </div>
            <div class="playerRow">
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div style="background-image: url('images/<?php echo $filepathArr[11]?>')" class="playerImage"></div>
                    <div class="playerUnder">12. <span>Centre</span></div>
                </div>
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div style="background-image: url('images/<?php echo $filepathArr[12]?>')" class="playerImage"></div>
                    <div class="playerUnder">13. <span>Centre</span></div>
                </div>
                <div class="playerBox empty"></div>
            </div>
            <div class="playerRow">
                <div class="playerBox full">
                    <div style="background-image: url('images/<?php echo $filepathArr[10]?>')" class="playerImage"></div>
                    <div class="playerUnder">11. <span>Winger</span></div>
                </div>
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div style="background-image: url('images/<?php echo $filepathArr[14]?>')" class="playerImage"></div>
                    <div class="playerUnder">15. <span>Full Back</span></div>
                </div>
                <div class="playerBox empty"></div>
                <div class="playerBox full">
                    <div style="background-image: url('images/<?php echo $filepathArr[13]?>')" class="playerImage"></div>
                    <div class="playerUnder">14. <span>Winger</span></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 players third" id="backs">
            <h1>Current Team</h1>
            <?php include 'Playersteam.php'?>
        </div>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>