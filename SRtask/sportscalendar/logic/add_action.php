<?php
    $root = $_SERVER['DOCUMENT_ROOT'] . '/sportscalendar';
    include_once $root . '/logic/database.php';
    include_once $root . '/model/team.php';
    include_once $root . '/model/sport.php';
    include_once $root . '/model/event.php';

    if (isset($_POST['e_type'])) {
        // Dodajemo event
        $e_sport = $_POST['e_sport'];
        $e_team1 = $_POST['e_team1'];
        $e_team2 = $_POST['e_team2'];
        $e_time = $_POST['e_time'];
        $e_place = $_POST['e_place'];
        Event::new($e_sport, $e_team1, $e_team2, $e_time, $e_place);
    } else if (isset($_POST['s_type'])) {
        // Dodajemo sport
        $s_name = $_POST['s_name'];
        Sport::new($s_name);
    } else if (isset($_POST['t_type'])) {
        // Dodajemo team
        $t_name = $_POST['t_name'];
        Team::new($t_name);
    } 

    // Vrati na pocetnu jer smo gotovi
    header('Location: http://localhost/sportscalendar');
?>