<?php
// file di connessione al DB

include_once __DIR__ . '/../helpers/conn_helper.php';

class DB
{
    static public function getConn()
    {
        $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($conn && $conn->connect_error) {
            // throw new Exception('Errore di connessione');
        } else {
            return $conn;
        }
    }
}
