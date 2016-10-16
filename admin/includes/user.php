<?php

  class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    // returns all users as an object array
    public static function find_all_users() {
      return self::find_this_query("SELECT * FROM users");
    }

    // finds a single user by id and returns either an object array or false
    public static function find_user_by_id($id) {
      $result_array = self::find_this_query("SELECT * FROM users WHERE id=$id LIMIT 1");

      return !empty($result_array) ? array_shift($result_array) : false;
    }

    // takes a SQL query and returns an object array of the results
    public static function find_this_query($sql) {
      global $database;

      $result_set = $database->query($sql);
      $obj_array = array();

      while ($row = mysqli_fetch_array($result_set)) {
        $obj_array[] = self::instantiate($row);
      }

      return $obj_array;
    }

    // finds a single user by username and password and returns either an object array or false
    public static function verify_user($username, $password) {
      global $database;

      // sanitize arguments
      $username = $database->escape_string($username);
      $password = $database->escape_string($password);

      $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
      $result_array = self::find_this_query($sql);

      return !empty($result_array) ? array_shift($result_array) : false;
    }

    private static function instantiate($record) {
      $user_obj = new self;

      foreach ($record as $prop => $val) {
        if ($user_obj->has_property($prop)) {
          $user_obj->$prop = $val;
        }
      }

      return $user_obj;
    }

    private function has_property($prop) {
      $props = get_object_vars($this);

      return array_key_exists($prop, $props);
    }

    public function create() {
      global $database;

      $sql = "INSERT INTO users (username, password, first_name, last_name) VALUES (";
      $sql .= "'{$database->escape_string($this->username)}', ";
      $sql .= "'{$database->escape_string($this->password)}', ";
      $sql .= "'{$database->escape_string($this->first_name)}', ";
      $sql .= "'{$database->escape_string($this->last_name)}'";
      $sql .= ")";

      if ($database->query($sql)) {
        $this->id = $database->insert_id();
        return true;
      } else {

        return false;
      }
    }

  } // end of User Class

?>
