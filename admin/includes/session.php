<?php

  class Session {
    private $signed_in = false;
    public  $user_id;

    function __construct() {
      session_start();
      $this->check_login();
    }

    public function is_signed_in() {
      return $this->signed_in;
    }

    public function login($user) {
      if ($user) {
        $this->user_id = $_SESSION['user_id'] = $user->id;
        $this->signed_in = true;
        $this->message("You were successfully logged in");
      }
    }

    public function logout() {
      unset($_SESSION['user_id']);
      unset($this->user_id);
      $this->signed_in = false;
      $this->message("You were successfully logged out");
    }

    private function check_login() {
      if (isset($_SESSION['user_id'])) {
        $this->user_id = $_SESSION['user_id'];
        $this->signed_in = true;
      } else {
        unset($this->user_id);
        $this->signed_in = false;
      }
    }

    public function message($msg="") {
      if (!empty($msg)) {
        $_SESSION['message'] = $msg;
      } else {
        if (isset($_SESSION['message'])) {
          return $_SESSION['message'];
        } else {
          return "";
        }
      }
    }

    public function clear_message() {
      unset($_SESSION['message']);
    }
  }

  $session = new Session();

?>
