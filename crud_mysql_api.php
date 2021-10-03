<?php

    # EASY TO USE DATABASE API
    # Easy CRUD Operations anyone can use.
    # CREATED BY: Abdul Raheem
    # FOLLOW ME @ https://github.com/arhex-labs

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

        # INSERT ROW
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

        # GET LAST ROW ID
        public function get_last_id($table_name, $id_field_name){
            $get_id = $this->con->prepare("SELECT * FROM `".$table_name."` ORDER BY ".$id_field_name." DESC LIMIT 1");
            $get_id->execute();
            $result = $get_id->fetchAll(PDO::FETCH_ASSOC);
            return $result[0][$id_field_name];
        }

        # DELETE ROW
        public function delete_row($table_name, $field_name, $key){
            $query = "DELETE FROM `".$table_name."` WHERE ".$field_name." = '".$key."'";
            $this->con->query($query);
        }

        # UPDATE ROW
        public function update_row($table_name, $field_name, $data, $key, $value){
            $query = "UPDATE `".$table_name."` SET ".$field_name." = '".$data."' WHERE ".$key." = '".$value."'";
            $this->con->query($query);
        }

        # GET FIELD VALUE
        public function get_field_value($table_name, $key, $value, $field_name){
            $get_value = $this->con->prepare("SELECT * FROM `".$table_name."` WHERE ".$key." = '".$value."'");
            $get_value->execute();
            $result = $get_value->fetchAll(PDO::FETCH_ASSOC);
            return $result[0][$field_name];
        }

        # GET SINGLE ROW
        public function get_row($table_name, $key, $value){
            $get_value = $this->con->prepare("SELECT * FROM `".$table_name."` WHERE ".$key." = '".$value."' LIMIT 1");
            $get_value->execute();
            $result = $get_value->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        # GET ALL ROWS
        public function get_row_all($table_name, $key, $value){
            $get_value = $this->con->prepare("SELECT * FROM `".$table_name."` WHERE ".$key." = '".$value."'");
            $get_value->execute();
            $result = $get_value->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        # READ TABLE
        public function read_table($table_name){
            $get_table = $this->con->prepare("SELECT * FROM `".$table_name."`");
            $get_table->execute();
            $result = $get_table->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

    }

?>
