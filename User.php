<?php
    class User{
        private $server = "localhost";
        private $username = "root";
        private $pw = "RecursionXK9~!@";
        private $dbname = "travelinformation";
        public $uid = 2;
        public $database;

        public function __construct(){
            $this -> database = new mysqli($this -> server, $this -> username, $this -> pw, $this -> dbname );
            if ($this -> database->connect_error) {
                die("Connection failed: " . $this -> database->connect_error);
            }
        }
    }

?>