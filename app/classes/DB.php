<?php

    class DB
    {
        protected $mysqli;
        
        // connect to server
        public function __construct()
        {
            $this->mysqli = new mysqli('0.0.0.0', 'adamparker99', '', 'c9', '3306');
            
        }
        
        public function query($sql)
        {
            return $this->mysqli->query($sql);
        }
    }

?>