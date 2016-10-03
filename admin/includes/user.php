<?php

  class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    // returns all users as a mysqli_result object
    public static function find_all_users() {
      return self::find_this_query("SELECT * FROM users");
    }

    // finds a single user by id and returns it as an array
    public static function find_user_by_id($id) {
      $result = self::find_this_query("SELECT * FROM users WHERE id=$id LIMIT 1");
      $user = mysqli_fetch_array($result);
      return $user;
    }

    public static function find_this_query($sql) {
      global $database;

      $result_set = $database->query($sql);
      return $result_set;
    }

  }

?>
