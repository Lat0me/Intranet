<?php
ob_start();
session_start();
if (!isset($_SESSION['connex'])) {
    header('Location: index.php');
    exit();
}
?>
<style>
    body {
        background: url(Image/Background1.jpg) no-repeat, linear-gradient(to bottom,  #000033 0%,#000033 100%);
        background-position: top;
        background-attachment: fixed;
    }
    div.container {
        background-color:rgba(255, 255, 255, 0.1); !important;
    }
    div.row {
        background-color:rgba(255, 255, 255, 0.1); !important;
    }
     div.card {
        background-color:rgba(255, 255, 255, 0.1); !important;
    }
    .titre {
        color:white;
    }
    .navimg {
         width: 110px;
         height: 40px;
    }

</style>

<html>
<head>
    <title>Intranet</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="Image/favicon.ico"/>
    <!-- jquery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- function javascript -->
    <script type="text/javascript" src="Page/cacher.js"></script>
    <!-- Font-Awesome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>

    <!-- fullcalendar -->
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css'/>
    <script src='lib/jquery.min.js'></script>
    <script src='fullcalendar/lib/moment.min.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>
    <script type='text/javascript' src='fullcalendar/gcal.js'></script>
    <script src='fullcalendar/locale/fr.js'></script>
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-inverse fixed-top navbar-toggleable-md navbar-light bg-faded bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="intranet.php?page=5">
                <img class="navimg" src="Image/neuralinkWhite.png"></a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="intranet.php?page=1"><i class="fa fa-calendar" aria-hidden="true"></i>
                            Calendrier</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="intranet.php?page=2"><i class="fa fa-coffee" aria-hidden="true"></i>
                            Forum</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="intranet.php?page=3"><i class="fa fa-sitemap" aria-hidden="true"></i>
                            Projet</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-address-book-o" aria-hidden="true"></i> Annuaire
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="intranet.php?page=4"><i class="fa fa-male"
                                                                                   aria-hidden="true"></i><i
                                        class="fa fa-female" aria-hidden="true"></i> Ressources interne</a>
                            <a class="dropdown-item" href="intranet.php?page=7"><i class="fa fa-address-book-o"
                                                                                   aria-hidden="true"></i> Contact</a>
                            <a class="dropdown-item" href="intranet.php?page=8"><i class="fa fa-industry"
                                                                                   aria-hidden="true"></i>
                                Compagnies</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="intranet.php?page=9"><i class="fa fa-cogs" aria-hidden="true"></i>
                            Gestion interne</a>
                    </li>
		                        <li class="nav-item active">
                        <a class="nav-link" href="glpi" target="_blank"><i class="fa fa-info" aria-hidden="true"></i>
                            glpi</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="ocsreports" target="_blank"><i class="fa fa-laptop" aria-hidden="true"></i>
                            ocs</a>
                    </li>
		    <li class="nav-item active">
                        <a class="nav-link" href="nagios3" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i>
                            nagios</a>
                    </li>
                </ul>
                <a href="deconnexion.php">
                    <button class="btn btn-secondary"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                </a>
            </div>
        </nav>
    </div>
</div>
<br>

<div class="col-md-12">
    <div class="card">
        <div class="card-block">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 0;
            }
            switch ($page) {
                case 1:
                    echo "<br><h3 class='titre'> Calendrier d'entreprise</h3><br>";
                    include("Page/Calendar.php");
                    break;
                case 2:
                    echo "<br><h2 class='titre'> Forum</h2>";
                    include("Page/social.php");
                    break;
                case 3:
                    echo "<br><h2 class='titre'> Projet</h2>";
                    include("Page/projet.php");
                    break;
                case 4:
                    echo "<br><h2 class='titre'> Ressources interne</h2>";
                    include("Page/rh.php");
                    break;
                case 5:
                    echo "<br><h2 class='titre'> Accueil</h2>";
                    include("Page/home.php");
                    break;
                case 6:
                    include("Page/viewProjet.php");
                    break;
                case 7:
                    echo "<br><h2 class='titre'> Contact</h2>";
                    include("Page/contact.php");
                    break;
                case 8:
                    echo "<br><h2 class='titre'> Compagnies</h2>";
                    include("Page/compagnie.php");
                    break;
                case 9:
                    echo "<br><h2 class='titre'> Congés - absences</h2>";
                    include("Page/Break.php");
                    break;
                case 10:
                    include("Page/oneUser.php");
                    break;
                case 11:
                    include("Page/gestion/conge.php");
                    break;
                case 12:
                    include("Page/gestion/absence.php");
                    break;
            }
            ob_end_flush();
            ?>
        </div>
    </div>
</div>
</div>
</body>
</html>
