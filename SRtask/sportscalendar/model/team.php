<?php

class Team {
    var $id;
    var $name;

    static function getAll() {
        $result = Database::sqlite_query("SELECT * FROM team;");

        $ret = [];

        foreach ($result as $res) {
            $team = new Team();
            $team->id = $res['id'];
            $team->name = $res['name'];
            array_push($ret, $team);
        }

        return $ret;
    }

    static function get($id){
        $result = Database::sqlite_query("SELECT * FROM team WHERE id = ".$id.";");

        $ret = [];

        foreach ($result as $res) {
            $team = new Team();
            $team->id = $res['id'];
            $team->name = $res['name'];
            array_push($ret, $team);
        }

        return $ret;
    }

    static function new($name){
        $query = "INSERT INTO team (name) VALUES (?)";

        $db = Database::sqlite_open();
        $stmt = $db->prepare($query);

        $i = 1;
        $stmt->bindValue($i, $name);

        $stmt->execute();
        
        $db->close();
    }

    function toTableRow() {
        $row = "<tr>";
        $row .= "<td style='text-align: center'>".$this->id."</td>";
        $row .= "<td style='text-align: center'>".$this->name."</td>";
        $row .= "</tr>";

        return $row;
    }

    function toOption() {
        $row = "<option value='".$this->id."'>";
        $row .= "".$this->name."";
        $row .= "</option>";

        return $row;
    }
}

?>