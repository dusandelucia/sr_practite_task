<?php
    $root = $_SERVER['DOCUMENT_ROOT'] . '/sportscalendar';
    include_once $root . '/logic/database.php';
    include_once $root . '/model/sport.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsCalendar</title>
</head>
<body>
    <style>
        .calendar {
            width: 100%;
        }
    </style>
    <h3 style="width: 100%; text-align: center;">Sports Calendar - Sports</h3>
    <hr/>
    <a href="/sportscalendar/index.php"><button>Browse Events</button></a><a href="/sportscalendar/teams.php"><button>Browse Teams</button></a>
    <hr/>
    <table class="calendar">
        <tr>
            <th>Sport ID</th><th>Name</th>
        </tr>

        <?php
            // load all sports
            foreach (Sport::getAll() as $sport){
                echo $sport->toTableRow();
            }
        ?>
    </table>
    <hr/>
</body>
</html>