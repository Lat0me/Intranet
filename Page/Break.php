<?php
require('database.php');
require_once ('gestion/compteur.php');
require_once ('gestion/rh.php');
$id = $_SESSION["id"];
?>
<script type="text/javascript">
    $(document).ready(function() {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            editable: false,
            weekends: false,
            googleCalendarApiKey: 'AIzaSyDBBozrjQq4unlPIZILU5R3sPTMBlDihSI',
            eventSources: [
                {
                    url: '/Page/event.php',
                    color: '#5cb85c',
                    textColor: 'white'
                },
                {
                    url: '/Page/event2.php',
                    color: '#F89406',
                    textColor: 'white'
                },
                {
                    googleCalendarId: 'fr.french#holiday@group.v.calendar.google.com',
                    className: 'gcal-event'
                }
            ]

        });

    });
</script>
<style>
    #calendar {
        max-width: 600px;
        margin: 0 auto;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <center>
                    <p>Voir la documentation sur les jours de congé</p>
                    <p>Voir la documentation sur les Absences</p>
                </center>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <center><?php echo "<a href='intranet.php?page=11&id=" . $id . "'><button class='btn btn-success'>Demander un Congé</button></a>";?></center>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <center><?php echo "<a href='intranet.php?page=12&id=" . $id . "'><button class='btn btn-warning'>Prochaine absences</button></a>";?></center>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-block">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <p>Demande en attente : <?php waitabs($db_connection, $id); ?></p>
                <p>Demande validé : <?php okabs($db_connection, $id); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <p>Total absences : <?php totalAbs($db_connection, $id); ?></p>
                <p>Justifié : <?php justAbs($db_connection, $id); ?></p>
                <p>Non justifié : <?php NoJustAbs($db_connection, $id); ?></p>
            </div>
        </div>
    </div>
</div>
<br>

<?php
if ($_SESSION['profil'] == "rh"){

    echo "<div class=\"row\">
            <div class=\"col-md-6\">
                <div class=\"card\">
                    <div class=\"card-block\">";
    echo "<center><h3>Administration Congé</h3></center>";
    listbreak($db_connection);
    echo "            </div>
                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"card\">
                    <div class=\"card-block\">";
    echo "<center><h3>Administration Absences</h3></center>";
    listabs($db_connection);
    echo "            </div>
                </div>
            </div>";"
";
}
?>




























