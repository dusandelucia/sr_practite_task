<?php

class Event {
    var $id;
    var $time;
    var $place;
    var $_sportId;
    var $_team1;
    var $_team2;

    static function getAll() {
        $result = Database::sqlite_query("SELECT * FROM event;");

        $ret = [];

        foreach ($result as $res) {
            $event = new Event();
            $event->id = $res['id'];
            $event->time = strtotime($res['time']);
            $event->place = $res['place'];
            $event->_sportId = $res['_sportId'];
            $event->_team1 = $res['_team1'];
            $event->_team2 = $res['_team2'];
            
            array_push($ret, $event);
        }

        return $ret;
    }

    static function getAllForSport($sportId) {
        $result = Database::sqlite_query("SELECT * FROM event WHERE _sportId = ".$sportId.";");

        $ret = [];

        foreach ($result as $res) {
            $event = new Event();
            $event->id = $res['id'];
            $event->time = strtotime($res['time']);
            $event->place = $res['place'];
            $event->_sportId = $res['_sportId'];
            $event->_team1 = $res['_team1'];
            $event->_team2 = $res['_team2'];
            
            array_push($ret, $event);
        }

        return $ret;
    }

    static function new($sport, $team1, $team2, $time, $place){
        $query = "INSERT INTO event (_sportId, _team1, _team2, time, place) VALUES (?, ?, ?, ?, ?)";

        $db = Database::sqlite_open();
        $stmt = $db->prepare($query);

        $i = 1;
        $stmt->bindValue($i, $sport);
        $i += 1;
        $stmt->bindValue($i, $team1);
        $i += 1;
        $stmt->bindValue($i, $team2);
        $i += 1;
        $stmt->bindValue($i, $time);
        $i += 1;
        $stmt->bindValue($i, $place);

        $stmt->execute();
        
        $db->close();
    }

    function toTableRow() {
        $row = "<tr>";
        $row .= "<td style='text-align: center'>".$this->id."</td>";
        $row .= "<td style='text-align: center'>".date("H:i d.m.Y", $this->time)."</td>";
        $row .= "<td style='text-align: center'>".$this->place."</td>";
        $row .= "<td style='text-align: center'>".Sport::get($this->_sportId)[0]->name."</td>";
        $row .= "<td style='text-align: center'>".Team::get($this->_team1)[0]->name."</td>";
        $row .= "<td style='text-align: center'>".Team::get($this->_team2)[0]->name."</td>";
        $row .= "</tr>";

        return $row;
    }
}

?>