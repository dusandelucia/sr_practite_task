<?php

class Database {
    public static $db_name = '/sportscalendar/database/database.db';

    static function sqlite_open() {
        $handle = new SQLite3(Database::$db_name, SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);

        return $handle;
    }

    static function sqlite_nonquery($query) {
        $handle = Database::sqlite_open();
        $handle->exec($query);
        $handle->close();
    }

    static function sqlite_query($query) {
        $handle = Database::sqlite_open();
        $result = $handle->query($query);
        $ret = [];
        $arr = [];
        while (($arr = $result->fetchArray(SQLITE3_ASSOC)) != false) {
            array_push($ret, $arr);
        }
        $handle->close();
        return $ret;
    }

}

Database::$db_name = $_SERVER['DOCUMENT_ROOT'] . Database::$db_name;

?>