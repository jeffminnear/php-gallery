<?php require_once "includes/header.php"; ?>

<?php

  $message = $session->message();
  $error = false;

  if ($session->is_signed_in()) {
    redirect("index.php");
  }

  if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $verify_password = trim($_POST['verify_password']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);

    if ($password == $verify_password) {
      $user = new User();
      set_object_vars($user, $_POST);

      if ($user->create()) {
        $session->login($user);
        $session->message("User {$user->username} was created successfully");
        redirect("index.php");
      } else {
        $message = "There was a problem creating the user!";
        $error = true;
      }
    } else {
      $message = "Passwords do not match!";
      $verify_password = "";
      $error = true;
    }

  } else {
    $username = "";
    $password = "";
    $verify_password = "";
    $first_name = "";
    $last_name = "";
  }

?>

<div class="col-md-4 col-md-offset-4">

<?php

  if (!empty($message)) {
    $error ? show_error($message) : show_success($message);
    $session->clear_message();
  }

?>

<form id="login-id" action="" method="post">

<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >
</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
</div>

<div class="form-group">
	<label for="verify_password">Verify Password</label>
	<input type="password" class="form-control" name="verify_password" value="<?php echo htmlentities($verify_password); ?>">
</div>

<div class="form-group">
	<label for="first_name">First Name</label>
	<input type="text" class="form-control" name="first_name" value="<?php echo htmlentities($first_name); ?>">
</div>

<div class="form-group">
	<label for="last_name">Last Name</label>
	<input type="text" class="form-control" name="last_name" value="<?php echo htmlentities($last_name); ?>">
</div>

<div class="form-group">
  <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</div>


</form>


</div>
