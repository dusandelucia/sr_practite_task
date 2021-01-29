<?php
    $root = $_SERVER['DOCUMENT_ROOT'] . '/sportscalendar';
    include_once $root . '/logic/database.php';
    include_once $root . '/model/team.php';
    include_once $root . '/model/sport.php';
    include_once $root . '/model/event.php';

    if (isset($_POST['sport'])) {
        echo '<hr/>';
        echo '<h3 style="width: 100%; text-align: center;">Sports Calendar</h3>';
        echo '<hr/>';
        echo '<table class="calendar">';
        echo '<tr>';
        echo '<th>Event ID</th><th>Time</th><th>Place</th><th>Sport</th><th>Team 1</th><th>Team 2</th>';
        echo '</tr>';
        // Ucitaj sve dogadjaje za sport
        foreach (Event::getAllForSport($_POST['sport']) as $event){
            echo $event->toTableRow();
        }
        echo '</table>';
        echo '<hr/>';
        echo '<a href="/sportscalendar/index.php"><button>&lt; Back</button>';
    } else {
        // back to home, bad request
        header('Location: http://localhost/sportscalendar');
    }
?>