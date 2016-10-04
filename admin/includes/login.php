<?php require_once "init.php"; ?>

<?php

  if ($session->is_signed_in()) {
    redirect("index.php");
  }

  if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // TODO method to check database user
    $user = User::verify_user($username, $password);

    if ($user) {
      $session->login($user);
      redirect("index.php");
    } else {
      $message = "Invalid username/password combination!";
    }
  } else {
    $username = "";
    $password = "";
  }

?>
