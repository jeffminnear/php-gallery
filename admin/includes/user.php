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

    // finds a single user by id and returns it as an object array
    public static function find_user_by_id($id) {
      $result_array = self::find_this_query("SELECT * FROM users WHERE id=$id LIMIT 1");

      return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_this_query($sql) {
      global $database;

      $result_set = $database->query($sql);
      $obj_array = array();

      while ($row = mysqli_fetch_array($result_set)) {
        $obj_array[] = self::instantiate($row);
      }

      return $obj_array;
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

  }

?>
