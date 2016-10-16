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

    $user = User::verify_user($username, $password);

    if ($user) {
      $session->login($user);
      redirect("index.php");
    } else {
      $message = "Invalid username/password combination!";
      $error = true;
    }
  } else {
    $username = "";
    $password = "";
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
      <input type="submit" name="submit" value="Sign In" class="btn btn-primary">
    </div>
    
  </form>

  <form id="signup" action="signup.php">
    <input type="submit" value="Sign Up" class="btn btn-info">
  </form>

</div>
