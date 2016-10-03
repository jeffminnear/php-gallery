<?php

  class User {
    // returns all users as a mysqli_result object
    public static function find_all_users() {
      global $database;

      $result_set = $database->query('SELECT * FROM users');
      return $result_set;
    }

    // finds a single user by id and returns it as an array
    public static function find_user_by_id($id) {
      global $database;

      $result = $database->query('SELECT * FROM users WHERE id=' . $id);
      $user = mysqli_fetch_array($result);
      return $user;
    }

  }

?>
