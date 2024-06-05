<?php

class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    public $mysqli;


    public function __construct()
    {
        $this->db_connect();
    }

    private function db_connect()
    {
        $this->db_host = 'localhost';
        $this->db_name = 'blvck_collections';
        $this->db_user = 'root';
        $this->db_pass = '';

        $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if ($this->mysqli->connect_errno) {
            die('<div class="block-warning">
                    <i class="icon-alert-octagon"></i>
                    <div class="body-title-2">Failed to connect to database!</div>
                </div>
                ' . $this->mysqli->connect_error);
        }
    }

    

    public function closeConnection(){
        $this->mysqli->close();
    }
}
