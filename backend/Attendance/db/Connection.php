<?php
class Connection
{
    protected mysqli $connection;

    public function __construct()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "attendance_system";

        $this->connection = new mysqli($host, $username, $password, $database);

        if ($this->connection->connect_error) {
            echo json_encode(["status" => "error", "message" => "Database connection failed"]);
            exit();
        }
    }
}

