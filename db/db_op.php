<?php
    session_start();
    
    class dbHandler{
        private $server;
        private $connect;

        // constructor to initialize connection
        function __construct($conn = ""){
            if(empty($conn)){
                require "connect.php";
                $this->connect = $connect;
                $this->server = $server;
            }
            else{
                $this->connect = $conn;
            }
        }

        // destructor
        function __destruct(){
            if($this->connect instanceof mysqli){
                mysqli_close($this->connect);
            }
        }

        // returns connection variable
        public function getServerVar(){
            return $this->server;
        }
 
        // returns connection variable
        public function getConnectVar(){
            return $this->connect;
        }
 
        // returns uid if logged in and false if otherwise
        public function getAuthStatus(){
            if(isset($_SESSION["uid"]))
                return $_SESSION["uid"];
            else
                return false;
        }

        // re-register session
        public function resetSession($reset = 1){
            session_unset();
            session_destroy();
            if($reset == 1){
                session_start();
                session_regenerate_id();
            }
        }

        // returns uid according to passed given parameters
        public function getUidFromColData($val, $col = 'username'){
            $result = $this->executeQuery("SELECT uid FROM members WHERE $col = '$val'", 1);
            $row = $result->fetch_assoc();
            if($result->num_rows == 1)
                return $row["uid"];
            else
                return -1;
        }

        // returns complete profile info. of current logged in user. Returns -1 if not logged in, 0 on failure and object (containing profile info.) on success
        public function getProfile(){
            if(!$this->getAuthStatus())
                return -1;

            $uid = $_SESSION["uid"];

            $result = $this->executeQuery("SELECT * FROM members WHERE uid = '$uid'", 1);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $send = new stdClass;

                foreach($row as $col => $val){
                    $send->$col = $val;
                }

                return $send;
            }
            else{
                return 0;
            }
        }

        // executes query (cannot be called from outside)
        protected function executeQuery($query = "", $getResult = 0){
            if(empty($query))
                return 0;

            $conn = $this->connect;
            $result = $conn->query($query);
            if($getResult == 0){
                if(mysqli_affected_rows($conn) == 1)
                    return true;
                else
                    return false;
            }
            else{
                return $result;
            }
        }
    }
?>