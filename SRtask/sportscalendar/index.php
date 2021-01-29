<?php
    $root = $_SERVER['DOCUMENT_ROOT'] . '/sportscalendar';
    include_once $root . '/logic/database.php';
    include_once $root . '/model/team.php';
    include_once $root . '/model/sport.php';
    include_once $root . '/model/event.php';
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
    <h3 style="width: 100%; text-align: center;">Sports Calendar</h3>
    <hr/>
    <a href="/sportscalendar/add.php"><button>Add new Event</button></a>
    <hr/>
    <form id="form" method="post" action="/sportscalendar/only_sport.php">
        <label for="sport">View only sport:</label>
        <select form="form" name="sport" id="sport" required>
            <?php
                foreach (Sport::getAll() as $sport){
                    echo $sport->toOption();
                }
            ?>
        </select>
        <input type="submit" value="View">
    </form>
    <hr/>
    <a href="/sportscalendar/teams.php"><button>Browse Teams</button></a><a href="/sportscalendar/sports.php"><button>Browse Sports</button></a>
    <hr/>
    <table class="calendar">
        <tr>
            <th>Event ID</th><th>Time</th><th>Place</th><th>Sport</th><th>Team 1</th><th>Team 2</th>
        </tr>

        <?php
            // load all events
            foreach (Event::getAll() as $event){
                echo $event->toTableRow();
            }
        ?>
    </table>
    <hr/>
</body>
</html>