<?php


namespace service;

use utils\DbConnection;

class ConfigurazioneService
{
    private $db;

    public function __construct()
    {
        $dbConnection = new DbConnection();
        $this->db = $dbConnection->getConnection();
    }

    public function getValoreByChiave($chiave): string
    {
        $query = "SELECT Valore FROM configurazione WHERE Chiave = '$chiave'";
        $result = $this->db->query($query);
        $row = mysqli_fetch_assoc($result);
        return $row['Valore'];
    }
}