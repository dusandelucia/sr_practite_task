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
        /* Stil */
        form {
            width: 100%;
            text-align: center;
        }
    </style>
    <h3 style="width: 100%; text-align: center;">Sports Calendar</h3>
    <hr/>
    <a href="/sportscalendar/index.php"><button>Browse Events</button></a><a href="/sportscalendar/teams.php"><button>Browse Teams</button></a><a href="/sportscalendar/sports.php"><button>Browse Sports</button></a>
    <hr/>
    <h5 style="width: 100%; text-align: center;">Add new Event</h5>
    <hr/>
    <form id="e_form" method="post" action="/sportscalendar/logic/add_action.php">
        <label for="e_sport">Sport:</label>
        <select form="e_form" name="e_sport" id="e_sport" required>
            <?php
                foreach (Sport::getAll() as $sport){
                    echo $sport->toOption();
                }
            ?>
        </select><br/><br/>
        <label for="e_team1">Team 1:</label>
        <select form="e_form" name="e_team1" id="e_team1" required>
            <?php
                foreach (Team::getAll() as $team){
                    echo $team->toOption();
                }
            ?>
        </select>
        <label for="e_team2">Team 2:</label>
        <select form="e_form" name="e_team2" id="e_team2" required>
            <?php
                foreach (Team::getAll() as $team){
                    echo $team->toOption();
                }
            ?>
        </select><br/><br/>
        <label for="e_time">Time (YYYY-MM-DD HH:mm):</label>
        <input type="text" name="e_time" id="e_time" placeholder="YYYY-MM-DD HH:mm" required><br/><br/>
        <label for="e_place">Place:</label>
        <input type="text" name="e_place" id="e_place" placeholder="Place" required><br/><br/>

        <input type="hidden" name="e_type" id="e_type" value="e">

        <input type="submit" value="Add new Event">
    </form>
    <hr/>
    <h5 style="width: 100%; text-align: center;">Add new Sport</h5>
    <hr/>
    <form id="s_form" method="post" action="/sportscalendar/logic/add_action.php">
        <label for="s_name">Sport name:</label>
        <input type="text" name="s_name" id="s_name" placeholder="Name" required><br/><br/>

        <input type="hidden" name="s_type" id="s_type" value="s">

        <input type="submit" value="Add new Sport">
    </form>
    <hr/>
    <h5 style="width: 100%; text-align: center;">Add new Team</h5>
    <hr/>
    <form id="t_form" method="post" action="/sportscalendar/logic/add_action.php">
        <label for="t_name">Team name:</label>
        <input type="text" name="t_name" id="t_name" placeholder="Name" required><br/><br/>

        <input type="hidden" name="t_type" id="t_type" value="t">

        <input type="submit" value="Add new Team">
    </form>
    <hr/>
</body>
</html>