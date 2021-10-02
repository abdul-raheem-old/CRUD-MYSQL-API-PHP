<?php

    class DB{

        public $con;

        # PDO CONNECTION TO MYSQL DATABASE
        public function __construct($db_host, $db_name, $db_user, $db_pass){
            try{
                $this->con = new PDO("mysql:host=$db_host;dbname=$db_name", $username = $db_user, $password = $db_pass);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $ex){
                echo "Connection Failed: " . $ex->getMessage();
            }
        }

        # CREATE TABLES
        public function create_all_tables(){
            $create_table = "CREATE TABLE `login` (
                `login_id` int(80) unsigned NOT NULL AUTO_INCREMENT,
                `login_uid` int(80) unsigned NOT NULL,
                `login_username` text NOT NULL,
                `login_password` text NOT NULL,
                PRIMARY KEY (`login_id`)
              )";
            $this->con->exec($create_table);
        }

        # FUNCTION TO INSERT DATA IN TABLES
        public function insert_row($table_name, $data){
            $values = "NULL, ";
            foreach($data as $value){
                if($value == "NULL"){
                    $values = $values.$value;
                    if($value != end($data)){
                        $values = $values.", ";
                    }
                } else {
                    $values = $values."'".$value."'";
                    if($value != end($data)){
                        $values = $values.", ";
                    }
                }
            }
            $insert_data = "INSERT INTO `".$table_name."` VALUES(".$values.")";
            $this->con->exec($insert_data);
        }

        # GET LAST ID
        public function get_last_id($table_name){
            $get_id = $this->con->prepare("SELECT * FROM `".$table_name."` ORDER BY ".$table_name."_id DESC LIMIT 1");
            $get_id->execute();
            $result = $get_id->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]['login_id'];
        }

        # DELETE DATA
        public function delete_row($table_name, $row_id){
            $query = "DELETE FROM `".$table_name."` WHERE ".$table_name."_id = '".$row_id."'";
            $this->con->query($query);
        }

        # UPDATE DATA
        public function update_row($table_name, $field_name, $data, $row_id){
            $query = "UPDATE `".$table_name."` SET ".$field_name." = '".$data."' WHERE ".$table_name."_id = '".$row_id."'";
            $this->con->query($query);
        }

        # DELETE BY KEY
        public function delete_by_key($table_name, $key){
            $query = "DELETE FROM `".$table_name."` WHERE ".$table_name."_key = '".$key."'";
            $this->con->query($query);
        }

        # GET FIELD VALUE
        public function get_field_value($table_name, $field_name, $row_id){
            $get_value = $this->con->prepare("SELECT * FROM `".$table_name."` WHERE ".$table_name."_id = '".$row_id."'");
            $get_value->execute();
            $result = $get_value->fetchAll(PDO::FETCH_ASSOC);
            return $result[0][$field_name];
        }

    }

    $con = new DB("127.0.0.1", "social_media", "arhex", "toor");
    // $data = ['1', 'admin', 'toor'];
    // $con->insert_row("login", $data);
    // $con->get_last_id("login");
    // $con->delete_row("login", $con->get_last_id("login"));
    // $con->update_row("login", "login_password", "hEllfun@911", "1");
    // $con->delete_by_key("login", $con->get_last_id("login"));
    // echo $con->get_field_value('login', 'login_username', '1');
?>