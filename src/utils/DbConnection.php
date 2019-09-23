<?php


namespace utils;

use mysqli;

define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "wedding");


class DbConnection
{

    private $dbConn;
    /**
     * Effettua la connessione al database
     * @return mysqli
     */
    public static function getConnection(): mysqli {
        $dbConn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        return $dbConn;
    }

    /**
     * Chiude la connessione con il database
     * @return void
     */
    public static function closeConnection() {
        unset($dbConn);
    }

}