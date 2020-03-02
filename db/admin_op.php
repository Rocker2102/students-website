<?php
    require("db_op.php");

    class adminHandler extends dbHandler{
        private $connect;

        // constructor to initialize connection
        function __construct($connect = ""){
            parent::__construct($connect);
            $this->connect = parent::getConnectVar();
        }

        // destructor
        function __destruct(){
            parent::__destruct();
        }

        // returns auth status (admin level) (cannot be accessed publicly)
        public function getAuthStatus(){
            if(parent::getAuthStatus() && (int)$_SESSION["adminLevel"] >= 1)
                return $_SESSION["adminLevel"];
            else
                return false;
        }

        // returns complete profile info. according to given 'uid'. Returns -1 if unauthenticated, 0 if not found and object (containing profile info.) if found
        public function getProfile($uid = -1){
            if(!$this->getAuthStatus())
                return -1;
            
            if($uid <= 0)
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

        // executes any query and returns result according to given parameters
        public function executeQuery($query = "", $getResult = 0){
            if(!$this->getAuthStatus())
                return -1;

            return parent::executeQuery($query, $getResult);
        }
    }
?>