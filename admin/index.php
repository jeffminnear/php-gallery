<?php include("includes/header.php"); ?>

<?php

  $message = $session->message();
  $error = false;

?>

<!-- redirect unauthorized users to the login page -->
<?php if (!$session->is_signed_in()) redirect("login.php"); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

            <?php include("includes/top_nav.php") ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include("includes/side_nav.php") ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <?php

              if (!empty($message)) {
                show_success($message);
                $session->clear_message();
              }

            ?>

            <?php include("includes/admin_content.php"); ?>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>
