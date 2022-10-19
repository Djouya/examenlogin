<?php

    class Dbh {
        private $host;
        private $username;
        private $wachtwoord;
        private $dbNaam;
        private $charset;
        
        public function connect() {
            $this->host = "localhost";
            $this->username = "root";
            $this->wachtwoord = "";
            $this->dbNaam = "backup";
            $this->charset = "utf8mb4";
    
            try {
                $dsn = "mysql:host=".$this->host.";dbname=".$this->dbNaam.";charset=".$this->charset;
                $pdo = new PDO($dsn, $this->username, $this->wachtwoord);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }catch (\Exception $e){
                echo "Connection failed: ".$e->getMessage();
            }
        }
    }

